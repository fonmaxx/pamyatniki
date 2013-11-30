<?php
$_dir = realpath(dirname(__FILE__));

// configuration
require_once dirname(__FILE__).'/config/ProjectConfiguration.class.php';
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
new sfDatabaseManager($configuration);

// autoloader
$autoload = sfSimpleAutoload::getInstance(sfConfig::get('sf_cache_dir').'/project_autoload.cache');
$autoload->loadConfiguration(sfFinder::type('file')->name('autoload.yml')->in(array(
		sfConfig::get('sf_symfony_lib_dir').'/config/config',
		sfConfig::get('sf_config_dir'),
)));
$autoload->register();
///////////////////////////////////////
$context=sfContext::createInstance($configuration);
$configuration->loadHelpers(array('Tag','Url'));
//////////////////////////////////////////////////
$profiler = new Doctrine_Connection_Profiler();
$conn = Doctrine_Manager::connection();
$conn->setListener($profiler);
////////////////////////////////////////


//$q=Doctrine_Core::getTable('GranitCat')->getCats()->getFirst();
	//	$sub_cat=$q->Sub_cat[4];
		//$res=$sub_cat->getObjects();
//$options=array('obj_id'=>1);
//$sub=Doctrine_Core::getTable('GranitSub_cat')->getSubCat($options);
//$obj=Doctrine_Core::getTable('GranitObject')->showObject($options);

		//print_r(sfConfig::get('sf_test_dir').'\bootstrap\doctrine.php');
		
$dom='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>главная страница</title>
<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />
</head>

<body>
<div id="global">
<div id="header">
  <div id="top">ПП Кравченко</br>
        изготовление и установка памятников, надгробных плит
  </div>
</div>
<div id="conteiner">
  <div id="banner">
    Памятники любой сложности из гранита, мрамора и других материалов, г Житомир
    ksmers@ukr.net (097)529 08 90   (063)327 71 38   (095)899 09 68
  </div>
    <div id="top_menu">
        <span class="top_menu"><a href="http://localhost/index.php/">главная</a></span>
        <span class="top_menu"><a href="http://localhost/index.php/produkciya">продукция</a></span>
        <span class="top_menu"><a href="http://localhost/index.php/uslugi">услуги</a></span>
        <span class="top_menu"><a href="http://localhost/index.php/informaciya">информация</a></span>
        <span class="top_menu"><a href="/index.php/kontakty">Контакты</a></span>
  </div>
  <div id="main">
    <div class="content">
                          <h2 class="cat"><l>п</l>родукция:</h2>
        <span class="subscribe">предлогаем следующую продукцию
</span>
                <ul class="list">

                                        <li>
                <div class="sub_cat">
                                                                <a class="" href="http://localhost/index.php/produkciya/odinarnye">
                                <p>одинарные</p>
                        </a>
                                        <div class="item">
   <a href="http://localhost/index.php/produkciya/odinarnye/1">
        <img src="/photo/1/icon/1.jpg" alt="памятник№1" />
   </a>
   <div class="name">памятник№1</div>
</div>
<div class="item">
   <a href="http://localhost/index.php/produkciya/odinarnye/2">
        <img src="/photo/2/icon/5.jpg" alt="памятник№2" />
   </a>
   <div class="name">памятник№2</div>
</div>
<div class="item">
   <a href="http://localhost/index.php/produkciya/odinarnye/3">
        <img src="/photo/3/icon/9.jpg" alt="памятник№3" />
   </a>
   <div class="name">памятник№3</div>
</div>
                                                                                                                <a class="all" href="http://localhost/index.php/produkciya/odinarnye">показать все...</a>
                                                </div>
                </li>
                                                <li>
                <div class="sub_cat">
                                                                <a class="" href="http://localhost/index.php/produkciya/dvoynye">
                                <p>двойные</p>
                        </a>
                                        <div class="item">
   <a href="http://localhost/index.php/produkciya/dvoynye/5">
        <img src="/photo/5/icon/17.jpg" alt="памятник№5" />
   </a>
   <div class="name">памятник№5</div>
</div>
<div class="item">
   <a href="http://localhost/index.php/produkciya/dvoynye/6">
        <img src="/photo/6/icon/21.jpg" alt="памятник№6" />
   </a>
   <div class="name">памятник№6</div>
</div>
<div class="item">
   <a href="http://localhost/index.php/produkciya/dvoynye/7">
        <img src="/photo/7/icon/25.jpg" alt="памятник№7" />
   </a>
   <div class="name">памятник№7</div>
</div>
                                                                                                                <a class="all" href="http://localhost/index.php/produkciya/dvoynye">показать все...</a>
                                                </div>
                </li>
                                                <li>
                <div class="sub_cat">
                                                                <a class="" href="http://localhost/index.php/produkciya/memorial-nye-kompleksy">
                                <p>мемориальные комплексы</p>
                        </a>
                                        <div class="item">
   <a href="http://localhost/index.php/produkciya/memorial-nye-kompleksy/9">
        <img src="/photo/9/icon/33.jpg" alt="памятник№9" />
   </a>
   <div class="name">памятник№9</div>
</div>
<div class="item">
   <a href="http://localhost/index.php/produkciya/memorial-nye-kompleksy/10">
        <img src="/photo/10/icon/37.jpg" alt="памятник№10" />
   </a>
   <div class="name">памятник№10</div>
</div>
<div class="item">
   <a href="http://localhost/index.php/produkciya/memorial-nye-kompleksy/11">
        <img src="/photo/11/icon/41.jpg" alt="памятник№11" />
   </a>
   <div class="name">памятник№11</div>
</div>
                                                                                                                <a class="all" href="http://localhost/index.php/produkciya/memorial-nye-kompleksy">показать все...</a>
                                                </div>
                </li>
                                                <li>
                <div class="sub_cat">
                                                                <a class="" href="http://localhost/index.php/produkciya/prochee">
                                <p>прочее</p>
                        </a>
                                        <div class="item">
   <a href="http://localhost/index.php/produkciya/prochee/13">
        <img src="/photo/13/icon/49.jpg" alt="памятник№13" />
   </a>
   <div class="name">памятник№13</div>
</div>
<div class="item">
   <a href="http://localhost/index.php/produkciya/prochee/14">
        <img src="/photo/14/icon/53.jpg" alt="памятник№14" />
   </a>
   <div class="name">памятник№14</div>
</div>
<div class="item">
   <a href="http://localhost/index.php/produkciya/prochee/15">
        <img src="/photo/15/icon/57.jpg" alt="памятник№15" />
   </a>
   <div class="name">памятник№15</div>
</div>
                                                                                                                <a class="all" href="http://localhost/index.php/produkciya/prochee">показать все...</a>
                                                </div>
                </li>
                                        </ul>
          <h2 class="cat"><l>у</l>слуги:</h2>
        <span class="subscribe">предоставляем следующие услуги
</span>
                <ul class="list">

                                        <li>
                <div class="sub_cat">
                                        <a href="http://localhost/index.php/uslugi/uslugi/17">
                <p>установка гранитных памятников, надгробных плит
и прочих элементов...
</p>
        </a>
        <a href="http://localhost/index.php/uslugi/uslugi/18">
                <p>художественное оформление гранитных памятников: надписи,
портреты прочие графические элементы...
</p>
        </a>
        <a href="http://localhost/index.php/uslugi/uslugi/19">
                <p>доставка заказчику
</p>
        </a>
                                                                <a class="all" href="http://localhost/index.php/uslugi/uslugi">показать все...</a>
                                                </div>
                </li>
                                        </ul>
          <h2 class="cat"><l>и</l>нформация:</h2>
        <span class="subscribe">полезная информация
</span>
                <ul class="list">

                                        <li>
                <div class="sub_cat">
                                        <a href="http://localhost/index.php/informaciya/informaciya/20">
                <p>сроки выполнения заказа...
</p>
        </a>
        <a href="http://localhost/index.php/informaciya/informaciya/21">
                <p>документы при оформлении заказа...
</p>
        </a>
        <a href="http://localhost/index.php/informaciya/informaciya/74">
                <p>документы при оформлении заказа...
</p>
        </a>
                                                                <a class="all" href="http://localhost/index.php/informaciya/informaciya">показать все...</a>
                                                </div>
                </li>
                                        </ul>
          <h2 class="cat"><l>К</l>онтакты:</h2>
          <span class="subscribe">Мы находимся по следующему адресу: городское кладбище "Дружба"(контактная инфа)
      </span>
          <p>контактные телефоны:</p>
      <ul>
        <li>
                (097)529 08 90
        </li>
                <li>
        (063)327 71 38
        </li>
                <li>
                (095)899 09 68
        </li>
      </ul>
          <p>электронный ящик</p>
          <ul>
        <li>
        ksmers@ukr.net
        </li>
      </ul>     </div>
  </div>
</div>
<div id="footer">
  <div id="bot">
    <div class="footer">
        <p><l>ч</l>асы работы</p>
                <ul id="left">
                <li>ежедневно с 9 до 18</li>
                        <li>без выходных</li>
                        <li>праздники</li>
        </ul>
    </div>
    <div class="footer">
                <p><l>м</l>естоположение</p>
        <ul id="right">
                        <li>городское кладбище "дружба"(адрес)</li>
                        <li>показать на карте(гугл мепс)</li>
        </ul>
    </div>
  </div>
</div>
</div>
</body>
</html>
';
$name='продукция';
if ($name instanceof $dom)
{
echo "sadfdsafsdf";
}
		//$sub_cat->Cat=$q->copy(false);
		//print_r($q->toArray());
    	//$q->setName(null);
		//print_r($q[0]->getCat_b());
    	//$s=$q[2]->Sub_cat[0]->getObjects(sfConfig::get('app_max_objects_on_homepage'));
    	//$asd=$s[0]->getIcon();
		//print_r(url_for('category',$q,true));
//$s=$q->toArray();
//print_r(substr('abcd',1));

/*		foreach ($profiler as $event) {
			echo "\n \n".$event->getQuery() . "\n";
		}
*/
?>