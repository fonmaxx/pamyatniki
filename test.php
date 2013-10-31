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
$options=array('obj_id'=>1);
//$sub=Doctrine_Core::getTable('GranitSub_cat')->getSubCat($options);
$obj=Doctrine_Core::getTable('GranitObject')->showObject($options);

		print_r($obj->toArray());
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