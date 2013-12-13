<?php

/**
 * GranitProd_complect filter form base class.
 *
 * @package    granit
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGranitProd_complectFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'prod_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitProduction'), 'add_empty' => true)),
      'complect_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitComplect'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'prod_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GranitProduction'), 'column' => 'id')),
      'complect_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GranitComplect'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('granit_prod_complect_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitProd_complect';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'prod_id'     => 'ForeignKey',
      'complect_id' => 'ForeignKey',
    );
  }
}
