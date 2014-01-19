<?php

/**
 * GranitProduction filter form.
 *
 * @package    granit
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GranitProductionFormFilter extends BaseGranitProductionFormFilter
{
  public function configure()
  	{
  	unset($this['id'],$this['translit'],$this['obj_id'],$this['icon'],
    $this['price'],$this['complect'],$this['created_at'],$this['updated_at'],$this['material']);
  	$sub_cat=Doctrine_Core::getTable('GranitSub_cat')->getProdSubCatSet(); 
  	
  	$this->widgetSchema['sub_cat']=new sfWidgetFormChoice(array(
				'choices'  =>$sub_cat ,
				'expanded' => false,
				"multiple"=>false,
				),array('label'=>'тип продукции'));
	$this->widgetSchema['sub_cat']->setLabel('тип продукции');
	$this->validatorSchema ['sub_cat'] =new sfValidatorPass();			
  	
	$this->widgetSchema['name'] =  new sfWidgetFormFilterInput(array(
      	'with_empty' => false));
	$this->widgetSchema['name']->setLabel('название');
  	$this->validatorSchema ['name'] =new sfValidatorPass();
  	
  	}
  public function getFields()
	{
  	$fields = parent::getFields();
  	$fields['sub_cat'] = 'Number';
  	return $fields;
	}
  public function addSubCatColumnQuery($query, $field, $value)
  	{
  	  Doctrine_Core::getTable('GranitProduction')->appProdFilter($query,$value);
  	}
}
