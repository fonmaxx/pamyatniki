<?php
include(dirname(__FILE__).'/../../bootstrap/functional.php');
$browser = new GranitTestFunctional(new sfBrowser());
$cats=$browser->getCats();
$browser->info("\n \n 2 test of category action pages \n");
$n=0;
$maxSubCat=sfConfig::get('app_objects_on_cat_sub_cat');

foreach($cats as $category )
{
	
	$browser->get('/'.$category->getTranslit());
	$browser->with('request')->begin()->
    	isParameter('module', 'category')->
    	isParameter('action', 'cat')->
    	end();
	$browser->with('response')->begin()->
		isStatusCode(200)->
		end();
	$n++;	    
	$browser->info("\n \n 2.".$n." all 5 top menu links from ".$category->getTranslit()." page are clickable \n");        
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
		$browser->get('/'.$category->getTranslit());
	}
	$browser->click("контакты");
	$browser->with('request')->begin()->
    	isParameter('module', 'category')->
    	isParameter('action', 'kontakty')->
    	end();
    $browser->with('response')->begin()->
		isStatusCode(200)->
		end();
	$browser->get('/'.$category->getTranslit());	
	$browser->click("главная");
	$browser->with('request')->begin()->
    	isParameter('module', 'category')->
    	isParameter('action', 'index')->
    	end();
    $browser->with('response')->begin()->
		isStatusCode(200)->
		end();
	$browser->get('/'.$category->getTranslit());	
}
foreach($cats as $cat)
{
	$n++;
	$browser->get('/'.$cat->getTranslit());
	$browser->info(" \n \n 2.".$n." ".$cat->getTranslit()." tests \n");
	$i=1;
	if($cat->Sub_cat->getFirst()->getObjectsType()=="prod")
	{
		$browser->info(" \n \n 2.".$n.".".$i." all sub_cat has 'show-all' and 'sub_cat' links \n");		
		$i++;
		$browser->with('response')->begin()->
		checkElement('.sub_cat .all',$cat->Sub_cat->count())->
		checkElement('.sub_cat .sub_cat_link',$cat->Sub_cat->count())->
		end();
		$browser->info(" \n \n 2.".$n.".".$i." all sub_cat has ".sfConfig::get('app_objects_on_cat_sub_cat')." items and proper images \n");		
		$i++;
		foreach($cat->Sub_cat as $sub_cat)
		{
			$objs=$sub_cat->getObjects(sfConfig::get('app_objects_on_cat_sub_cat'));
			$browser->with('response')->begin()->
			checkElement("#".$sub_cat->getTranslit()." .item a img",sfConfig::get('app_objects_on_cat_sub_cat'))->
			end();
			foreach($objs as $obj)
			{
				$browser->with('response')->begin()->
				checkElement("#".$sub_cat->getTranslit()." .item a img[src=".$obj->getIcon()."]",true)->
				end();
			}
		}
		$browser->info(" \n \n 2.".$n.".".$i." all sub_cat item links are clickable \n");		
		$i++;
		foreach($cat->Sub_cat as $sub_cat)
		{	
			$browser->click('#'.$sub_cat->getTranslit()." .item a",array(),array(
			'position'=>rand(1,sfConfig::get('app_objects_on_cat_sub_cat'))));
			$browser->with('request')->begin()->
    		isParameter('module', 'object')->
    		isParameter('action', 'showObject')->
    		isParameter('cat', $cat->getTranslit())->
    		isParameter('sub_cat', $sub_cat->getTranslit())->
    		end();
    		$browser->with('response')->begin()->
			isStatusCode(200)->
			end();
			$browser->get('/'.$cat->getTranslit());
		}
		$browser->info(" \n \n 2.".$n.".".$i." all sub_cat links are clickable \n");		
		$i++;
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
		$browser->get('/'.$cat->getTranslit());
		}
		$browser->info(" \n \n 2.".$n.".".$i." all sub_cat 'show_all' links are clickable \n");		
		$i++;
		foreach($cat->Sub_cat as $sub_cat)
		{	
			$browser->click('#'.$sub_cat->getTranslit()." .all");
			$browser->with('request')->begin()->
    		isParameter('module', 'category')->
    		isParameter('action', 'subCat')->
    		isParameter('cat', $cat->getTranslit())->
    		isParameter('translit', $sub_cat->getTranslit())->
    		end();
    		$browser->with('response')->begin()->
			isStatusCode(200)->
			end();
			$browser->get('/'.$cat->getTranslit());
		}
	}
	else 
	{
		$browser->info(" \n \n 2.".$n.".".$i." inf-page includes ".$maxSubCat." links and objects \n");		
		$i++;
		$browser->with('response')->begin()->
		checkElement('.inf_link',sfConfig::get('app_objects_on_cat_sub_cat'))->
		checkElement('.inf_full',sfConfig::get('app_objects_on_cat_sub_cat'))->
		end();
		$browser->info(" \n \n 2.".$n.".".$i." inf-page includes 1 cat title, 1 subscribe with proper text \n");		
		$i++;
		$browser->with('response')->begin()->
		checkElement('.cat',1)->
		checkElement('.subscribe',1)->
		checkElement('.subscribe', $cat->getShortcart())->
		end();
		$browser->info(" \n \n 2.".$n.".".$i." inf object consist of 1 proper img, link on full info and short-text. Link is clickable \n");		
		$i++;
		$objects=$cat->Sub_cat->getFirst()->getObjects(sfConfig::get('app_objects_on_cat_sub_cat'));
		$j=0;
		foreach($objects as $object)
		{
			$j++;
			$browser->with('response')->begin()->
			checkElement('#inf_full'.$j.' a',1)->
			checkElement('#inf_full'.$j.' .plain_text',1)->
			checkElement('#inf_full'.$j.' .plain_text img',1)->
			checkElement('#inf_full'.$j.' .plain_text span',1)->
			checkElement('#inf_full'.$j.' .plain_text span',$object->Inf->getFirst()->getShortcart())->
			checkElement('#inf_full'.$j.' .plain_text img[src='.$object->getIcon().']',true)->
			end();
			$browser->click('#inf_full'.$j.' a');
			$browser->with('request')->begin()->
    		isParameter('module', 'object')->
    		isParameter('action', 'showObject')->
    		isParameter('cat', $cat->getTranslit())->
    		isParameter('sub_cat', $cat->Sub_cat->getFirst()->getTranslit())->
    		isParameter('obj_id',$object->getId())->
    		end();
    		$browser->with('response')->begin()->
			isStatusCode(200)->
			end();
			$browser->get('/'.$cat->getTranslit());
		}
	}
}