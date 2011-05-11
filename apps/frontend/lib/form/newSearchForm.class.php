<?php

class newSearchForm extends sfForm
{ 
  

  public function setup()
  {   
    $ar_star = array('all' => 'Todo', '1' => '1 estrella', '2' => '2 estrellas', '3' => '3 estrellas', '4' => '4 estrellas', '5' => '5 estrellas' );
    $ar_facility = array('all' => 'Sin preferencias', 'Conexión inalámbrica' => 'Conexión WIFI Internet', 'Gimnasio' => 'Gimnasio', 'Spa' => 'Spa', 'Piscina cubierta' => 'Piscina cubierta', 'Piscina al aire libre' => 'Piscina al aire libre','Se admiten animales' => 'Se admiten animales','Aparcamiento' => 'Aparcamiento' ,'Restaurante' => 'Restaurante');
    $this->setWidgets(array(
            'destino'       =>   new sfWidgetFormInput(),
            'fecha_entrada' =>   new sfWidgetFormInput(),
            'fecha_salida'  =>   new sfWidgetFormInput(),
            'star'  => new sfWidgetFormChoice (array('choices' => $ar_star,'multiple' =>true, 'expanded' => true)),
            'facility'  => new sfWidgetFormChoice (array('choices' => $ar_facility,'multiple' =>true, 'expanded' => true))

    ));

    $this->setValidators(array(
            'destino'	    =>   new sfValidatorPass(array('required' => true), array('required' => 'Ingrese Destino')),
            'fecha_entrada' =>   new sfValidatorPass(),
            'fecha_salida'  =>   new sfValidatorPass(),
            'star'      =>   new sfValidatorPass(),
            'facility'        =>   new sfValidatorPass(),
//          
    ));
    
	$this->widgetSchema->setNameFormat('search_new[%s]');
  }
   
}