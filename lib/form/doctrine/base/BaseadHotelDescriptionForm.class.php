<?php

/**
 * adHotelDescription form base class.
 *
 * @method adHotelDescription getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseadHotelDescriptionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'descriptiontype_id' => new sfWidgetFormInputHidden(),
      'hotel_id'           => new sfWidgetFormInputHidden(),
      'description'        => new sfWidgetFormTextarea(),
      'languagecode'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descriptiontype_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('descriptiontype_id')), 'empty_value' => $this->getObject()->get('descriptiontype_id'), 'required' => false)),
      'hotel_id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('hotel_id')), 'empty_value' => $this->getObject()->get('hotel_id'), 'required' => false)),
      'description'        => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'languagecode'       => new sfValidatorString(array('max_length' => 2, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ad_hotel_description[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'adHotelDescription';
  }

}
