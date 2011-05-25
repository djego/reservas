<?php

/**
 * tourRoom form base class.
 *
 * @method tourRoom getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasetourRoomForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'name'      => new sfWidgetFormInputText(),
      'city'      => new sfWidgetFormInputText(),
      'type'      => new sfWidgetFormInputText(),
      'latitude'  => new sfWidgetFormInputText(),
      'longitude' => new sfWidgetFormInputText(),
      'slug'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'      => new sfValidatorString(array('max_length' => 250)),
      'city'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'type'      => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'latitude'  => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'longitude' => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'slug'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'tourRoom', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('tour_room[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'tourRoom';
  }

}
