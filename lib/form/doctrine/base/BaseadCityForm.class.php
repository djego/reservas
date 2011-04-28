<?php

/**
 * adCity form base class.
 *
 * @method adCity getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseadCityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'countrycode'  => new sfWidgetFormInputText(),
      'languagecode' => new sfWidgetFormInputText(),
      'latitude'     => new sfWidgetFormInputText(),
      'longitude'    => new sfWidgetFormInputText(),
      'name'         => new sfWidgetFormInputText(),
      'nr_hotels'    => new sfWidgetFormInputText(),
      'slug'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'countrycode'  => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'languagecode' => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'latitude'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'longitude'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'nr_hotels'    => new sfValidatorInteger(array('required' => false)),
      'slug'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'adCity', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('ad_city[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'adCity';
  }

}
