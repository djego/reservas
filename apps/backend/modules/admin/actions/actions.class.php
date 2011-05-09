<?php

/**
 * admin actions.
 *
 * @package    sf_sandbox
 * @subpackage admin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminActions extends sfActions {

  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request) {
    $mig_city = Migration::migCity();
    $mig_hotel = Migration::migHotel();
    $mig_desc = Migration::migDescriptionHotelTypes();
    $mig_room_photo = Migration::migRoomPhoto();
  }


}
