<?php

/**
 * GranitSub_inf_photo filter form base class.
 *
 * @package    granit
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGranitSub_inf_photoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sub_inf_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitSub_inf'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'sub_inf_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GranitSub_inf'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('granit_sub_inf_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitSub_inf_photo';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'sub_inf_id' => 'ForeignKey',
    );
  }
}
