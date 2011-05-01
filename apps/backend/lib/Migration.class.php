<?php

/**
 * @author diegohome
 *
 */
class Migration {

	
  public static function migCity() {
  	$data = new fwoData();  	
    $lst_city = $data->fetchRcp('bookings.getCities', 'countrycodes=ad&languagecodes=es');    
    $delete = Doctrine::getTable('adCity')->findAll()->delete();    
    foreach ($lst_city as $city){
	  $rs_city = new adCity();
	  $rs_city->setId($city['city_id']);
	  $rs_city->setLatitude($city['latitude']);
	  $rs_city->setLongitude($city['longitude']);
	  $rs_city->setName($city['name']);
	  $rs_city->setNrHotels($city['nr_hotels']);
	  $rs_city->save();
	}
	return true;
  }
  public static function migHotel() {
  	$data = new fwoData();
  	$ar_photo = self::obtenerImagesHotel(); 	
    $lst_hotel = $data->fetchRcp('bookings.getHotels', 'countrycodes=ad');    
    $delete = Doctrine::getTable('adHotel')->findAll()->delete(); 
//    print_r($lst_hotel);die();   
    foreach ($lst_hotel as $hotel){
	  $rs_hotel = new adHotel();
	  $rs_hotel->setId($hotel['hotel_id']);
	  $rs_hotel->setName($hotel['name']);
	  $rs_hotel->setAddress($hotel['address']);
	  $rs_hotel->setChkinFrom($hotel['checkin'][0]['from']);
	  $rs_hotel->setChkinTo($hotel['checkin'][0]['to']);
	  $rs_hotel->setChkoutFrom($hotel['checkout'][0]['from']);
	  $rs_hotel->setChkoutTo($hotel['checkout'][0]['to']);
	  $rs_hotel->setCity($hotel['city']);
	  $rs_hotel->setCityId($hotel['city_id']);
	  $rs_hotel->setClassAnd($hotel['class']);
	  $rs_hotel->setClassIsEstimated($hotel['class_is_estimated']);
	  $rs_hotel->setCommission($hotel['commission']);
	  $rs_hotel->setCountrycode($hotel['countrycode']);
	  $rs_hotel->setCurrencycode($hotel['currencycode']);
	  $rs_hotel->setDistrict($hotel['district']);
	  $rs_hotel->setHoteltypeId($hotel['hoteltype_id']);
	  $rs_hotel->setIsClosed($hotel['is_closed']);
	  $rs_hotel->setLatitude($hotel['location'][0]['latitude']);
	  $rs_hotel->setLongitude($hotel['location'][0]['longitude']);
	  $rs_hotel->setMaxPersonsInReservation($hotel['max_persons_in_reservation']);
	  $rs_hotel->setMaxRoomsInReservation($hotel['max_rooms_in_reservation']);
	  $rs_hotel->setMaxrate($hotel['maxrate']);
	  $rs_hotel->setMinrate($hotel['minrate']);
	  $rs_hotel->setNrRooms($hotel['nr_rooms']);
	  $rs_hotel->setPreferred($hotel['preferred']);
	  $rs_hotel->setRanking($hotel['ranking']);
	  $rs_hotel->setReviewNr($hotel['review_nr']);
	  $rs_hotel->setReviewScore($hotel['review_score']);
	  $rs_hotel->setUrl($hotel['url']);
	  $rs_hotel->setZip($hotel['zip']);
	  $rs_hotel->setSmallPhoto($ar_photo[$hotel['hotel_id']]['url_square60']);
	  $rs_hotel->setMediumPhoto($ar_photo[$hotel['hotel_id']]['url_max300']);
	  $rs_hotel->setBigPhoto($ar_photo[$hotel['hotel_id']]['url_original']);
	  $rs_hotel->save();
	}
	return true;
  }
  protected static function obtenerImagesHotel(){
    $data = new fwoData();  	
    $lst_photo = $data->fetchRcp('bookings.getHotelPhotos', 'countrycodes=ad');
    $ar_photo = array();    
    foreach($lst_photo as $photo){
      $ar_photo[$photo['hotel_id']] = array('url_max300' => $photo['url_max300'],'url_original' => $photo['url_original'],'url_square60' => $photo['url_square60']);
    }
    return $ar_photo;
  }
}
