<?php

/**
 * GranitMetas form base class.
 *
 * @method GranitMetas getObject() Returns the current form's model object
 *
 * @package    granit
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGranitMetasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'obj_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitObject'), 'add_empty' => false)),
      'content' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'obj_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GranitObject'))),
      'content' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('granit_metas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitMetas';
  }

}
