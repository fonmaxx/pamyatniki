<?php
include(dirname(__FILE__).'/../../bootstrap/functional.php');


$browser = new GranitTestFunctional(new sfBrowser());
$cats=$browser->getCats();
$browser->info("\n \n 1 test of home page \n");
$browser->get('/');
$browser->with('request')->begin()->
    isParameter('module', 'category')->
    isParameter('action', 'index')->
    end();
$browser->with('response')->begin()->
	isStatusCode(200)->
	end();    
$browser->info("\n \n 1.1 all 5 top menu links are clickable \n");        
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
	$browser->get('/');
}
$browser->click("контакты");
	$browser->with('request')->begin()->
    isParameter('module', 'category')->
    isParameter('action', 'kontakty')->
    end();
    $browser->with('response')->begin()->
	isStatusCode(200)->
	end();
$browser->get('/');	
$browser->click("главная");
	$browser->with('request')->begin()->
    isParameter('module', 'category')->
    isParameter('action', 'index')->
    end();
    $browser->with('response')->begin()->
	isStatusCode(200)->
	end();
$browser->info("\n \n 1.2 all sub_cat links are clickable \n");
$sub_cat_num=0;
foreach($cats as $cat)
{
	$sub_cat_num ++;
	if($cat->Sub_cat->count()>2)
	{
		$sub_cat_num --;
		foreach($cat->Sub_cat as $sub_cat)
		{
		$sub_cat_num ++;	
		$browser->click($sub_cat->getName());
		$browser->with('request')->begin()->
    	isParameter('module', 'category')->
    	isParameter('action', 'subCat')->
    	isParameter('cat', $cat->getTranslit())->
    	isParameter('translit', $sub_cat->getTranslit())->
    	end();
    	$browser->with('response')->begin()->
		isStatusCode(200)->
		end();
		$browser->get('/');
		}
	}
}
$browser->info(" \n \n 1.3 all sub_cat include 'show all' link \n");
$browser->with('response')->begin()->
	checkElement('.sub_cat .all',$sub_cat_num)->
	end();
$browser->info(" \n \n 1.4 all sub_cat includes only".sfConfig::get('app_max_objects_on_homepage')." items \n");
foreach($cats as $cat)
{	
	
	if($cat->Sub_cat->count()>2)
	{
		foreach($cat->Sub_cat as $sub_cat)
		{
			$browser->with('response')->begin()->
				checkElement('#'.$sub_cat->getTranslit()." .item",sfConfig::get('app_max_objects_on_homepage'))->
				end();
		}
	}
	else 
	{
		$browser->with('response')->begin()->
				checkElement('#'.$cat->getTranslit()." .inf_link",sfConfig::get('app_max_objects_on_homepage'))->
				end();
	}	
}
$browser->info(" \n \n 1.5 all item`s links are clickable \n ");	
foreach($cats as $cat)
{
	if($cat->Sub_cat->count()>2)
	{
		foreach($cat->Sub_cat as $sub_cat)
		{	
		$browser->click('#'.$sub_cat->getTranslit()." .item a",array(),array(
		'position'=>rand(1,sfConfig::get('app_max_objects_on_homepage'))));
		$browser->with('request')->begin()->
    	isParameter('module', 'object')->
    	isParameter('action', 'showObject')->
    	isParameter('cat', $cat->getTranslit())->
    	isParameter('sub_cat', $sub_cat->getTranslit())->
    	end();
    	$browser->with('response')->begin()->
		isStatusCode(200)->
		end();
		$browser->get('/');
		}
	}
	else 
	{
		$browser->click('#'.$cat->getTranslit()." .inf_link",array(),array(
		'position'=>rand(1,sfConfig::get('app_max_objects_on_homepage'))));
		$browser->with('request')->begin()->
    	isParameter('module', 'object')->
    	isParameter('action', 'showObject')->
    	isParameter('cat', $cat->getTranslit())->
    	isParameter('sub_cat', $cat->Sub_cat->getFirst()->getTranslit())->
    	end();
    	$browser->with('response')->begin()->
		isStatusCode(200)->
		end();
		$browser->get('/');
	}
}
$browser->info(" \n \n 1.6 map-link is clickable \n ");
$browser->click("показать на карте");
	$browser->with('request')->begin()->
    isParameter('module', 'category')->
    isParameter('action', 'kontakty')->
    end();
    $browser->with('response')->begin()->
	isStatusCode(200)->
	end();