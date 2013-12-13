<?php 
include(dirname(__FILE__).'/../../bootstrap/functional.php');
$browser = new GranitTestFunctional(new sfBrowser());
$cats=$browser->getCats();
$category=$browser->getCats(array('translit'=>'produkciya'))->getFirst();
$count=$category->Sub_cat->count();
$rand=rand(0,$count);
$sub_cat=$category->Sub_cat[$rand];
$n=0;
$maxSubCat=sfConfig::get('app_max_objects_on_sub_cat');
$pager = new sfDoctrinePager(
  			'GranitObject',
  			sfConfig::get('app_max_objects_on_sub_cat')
  			);
$pager->setQuery(Doctrine_Core::getTable('GranitObject')->PartialObjectsQuery($sub_cat->getId()));
$pager->setPage($request->getParameter('page', 1));
$pager->init();
$objects=$pager->getResults();
/*********************************************/
$browser->info("\n \n 3 test of sub-category action pages \n");
$browser->get('/'.$category->getTranslit().'/'.$sub_cat->getTranslit());
$browser->with('request')->begin()->
	isParameter('module', 'category')->
    isParameter('action', 'subCat')->
    isParameter('cat', $category->getTranslit())->
    isParameter('translit', $sub_cat->getTranslit())->
    end();
$browser->with('response')->begin()->
	isStatusCode(200)->
	end();
$n++;	    
$browser->info("\n \n 3.".$n." all 5 top menu links from ".$category->getTranslit()." page are clickable \n");        
foreach($cats as $cat)
{
	$browser->click($cat->getName());
	$browser->with('request')->begin()->
	   	isParameter('module', 'category')->
    	isParameter('action', 'cat')->
    	isParameter('translit', $cat->getTranslit())->
    	end();
   	$browser->with('response')->begin()->
		isStatusCode(200)->
		end();
	$browser->get('/'.$category->getTranslit().'/'.$sub_cat->getTranslit());
}
$browser->click("контакты");
$browser->with('request')->begin()->
   	isParameter('module', 'category')->
   	isParameter('action', 'kontakty')->
   	end();
$browser->with('response')->begin()->
	isStatusCode(200)->
	end();
$browser->get('/'.$category->getTranslit().'/'.$sub_cat->getTranslit());	
$browser->click("главная");
$browser->with('request')->begin()->
   	isParameter('module', 'category')->
   	isParameter('action', 'index')->
   	end();
$browser->with('response')->begin()->
	isStatusCode(200)->
	end();
$browser->get('/'.$category->getTranslit().'/'.$sub_cat->getTranslit());
$n++;
$browser->info(" \n \n 3.".$n." page includes: \n
- ".$maxSubCat." items \n 
- 1 title of sub_cat with proper content \n
- 1 pagination desc \n
- 1 pagination description \n
- 1 pagination buttons panel \n");
$browser->with('response')->begin()->
	checkElement('.cat',1)->
	checkElement('.cat',$sub_cat->getName().":")->	
	checkElement('.sub_cat .item',$maxSubCat)->
	checkElement('.pagination_desc',1)->
	checkElement('.pagination_desc span',1)->
	checkElement('.pagination_desc .pagination',1)->
	end();
$n++;	
$browser->info(" \n \n 3.".$n." items test: \n
	- cosist of 1 href within 1 img inside and 1 name \n
	- each element contains proper value \n
	- link is clickable \n
	");
function itemTests($browser,$category,$sub_cat,$objects)
{
	$i=1;
	foreach($objects as $object)
	{
		$browser->with('response')->begin()->
			checkElement('#item'.$i.' a',1)->
			checkElement('#item'.$i.' a img',1)->
			checkElement('#item'.$i.' a img[src='.$object->getIcon().']',true)->
			checkElement('#item'.$i.' .name',1)->
			checkElement('#item'.$i.' .name',$object->Prod->getFirst()->getName())->
			end();
		$browser->click('#item'.$i.' a');
		$browser->with('request')->begin()->
			isParameter('module','object')->
			isParameter('action','showObject')->
			isParameter('cat',$category->getTranslit())->
			isParameter('sub_cat',$sub_cat->getTranslit())->
			isParameter('obj_id',$object->getId())->
			end();
		$browser->with('response')->begin()->
			isStatusCode(200)->
			end();
		$browser->get('/'.$category->getTranslit().'/'.$sub_cat->getTranslit());
		$i++;		
	}
}
function paginationDesc($browser,$category,$sub_cat,$objects,$maxSubCat,$pager)
{	
	if(!$page=$browser->getRequest()->getParameter('page'))
		$page=1;
	$pager->setPage($page);	
	$text="всего ".count($pager)." , страница, ";
	$text= ($pager->haveToPaginate())?$text.$pager->getPage().'/'.$pager->getLastPage(): $text.'1/1';	
}
paginationDesc($browser,$category,$sub_cat,$objects,$maxSubCat,$pager);
//itemTests($browser,$category,$sub_cat,$objects);
			