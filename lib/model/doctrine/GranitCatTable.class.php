<?php

/**
 * GranitCatTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class GranitCatTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object GranitCatTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('GranitCat');
    }
    public static function getCats($param=array())
    {
    	$q=Doctrine_Query::create()
				->from('GranitCat c')
				->leftJoin('c.Sub_cat s');
    	if($param)
    	{

    		$q->andWhere('c.translit=?',$param['translit']);
    	}
    		return $q->execute();
    }
}