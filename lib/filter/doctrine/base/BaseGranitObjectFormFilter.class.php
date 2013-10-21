<?php

/**
 * GranitObject filter form base class.
 *
 * @package    granit
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGranitObjectFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sub_cat_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitSub_cat'), 'add_empty' => true)),
      'active'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'sub_cat_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GranitSub_cat'), 'column' => 'id')),
      'active'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('granit_object_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitObject';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'sub_cat_id' => 'ForeignKey',
      'active'     => 'Boolean',
    );
  }
}
