<?php

class searchHotelForm extends sfForm {


  public static $mont = array (
    '1' => 'Enero',
    '2' => 'Febrero',
    '3' => 'Marzo',
    '4' => 'Abril',
    '5' => 'Mayo',
    '6' => 'Junio',
    '7' => 'Julio',
    '8' => 'Agosto',
    '9' => 'Septiembre',
    '10' => 'Octubre',
    '11' => 'Noviembre',
    '12' => 'Diciembre');



   
  public function setup() {
    $ar = array();
    for($i=0;$i<=11;$i++){
      $date =  date('m Y', mktime(0, 0, 0, date('m')+$i, date('d'), date('Y')));
      $mes = substr($date,0,2)+0;
      $year =substr($date,3,4);

      $ar[$year.'-'.$mes] = self::$mont[$mes].' '.$year;
    }
//    print_r($ar);
//    die ();
    $this->setWidgets(array(
            'fecha-inicio'        =>   new sfWidgetFormDate(array('format' => '%day% %month%', 'months' =>$ar)),
            'fecha-final'        =>   new sfWidgetFormDate(array('format' => '%day% %month%', 'months'=>$ar)),
    ));

    $this->setValidators(array(
            'fecha-inicio'         => new sfValidatorPass(),
            'fecha-final'         => new sfValidatorPass(),
    ));

    $this->widgetSchema->setNameFormat('search[%s]');
  }

}