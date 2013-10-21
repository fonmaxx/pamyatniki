<?php

/**
 * GranitSub_cat filter form base class.
 *
 * @package    granit
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGranitSub_catFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cat_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitCat'), 'add_empty' => true)),
      'name'     => new sfWidgetFormFilterInput(),
      'translit' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cat_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GranitCat'), 'column' => 'id')),
      'name'     => new sfValidatorPass(array('required' => false)),
      'translit' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('granit_sub_cat_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitSub_cat';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'cat_id'   => 'ForeignKey',
      'name'     => 'Text',
      'translit' => 'Text',
    );
  }
}
