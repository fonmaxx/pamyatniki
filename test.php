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


$q=Doctrine_Core::getTable('GranitProduction')->getProdObjects()->execute()->getFirst();
	//	$sub_cat=$q->Sub_cat[4];
		//$res=$sub_cat->getObjects();
print_r($q->getPhotoNum());
//$asd=(Support::img_resize($src,$dest,530,530))?true:false;
/*
$src="d:/source/6.jpg";
$dest=dirname(__FILE__)."/web/images/sample.jpg";
$icon=dirname(__FILE__)."/web/images/default.jpg";
Support::img_resize($src,$dest,530,530);
Support::img_resize($src,$icon,194,194);		
*/	
?>