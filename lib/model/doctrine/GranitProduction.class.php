<?php

/**
 * GranitProduction
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    granit
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class GranitProduction extends BaseGranitProduction
{
public function getComplect()
	{
	$str=false;	
	if($this->GranitProd_complect->count())
		{
		foreach($this->GranitProd_complect as $complect)
			{
			$str.=" - ".$complect->getName()."<br> ";
			}
		}
	return $str;
	}
public function getIconImg()
	{
	if($this->getIcon())
	{
		$src='/photo/'.$this->getObj_id().'/icon/'.$this->getIcon().'.jpg';
		return $src;
	}	
	return '/images/'.sfConfig::get('app_default_icon');
	}
public function getPhotoNum()
	{
	$str= " ".$this->GranitObject->Photo->count()." фото";
	return $str;
	}		
}