<?php
include(dirname(__FILE__).'/unit.php');
 
$configuration = ProjectConfiguration::getApplicationConfiguration( 'frontend', 'test', true);
sfContext::createInstance($configuration);

new sfDatabaseManager($configuration);
$conn = Doctrine_Manager::connection();
/*
Doctrine_Core::DropDatabases($conn);
//Doctrine_Core::generateModelsFromYaml( sfConfig::get('sf_root_dir').'/config/doctrine/schema.yml', sfConfig::get('sf_root_dir') .'/lib/doctrine/models', array('env'=>'test'));
Doctrine_Core::createDatabases( $conn );
//Doctrine_Core::generateSqlFromModels( sfConfig::get('sf_root_dir') .'/lib/doctrine/models' );
Doctrine_Core::createTablesFromModels( sfConfig::get('sf_root_dir') .'/lib/doctrine/models' );
$opt=array(
	'data_fixtures_path'=>sfConfig::get('sf_test_dir').'/fixtures',
	'models_path'=>sfConfig::get('sf_root_dir') .'/lib/doctrine/models');
Doctrine_Core::loadData($opt);
*/
$optionsArray=array();

$argumentsArray=array();

$optionsArray[]="--all";

$optionsArray[]="--env='test'";

$optionsArray[]="--no-confirmation";

$task = new sfDoctrineBuildTask($configuration->getEventDispatcher(),

new sfFormatter());

$task->run($argumentsArray, $optionsArray);
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');
?>