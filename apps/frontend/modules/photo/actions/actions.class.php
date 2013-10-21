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
    $this->granit_sub_infs = Doctrine_Core::getTable('GranitSub_inf')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->granit_sub_inf = Doctrine_Core::getTable('GranitSub_inf')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->granit_sub_inf);
  }

 }
