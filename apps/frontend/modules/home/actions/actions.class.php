<?php

/**
 * home actions.
 *
 * @package    sf_sandbox
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions {

  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function  preExecute() {
    $this->data = new fwoData();
  }
  public function executeIndex(sfWebRequest $request) {
    // $this->forward('default', 'module');
//    $this->data = new fwoData();
    $lst_ciudades = $this->data->fetchRcp('bookings.getCities', 'countrycodes=ad');
    $this->lst_ciudad = $lst_ciudades;


  }
  public function executeCity(sfWebRequest $request) {
    //echo $request->getParameter('id');
    
  }
}
