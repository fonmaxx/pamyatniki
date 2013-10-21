<?php

/**
 * GranitInformation filter form base class.
 *
 * @package    granit
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGranitInformationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'obj_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitObject'), 'add_empty' => true)),
      'title'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'shortcart'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'icon'       => new sfWidgetFormFilterInput(),
      'content'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'translit'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'obj_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GranitObject'), 'column' => 'id')),
      'title'      => new sfValidatorPass(array('required' => false)),
      'shortcart'  => new sfValidatorPass(array('required' => false)),
      'icon'       => new sfValidatorPass(array('required' => false)),
      'content'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'translit'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('granit_information_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitInformation';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'obj_id'     => 'ForeignKey',
      'title'      => 'Text',
      'shortcart'  => 'Text',
      'icon'       => 'Text',
      'content'    => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'translit'   => 'Text',
    );
  }
}
