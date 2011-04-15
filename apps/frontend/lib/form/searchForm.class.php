<?php

class searchForm extends sfForm
{ 
  public static $mont = array (	1 => 'Enero 2001',
	2 => 'Febrero 2001',
	3 => 'Marzo 2001',
	4 => 'Abril 2001',
	5 => 'Mayo 2001',
	6 => 'Junio 2001',
	7 => 'Julio 2001',
	8 => 'Agosto 2001',
	9 => 'Septiembre 2001',
	10 => 'Octubre 2001',
	11 => 'Noviembre 2001',
	12 => 'Diciembre 2001'); 
	

  public function setup()
  {

    
  	
    $this->setWidgets(array(
      'ciudad'  		=> new sfWidgetFormInput(),
  	  'fecha-inicio'        =>   new sfWidgetFormDate(array('format' => '%day% %month%', 'months' => self::$mont )), 
  	  'fecha-final'        =>   new sfWidgetFormDate(array('format' => '%day% %month%', 'months'=>self::$mont)), 													
    ));

    $this->setValidators(array(      
      'ciudad'			 => new sfValidatorPass(), 
	  'fecha-inicio'         => new sfValidatorPass(),
      'fecha-final'         => new sfValidatorPass(),														
    ));
    
	$this->widgetSchema->setNameFormat('search[%s]');
  }
   
}