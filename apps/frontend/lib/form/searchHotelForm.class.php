<?php

class searchHotelForm extends sfForm {

  public function setup() {

//    print_r($ar);
//    die ();
    $this->setWidgets(array(
        'fecha-inicio' => new sfWidgetFormDate(array('format' => '%day% %month%', 'months' => appFrontend::construirselec())),
        'fecha-final' => new sfWidgetFormDate(array('format' => '%day% %month%', 'months' => appFrontend::construirselec())),
    ));

    $this->setValidators(array(
        'fecha-inicio' => new sfValidatorPass(),
        'fecha-final' => new sfValidatorPass(),
    ));
    $this->mergePostValidator(new sfValidatorCallback(array('callback' => array($this, 'validateDates'))));

    $this->widgetSchema->setNameFormat('search[%s]');
  }

  public function validateDates($validator, $values, $arguments) {

    $time_ini = strtotime(Utils::changeFormatDate($values['fecha-inicio']));
    $time_fin = strtotime(Utils::changeFormatDate($values['fecha-final']));
    if ($time_fin <= $time_ini) {
      throw new sfValidatorError($validator, "Fecha de Salida debe ser mayor que la fecha de entrada");
    }
    return $values;
  }

}