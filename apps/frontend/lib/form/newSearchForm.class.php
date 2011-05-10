<?php

class newSearchForm extends sfForm
{ 
  

  public function setup()
  {   
  	
    $this->setWidgets(array(
      'destino'  		=> new sfWidgetFormInput(),
      'fecha_entrada'        =>   new sfWidgetFormInput(), 
      'fecha_salida'        =>   new sfWidgetFormInput(), 													
    ));

    $this->setValidators(array(      
      'destino'			 => new sfValidatorPass(array('required' => true), array('required' => 'Ingrese Destino')), 
      'fecha_entrada'         => new sfValidatorPass(),
      'fecha_salida'         => new sfValidatorPass(),														
    ));
    
	$this->widgetSchema->setNameFormat('search_new[%s]');
  }
   
}