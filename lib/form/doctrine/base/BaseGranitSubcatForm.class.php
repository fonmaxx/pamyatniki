<?php

/**
 * GranitSubcat form base class.
 *
 * @method GranitSubcat getObject() Returns the current form's model object
 *
 * @package    granit
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGranitSubcatForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'cat_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitCat'), 'add_empty' => false)),
      'name'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'cat_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GranitCat'))),
      'name'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('granit_subcat[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitSubcat';
  }

}
