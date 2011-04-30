<?php

/**
 * @author diegohome
 *
 */
class Migration {

	
  public static function migCity() {
  	$data = new fwoData();  	
    $lst_city = $data->fetchRcp('bookings.getCities', 'countrycodes=ad&languagecodes=es');
    foreach ($lst_city as $city){
	  $rs_city = new adCity();
	  $rs_city->setId($city['city_id']);
	  $rs_city->setLatitude($city['latitude']);
	  $rs_city->setLongitude($city['longitude']);
	  $rs_city->setName($city['name']);
	  $rs_city->setNrHotels($city['nr_hotels']);
	  $rs_city->save();
	}
  }
}
