<?php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');
 
$t = new lime_test(2,new lime_output_color());
$obj= new GranitPhoto;
$obj->setId(1);
$obj->setObj_id(2);
$t->diag("Photo :: getPhoto and ::getIcon");
$t->is($obj->getPhoto(),'/photo/2/1.jpg',':: getPhoto() test');
$t->is($obj->getIcon(),'/photo/2/icon/1.jpg',':: getIcon() test');