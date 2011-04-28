<?php

/**
 * adHotel filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseadHotelFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                       => new sfWidgetFormFilterInput(),
      'address'                    => new sfWidgetFormFilterInput(),
      'chkin_from'                 => new sfWidgetFormFilterInput(),
      'chkin_to'                   => new sfWidgetFormFilterInput(),
      'chkout_from'                => new sfWidgetFormFilterInput(),
      'chkout_to'                  => new sfWidgetFormFilterInput(),
      'city'                       => new sfWidgetFormFilterInput(),
      'city_id'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'class_and'                  => new sfWidgetFormFilterInput(),
      'class_is_estimated'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'commission'                 => new sfWidgetFormFilterInput(),
      'countrycode'                => new sfWidgetFormFilterInput(),
      'currencycode'               => new sfWidgetFormFilterInput(),
      'district'                   => new sfWidgetFormFilterInput(),
      'hoteltype_id'               => new sfWidgetFormFilterInput(),
      'is_closed'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'latitude'                   => new sfWidgetFormFilterInput(),
      'longitude'                  => new sfWidgetFormFilterInput(),
      'max_persons_in_reservation' => new sfWidgetFormFilterInput(),
      'max_rooms_in_reservation'   => new sfWidgetFormFilterInput(),
      'maxrate'                    => new sfWidgetFormFilterInput(),
      'minrate'                    => new sfWidgetFormFilterInput(),
      'nr_rooms'                   => new sfWidgetFormFilterInput(),
      'preferred'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'ranking'                    => new sfWidgetFormFilterInput(),
      'review_nr'                  => new sfWidgetFormFilterInput(),
      'review_score'               => new sfWidgetFormFilterInput(),
      'url'                        => new sfWidgetFormFilterInput(),
      'zip'                        => new sfWidgetFormFilterInput(),
      'slug'                       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                       => new sfValidatorPass(array('required' => false)),
      'address'                    => new sfValidatorPass(array('required' => false)),
      'chkin_from'                 => new sfValidatorPass(array('required' => false)),
      'chkin_to'                   => new sfValidatorPass(array('required' => false)),
      'chkout_from'                => new sfValidatorPass(array('required' => false)),
      'chkout_to'                  => new sfValidatorPass(array('required' => false)),
      'city'                       => new sfValidatorPass(array('required' => false)),
      'city_id'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'class_and'                  => new sfValidatorPass(array('required' => false)),
      'class_is_estimated'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'commission'                 => new sfValidatorPass(array('required' => false)),
      'countrycode'                => new sfValidatorPass(array('required' => false)),
      'currencycode'               => new sfValidatorPass(array('required' => false)),
      'district'                   => new sfValidatorPass(array('required' => false)),
      'hoteltype_id'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_closed'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'latitude'                   => new sfValidatorPass(array('required' => false)),
      'longitude'                  => new sfValidatorPass(array('required' => false)),
      'max_persons_in_reservation' => new sfValidatorPass(array('required' => false)),
      'max_rooms_in_reservation'   => new sfValidatorPass(array('required' => false)),
      'maxrate'                    => new sfValidatorPass(array('required' => false)),
      'minrate'                    => new sfValidatorPass(array('required' => false)),
      'nr_rooms'                   => new sfValidatorPass(array('required' => false)),
      'preferred'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'ranking'                    => new sfValidatorPass(array('required' => false)),
      'review_nr'                  => new sfValidatorPass(array('required' => false)),
      'review_score'               => new sfValidatorPass(array('required' => false)),
      'url'                        => new sfValidatorPass(array('required' => false)),
      'zip'                        => new sfValidatorPass(array('required' => false)),
      'slug'                       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ad_hotel_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'adHotel';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'name'                       => 'Text',
      'address'                    => 'Text',
      'chkin_from'                 => 'Text',
      'chkin_to'                   => 'Text',
      'chkout_from'                => 'Text',
      'chkout_to'                  => 'Text',
      'city'                       => 'Text',
      'city_id'                    => 'Number',
      'class_and'                  => 'Text',
      'class_is_estimated'         => 'Boolean',
      'commission'                 => 'Text',
      'countrycode'                => 'Text',
      'currencycode'               => 'Text',
      'district'                   => 'Text',
      'hoteltype_id'               => 'Number',
      'is_closed'                  => 'Boolean',
      'latitude'                   => 'Text',
      'longitude'                  => 'Text',
      'max_persons_in_reservation' => 'Text',
      'max_rooms_in_reservation'   => 'Text',
      'maxrate'                    => 'Text',
      'minrate'                    => 'Text',
      'nr_rooms'                   => 'Text',
      'preferred'                  => 'Boolean',
      'ranking'                    => 'Text',
      'review_nr'                  => 'Text',
      'review_score'               => 'Text',
      'url'                        => 'Text',
      'zip'                        => 'Text',
      'slug'                       => 'Text',
    );
  }
}
