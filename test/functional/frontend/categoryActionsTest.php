<?php
include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new GranitTestFunctional(new sfBrowser());
$browser->get('/');
$browser->click("главная");