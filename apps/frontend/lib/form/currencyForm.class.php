<?php

class currencyForm extends sfForm
{ 
  public function setup() {
    $ar_currency = array(
        'CZK' => 'Corona checa (CZK)',
        'DKK' => 'Corona danesa (DKK)',
        'NOK' => 'Corona noruega (NOK)',
        'SEK' => 'Corona sueca (SEK)',
        'AUD' => 'Dólar australiano (AUD)',
        'CAD' => 'Dólar canadiense (CAD)',
        'SGD' => 'Dólar de Singapur (SGD)',
        'USD' => 'Dólar EEUU (US$)',
        'EUR' => 'Euro (€)',
        'HUF' => 'Florín húngaro (HUF)',
        'CHF' => 'Franco suizo (CHF)',
        'GBP' => 'Libra esterlina (£)',
        'MXN' => 'Peso mexicano (MXN)',
        'BRL' => 'Real brasileño (R$)',
        'RUB' => 'Rublo ruso (RUB)',
        'INR' => 'Rupia india (INR)',
        'JPY' => 'Yen japonés (¥)',
        'PLN' => 'Zlotych polaco (PLN)'
            );
    $this->setWidgets(array(
            'moneda' =>   new sfWidgetFormChoice(array('choices' => $ar_currency)),
            

    ));

    $this->setValidators(array(
            'moneda'         => new sfValidatorPass(),
            
    ));

    $this->widgetSchema->setNameFormat('currency_form[%s]');
  }
   
}

