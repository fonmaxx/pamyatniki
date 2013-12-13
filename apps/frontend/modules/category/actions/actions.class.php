<?php

/**
 * category actions.
 *
 * @package    granit
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  	$this->cats = Doctrine_Core::getTable('GranitCat')->getCats();
  }
  public function executeSubCat(sfWebRequest $request)
  {
  	$this->sub_cat=$this->getRoute()->getObject();
  	$this->pager = new sfDoctrinePager(
  			'GranitObject',
  			sfConfig::get('app_max_objects_on_sub_cat')
  	);
  	$this->pager->setQuery(Doctrine_Core::getTable('GranitObject')->PartialObjectsQuery($this->sub_cat->getId()));
  	$page=$request->getParameter('page', 1);
  	$this->pager->setPage($page);
  	$this->pager->init();
  	$this->objects=$this->pager->getResults();
  	if(!$this->objects->count())
  	{
  		$this->forward404("страницы под таким номером не существует");
  	}  	
  	$count=$this->pager->getLastPage();
  	if($count>4)
  	{
  		$this->l_num=2;
  		$this->r_num=2;
  		$var=4;
  	}
  	else 
  	{
  		$this->l_num=intval($count/2);
  		$this->r_num=$this->l_num;
  		$var=$this->l_num*2;
  	}	
  	if(($page+$this->r_num)>$count)
  	{
  		$this->r_num=$count-$page;
  		$this->l_num=$var-$this->r_num;
  	}
  	elseif(($page-$this->l_num)<1)
  	{
  		$this->l_num=(($page-$this->l_num)<0)?0:$this->l_num-$page;
  		$this->r_num=$var-$this->l_num;  		
  	}
  	
  }
  public function executeCat(sfWebRequest $request)
  {
  	$this->cat=$this->getRoute()->getObject();
  }
  public function executeKontakty(sfWebRequest $request)
  {
  
  }
  
}
