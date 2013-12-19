<?php 
include(dirname(__FILE__).'/../../bootstrap/functional.php');
$browser = new GranitTestFunctional(new sfBrowser());
$obj_id=rand(1,80);
$cats=$browser->getCats();
$object=Doctrine_Core::getTable('GranitObject')->showObject(array('obj_id'=>$obj_id))->getFirst();
$sub_cat=$object->GranitSub_cat;
$photo=$object->Photo;
$category=$sub_cat->GranitCat;
$url='/'.$category->getTranslit().'/'.$sub_cat->getTranslit().'/'.$object->getId();
/*******************************************************************************************/
$n=1;
$browser->info("\n \n 4 test of object-action pages \n");
$browser->get($url);
$browser->with('request')->begin()->
	isParameter('module', 'object')->
    isParameter('action', 'showObject')->
    isParameter('cat', $category->getTranslit())->
    isParameter('sub_cat', $sub_cat->getTranslit())->
    isParameter('obj_id', $object->getId())->
    end();
$browser->with('response')->begin()->
	isStatusCode(200)->
	end();
$n++;	    
$browser->info("\n \n 4.".$n." all 5 top menu links and map-link from object`s page are clickable \n");        
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
	$browser->get($url);
}
$browser->click("контакты");
$browser->with('request')->begin()->
   	isParameter('module', 'category')->
   	isParameter('action', 'kontakty')->
   	end();
$browser->with('response')->begin()->
	isStatusCode(200)->
	end();
$browser->get($url);	
$browser->click("главная");
$browser->with('request')->begin()->
   	isParameter('module', 'category')->
   	isParameter('action', 'index')->
   	end();
$browser->with('response')->begin()->
	isStatusCode(200)->
	end();
$browser->get($url);
	$browser->click("показать на карте");
	$browser->with('request')->begin()->
    isParameter('module', 'category')->
    isParameter('action', 'kontakty')->
    end();
    $browser->with('response')->begin()->
	isStatusCode(200)->
	end();
$browser->get($url);	
/******************************PROD_OBJ_TESTS*****************************/
/**************with photos*****************/
$obj_id=rand(1,16);
$object=Doctrine_Core::getTable('GranitObject')->showObject(array('obj_id'=>$obj_id))->getFirst();
$prod=$object->Prod->getFirst();	
$sub_cat=$object->GranitSub_cat;
$photo=$object->Photo;
$category=$sub_cat->GranitCat;
$url='/'.$category->getTranslit().'/'.$sub_cat->getTranslit().'/'.$object->getId();
/********************************************/
$n++;	 
$i=1;   
$browser->info("\n \n 4.".$n.".".$i."Prod-object with photos test  \n");
$browser->info("\n 
	- 1 back link \n
	- 1 prod-item div with proper content \n
	- 1 fetures div with proper content \n
	- 1 gall_feed with proper number of icons \n
	- back link is clickable \n");
$browser->get($url);
$browser->with('response')->begin()->
	isStatusCode(200)->
	checkElement('.back',1)->
	checkElement('.prod_item',1)->
	checkElement('.prod_item img',1)->
	checkElement('.prod_item img[src="'.$object->getMainPhoto().'"]',1)->
	checkElement('.fetures',1)->
	checkElement('.prod_item img',1)->
	checkElement('.fetures li span',$prod->getMaterial(),array('position'=>0))->
	checkElement('.fetures li span',$prod->getPrice(),array('position'=>1))->
	end();
$j=0;	
foreach($prod->Complect as $complect)
{
	$browser->with('response')->begin()->
		checkElement('#complect li span',$complect->getName(),array('position'=>$j))->
		end();
		$j++;
}
$browser->with('response')->begin()->
	checkElement('.gall_feed',1)->
	checkElement('.small_photo',$photo->count())->
	checkElement('.small_photo a',$photo->count())->
	checkElement('.small_photo a img',$photo->count())->
	end();	
foreach($photo as $p)
{
	$browser->with('response')->begin()->
		checkElement('.small_photo a[href="'.$p->getPhoto().'"]',true)->
		checkElement('.small_photo img[src="'.$p->getIcon().'"]',true)->
		end();	
}
$browser->click('.back');	
$browser->with('request')->begin()->
	isParameter('module', 'category')->
   	isParameter('action', 'subCat')->
   	isParameter('cat', $category->getTranslit())->
   	isParameter('translit', $sub_cat->getTranslit())->
   	end();
$browser->with('response')->begin()->
	isStatusCode(200)->
	end();
/*******prod no photo***********/
$obj_id=rand(22,65);
$object=Doctrine_Core::getTable('GranitObject')->showObject(array('obj_id'=>$obj_id))->getFirst();
$prod=$object->Prod->getFirst();	
$sub_cat=$object->GranitSub_cat;
$photo=$object->Photo;
$category=$sub_cat->GranitCat;
$url='/'.$category->getTranslit().'/'.$sub_cat->getTranslit().'/'.$object->getId();
/********************************************/	 
$i++;   
$browser->info("\n \n 4.".$n.".".$i."Prod-object with photos test  \n");
$browser->info("\n 
	- 1 back link \n
	- 1 prod-item div with proper content \n
	- 1 fetures div with proper content \n
	- no gall_feed with proper number of icons \n
	- back link is clickable \n");
$browser->get($url);
$browser->with('response')->begin()->
	isStatusCode(200)->
	checkElement('.back',1)->
	checkElement('.prod_item',1)->
	checkElement('.prod_item img',1)->
	checkElement('.prod_item img[src="'.$object->getMainPhoto().'"]',1)->
	checkElement('.fetures',1)->
	checkElement('.prod_item img',1)->
	checkElement('.fetures li span',$prod->getMaterial(),array('position'=>0))->
	checkElement('.fetures li span',$prod->getPrice(),array('position'=>1))->
	end();
$j=0;	
foreach($prod->Complect as $complect)
{
	$browser->with('response')->begin()->
		checkElement('#complect li span',$complect->getName(),array('position'=>$j))->
		end();
		$j++;
}
$browser->with('response')->begin()->
	checkElement('.gall_feed',false)->
	checkElement('.small_photo',false)->
	checkElement('.small_photo a',false)->
	checkElement('.small_photo a img',false)->
	end();	
$browser->click('.back');	
$browser->with('request')->begin()->
	isParameter('module', 'category')->
   	isParameter('action', 'subCat')->
   	isParameter('cat', $category->getTranslit())->
   	isParameter('translit', $sub_cat->getTranslit())->
   	end();
$browser->with('response')->begin()->
	isStatusCode(200)->
	end();
/******************************INF OBJECT***********************************/
/**************with photos*****************/
$obj_id=rand(17,21);
$object=Doctrine_Core::getTable('GranitObject')->showObject(array('obj_id'=>$obj_id))->getFirst();
$inf=$object->Inf->getFirst();	
$sub_cat=$object->GranitSub_cat;
$photo=$object->Photo;
$category=$sub_cat->GranitCat;
$url='/'.$category->getTranslit().'/'.$sub_cat->getTranslit().'/'.$object->getId();
/********************************************/
$n++;	 
$i=1;   
$browser->info("\n \n 4.".$n.".".$i."Prod-object with photos test  \n");
$browser->info("\n 
	- 1 back link \n
	- 1 img with proper content \n
	- proper content text \n
	- 1 gall_feed with proper number of icons \n
	- back link is clickable \n");
$browser->get($url);
$browser->with('response')->begin()->
	isStatusCode(200)->
	checkElement('.back',1)->
	checkElement('.inf_img',1)->
	checkElement('.inf_img img',1)->
	checkElement('.inf_img img[src="'.$object->getMainPhoto().'"]',true)->
	checkElement('.information .plain_text',1)->
	checkElement('.information .plain_text span',$inf->getContent())->
	checkElement('.gall_feed',1)->
	checkElement('.small_photo',$photo->count())->
	checkElement('.small_photo a',$photo->count())->
	checkElement('.small_photo a img',$photo->count())->
	end();
foreach($photo as $p)
{
	$browser->with('response')->begin()->
		checkElement('.small_photo a[href="'.$p->getPhoto().'"]',true)->
		checkElement('.small_photo img[src="'.$p->getIcon().'"]',true)->
		end();	
}
$browser->click('.back');	
$browser->with('request')->begin()->
	isParameter('module', 'category')->
   	isParameter('action', 'subCat')->
   	isParameter('cat', $category->getTranslit())->
   	isParameter('translit', $sub_cat->getTranslit())->
   	end();
$browser->with('response')->begin()->
	isStatusCode(200)->
	end();
/**********************no photo*************************************/
$obj_id=rand(66,80);
$object=Doctrine_Core::getTable('GranitObject')->showObject(array('obj_id'=>$obj_id))->getFirst();
$inf=$object->Inf->getFirst();	
$sub_cat=$object->GranitSub_cat;
$photo=$object->Photo;
$category=$sub_cat->GranitCat;
$url='/'.$category->getTranslit().'/'.$sub_cat->getTranslit().'/'.$object->getId();
/********************************************/	 
$i++;   
$browser->info("\n \n 4.".$n.".".$i."Prod-object with photos test  \n");
$browser->info("\n 
	- 1 back link \n
	- 1 img with proper content \n
	- proper content text \n
	- no gall_feed and no icons \n
	- back link is clickable \n");
$browser->get($url);
$browser->with('response')->begin()->
	isStatusCode(200)->
	checkElement('.back',1)->
	checkElement('.inf_img',1)->
	checkElement('.inf_img img',1)->
	checkElement('.inf_img img[src="'.$object->getMainPhoto().'"]',true)->
	checkElement('.information .plain_text',1)->
	checkElement('.information .plain_text span',$inf->getContent())->
	checkElement('.gall_feed',false)->
	checkElement('.small_photo',false)->
	checkElement('.small_photo a',false)->
	checkElement('.small_photo a img',false)->
	end();

$browser->click('.back');	
$browser->with('request')->begin()->
	isParameter('module', 'category')->
   	isParameter('action', 'subCat')->
   	isParameter('cat', $category->getTranslit())->
   	isParameter('translit', $sub_cat->getTranslit())->
   	end();
$browser->with('response')->begin()->
	isStatusCode(200)->
	end();	