<?php

class dispoForm extends sfForm {


  public static $mont = array (
    '01' => 'Enero',
    '02' => 'Febrero',
    '03' => 'Marzo',
    '04' => 'Abril',
    '05' => 'Mayo',
    '06' => 'Junio',
    '07' => 'Julio',
    '08' => 'Agosto',
    '09' => 'Septiembre',
    '10' => 'Octubre',
    '11' => 'Noviembre',
    '12' => 'Diciembre');




  public function setup() {
    $ar = array();
    for($i=0;$i<=11;$i++){
      $date =  date('m Y', mktime(0, 0, 0, date('m')+$i, date('d'), date('Y')));
      $mes = substr($date,0,2);
      $year =substr($date,3,4);

      $ar[$mes.'-'.$year] = self::$mont[$mes].' '.$year;
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

    $this->widgetSchema->setNameFormat('dispo[%s]');
  }

}