<?php

/**
 * adHotelService filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseadHotelServiceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'hotel_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Hotel'), 'add_empty' => true)),
      'type'     => new sfWidgetFormFilterInput(),
      'service'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'hotel_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Hotel'), 'column' => 'id')),
      'type'     => new sfValidatorPass(array('required' => false)),
      'service'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ad_hotel_service_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'adHotelService';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'hotel_id' => 'ForeignKey',
      'type'     => 'Text',
      'service'  => 'Text',
    );
  }
}
