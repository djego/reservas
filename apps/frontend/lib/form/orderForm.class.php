<?php

class orderForm extends sfForm {

  public function setup() {
    $ar_order = array('pop' => 'Popularidad', 'opi' => 'Opinión clientes', 'est' => 'Estrellas', 'pre' => 'Precio');
    $this->setWidgets(array(
        'order' => new sfWidgetFormChoice(array('choices' => $ar_order)),
    ));

    $this->setValidators(array(
        'order' => new sfValidatorPass(),
    ));

    $this->widgetSchema->setNameFormat('order_form[%s]');
  }



}