<?php

class searchHotelForm extends sfForm {
   
  public function setup() {

//    print_r($ar);
//    die ();
    $this->setWidgets(array(
            'fecha-inicio'        =>   new sfWidgetFormDate(array('format' => '%day% %month%', 'months' =>  appFrontend::construirselec())),
            'fecha-final'        =>   new sfWidgetFormDate(array('format' => '%day% %month%', 'months'=>appFrontend::construirselec())),
    ));

    $this->setValidators(array(
            'fecha-inicio'         => new sfValidatorPass(),
            'fecha-final'         => new sfValidatorPass(),
    ));

    $this->widgetSchema->setNameFormat('search[%s]');
  }

}