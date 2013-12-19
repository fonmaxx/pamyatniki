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
$pager->setPage(1);
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
$browser->info("\n \n 3.".$n." all 5 top menu links and map-link from ".$category->getTranslit().'/'.$sub_cat->getTranslit()." page are clickable \n");        
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
	$browser->click("показать на карте");
	$browser->with('request')->begin()->
    isParameter('module', 'category')->
    isParameter('action', 'kontakty')->
    end();
    $browser->with('response')->begin()->
	isStatusCode(200)->
	end();
$browser->get('/'.$category->getTranslit().'/'.$sub_cat->getTranslit());	
$n++;
$browser->info(" \n \n 3.".$n." page includes: \n
- ".$maxSubCat." items \n 
- 1 title of sub_cat with proper content \n
- 1 pagination buttons panel \n");
$browser->with('response')->begin()->
	checkElement('.cat',1)->
	checkElement('.cat',$sub_cat->getName().":")->	
	checkElement('.sub_cat .item',$maxSubCat)->
	checkElement('.pagination',1)->
	end();
$n++;	
$browser->info(" \n \n 3.".$n." items test: \n
	- consist of 1 href within 1 img inside and 1 name \n
	- each element contains proper value \n
	- link is clickable \n
	");
function itemTests($browser,$category,$sub_cat,$objects,$url)
{
	$i=1;
	foreach($objects as $object)
	{
		$browser->with('response')->begin()->
			checkElement('#item'.$i.' a',1)->
			checkElement('#item'.$i.' a img',1)->
			checkElement('#item'.$i.' a img[src='.$object->getIcon().']',true)->
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
		$browser->get($url);
		$i++;		
	}
}
function pagination($browser,$category,$sub_cat,$objects,$maxSubCat,$pager)
{	
	$page=($browser->getRequest()->getParameter('page'))?$browser->getRequest()->getParameter('page'):1;
	$pager->setPage($page);	
	$count=intval(ceil(count($pager)/$maxSubCat));
	$page=intval($page);
	var_dump($count);
	var_dump($page);
	$numOfBut=($count<5)?$count:5;
	$url=url_for('sub_category',array(
						'cat'=>$sub_cat->GranitCat->getTranslit(),
						'translit'=>$sub_cat->getTranslit()
						),true);
						
	$left_url=$url.'?page='.$pager->getPreviousPage();
	$right_url=$url.'?page='.$pager->getNextPage();					
	$btn=intval(Support::getRandBtn($page,$count));
	var_dump($btn);
	$browser->with('response')->begin()->
	checkElement('.pagination',1)->
	checkElement('.pagination .nav_href .nav_left',1)->
	checkElement('.pagination a[href="'.$left_url.'"]',true)->	
	checkElement('.pagination .nav_href .nav_right',1)->
	checkElement('.pagination a[href="'.$right_url.'"]',true)->	
	checkElement('.nav_button',$numOfBut)->
	checkElement('.nav_active',1)->
	click("#pag_btn".$btn)->end();
	$browser->with('request')->begin()->
			isParameter('module', 'category')->
    		isParameter('action', 'subCat')->
    		isParameter('cat', $category->getTranslit())->
    		isParameter('translit', $sub_cat->getTranslit())->
    		isParameter('translit', $sub_cat->getTranslit())->
    		isParameter('page', $btn)->
    		end();
	$browser->with('response')->begin()->
		isStatusCode(200)->
		end();
		
}
$url='/'.$category->getTranslit().'/'.$sub_cat->getTranslit();
itemTests($browser,$category,$sub_cat,$objects,$url);
$n++;	
$browser->info(" \n \n 3.".$n." pagination test: \n
	- consist of 1 href prev and 1 href next with prope href values \n
	- proper buttons number \n
	- 1 active btn \n
	- randome btn link is clickable \n
	");
pagination($browser,$category,$sub_cat,$objects,$maxSubCat,$pager);
$n++;
$count=intval(ceil(count($pager)/$maxSubCat));
$but=Support::getRandBtn($page,$count);	
$pager->setPage($but);
$pager->init();
$objects=$pager->getResults();
$browser->info(" \n \n 3.".$n." pagination and items tests are ok on randome ".$but." page \n ");
var_dump($but);
$browser->get('/'.$category->getTranslit().'/'.$sub_cat->getTranslit().'?page='.$but);
$url='/'.$category->getTranslit().'/'.$sub_cat->getTranslit().'?page='.$but;
itemTests($browser,$category,$sub_cat,$objects,$url);
pagination($browser,$category,$sub_cat,$objects,$maxSubCat,$pager);