<?php

/**
 * GranitPhoto filter form base class.
 *
 * @package    granit
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGranitPhotoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'obj_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitObject'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'obj_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GranitObject'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('granit_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitPhoto';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'obj_id' => 'ForeignKey',
    );
  }
}
