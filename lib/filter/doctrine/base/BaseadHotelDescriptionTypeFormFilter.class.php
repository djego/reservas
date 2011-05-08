<?php

/**
 * adHotelDescriptionType filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseadHotelDescriptionTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'languagecode' => new sfWidgetFormFilterInput(),
      'name'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'languagecode' => new sfValidatorPass(array('required' => false)),
      'name'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ad_hotel_description_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'adHotelDescriptionType';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'languagecode' => 'Text',
      'name'         => 'Text',
    );
  }
}
