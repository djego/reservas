<?php

/**
 * admin actions.
 *
 * @package    sf_sandbox
 * @subpackage admin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function  preExecute() {
    $this->data = new fwoData();
  }
  public function executeIndex(sfWebRequest $request)
  {
	$lst_city = $this->data->fetchRcp('bookings.getCities', 'countrycodes=ad&languagecodes=es');
	foreach ($lst_city as $city){
		$rs_city = new adCity();
		$rs_city->setId($city['city_id']);
		$rs_city->setLatitude($city['latitude']);
		$rs_city->setLongitude($city['longitude']);
		$rs_city->setName($city['name']);
		$rs_city->setNrHotels($city['nr_hotels']);
		$rs_city->save();
	}

//	$param="countrycodes=ad";
//    $lst_hoteles = $this->data->fetchRcp('bookings.getHotels', $param);
//    print_r($lst_hoteles);die();
    
  }
}
