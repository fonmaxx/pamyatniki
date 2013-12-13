<?php

/**
 * GranitProd_complect form base class.
 *
 * @method GranitProd_complect getObject() Returns the current form's model object
 *
 * @package    granit
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGranitProd_complectForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'prod_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitProduction'), 'add_empty' => false)),
      'complect_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitComplect'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'prod_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GranitProduction'))),
      'complect_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GranitComplect'))),
    ));

    $this->widgetSchema->setNameFormat('granit_prod_complect[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitProd_complect';
  }

}
