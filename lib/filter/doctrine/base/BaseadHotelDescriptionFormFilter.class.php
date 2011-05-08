<?php

/**
 * adHotelDescription filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseadHotelDescriptionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'description'        => new sfWidgetFormFilterInput(),
      'languagecode'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'description'        => new sfValidatorPass(array('required' => false)),
      'languagecode'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ad_hotel_description_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'adHotelDescription';
  }

  public function getFields()
  {
    return array(
      'descriptiontype_id' => 'Number',
      'hotel_id'           => 'Number',
      'description'        => 'Text',
      'languagecode'       => 'Text',
    );
  }
}
