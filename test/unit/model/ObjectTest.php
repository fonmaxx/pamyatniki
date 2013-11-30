<?php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');
 
$t = new lime_test(6,new lime_output_color());
$objP=Doctrine_Core::getTable('GranitObject')->showObject(array('obj_id'=>1))->getFirst();
$objI=Doctrine_Core::getTable('GranitObject')->showObject(array('obj_id'=>17))->getFirst();
$objD=Doctrine_Core::getTable('GranitObject')->showObject(array('obj_id'=>66))->getFirst();

$t->diag('Object->getIcon() testing');
$t->is($objP->getIcon(),'/photo/1/icon/1.jpg','::getIcon() on Prod');
$t->is($objI->getIcon(),'/photo/17/icon/65.jpg','::getIcon() on Inf');
$t->is($objD->getIcon(),'/images/'.sfConfig::get('app_default_icon'),'::getIcon() on Default');

$t->diag('Object->getMainPhoto() testing');
$t->is($objP->getMainPhoto(),'/photo/1/1.jpg','::getIcon() on Prod');
$t->is($objI->getMainPhoto(),'/photo/17/65.jpg','::getIcon() on Inf');
$t->is($objD->getMainPhoto(),'/images/'.sfConfig::get('app_default_photo'),'::getIcon() on Default');
?>