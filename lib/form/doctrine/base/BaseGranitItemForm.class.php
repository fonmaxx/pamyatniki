<?php

/**
 * GranitItem form base class.
 *
 * @method GranitItem getObject() Returns the current form's model object
 *
 * @package    granit
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGranitItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'prod_cat_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitProd_cat'), 'add_empty' => false)),
      'name'        => new sfWidgetFormInputText(),
      'icon'        => new sfWidgetFormInputText(),
      'material'    => new sfWidgetFormInputText(),
      'complect'    => new sfWidgetFormInputText(),
      'price'       => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'prod_cat_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GranitProd_cat'))),
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'icon'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'material'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'complect'    => new sfValidatorPass(array('required' => false)),
      'price'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('granit_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitItem';
  }

}
