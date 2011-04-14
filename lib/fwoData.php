<?php
class fwoData
{
    public $host, $dbname, $user, $password, $conectTipo,$resource;
    var $xml='';
 function conectBooking($method){
		$username="8131";$password="37567";
		$rpcBooking="http://distribution-xml.booking.com/xml/$method";
		$ch = curl_init ($rpcBooking);
			curl_setopt($ch,CURLOPT_USERPWD,"$username:$password"); 
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			$xml = curl_exec ($ch);
			curl_close ($ch);
			return $xml;
	}
	
	function fetchRcp($methodo,$param){
		$method=$methodo."?".$param;
		$cn=$this->conectBooking($method);
		$xml_data =$cn;
		$xmlObj    = $this->XmlToArray($xml_data);
		$arrayData = $this->createArray();
		$explo_function=explode(".",$methodo);
		$function=$explo_function[1];
		$variable=$arrayData[$function]["result"];
		return $variable;
	}
	
	function XmlToArray($xml){
		$this->xml = $xml;	
	}
	function _struct_to_array($values, &$i){
		$child = array(); 
		if (isset($values[$i]['value'])) array_push($child, $values[$i]['value']);
		while ($i++ < count($values)) { 
			switch ($values[$i]['type']) { 
				case 'cdata': array_push($child, $values[$i]['value']); break; 
				case 'complete': 	$name = $values[$i]['tag']; 
					if(!empty($name) && !empty ($values[$i]['value'])){ $child[$name]= ($values[$i]['value'])?($values[$i]['value']):'';
						if(isset($values[$i]['attributes'])) {$child[$name] = $values[$i]['attributes'];} 
					}
				break; 				
				case 'open': $name = $values[$i]['tag']; $size = isset($child[$name]) ? sizeof($child[$name]) : 0;	$child[$name][$size] = $this->_struct_to_array($values, $i); break;
				case 'close': 	return $child; 	break; 
			}
		}
		return $child; 
	}
	function createArray(){ 
		$xml    = $this->xml;
		$values = array(); 
		$index  = array(); 
		$array  = array(); 
		$parser = xml_parser_create(); 
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parse_into_struct($parser, $xml, $values, $index);
		xml_parser_free($parser);
		$i = 0; 
		$name = $values[$i]['tag']; 
		$array[$name] = isset($values[$i]['attributes']) ? $values[$i]['attributes'] : ''; 
		$array[$name] = $this->_struct_to_array($values, $i); 
		return $array; 
	}
}
?>
