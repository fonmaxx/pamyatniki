<?php

/**
 * GranitSub_catTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class GranitSub_catTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object GranitSub_catTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('GranitSub_cat');
    }
    public static function getSubCat($options)
    {
    	if($options['cat']&&$options['translit'])
    	{
    		$q = Doctrine_Query::create()
				->from('GranitSub_cat s')
				->leftJoin('s.GranitCat c')
				->where('s.translit =?',$options['translit'])
    			->execute();
    		return $q;
    	}
    	return false;
    }
}