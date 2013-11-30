<?php

/**
 * photo.
 *
 * @package    granit
 * @subpackage photo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class photoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->photos = Doctrine_Core::getTable('GranitPhoto')
      ->createQuery('a')
      ->execute();
  }
 }
