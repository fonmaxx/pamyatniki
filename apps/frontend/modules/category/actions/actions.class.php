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
  	$this->pager->setPage($request->getParameter('page', 1));
  	$this->pager->init();
  }
  public function executeCat(sfWebRequest $request)
  {
  	$this->cat=$this->getRoute()->getObject();
  }
  public function executeKontakty(sfWebRequest $request)
  {
  
  }
  
}
