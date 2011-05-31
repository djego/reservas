<?php

class dispoForm extends searchHotelForm {

  
  public function setup() {

    parent::setup();
    
    $this->widgetSchema->setNameFormat('dispo[%s]');
  }

}