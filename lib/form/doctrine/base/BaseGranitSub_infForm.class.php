<?php

/**
 * GranitSub_inf form base class.
 *
 * @method GranitSub_inf getObject() Returns the current form's model object
 *
 * @package    granit
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGranitSub_infForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'inf_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitInf'), 'add_empty' => false)),
      'title'      => new sfWidgetFormInputText(),
      'shortcart'  => new sfWidgetFormInputText(),
      'icon'       => new sfWidgetFormInputText(),
      'content'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'inf_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GranitInf'))),
      'title'      => new sfValidatorString(array('max_length' => 255)),
      'shortcart'  => new sfValidatorPass(),
      'icon'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content'    => new sfValidatorPass(),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('granit_sub_inf[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitSub_inf';
  }

}
