<?php

/**
 * BaseGranitSub_cat
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cat_id
 * @property string $name
 * @property GranitCat $GranitCat
 * @property Doctrine_Collection $Obj
 * 
 * @method integer             getCatId()     Returns the current record's "cat_id" value
 * @method string              getName()      Returns the current record's "name" value
 * @method GranitCat           getGranitCat() Returns the current record's "GranitCat" value
 * @method Doctrine_Collection getObj()       Returns the current record's "Obj" collection
 * @method GranitSub_cat       setCatId()     Sets the current record's "cat_id" value
 * @method GranitSub_cat       setName()      Sets the current record's "name" value
 * @method GranitSub_cat       setGranitCat() Sets the current record's "GranitCat" value
 * @method GranitSub_cat       setObj()       Sets the current record's "Obj" collection
 * 
 * @package    granit
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGranitSub_cat extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('granit_sub_cat');
        $this->hasColumn('cat_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('GranitCat', array(
             'local' => 'cat_id',
             'foreign' => 'id'));

        $this->hasMany('GranitObject as Obj', array(
             'local' => 'id',
             'foreign' => 'sub_cat_id'));

        $translit0 = new Doctrine_Template_Translit(array(
             'feilds' => 'name',
             ));
        $this->actAs($translit0);
    }
}