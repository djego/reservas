<?php

/**
 * adHotelPhoto filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseadHotelPhotoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'photo_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hotel_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Hotel'), 'add_empty' => true)),
      'small_photo'  => new sfWidgetFormFilterInput(),
      'medium_photo' => new sfWidgetFormFilterInput(),
      'big_photo'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'photo_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hotel_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Hotel'), 'column' => 'id')),
      'small_photo'  => new sfValidatorPass(array('required' => false)),
      'medium_photo' => new sfValidatorPass(array('required' => false)),
      'big_photo'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ad_hotel_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'adHotelPhoto';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'photo_id'     => 'Number',
      'hotel_id'     => 'ForeignKey',
      'small_photo'  => 'Text',
      'medium_photo' => 'Text',
      'big_photo'    => 'Text',
    );
  }
}
