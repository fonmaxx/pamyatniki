<?php

/**
 * BaseGranitObject
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $sub_cat_id
 * @property boolean $active
 * @property GranitSub_cat $GranitSub_cat
 * @property Doctrine_Collection $Prod
 * @property Doctrine_Collection $Inf
 * @property Doctrine_Collection $Photo
 * @property Doctrine_Collection $Metas
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGranitObject extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('granit_object');
        $this->hasColumn('sub_cat_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('GranitSub_cat', array(
             'local' => 'sub_cat_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('GranitProduction as Prod', array(
             'local' => 'id',
             'foreign' => 'obj_id'));

        $this->hasMany('GranitInformation as Inf', array(
             'local' => 'id',
             'foreign' => 'obj_id'));

        $this->hasMany('GranitPhoto as Photo', array(
             'local' => 'id',
             'foreign' => 'obj_id'));

        $this->hasMany('GranitMetas as Metas', array(
             'local' => 'id',
             'foreign' => 'obj_id'));
    }
}