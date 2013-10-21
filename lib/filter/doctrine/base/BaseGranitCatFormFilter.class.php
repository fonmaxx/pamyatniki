<?php

/**
 * GranitCat filter form base class.
 *
 * @package    granit
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGranitCatFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'      => new sfWidgetFormFilterInput(),
      'shortcart' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'translit'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'      => new sfValidatorPass(array('required' => false)),
      'shortcart' => new sfValidatorPass(array('required' => false)),
      'translit'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('granit_cat_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitCat';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'name'      => 'Text',
      'shortcart' => 'Text',
      'translit'  => 'Text',
    );
  }
}
