<?php
class GranitTestFunctional extends sfTestFunctional
{
  public function loadData()
  {
    include(sfConfig::get('sf_test_dir').'\bootstrap\doctrine.php');
    return $this;
  }
  public function getCats()
  {
  return Doctrine_Core::getTable("GranitCat")->getCats();
  }

}