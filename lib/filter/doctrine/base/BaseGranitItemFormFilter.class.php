<?php

/**
 * GranitItem filter form base class.
 *
 * @package    granit
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGranitItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'prod_cat_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GranitProd_cat'), 'add_empty' => true)),
      'name'        => new sfWidgetFormFilterInput(),
      'icon'        => new sfWidgetFormFilterInput(),
      'material'    => new sfWidgetFormFilterInput(),
      'complect'    => new sfWidgetFormFilterInput(),
      'price'       => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'prod_cat_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GranitProd_cat'), 'column' => 'id')),
      'name'        => new sfValidatorPass(array('required' => false)),
      'icon'        => new sfValidatorPass(array('required' => false)),
      'material'    => new sfValidatorPass(array('required' => false)),
      'complect'    => new sfValidatorPass(array('required' => false)),
      'price'       => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('granit_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GranitItem';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'prod_cat_id' => 'ForeignKey',
      'name'        => 'Text',
      'icon'        => 'Text',
      'material'    => 'Text',
      'complect'    => 'Text',
      'price'       => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
