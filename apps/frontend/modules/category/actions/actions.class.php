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
    if ($request->isXmlHttpRequest())
  	{
    	$this->kont=Doctrine_Core::getTable('GranitKoordinates')->getKoordinates();
    	$this->arr=array(
    	'coordinates'=>$this->kont->getCoordinates(),
    	'text'=>$this->kont->getText());
  		return $this->renderText(json_encode($this->arr));
  	}
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
  	$arr=Support::buttonsLimits($page,$count);
  	$this->r_num=$arr['r_num'];
  	$this->l_num=$arr['l_num'];  	
  }
  public function executeCat(sfWebRequest $request)
  {
  	$this->cat=$this->getRoute()->getObject();
  }
  public function executeKontakty(sfWebRequest $request)
  {
  	$this->kont=Doctrine_Core::getTable('GranitKontaktyCat')->getKontakts();
  	$this->koordinates=Doctrine_Core::getTable('GranitKoordinates');
  }
  
}
