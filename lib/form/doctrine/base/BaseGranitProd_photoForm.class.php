<?php

/**
 * GranitProd_photo form base class.
 *
 * @method GranitProd_photo getObject() Returns the current form's model object
 *
 * @package    granit
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGranitProd_photoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'item_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitItem'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'item_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GranitItem'))),
    ));

    $this->widgetSchema->setNameFormat('granit_prod_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitProd_photo';
  }

}
