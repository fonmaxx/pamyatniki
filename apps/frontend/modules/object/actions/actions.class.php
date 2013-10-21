<?php

/**
 * object actions.
 *
 * @package    granit
 * @subpackage object
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class objectActions extends sfActions
{
  public function executeShowObject(sfWebRequest $request)
  {
  	$this->object=$this->getRoute()->getObject();
  }
}
