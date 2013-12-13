<?php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');
 
$t = new lime_test(2,new lime_output_color());
$sub_cat= new GranitSub_cat;
/*
6 подкатигорий, каждая своего типа.
в тестовых даных 1-4 типа "прод"
5-6 типа "инф"
*/
$sub_cat->setId(2);
$t->diag("#Sub_cat :: getObjectsType");
$t->is($sub_cat->getObjectsType(),'prod',':: getObjectsType()- "prod-type" test');
$sub_cat->setId(5);
$t->is($sub_cat->getObjectsType(),'inf',':: getObjectsType()- "inf-type" test');