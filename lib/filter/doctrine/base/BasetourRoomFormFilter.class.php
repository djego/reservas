<?php

/**
 * tourRoom filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasetourRoomFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'      => new sfWidgetFormFilterInput(),
      'type'      => new sfWidgetFormFilterInput(),
      'latitude'  => new sfWidgetFormFilterInput(),
      'longitude' => new sfWidgetFormFilterInput(),
      'slug'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'      => new sfValidatorPass(array('required' => false)),
      'city'      => new sfValidatorPass(array('required' => false)),
      'type'      => new sfValidatorPass(array('required' => false)),
      'latitude'  => new sfValidatorPass(array('required' => false)),
      'longitude' => new sfValidatorPass(array('required' => false)),
      'slug'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tour_room_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'tourRoom';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'name'      => 'Text',
      'city'      => 'Text',
      'type'      => 'Text',
      'latitude'  => 'Text',
      'longitude' => 'Text',
      'slug'      => 'Text',
    );
  }
}
