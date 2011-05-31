<?php
/*

File: currencyexchange.php
Author: Gary White
Last modified: July 6, 2005

Copyright (C) 2005, Gary White

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
included GNU General Public License for more details. If you 
received this file without the gpl.txt file, you may view it at:
http://www.gnu.org/copyleft/gpl.html

See the readme.txt file for usage.

July 6, 2005 added the RON, Romania New Leu, to the currency list.

*/

// this simply gets an array of possible currency countries and names
$allCurrencies=getCurrencyNames();
class currencyExchange{
	/////////////////////////////////////////////////////////////////////////////////////////
	// Public Properties
	// Note that these properties are public, but the values are all generated internally.
	// You should consider them read only during normal usage.
	// The only one you may want to access would be the $localFile property, if you wanted
	// to change the name of the local file used to cache a copy of the data.
	/////////////////////////////////////////////////////////////////////////////////////////
	
	// $Supplier property will be the European Central Bank, assuming we get the data
	var $Supplier="";
	// $Date property is the date of the exchange rate publication
	var $Date="";
	// $Rates property is an associative array of rateobj objects with the three letter identifier as the array keys
	var $Rates=array();
	// $Source property will be either "Local" or "Remote" depending on where the data comes from
	var $Source="";
	// $Error property will contain any error messages generates along the way
	var $Error="";
	// $localFile property is the file name used to cache a local copy of the XML file
	var $localFile="currencies_local.xml";
	// $url property is the URL of the XML file at the European Central Bank
	var $url="http://www.ecb.int/stats/eurofxref/eurofxref-daily.xml";

	/////////////////////////////////////////////////////////////////////////////////////////
	// Public Methods
	/////////////////////////////////////////////////////////////////////////////////////////
	function getData(){
		$olderr=error_reporting(0);
		$this->Source="Local";
		if(file_exists(sfConfig::get('app_root_dir').$this->localFile)){
			// load it
			$this->xml=@file_get_contents(sfConfig::get('app_root_dir').$this->localFile);
			$this->parse();
	
			// check if it's a weekend
			// what day of the week is it?
			$weekday=date("w");
			// if it's a Sunday or Saturday
			if($weekday==0 || $weekday==6){
				// go back to last Friday
				$date=date("Y-m-d",strtotime("last Friday"));
			} else {
				$date=date("Y-m-d");
			}
			// if the date in the local file is not the same
			// as our current date, or last Friday for weekends
			if($this->Date!=$date){

				// clear the data
				$this->clearData();

				// get the remote file
				$this->xml=$this->getRemoteFile($this->url);

				if($this->parse()){
					$this->Source="Remote";
					// write the remote file data to a local copy of the file
					$this->saveLocalCopy();
				}
			} // if we have a local copy
		}else{
			$this->xml=$this->getRemoteFile($this->url);

			if($this->xml)
				// write the remote file data to a local copy of the file
				$this->saveLocalCopy();
		}
		if(!$this->xml)
			$this->error="Failed to get data";
		else{
			$this->parse();
		}
		// sort our rates on the keys
		ksort($this->Rates);
		error_reporting($olderr);
		return count($this->Rates);
	}
	
	function getRemoteFile($url){

		$curl_handle = curl_init();
		// Where should we get the data?
		curl_setopt ($curl_handle, CURLOPT_URL, $url);
		// This says not to dump it directly to the output stream, but instead
		// have it return as a string.
		curl_setopt ($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		// the following is optional, but you should consider setting it
		// anyway. It prevents your page from hanging if the remote site is
		// down.
		curl_setopt ($curl_handle, CURLOPT_CONNECTTIMEOUT, 1);
		// Now, YOU make the call.
		$buffer = curl_exec($curl_handle);
		// And tell it to shut down (when your done. You can always make more
		// calls if you want.)
		curl_close($curl_handle);
		// This is where i�d probably do some extra checks on what i just got.
		// Paranoia pays dividends.

		return $buffer;
	}

	function Convert($from, $to, $amount=1){
		// Converts from one currency to another. The method expects at least two
		// parameters. The first param , $from, it the three letter identifier for
		// the currency you are converting from. The second param, $to, is the 
		// three letter identifier for the currency you are converting to. The final
		// param, $amount, is the amount of the $from currency to convert. If omitted
		// the amount defaults to 1 and the function will return the amount of $to
		// currency that corresponds with 1 unit of the $from currency.
		if(array_key_exists($from, $this->Rates) && array_key_exists($to, $this->Rates)){
			return ($amount * (($this->Rates[$to]->rate)/($this->Rates[$from]->rate)));
		}else{
			$this->Error->Error = "";
			if (!array_key_exists($from, $this->Rates))
				$this->Error.="$from is not a recognized currency identifier ";
			if (!array_key_exists($from, $this->Rates))
				$this->Error.="$to is not a recognized currency identifier";
			return false;
		}
	}

	function setBaseCurrency($currency){
		// This function converts all currencies to be based on one unit of
		// $base currency. It's only really useful if you want to output a 
		// table of conversion factors.

		// get a factor to do our conversion based on our base currency
		$factor=$this->Rates[$currency]->rate;
		// modify the rates based on the base currency
		foreach(array_keys($this->Rates) as $k){
			$rate=$this->Rates[$k]->rate / $factor;
			$this->Rates[$k]->rate=$rate;
		}
		return (count($this->Rates)>0);
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////
	// Private Methods
	// You should not need to call any of the following methods.
	/////////////////////////////////////////////////////////////////////////////////////////
	function clearData(){
		$this->Supplier="";
		$this->Date="";
		$this->Rates=array();
		$this->Source="";
		$this->xml="";
	}

	function saveLocalCopy(){
//          echo sfConfig::get('app_curre_xml');die();
		$fp=fopen(sfConfig::get('app_root_dir').$this->localFile,"w") or die("failed to write file");
		fwrite($fp,$this->xml);
		fclose($fp);
		$this->parse();
		$this->Source="Remote";
	}

	function parse(){
		if($this->xml){
			$this->parser = xml_parser_create();
			@xml_set_object($this->parser, $this);
			@xml_set_element_handler($this->parser, "startElement", "endElement");
			@xml_set_character_data_handler($this->parser, "characterData");
			$this->Rates['EUR']=new rateobj();
			$this->Rates['EUR']->rate=1.00;
			$this->Rates['EUR']->currency="Euro";
			xml_parse($this->parser, $this->xml, true)
				or die(sprintf("XML error: %s at line %d", 
					xml_error_string(xml_get_error_code($parser)), 
					xml_get_current_line_number($parser)));
			xml_parser_free($this->parser);
		}
	}

	function currencyExchange(){
//		$dir=pathinfo($_SERVER['PHP_SELF']);
//		$dir=$dir['dirname'];
		$this->localFile= $this->localFile;
	}

	function startElement($parser, $name, $attrs) {
		global $allCurrencies;
		$this->temp="";
		$gwCurrencyExch=&$GLOBALS['gwCurrencyExch'];
		if($name=="CUBE"){
			if(array_key_exists("TIME",$attrs)){
				$this->Date=$attrs["TIME"];
			}
			if(array_key_exists("CURRENCY",$attrs)){
				$this->Rates[$attrs["CURRENCY"]]=new rateobj();
				$this->Rates[$attrs["CURRENCY"]]->rate=$attrs["RATE"];
				$this->Rates[$attrs["CURRENCY"]]->currency=$allCurrencies[$attrs["CURRENCY"]];
			}
		}
	}
	
	function characterData($parser, $data){
		$this->temp.=$data;
	}
	
	function endElement($parser, $name) {
		switch($name){
			case "GESMES:NAME":
				$this->Supplier=$this->temp;
				break;
			case "GESMES:SUBJECT":
				$this->Report=$this->temp;
				break;
		}
		$temp="";
	}
	
} // end of ratelist class

class gwSocket{
	var $ClassName="gwSocket";
	var $Version="0.6";

	var $error="";
	var $headers;
	var $maxRedirects=3;
	var $page="";
	var $result="";
	var $redirects=0;
	var $userAgent="Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)";

	function getUrl( $url ) {
		$retVal="";
		$url_parsed = parse_url($url);
		$scheme = $url_parsed["scheme"];
		$host = $url_parsed["host"];
		$port = $url_parsed["port"]?$url_parsed["port"]:"80";
		$user = $url_parsed["user"];
		$pass = $url_parsed["pass"];
		$path = $url_parsed["path"]?$url_parsed["path"]:"/";
		$query = $url_parsed["query"];
		$anchor = $url_parsed["fragment"];

		if (!empty($host)){

			// attempt to open the socket
			if($fp = fsockopen($host, $port, $errno, $errstr, 2)){

				$path .= $query?"?$query":"";
				$path .= $anchor?"$anchor":"";

				// this is the request we send to the host
				$out = "GET $path ".
					"HTTP/1.0\r\n".
					"Host: $host\r\n".
					"Connection: Close\r\n".
					"User-Agent: $this->userAgent\r\n";
				if($user)
					$out .= "Authorization: Basic ".
						base64_encode("$user:$pass")."\r\n";
				$out .= "\r\n";

				fputs($fp, $out);
				while (!feof($fp)) {
					$retVal.=fgets($fp, 128);
				}
				fclose($fp);
			} else {
				$this->error=$errstr;
			}
			$this->result=$retVal;
			$this->headers=$this->parseHeaders(trim(substr($retVal,0,strpos($retVal,"\r\n\r\n"))));
			$this->page=trim(stristr($retVal,"\r\n\r\n"))."\n";
			if(isset($this->headers['Location'])){
				$this->redirects++;
				if($this->redirects<$this->maxRedirects){
					$location=$this->headers['Location'];
					$this->headers=array();
					$this->result="";
					$this->page="";
					$this->getUrl($location);
				}
			}
		}
		return (!$retVal="");
	}
	
	function parseHeaders($s){
		$h=preg_split("/[\r\n]/",$s);
		foreach($h as $i){
			$i=trim($i);
			if(strstr($i,":")){
				list($k,$v)=explode(":",$i);
				$hdr[$k]=substr(stristr($i,":"),2);
			}else{
				if(strlen($i)>3)
					$hdr[]=$i;
			}
		}
		if(isset($hdr[0])){
			$hdr['Status']=$hdr[0];
			unset($hdr[0]);
		}
		return $hdr;
	}

} // end of gwSocket class

class rateobj{
	var $currency="";
	var $rate=0;
}

function getCurrencyNames(){
	$retVal['AED']="United Arab Emirates Dirham";
	$retVal['AFA']="Afghanistan Afghani";
	$retVal['ALL']="Albania Leke";
	$retVal['ARS']="Argentina Peso";
	$retVal['ATS']="Austria Schilling*";
	$retVal['AUD']="Australia Dollar";
	$retVal['BBD']="Barbados Dollar";
	$retVal['BDT']="Bangladesh Taka";
	$retVal['BEF']="Belgium Franc*";
	$retVal['BGN']="Bulgaria Leva";
	$retVal['BHD']="Bahrain Dinar";
	$retVal['BMD']="Bermuda Dollar";
	$retVal['BRL']="Brazil Reai";
	$retVal['BSD']="Bahamas Dollar";
	$retVal['CAD']="Canada Dollar";
	$retVal['CHF']="Switzerland Franc";
	$retVal['CLP']="Chile Peso";
	$retVal['CNY']="China Yuan Renminbi";
	$retVal['COP']="Colombia Peso";
	$retVal['CRC']="Costa Rica Colone";
	$retVal['CYP']="Cyprus Pound";
	$retVal['CZK']="Czech Republic Koruny";
	$retVal['DEM']="Germany Deutsche Mark*";
	$retVal['DKK']="Denmark Kroner";
	$retVal['DOP']="Dominican Republic Peso";
	$retVal['DZD']="Algeria Dinar";
	$retVal['EEK']="Estonia Krooni";
	$retVal['EGP']="Egypt Pound";
	$retVal['ESP']="Spain Peseta*";
	$retVal['EUR']="Euro";
	$retVal['FIM']="Finland Markkaa*";
	$retVal['FJD']="Fiji Dollar";
	$retVal['FRF']="France Franc*";
	$retVal['GBP']="United Kingdom Pound";
	$retVal['GRD']="Greece Drachmae*";
	$retVal['HKD']="Hong Kong Dollar";
	$retVal['HRK']="Croatia Kuna";
	$retVal['HUF']="Hungary Forint";
	$retVal['IDR']="Indonesia Rupiahs";
	$retVal['IEP']="Ireland Pounds*";
	$retVal['ILS']="Israel New Shekel";
	$retVal['INR']="India Rupee";
	$retVal['IQD']="Iraq Dinar";
	$retVal['IRR']="Iran Rial";
	$retVal['ISK']="Iceland Kronur";
	$retVal['ITL']="Italy Lire*";
	$retVal['JMD']="Jamaica Dollar";
	$retVal['JOD']="Jordan Dinar";
	$retVal['JPY']="Japan Yen";
	$retVal['KES']="Kenya Shilling";
	$retVal['KRW']="South Korea Won";
	$retVal['KWD']="Kuwait Dinar";
	$retVal['LBP']="Lebanon Pound";
	$retVal['LKR']="Sri Lanka Rupee";
	$retVal['LTL']="Lithuanian Lita";
	$retVal['LVL']="Latvian Lat";
	$retVal['LUF']="Luxembourg Franc*";
	$retVal['MAD']="Morocco Dirham";
	$retVal['MTL']="Malta Liri";
	$retVal['MUR']="Mauritius Rupee";
	$retVal['MXN']="Mexico Peso";
	$retVal['MYR']="Malaysia Ringgit";
	$retVal['NLG']="Dutch (Netherlands) Guilder*";
	$retVal['NOK']="Norway Kroner";
	$retVal['NZD']="New Zealand Dollar";
	$retVal['OMR']="Oman Rial";
	$retVal['PEN']="Peru Nuevos Sole";
	$retVal['PHP']="Philippines Peso";
	$retVal['PKR']="Pakistan Rupee";
	$retVal['PLN']="Poland Zlotych";
	$retVal['PTE']="Portugal Escudo*";
	$retVal['QAR']="Qatar Riyal";
	$retVal['ROL']="Romania Lei";
	$retVal['RON']="Romania New Leu";
	$retVal['RUB']="Russia Ruble";
	$retVal['SAR']="Saudi Arabia Riyal";
	$retVal['SDD']="Sudan Dinar";
	$retVal['SEK']="Sweden Kronor";
	$retVal['SGD']="Singapore Dollar";
	$retVal['SIT']="Slovenia Tolar";
	$retVal['SKK']="Slovakia Koruny";
	$retVal['THB']="Thailand Baht";
	$retVal['TND']="Tunisia Dinar";
	$retVal['TRL']="Turkey Lira*";
	$retVal['TRY']="Turkey New Lira";
	$retVal['TTD']="Trinidad and Tobago Dollar";
	$retVal['TWD']="Taiwan New Dollar";
	$retVal['USD']="United States Dollar";
	$retVal['VEB']="Venezuela Bolivare";
	$retVal['VND']="Vietnam Dong";
	$retVal['XAF']="CFA BEAC Franc";
	$retVal['XAG']="Silver Ounce";
	$retVal['XAU']="Gold Ounce";
	$retVal['XCD']="Eastern Caribbean Dollar";
	$retVal['XDR']="IMF Special Drawing Right";
	$retVal['XOF']="CFA BCEAO Franc";
	$retVal['XPD']="Palladium Ounce";
	$retVal['XPF']="CFP Franc";
	$retVal['XPT']="Platinum Ounce";
	$retVal['ZAR']="South Africa Rand";
	$retVal['ZMK']="Zambia Kwacha";
	return $retVal;
}
?>
