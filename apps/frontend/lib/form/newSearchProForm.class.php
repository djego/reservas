<?php

class searchProForm extends sfForm
{



  public function setup() {

    $this->setWidgets(array(
            'fecha_entrada' =>   new sfWidgetFormInput(),
            'fecha_salida'  =>   new sfWidgetFormInput(),


    ));

    $this->setValidators(array(
            'fecha_entrada'         => new sfValidatorPass(),
            'fecha_salida'         => new sfValidatorPass(),

    ));

    $this->widgetSchema->setNameFormat('search_pro[%s]');
  }

}