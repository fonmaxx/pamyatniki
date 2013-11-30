<?php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');
 
$t = new lime_test(2,new lime_output_color());
$obj= new GranitCat;
$obj->setName('абвгд');
$t->diag("#Cat :: getCat_f and ::getCat_b");
$t->is($obj->getCat_f(),'а',':: getCat_f() test');
$t->is($obj->getCat_b(),'бвгд',':: getCat_b() test');