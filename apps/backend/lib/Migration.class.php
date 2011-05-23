<?php

/**
 * @author diegohome
 *
 */
class Migration {

  public static function migCity() {
    $data = new fwoData();
    $lst_city = $data->fetchRcp('bookings.getCities', 'city_ids=-1456928&languagecodes=es');
//    print_r($lst_city);die();
    foreach ($lst_city as $city) {
      if (!$rs_city = Doctrine::getTable('adCity')->find($city['city_id'])) {
        $rs_city = new adCity();
        $rs_city->setId($city['city_id']);
        $rs_city->setLatitude($city['latitude']);
        $rs_city->setLongitude($city['longitude']);
        $rs_city->setName($city['name']);
        $rs_city->setNrHotels($city['nr_hotels']);
        $rs_city->save();
      }

    }
    return true;
  }

  public static function migDescriptionHotelTypes() {

    $data = new fwoData();
    $lst_desc_type = $data->fetchRcp('bookings.getHotelDescriptionTypes', 'languagecodes=es');
//    print_r($lst_desc_type);die();   
    foreach ($lst_desc_type as $type) {
      if (!$rs_desc_type = Doctrine::getTable('adHotelDescriptionType')->find($type['descriptiontype_id'])) {
        $rs_desc_type = new adHotelDescriptionType();
        $rs_desc_type->setId($type['descriptiontype_id']);
        $rs_desc_type->setName($type['name']);
        $rs_desc_type->setLanguagecode($type['languagecode']);
        $rs_desc_type->save();
      }

    }
  }

  public static function migHotel() {

    $data = new fwoData();
//    echo 'aaaaaaaaaa';
//    die();
//    $ar_photo = self::obtenerImagesHotel();
    $lst_hotel = $data->fetchRcp('bookings.getHotels', 'city_ids=-1456928');

    $lst_hotel_2 = $data->fetchRcp('bookings.getHotels', 'city_ids=-1456928&rows=1000&offset=1000');
    foreach ($lst_hotel_2 as $hotel_2) {
      $lst_hotel[] = $hotel_2;
    }
    echo count($lst_hotel);
//    $delete = Doctrine::getTable('adHotel')->findAll()->delete(); 
//    print_r($lst_hotel);die();   
    foreach ($lst_hotel as $hotel) {
      $rs_photo = $data->fetchRcp('bookings.getHotelPhotos', 'hotel_ids='.$hotel['hotel_id']);


      if (!$rs_hotel = Doctrine::getTable('adHotel')->find($hotel['hotel_id'])) {
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
        $rs_hotel->setSmallPhoto($rs_photo[0]['url_square60']);
        $rs_hotel->setMediumPhoto($rs_photo[0]['url_max300']);
        $rs_hotel->setBigPhoto($rs_photo[0]['url_original']);
        $rs_hotel->save();
      }



//      // Fotos Cuartos
//      $data = new fwoData();
//      $lst_roomphoto = $data->fetchRcp('bookings.getRoomPhotos', 'countrycodes=ad&hotel_ids=' . $rs_hotel->id);
//      if ($lst_roomphoto) {
//        foreach ($lst_roomphoto as $roomphoto) {
//
//          if (!$rs_roomphoto = Doctrine::getTable('adHotelRoomPhoto')->findOneByPhotoIdAndHotelIdAndRoomId($roomphoto['photo_id'], $roomphoto['hotel_id'], $roomphoto['room_id'])) {
//            $rs_roomphoto = new adHotelRoomPhoto();
//          }
//          $rs_roomphoto->setPhotoId($roomphoto['photo_id']);
//          $rs_roomphoto->setHotelId($roomphoto['hotel_id']);
//          $rs_roomphoto->setRoomId($roomphoto['room_id']);
//          $rs_roomphoto->setSmallPhoto($roomphoto['url_square60']);
//          $rs_roomphoto->setMediumPhoto($roomphoto['url_max300']);
//          $rs_roomphoto->setBigPhoto($roomphoto['url_original']);
//          $rs_roomphoto->save();
//        }
//      }


//      $data = new fwoData();
//      $param_services = "countrycodes=ad&hotel_ids=" . $rs_hotel->id;
//      $ar_services = $data->fetchRcp('bookings.getHotelFacilities', $param_services);
//      $ar_total_service = array();
//      foreach ($ar_facility_type as $key => $type) {
//        $item = '';
//        foreach ($ar_services as $row) {
//          if ($row['facilitytype_id'] == $key) {
//            $item.= $ar_facilities_detail[$row['hotelfacilitytype_id']] . ', ';
//          }
//        }
//        $ad_service = new adHotelService();
//        $ad_service->setHotelId($rs_hotel->id);
//        $ad_service->setType($type);
//        $ad_service->setService($item);
//        $ad_service->save();
//      }
    }
    return true;
  }

  public static function descriptionHotel() {

    // Description
    $lst_hotels = Doctrine::getTable('adHotel')->findAll()->toArray();
    $data = new fwoData();
    foreach ($lst_hotels as $hotel) {
      $lst_desc = $data->fetchRcp('bookings.getHotelDescriptionTranslations', 'languagecodes=es&hotel_ids=' . $hotel['id']);
      foreach ($lst_desc as $desc) {
        if (!$rs_desc = Doctrine::getTable('adHotelDescription')->findOneByDescriptiontypeIdAndHotelId($desc['descriptiontype_id'], $desc['hotel_id'])) {
          $rs_desc = new adHotelDescription();
        }
        $rs_desc->setHotelId($desc['hotel_id']);
        $rs_desc->setDescriptiontypeId($desc['descriptiontype_id']);
        $rs_desc->setDescription($desc['description']);
        $rs_desc->setLanguagecode($desc['languagecode']);
        $rs_desc->save();
      }
    }
  }
  public static function roomPhotoHotel() {

    // Description
    $lst_hotels = Doctrine::getTable('adHotel')->findAll()->toArray();
    $data = new fwoData();
    foreach ($lst_hotels as $hotel) {
      $lst_roomphoto = $data->fetchRcp('bookings.getRoomPhotos', 'countrycodes=fr&hotel_ids=' . $hotel['id']);
      if ($lst_roomphoto) {
        foreach ($lst_roomphoto as $roomphoto) {

          if (!$rs_roomphoto = Doctrine::getTable('adHotelRoomPhoto')->findOneByPhotoIdAndHotelIdAndRoomId($roomphoto['photo_id'], $roomphoto['hotel_id'], $roomphoto['room_id'])) {
            $rs_roomphoto = new adHotelRoomPhoto();
            $rs_roomphoto->setPhotoId($roomphoto['photo_id']);
            $rs_roomphoto->setHotelId($roomphoto['hotel_id']);
            $rs_roomphoto->setRoomId($roomphoto['room_id']);
            $rs_roomphoto->setSmallPhoto($roomphoto['url_square60']);
            $rs_roomphoto->setMediumPhoto($roomphoto['url_max300']);
            $rs_roomphoto->setBigPhoto($roomphoto['url_original']);
            $rs_roomphoto->save();
          }

        }
      }
    }



  }





  protected static function obtenerImagesHotel() {
    $data = new fwoData();
    $lst_photo = $data->fetchRcp('bookings.getHotelPhotos', 'city_ids=-1456928&rows=1000&offset=1000');
    print_r(count($lst_photo));
    die();
    $ar_photo = array();
    foreach ($lst_photo as $photo) {
      $ar_photo[$photo['hotel_id']] = array('url_max300' => $photo['url_max300'], 'url_original' => $photo['url_original'], 'url_square60' => $photo['url_square60']);
    }
    return $ar_photo;
  }

  public static function migDescriptionHotel() {
    $data2 = new fwoData();
    $lst_desc = $data2->fetchRcp('bookings.getHotelDescriptionTranslations', 'languagecodes=es&countrycodes=ad');
    //$delete = Doctrine::getTable('adCity')->findAll()->delete();
    foreach ($lst_desc as $desc) {
      $rs_hotel = Doctrine::getTable('adHotel')->find($desc['hotel_id']);
      if ($rs_hotel) {
        if (!$rs_desc = Doctrine::getTable('adHotelDescription')->findOneByDescriptiontypeIdAndHotelId($desc['descriptiontype_id'], $desc['hotel_id'])) {
          $rs_desc = new adHotelDescription();
        }
        $rs_desc->setHotelId($desc['hotel_id']);
        $rs_desc->setDescriptiontypeId($desc['descriptiontype_id']);
        $rs_desc->setDescription($desc['description']);
        $rs_desc->setLanguagecode($desc['languagecode']);
        $rs_desc->save();
      }
    }

    return true;
  }

  public static function migRoomPhoto() {
    $data = new fwoData();

//    //$delete = Doctrine::getTable('adCity')->findAll()->delete();    
    $lst_hotels = Doctrine::getTable('adHotel')->findAll()->toArray();
    foreach ($lst_hotels as $hotel) {
      $lst_roomphoto = $data->fetchRcp('bookings.getRoomPhotos', 'countrycodes=ad&hotel_ids=' . $hotel['id']);
      $ar = array();
      if ($lst_roomphoto) {
        foreach ($lst_roomphoto as $roomphoto) {
          $ar[$roomphoto['photo_id']] = array('med' => $roomphoto['url_max300'], 'big' => $roomphoto['url_original'], 'sma' => $roomphoto['url_square60']);
        }
      }
      if (count($ar) > 0) {
        foreach ($ar as $key => $row) {

          if (!$rs_roomphoto = Doctrine::getTable('adHotelRoomPhoto')->findOneByPhotoIdAndHotelId($key, $hotel['id'])) {
            $rs_roomphoto = new adHotelRoomPhoto();
          }
          $rs_roomphoto->setPhotoId($key);
          $rs_roomphoto->setHotelId($hotel['id']);
          $rs_roomphoto->setRoomId(11111);
          $rs_roomphoto->setSmallPhoto($row['sma']);
          $rs_roomphoto->setMediumPhoto($row['med']);
          $rs_roomphoto->setBigPhoto($row['big']);
          $rs_roomphoto->save();
        }
      }
//      print_r($ar);die();
//    $lst_roomphoto = $data->fetchRcp('bookings.getRoomPhotos', 'countrycodes=ad');
//    foreach ($lst_roomphoto as $roomphoto){
////        if (!$rs_roomphoto = Doctrine::getTable('adHotelRoomPhoto')->findOneByPhotoIdAndHotelIdAndRoomId($roomphoto['photo_id'], $roomphoto['hotel_id'], $roomphoto['room_id'])) {
//          $rs_roomphoto = new adHotelRoomPhoto();
////        }
//      
//        $rs_roomphoto->setPhotoId($roomphoto['photo_id']);
//        $rs_roomphoto->setHotelId($roomphoto['hotel_id']);
//        $rs_roomphoto->setRoomId($roomphoto['room_id']);
//        $rs_roomphoto->setSmallPhoto($roomphoto['url_square60']);
//        $rs_roomphoto->setMediumPhoto($roomphoto['url_max300']);
//        $rs_roomphoto->setBigPhoto($roomphoto['url_original']);
//        $rs_roomphoto->save();
    }
    return true;
  }

  public static function migServices() {
    $data = new fwoData();
    // Servicios del Hotel
    $facility_types = $data->fetchRcp('bookings.getFacilityTypes', 'languagecodes=es');
    foreach ($facility_types as $type) {
      if ($type['name']) {
        $ar_facility_type[$type['facilitytype_id']] = $type['name'];
      }
    }
    $hotel_facilities_detail = $data->fetchRcp('bookings.getHotelFacilityTypes', 'languagecodes=es');
    $ar_facilities_detail = array();
    foreach ($hotel_facilities_detail as $detail) {
      if ($detail['name']) {
        $ar_facilities_detail[$detail['hotelfacilitytype_id']] = $detail['name'];
      }
    }

    $lst_hotel = Doctrine::getTable('adHotel')->findAll()->toArray();
    foreach ($lst_hotel as $hotel) {
      $data = new fwoData();
      $param_services = "countrycodes=fr&hotel_ids=" . $hotel['id'];
      $ar_services = $data->fetchRcp('bookings.getHotelFacilities', $param_services);
      $ar_total_service = array();
      foreach ($ar_facility_type as $key => $type) {
        $item = '';
        foreach ($ar_services as $row) {
          if ($row['facilitytype_id'] == $key) {
            $item.= $ar_facilities_detail[$row['hotelfacilitytype_id']] . ', ';
          }
        }
//        $ar_total_service[] = array('type' => $type, 'items' => $item);
        if (!$ad_service = Doctrine::getTable('adHotelService')->findOneByHotelIdAndType($hotel['id'], $type)) {
          $ad_service = new adHotelService();
        }
        $ad_service->setHotelId($hotel['id']);
        $ad_service->setType($type);
        $ad_service->setService($item);
        $ad_service->save();
      }

//      print_r($ar_total_service);
    }
//    print_r($ar_total_service);
//        die ();
  }


  public static function migRooms() {
    $lst_hotel = Doctrine::getTable('adHotel')->findAll()->toArray();
    foreach ($lst_hotel as $hotel) {
      $data = new fwoData();
      // Servicios del Hotel
      $rooms = $data->fetchRcp('bookings.getRoomTranslations', 'languagecodes=es&countrycodes=ad&hotel_ids='.$hotel['id']);
      print_r($rooms);
    }die();
  }

}
