<?php

class order2Form extends sfForm
{ 
  public function setup() {
    $ar_order = array('nea' => 'Mas cercanos', 'pop' => 'Popularidad','opi' => 'Opinión clientes','est'=>'Estrellas','pre'=>'Precio');
    $this->setWidgets(array(
            'order' =>   new sfWidgetFormChoice(array('choices' => $ar_order)),
            

    ));

    $this->setValidators(array(
            'order'         => new sfValidatorPass(),
            
    ));

    $this->widgetSchema->setNameFormat('order_form[%s]');
  }
   
}