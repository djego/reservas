<?php
class fwoView
{
private $img="theme/default/images";

function fieldOpen($legend){
	echo "<fieldset><legend style='font-size:10px; color:gray; font-weight:bold'>$legend</legend>";
}
function fieldClose(){
	echo "</fieldset>";
}

function iframe_head(){?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>
<SCRIPT type="text/javascript" src="/siga2/include/js/general.js"></SCRIPT>
<SCRIPT type="text/javascript" src="/siga2/include/js/datepicker.js"></SCRIPT>
<link rel="stylesheet" type="text/css" href="/siga2/theme/default/desktop.css" />
<link rel="stylesheet" type="text/css" href="/siga2/theme/default/datepicker.css" />
</head>
<body style="margin:0px; background:transparent">
<?
}
function iframe($iframe){
	if ($iframe["visible"])
		echo "<div style='height:",$iframe["height"],"px; width:",$iframe["width"],"px'><iframe src=\"",$iframe["request"],"?",$iframe["params"],"\" style='height:",$iframe["height"]+10,"px; width:",$iframe["width"]+10,"px; position:relative; float:left' frameborder=0></iframe></div>";
	else
		echo "<iframe src=\"",$iframe["request"],"?",$iframe["params"],"\" style='height:0px; width:0px;' frameborder=0 scrolling=no></iframe>";
}
function sendEvent($request,$div,$params){
		echo "<img src=\"theme/default/images/empty.gif\" width=0 height=0 onload=\"sendEvent('$request','$div',$params); return false;\">";
}
function divOpen($div){
	$class=$div["class"];
	if (empty($div["class"])) $class="divOpen";
	$style="";
	if (!empty($div["style"])) $style="style=\"".$div["style"]."\"";
		echo "<div id=",$div["id"]," class=$class $style>";
}
function divClose(){
echo "</div>";
}
function div($div){
	echo "<div id=\"",$div["id"],"\" class=\"",$win["class"],"\"></div>";
}
function showBarButton($bar){ // array(request=>$this->request,"main_tab","personal","Personal")
	echo "<div style='margin-top:7px; margin-left:20px'>";
	foreach($bar as $buton=>$event){
		$params="";
		if (!empty($event["request"]) and !empty($event["div"])){
			$params="'evento=".$event["evento"];
			$primero=1;
			if (count($event["post"])){
				foreach($event["post"] as $id)
				if ($primero){
					$params.="&$id='+document.getElementById('$id').value";
					$primero=0;
				}else
					$params.="+'&$id='+document.getElementById('$id').value";
			}else
			$params.="'"; //si no tiene post, cerrar con '
		}else
			echo ("Falta especificar: request y/o evento en showBarButton");
		echo "<img src=\"theme/default/images_barbut/",$buton,".png\" title=\"",$event["title"],"\" onclick=sendEvent('",$event["request"],"','",$event["div"],"',",$params,") style='margin-left:5px; margin-right:5px; cursor:pointer'><img src=theme/default/images_babut/but_spc.png>";
	}
	echo "</div>";
}
function message($message=""){
	if (!empty($message)){
		$this->message[":ejecuto"]=$message[":ejecuto"];
		$this->message[":mensaje"]=$message[":mensaje"];
	}
	if (!empty($this->message)){
		if ($this->message[":ejecuto"]==1)
			echo "<div id=message class=message><div class=messok0></div><div class=messok1><div class=messTxtOk>",$this->message[":mensaje"],"</div></div><div class=messok2></div></div>";
		else
			echo "<div id=message class=message><div class=messer0></div><div class=messer1><div class=messTxtEr>",$this->message[":mensaje"],"</div></div><div class=messer2></div></div>";
		$this->doJs("fade","message");
	}
}
function message_tip($message=""){
	echo "<div id=message_tip class=message_tip><div class=message_tip_text>",$message,"</div></div>";
	$this->doJs("showDiv","win");
	$this->doJs("fade","message_tip");
}
function tabOpen($label){
echo "<div style='width:95%; margin:30px auto 10px auto; padding:10px; background-color:#e8e8e8; border:1px solid black; height:700px; position:relative'>
	<div style='background-image:url(theme/default/images_desktop/but_tab.png);width:100px;height:26px; position:relative; top:-25px'>
	<div style='padding-top:7px;text-align:center'>$label</div></div>";
}
function tabClose(){
echo "</div>";
}
function browseWidth(){
	$this->tot_width=0;
	foreach ($this->describe["label"] as $name=>$alabel)
	{	list($label,$width)=explode("@",$alabel);
		if ($label!="ROW_HIDE"){
			$this->widthColumn[$name]="style='width:".$width."px'";
			$this->tot_width+=$width;
		}
	}
}
function browseLabel(){
	$this->tot_width=0;
	echo "<div class=row_label>";
	foreach ($this->describe["label"] as $name=>$alabel)
	{
		list($label,$width)=explode("@",$alabel);
		if ($label!="ROW_HIDE"){
			if ($this->describe["labelTop"]!="false")
				echo "<div class=dp_label style='width:",$width,"px'><div class=dp_label_text>$label</div></div>";
			$this->widthColumn[$name]="style='width:".$width."px'";
			$this->tot_width+=$width;
		}
	}
	echo "</div>";
}
function browseOpen($result){
	$this->result=$result;
	$this->keyName = $this->result["@describe"]["key"];
	if (empty($this->keyName))
		die("Falta definir [ Key ] en @describe");
	
	$this->describe=isset($this->result["@describe"])?$this->result["@describe"]:$this->describe;
	$this->browseWidth();
	$key_nb=str_replace("/","",$_SERVER['PHP_SELF']);
	$key_nb=str_replace("siga2app","",$key_nb);
	$this->key_nb=str_replace("eve.php","",$key_nb).$this->keyName;	

	if (!isset($_SESSION["fv_brow_key"][$this->key_nb]))
		$_SESSION["fv_brow_key"][$this->key_nb]=count($_SESSION["fv_brow_key"])+1;

	$this->doJs("resetBrow",$_SESSION["fv_brow_key"][$this->key_nb]);
	//$height=isset($this->result["@describe"]["height"])?$this->result["@describe"]["height"]:200;
	if (isset($this->describe["overflow"])){
		$this->overflow=1;
		echo "<div style='width:",$this->tot_width+22,"px; height:",$this->describe["overflow"],"px; overflow:auto'>";
	}
	echo "<input type=hidden name='",$this->keyName,"' id='",$this->keyName,"'>
	<div class=brow_frame style='width:",$this->tot_width+8,"px;'>"; //width+10
	if ($this->describe["labelTop"]!="false")
		$this->browseLabel();
	
	unset($this->describe["labelTop"]);
	unset($this->result["@describe"]);
	
	$this->rowColorSet(1);
	$this->rowOpen=0;
}
function browseClose(){
	if ($this->overflow)
		echo "</div>";
	echo "</div>";
}
function rowColorSet($c=1){
	$this->rowColor=$c;
}
function rowColorChange(){
	$this->rowColor=$this->rowColor?0:1;
}
function rowCursor($k){
	return  "row_" . $this->keyName . $k;
}
function rowOpen($key){
	$this->rowColorChange();
	if ($this->rowOpen) $this->rowClose();
	echo "<div id=\"",$this->rowId,"\" class=\"dp_row",$this->rowColor,"\" ";
	if ($this->result[$key]["ROW_ENABLED"] or !isset($this->result[$key]["ROW_ENABLED"]))
		echo " style='width:100%' onclick=\"setCursor('",$this->rowId,"','",$this->keyName,"','$key',",$_SESSION["fv_brow_key"][$this->key_nb],")\"";
	else
		echo " style='color:gray' ";
	echo ">";
}
function rowClose(){
	echo "</div>";
}
function rowTitle($mensaje){
	if ($this->rowOpen) $this->rowClose();
	echo "<div class=row_title>$mensaje</div>";
}
function cellSet($name,$value){
	if ($name!="ROW_ENABLED" and !empty($value))
		echo "<div class=dp_cell ".$this->widthColumn[$name]."><span class=dr_cell_text>".$value."</span></div>";
}
function cellShow($fields){
	foreach ($fields as $name => $value){
		if (isset($this->widthColumn[$name]) and $this->describe["label"][$name]!="ROW_HIDE")
				$this->cellSet($name,$value);
	}
}
function browse($result)
{	$this->browseOpen($result);
	foreach ($this->result as $key => $fields)
	{
		$this->rowId = $this->rowCursor($key);
		$this->rowOpen($key);
		$this->cellShow($fields);
		$this->rowClose();
	}
	$this->browseClose();
}
function doJs($js,$param1="|",$param2="|"){
	
	echo "<img src=\"",$this->img,"/empty.gif\" width=0 height=0 ";
	if ($param2!="|")
		echo "onload=\"$js('$param1','$param2'); return false;\">";
	elseif ($param1!="|")
		echo "onload=\"$js('$param1'); return false;\">";
	else
		echo "onload=\"$js(); return false;\">";
}	

function label($label,$width=""){
	echo "<div class=label ",$width?" style='width:".$width."px' ":" ",">",$label,"</div>";
}
function input($get,$on=""){
	switch ($get["type"]) {
		case "hidden" : $this->getHidden($get); break;
		case "text" : $this->getText($get,$on); break;
		case "integer": $this->getInteger($get,$on); break;
		case "textarea" : $this->getTextarea($get); break;
		case "date" : $this->getDate($get,$on); break;
		case "general": $this->getGeneral($get,$on); break;
		case "select": $this->getSelect($get,$on); break;
		case "autocomplete" : $this->autocomplete($get,$on); break;
	}
}
function autocomplete($get,$on=""){
	$request_input=isset($get["request"])?$get["request"]:$this->request;
	if (empty($request_input)) die ("Falta request_input en autocomplete");
	if (!isset($get["params"])) die ("Falta params en autocomplete");
	echo "<div class=widget>";
	$params=substr($get["params"],1,strlen($get["params"]));
	$params="'autocomplete_id=".$get["id"]."&".$params;
	$idSearch="autocomplete_".$get["id"]."_search";
	$idDiv="autocomplete_".$get["id"]."_div";
	$idSelect="autocomplete_".$get["id"]."_select";
	$this->label($get["label"]);
	//$this->autocomplete_width=isset($get["width_input"])?$get["width_input"]:150;
	echo "<input type=hidden id='",$get["id"],"'>";
	echo "<input class=input id='$idSearch' style='width:",$get["width_input"],"px' maxlength='",$get["maxlength"],"' value='",$get["value"],"' 
			onkeyup=\" ";
	if ($on["on"]=="pressEnter")
			echo "if (pressEnter(event)) {sendEvent('",$on["request"],"','",$on["div"],"',",$on["params"],");} else ";
	echo "	if (pressDown(event)) {setFocus('$idSelect')} 
			else if (!pressEnter(event)) {sendEvent('",$request_input,"','$idDiv',",$params,"); showDiv('$idDiv');}\">";
	echo "<div id='$idDiv' style='position:relative;z-index:100; margin-left:90px;'></div>";
	echo "</div>";
}
function autocompleteShow($rs){
	if (!empty($rs)){
	$idSearch="autocomplete_".$this->post["autocomplete_id"]."_search";
	$idDiv="autocomplete_".$this->post["autocomplete_id"]."_div";
	$idSelect="autocomplete_".$this->post["autocomplete_id"]."_select";
	echo "<select class=inputSelect id='$idSelect' style='width:",$this->autocomplete_width,"px' ";
	echo "  onClick=\"autocomplete_selected('",$this->post["autocomplete_id"],"','$idDiv','$idSearch',this.value,this.options[this.selectedIndex].text);\"
			onkeyup=\"if (pressEnter(event)) 
						{ 	autocomplete_selected('",$this->post["autocomplete_id"],"','$idDiv','$idSearch',this.value,this.options[this.selectedIndex].text);
						} 
					else if(noPressArrows(event)) {setFocus('$idSearch'); }
					\"  size=7>";
	foreach($rs as $value=>$option){
		echo "<option value='",$value,"'>",htmlentities($option["CAPTION"]);
	}
	echo "</select>";
	}
}
function putDisable($get){
	$width=!isset($get["width"])?250:$get["width"];
	if (isset($get["label"])){
		echo "<div class=widget style='width:",$width,"px; height:auto'>";
		$this->label($get["label"],$get["width_label"]);
	}
	echo "<input id='",$get["id"],"' class=input style='width:",$get["width_input"],"px' maxlength='",$get["maxlength"],"' value='",$get["value"],"' readonly\">";
	if (isset($get["label"]))
		echo "</div>";
}
function getGeneral($get,$on=""){
	$width=!isset($get["width"])?250:$get["width"];
	if (isset($get["label"])){
		echo "<div class=widget style='width:",$width,"px; height:auto'>";
		$this->label($get["label"],$get["width_label"]);
	}
	echo "<input id='",$get["id"],"' class=input style='width:",$get["width_input"],"px' maxlength='",$get["maxlength"],"' value='",$get["value"],"' onkeypress=\"return valGeneral(event);\"";
	if ($on["on"]=="onkeyup")
		echo " onkeyup=\"sendEvent('",$on["request"],"','",$on["div"],"',",$on["params"],"); return false;\"";
	echo ">";
	if (isset($get["label"]))
		echo "</div>";
}	
function getHidden($get){
	echo "<input type=hidden id='",$get["id"],"' value='",$get["value"],"'>";
}
function getText($get,$on=""){
	$width=!isset($get["width_input"])?250:$get["width_input"];
	if (isset($get["label"])){
		echo "<div class=widget>";
		$this->label($get["label"]);
	}
	echo "<input id='",$get["id"],"' class=input  style='width:",$width,"px' maxlength='",$get["maxlength"],"' value='",$get["value"],"' ";
	if (isset($get["readonly"]))
		echo " readonly=true ";
	else {
		echo " onkeypress=\"return valTexto(event);\"";
		if ($on["on"]=="onkeyup")
			echo " onkeyup=\"sendEvent('",$on["request"],"','",$on["div"],"',",$on["params"],"); return false;\"";
		}
	echo ">";
	if (isset($get["label"]))
		echo "</div>";
		
}
function getInteger($get,$on=""){
	$width=!isset($get["width_input"])?250:$get["width_input"];
	if (isset($get["label"])){
		echo "<div class=widget>";
		$this->label($get["label"]);
	}
	echo "<input id='",$get["id"],"' style='width:",$width,"px' class=input maxlength='",$get["maxlength"],"' value='",$get["value"],"' onkeypress=\"return valEntero(event);\"";
	if ($on["on"]=="onfocus")
		echo " onfocus=\"sendEvent('",$on["request"],"','",$on["div"],"',",$on["params"],"); return false;\"";
	if ($on["on"]=="onkeyup")
		echo " onkeyup=\"sendEvent('",$on["request"],"','",$on["div"],"',",$on["params"],"); return false;\"";
	echo ">";
	if (isset($get["label"]))
		echo "</div>";
}	
function getTextarea($get){
	$width=!isset($get["width"])?250:$get["width"];
	if (isset($get["label"])){
		echo "<div class=widget style='width:",$width,"px; height:auto'>";
		$this->label($get["label"]);
	}
	echo "<textarea ",$get["disabled"]," id='",$get["id"],"'  class=inputArea style='width:",$get["width"],"px; height:",$get["height"],"px;'>",$get["value"],"</textarea>";
	if (isset($get["label"]))
		echo "</div>";
}

function getDate($get,$on=""){
	$width=!isset($get["width"])?250:$get["width"];
	echo "<img src=\"theme/default/images/empty.gif\" width=0 height=0 onload=\"javascript:calendar.set('",$get["id"],"'); return false\">";
	if (isset($get["label"])){
		echo "<div class=widget style='width:",$width,"px; height:auto'>";
		$this->label($get["label"],$get["width_label"]);
	}
	echo "<div style='float:left; width:98px;'><input id='",$get["id"],"' class='input' value='",$get["value"],"' style='width:65px; float:left'";
	if ($on["on"]=="onfocus")
	    echo " onfocus=\"sendEvent('",$on["request"],"','",$on["div"],"',",$on["params"],"); return false;\"";
	echo "><img src=theme/default/images_desktop/icoDate.png></div>";
	if (isset($get["label"]))
		echo "</div>";
}

function getSelect($get,$on=""){
	$width=!isset($get["width"])?250:$get["width"];
	if (isset($get["label"])){
		echo "<div class=widget style='width:",$width,"px;'>";
		$this->label($get["label"]);
	}
	echo "<select class=inputSelect id=",$get["id"]," ",$get["disabled"]," ";
	if (isset($get["width_input"]))
		echo " style='z-index:0; width:".$get["width_input"]."px'  "; //
	if (isset($get["size"]))
		echo " size='".$get["size"]."' ";			
	if ($on["on"]=="onchange"){
		$onrequest=isset($on["request"])?$on["request"]:$this->request;
		echo " onchange=\"sendEvent('",$onrequest,"','",$on["div"],"',",$on["params"],"); return false;\"";
		}
	echo ">";
	$selected=0;
	$pos=0;
	foreach($get["options"] as $value=>$option){
		echo "<option value='",$value,"'";
		if (isset($get["selected"])){
			echo ($value==$get["selected"])?" selected":" ";
			$selected=1;
		}elseif ($get["selected"]=="first" and $pos==0){
			echo " selected ";
			$selected=1;
		}
		echo ">",htmlentities($option["CAPTION"]);
	$pos++;
	}
	if (!$selected)
		echo "<option value='' selected>Seleccione...</option>";
	echo "</select>";
	if (isset($get["label"]))
		echo "</div>";
}
/*function winButtonClose($window,$value,$request="",$div="",$params=""){
	echo "<div class=widget><input type=button class=boton value=\"$value\"";
	if ($request)
		echo "onclick=\"hideDiv('$window'); sendEvent('$request','$div',$params); return false;\"";
	else
		echo "onclick=\"hideDiv('$window');\"";
	echo ">";
}*/

function winOpen($win){
	if (empty($win["id"])) die ("Falta definir id en win");
	$this->win_id=!isset($win["id"])?"window1":$win["id"];
	$this->win_width=!isset($win["width"])?300:$win["width"];
	$x=isset($win["x"])?$win["x"]:(900-$win["width"])/2;
	$y=isset($win["y"])?$win["y"]:150;
	?>
<!--	<div style="
	float: left;
	position:absolute;top:0px;
        left:0px;
	width:100%;
        height:100%;
	background-color: #000;
	z-index:1001;
	overflow: auto;
	filter:alpha(opacity=80);
        -moz-opacity: 0.8;
        opacity: 0.8;		
	">-->
	<div style="position:absolute; display:table; width:<?=$this->win_width+63?>px; position:absolute; top:<?=$y?>px; left:<?=$x?>px">
	<div style="display:table-row">
		<div style="display:table-cell; width:24px; height:25px; background-image:url(theme/default/images_win/win_r1_c1.png)"></div>
		<div style="display:table-cell; width:<?=$this->win_width?>px; height:25px; background-image:url(theme/default/images_win/win_r1_c2.png)"></div>
		<div style="display:table-cell; width:39px; height:25px; background-image:url(theme/default/images_win/win_r1_c3.png)"></div>
	</div>
	<div style="display:table-row">
		<div style="display:table-cell; width:24px; height:auto; background-image:url(theme/default/images_win/win_r2_c1.png)"></div>
		<div style="display:table-cell; width:<?=$this->win_width?>px; height:179px; background-image:url(theme/default/images_win/win_r2_c2.png); vertical-align:top">
		<div style="float:left; position:relative; text-align:center; width:<?=$this->win_width-20?>px; top:-12px; font-weight:bold; font-size:12px"><?=$win["title"]?></div>
		<img onclick=hideDiv("<?=$this->win_id;?>") src="theme/default/images_desktop/win_close.png" style="float:right; position:relative; top:-9px; left:9px; cursor:pointer">
	<?
}
function winClose(){
	?>
		</div>
	   <div style="display:table-cell; width:39px; height:179px; background-image:url(theme/default/images_win/win_r2_c3.png)"></div>
	  </div>
	  <div style="display:table-row">
	   <div style="display:table-cell; width:24px; height:35px; background-image:url(theme/default/images_win/win_r3_c1.png)"></div>
	   <div style="display:table-cell; width:<?=$this->win_width?>px; height:35px; background-image:url(theme/default/images_win/win_r3_c2.png)"></div>
	   <div style="display:table-cell; width:39px; height:35px; background-image:url(theme/default/images_win/win_r3_c3.png)"></div>
	  </div>
	</div>		
	<?
	$this->winShow($this->win_id);
}
function winShow($idWindow="window1"){
	$this->doJs("showDiv",$idWindow);
}
function winHide($idWindow="window1"){
	$this->doJs("hideDiv",$idWindow);
}















































/* REVISAR PARA EL NUEVO SIGA ***************/
function pdfRequire(){
	require('pdf/fpdf.php');
}
function putWarning($msg){
echo "<p style='padding:10px; font-size:12px; text-align:justify'><img src=\"theme/default/images/warning.png\" style='float:left'>$msg</p>";
}
function putOk($msg){
echo "<p style='padding:10px; font-size:12px; text-align:justify'><img src=\"theme/default/images/ok.png\" style='float:left'>$msg</p>";
}


function putGraph($evento,$width,$height){ 
	//unset($data["@describe"]); //&data=",serialize($data)
	echo "<div style='height:",$height,"px; width:",$width,"px;'>
			<iframe src=\"",$this->request,"?evento=$evento\" style='height:",$height,"px; width:",$width,"px; position:relative; float:left;' frameborder=0 scrolling=no></iframe></div>";
}
function buildGraph($title,$type,$data,$width,$height,$xAxis="",$yAxis=""){
	?>
	<head><script LANGUAGE="Javascript" SRC="../../include/fchart/FusionCharts.js"></script><head><body style="margin:0px; padding:0px">
	<?
	include("../../include/fchart/FusionCharts_Gen.php");
	$FC = new FusionCharts($type,$width,$height);
	$FC->setSWFPath("/sbi/include/fchart/");	
	$strParam="caption=$title; xAxisName=$xAxis; yAxisName=$yAxis; showValues=1; anchorBgAlpha=40;"; //subcaption=; logoURL=../img/logo.png; formatNumberScale=0;  numdivlines=10; lineThickness=2; anchorRadius=3; divLineIsDashed=1;";
	$FC->setChartParams($strParam);
	$i=0;
	foreach($data as $id=>$row){
		$conver_data["$i"][0]=$row["X"];
		$conver_data["$i"][1]=$row["Y"];
	$i++;
	}
	$FC->addChartDataFromArray($conver_data);
	echo "<center>";
	$FC->renderChart();
}

function putBarcode($code){
	echo "<div class=widget style='height:80px;'><img src=include/barcode/barcode.php?code=$code></div>";
}



	
function formOpen($title="",$width=""){
	echo "<div class=form style='width:".$width."px'><div class=formTitle>$title</div>";
}
function formClose(){
	echo "</div>";
}

function putHidde($get){
		echo "<input type=hidden id='",$get["id"],"' value='",$get["value"],"'>";
}



function getButton($value,$request,$div,$params,$idButton="tmp",$disabled=""){
	echo "<div class=widget><input type=button class=boton id=$idButton value=\"$value\" ";
	if ($request)
		echo "onclick=\"sendEvent('$request','$div',$params); return false;\"";
	echo "$disabled></div>";
}

function submit($submit){
	$request=isset($submit["request"])?$submit["request"]:$this->request;
	if (empty($request)) die("falta definir request para submit");
	$primero=1;

	if (isset($submit["params"]))
		$params=$submit["params"];

	elseif (isset($submit["post"]) || isset($submit["repost"])){
		if (isset($submit["post"])){
			$params="'evento=".$submit["evento"];
			foreach($submit["post"] as $id)
				if ($primero){
					$params.="&$id='+document.getElementById('$id').value";
					$primero=0;
				}else
					$params.="+'&$id='+document.getElementById('$id').value";
		}
		if (isset($submit["repost"])){
			if (empty($params))
				$params="'evento=".$submit["evento"];
			foreach($submit["repost"] as $id)
				if ($primero){
					if (isset($this->post[$id])){
						$params.="&$id=".$this->post[$id]."'";
						$primero=0;
						}
				}else
					if (isset($this->post[$id]))
						$params.="+'&$id=".$this->post[$id]."'";
		}
	}
	else if (!isset($submit["post"]) && isset($submit["evento"]))
		$params="'evento=".$submit["evento"]."'";
	//echo "*",empty($submit["no_float"]),"*";
	if (empty($submit["no_float"]))
		echo "<div class=widget>";
	
	if (isset($submit["src"]))
		echo "<img src=\"",$submit["src"],"\" style='cursor:pointer' title=\"",$submit["title"],"\" align=middle ";
	else
		echo "<input type=button class=boton style='background-image:url(theme/default/images_button/",$submit["ico"],".gif);' value=\"",$submit["caption"],"\" ";
	
	if ($submit["id"])
		echo " id=\"",$submit["id"],"\"";
	if (isset($submit["hideDiv"]) and !isset($submit["div"]))
		echo " onclick=\"hideDiv('",$submit["hideDiv"],"');\"";
	elseif ($submit["validate"] and isset($submit["div"]) )
		echo " onclick=\"if(",$submit["validate"],") sendEvent('",$request,"','",$submit["div"],"',$params); return false;\" ";
	elseif (isset($submit["div"]) and !isset($submit["hideDiv"]))
		echo " onclick=\"sendEvent('",$request,"','",$submit["div"],"',$params); return false;\" ";
	elseif (isset($submit["div"]) and isset($submit["hideDiv"]))
		echo " onclick=\"hideDiv('",$submit["hideDiv"],"');sendEvent('",$request,"','",$submit["div"],"',$params); return false;\"";
	echo $submit["disabled"],">";
	
	if (empty($submit["no_float"]))
		echo "</div>";
}



// AQUI ME QUEDE REVISANDO
function changeState($id,$state){
	if ($state=="enabled")
	echo "<img src=images/loadAjax.jpg width=0 height=0 onload=\"$id.disabled=''\">";
	if ($state=="disabled")
	echo "<img src=images/loadAjax.jpg width=0 height=0 onload=\"$id.disabled='true'\">";
}



function getRadio($get,$request="",$div="",$params=""){
	echo "<div class=widget style='height:auto; width:",$get["width"],"px'>",$get["label"],"<br>";
	echo "<div style='border:1px solid gray; height:auto; width:auto;'>";
	foreach($get["value"] as $value=>$option){
		echo "<div class=radio>
		<label><input style='float:left' name='tmp",$get["id"],"' type=radio onclick=\"document.getElementById('",$get["id"],"').value='$value';\"";
		if (isset($get["checked"])){
			echo $value==$get["checked"]?" checked":" ";
			$default=$value;
			}
		echo "><span style='float:left;padding-top:5px'>",$option["CAPTION"],"</span>
		</label></div>";
		}
	echo "</div></div>";
	echo "<input type=hidden id='",$get["id"],"' value='$default'>";
}

function getBarcode($get,$request,$div,$params){
	echo "<div class=widget>",$get["label"],"<br>
	<input id=",$get["id"]," size=",$get["size"]," maxlength=",$get["maxlength"]," value='",$get["value"],"' 
	onkeypress=\"if (pressEnter(event)) {sendEvent('$request','$div',$params); return false;}\"></div>";
}


function clearBoth(){
	echo "<div style='clear:both'></div>";
}

function getSearch($get,$request="",$div="",$params=""){
$divSearch=$get["table"].$get["receive"];
$style=isset($get["width"])?" style='width:".$get["width"]."px'":" ";
	echo "<div class=widget>",isset($get["label"])?$get["label"]."<br>":" ";
	echo "<input type=text id=",$get["receive"]," readonly size=2 value='",$get["value_receive"],"'>
		<input id=",$get["search"]," value='",$get["value_search"],"' size='",$get["size"],"' ";
	echo " onkeyup=\"sendEvent('$this->request','$divSearch','evento=getSearch&divSearch=$divSearch&receive=".$get["receive"]."&search=".$get["search"]."&table=".$get["table"]."&len=".$get["len"]."&conector=".$get["conector"]."&find='+".$get["search"].".value); return false;\">";
	echo "<div id='$divSearch' class=divSearch $style ondblclick=hideDiv('$divSearch') ";
	if (!empty($request))
		echo " onclick=\"sendEvent('$request','$div',$params); hideDiv('$divSearch'); return false;\"";
	echo "></div></div>";
}
function getSearchSql($get,$request="",$div="",$params=""){
$divSearch=$get["search"].$get["receive"];
$style=isset($get["width"])?" style='width:".$get["width"]."px'":" ";
	echo "<div class=widget>",isset($get["label"])?$get["label"]."<br>":"";
	echo "<input type=hidden id=",$get["receive"]," readonly size=2 value='",$get["value_receive"],"'>
		<input 	id='",$get["search"],"' 
				value='",$get["value_search"],"' 
				size='",$get["size"],"' 
				tabindex='",$get["tabindex"],"' 
				onkeyup=\"if (valGeneral(event)) {
							sendEvent('$this->request','$divSearch','evento=getSearchSql&divSearch=$divSearch&receive=".$get["receive"]."&search=".$get["search"]."&metodo=".$get["metodo"]."&len=".$get["len"]."&conector=".$get["conector"]."&find='+document.getElementById('".$get["search"]."').value); 
							return false;
						}\">";
	echo "<div style='clear:both;'></div><div id='$divSearch' class=divSearch $style ondblclick=hideDiv('$divSearch') ";
	if (!empty($request))
		echo " onclick=\"sendEvent('$request','$div',$params); hideDiv('$divSearch'); return false;\"";
	echo "></div></div>";
}
function putSearch($rs){
if ($rs){
$divSearch=$this->post["divSearch"];
$this->doJs("showDiv","$divSearch");
	foreach($rs as $value=>$caption) {
		$caption["CAPTION"]=str_replace("'", " ",$caption["CAPTION"]);
		echo "<div class=itemFound onclick=\"selectSearch('",$this->post["receive"],"','",$value,"','",$this->post["search"],"','",htmlentities($caption["CAPTION"]),"','$divSearch'); \">",htmlentities($caption["CAPTION"]),"</div>";
	}
	//echo "<div class=itemFound onclick=\"selectSearch('",$this->post["receive"],"','','",$this->post["search"],"','','",$divSearch,"');\">Cancelar</div>";
}else
$this->doJs("hideDiv",$this->post["divSearch"]);
}


function setFocus($id){
	$this->doJs("setFocus",$id);
}
}
?>
