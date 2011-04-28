<?php

class searchForm extends sfForm
{ 
  public static $mont = array (
        1 => 'Enero 2011',
	2 => 'Febrero 2011',
	3 => 'Marzo 2011',
	4 => 'Abril 2011',
	5 => 'Mayo 2011',
	6 => 'Junio 2011',
	7 => 'Julio 2011',
	8 => 'Agosto 2011',
	9 => 'Septiembre 2011',
	10 => 'Octubre 2011',
	11 => 'Noviembre 2011',
	12 => 'Diciembre 2011');
	

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