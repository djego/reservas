<?php

/**
 * adCity filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseadCityFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'countrycode'  => new sfWidgetFormFilterInput(),
      'languagecode' => new sfWidgetFormFilterInput(),
      'latitude'     => new sfWidgetFormFilterInput(),
      'longitude'    => new sfWidgetFormFilterInput(),
      'name'         => new sfWidgetFormFilterInput(),
      'nr_hotels'    => new sfWidgetFormFilterInput(),
      'slug'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'countrycode'  => new sfValidatorPass(array('required' => false)),
      'languagecode' => new sfValidatorPass(array('required' => false)),
      'latitude'     => new sfValidatorPass(array('required' => false)),
      'longitude'    => new sfValidatorPass(array('required' => false)),
      'name'         => new sfValidatorPass(array('required' => false)),
      'nr_hotels'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'slug'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ad_city_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'adCity';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'countrycode'  => 'Text',
      'languagecode' => 'Text',
      'latitude'     => 'Text',
      'longitude'    => 'Text',
      'name'         => 'Text',
      'nr_hotels'    => 'Number',
      'slug'         => 'Text',
    );
  }
}
