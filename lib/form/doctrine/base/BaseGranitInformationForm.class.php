<?php

/**
 * GranitInformation form base class.
 *
 * @method GranitInformation getObject() Returns the current form's model object
 *
 * @package    granit
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGranitInformationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'obj_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitObject'), 'add_empty' => false)),
      'title'      => new sfWidgetFormInputText(),
      'shortcart'  => new sfWidgetFormInputText(),
      'icon'       => new sfWidgetFormInputText(),
      'content'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'translit'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'obj_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GranitObject'))),
      'title'      => new sfValidatorString(array('max_length' => 255)),
      'shortcart'  => new sfValidatorPass(),
      'icon'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content'    => new sfValidatorPass(),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'translit'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'GranitInformation', 'column' => array('translit')))
    );

    $this->widgetSchema->setNameFormat('granit_information[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitInformation';
  }

}
