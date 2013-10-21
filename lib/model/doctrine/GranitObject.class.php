<?php

/**
 * GranitObject
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    granit
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class GranitObject extends BaseGranitObject
{
	public function getIcon()
	{
		if($this->Inf->count()&&$this->Inf->getFirst()->getIcon())
		{
			return '/photo/'.$this->getId().'/icon/'.$this->Inf->getFirst()->getIcon().'.jpg';
		}
		elseif($this->Prod->count()&&$this->Prod->getFirst()->getIcon())
		{
			return '/photo/'.$this->getId().'/icon/'.$this->Prod->getFirst()->getIcon().'.jpg';
		}

		return '/images/'.sfConfig::get('app_default_icon');
	}
	public function getMainPhoto()
	{
		if($this->Inf->count()&&$this->Inf->getFirst()->getIcon())
		{
			return '/photo/'.$this->getId().'/'.$this->Inf->getFirst()->getIcon().'.jpg';
		}
		elseif($this->Prod->count()&&$this->Prod->getFirst()->getIcon())
		{
			return '/photo/'.$this->getId().'/'.$this->Prod->getFirst()->getIcon().'.jpg';
		}
		return '/images/'.sfConfig::get('app_default_photo');
	}
	public function getName()
	{
		if($this->Inf->count())
		{
			return $this->Inf->getFirst()->getTitle();
		}
		elseif($this->Prod->count())
		{
			return $this->Prod->getFirst()->getName();
		}
	}
}