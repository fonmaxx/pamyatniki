<?php

/**
 * GranitProd_photo filter form base class.
 *
 * @package    granit
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGranitProd_photoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitItem'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'item_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GranitItem'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('granit_prod_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitProd_photo';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'item_id' => 'ForeignKey',
    );
  }
}
