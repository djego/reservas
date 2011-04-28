<?php

/**
 * adHotel form base class.
 *
 * @method adHotel getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseadHotelForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'name'                       => new sfWidgetFormInputText(),
      'address'                    => new sfWidgetFormInputText(),
      'chkin_from'                 => new sfWidgetFormInputText(),
      'chkin_to'                   => new sfWidgetFormInputText(),
      'chkout_from'                => new sfWidgetFormInputText(),
      'chkout_to'                  => new sfWidgetFormInputText(),
      'city'                       => new sfWidgetFormInputText(),
      'city_id'                    => new sfWidgetFormInputText(),
      'class_and'                  => new sfWidgetFormInputText(),
      'class_is_estimated'         => new sfWidgetFormInputCheckbox(),
      'commission'                 => new sfWidgetFormInputText(),
      'countrycode'                => new sfWidgetFormInputText(),
      'currencycode'               => new sfWidgetFormInputText(),
      'district'                   => new sfWidgetFormInputText(),
      'hoteltype_id'               => new sfWidgetFormInputText(),
      'is_closed'                  => new sfWidgetFormInputCheckbox(),
      'latitude'                   => new sfWidgetFormInputText(),
      'longitude'                  => new sfWidgetFormInputText(),
      'max_persons_in_reservation' => new sfWidgetFormInputText(),
      'max_rooms_in_reservation'   => new sfWidgetFormInputText(),
      'maxrate'                    => new sfWidgetFormInputText(),
      'minrate'                    => new sfWidgetFormInputText(),
      'nr_rooms'                   => new sfWidgetFormInputText(),
      'preferred'                  => new sfWidgetFormInputCheckbox(),
      'ranking'                    => new sfWidgetFormInputText(),
      'review_nr'                  => new sfWidgetFormInputText(),
      'review_score'               => new sfWidgetFormInputText(),
      'url'                        => new sfWidgetFormInputText(),
      'zip'                        => new sfWidgetFormInputText(),
      'slug'                       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                       => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'address'                    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'chkin_from'                 => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'chkin_to'                   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'chkout_from'                => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'chkout_to'                  => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'city'                       => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'city_id'                    => new sfValidatorInteger(),
      'class_and'                  => new sfValidatorPass(array('required' => false)),
      'class_is_estimated'         => new sfValidatorBoolean(array('required' => false)),
      'commission'                 => new sfValidatorPass(array('required' => false)),
      'countrycode'                => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'currencycode'               => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'district'                   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'hoteltype_id'               => new sfValidatorInteger(array('required' => false)),
      'is_closed'                  => new sfValidatorBoolean(array('required' => false)),
      'latitude'                   => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'longitude'                  => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'max_persons_in_reservation' => new sfValidatorPass(array('required' => false)),
      'max_rooms_in_reservation'   => new sfValidatorPass(array('required' => false)),
      'maxrate'                    => new sfValidatorPass(array('required' => false)),
      'minrate'                    => new sfValidatorPass(array('required' => false)),
      'nr_rooms'                   => new sfValidatorPass(array('required' => false)),
      'preferred'                  => new sfValidatorBoolean(array('required' => false)),
      'ranking'                    => new sfValidatorPass(array('required' => false)),
      'review_nr'                  => new sfValidatorPass(array('required' => false)),
      'review_score'               => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'url'                        => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'zip'                        => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'slug'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'adHotel', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('ad_hotel[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'adHotel';
  }

}
