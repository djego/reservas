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
    $lst_ciudades = $this->data->fetchRcp('bookings.getHotels', 'hotel_ids=220588');
    
	$this->lst_hotel = Doctrine::getTable('adHotel')->createQuery()->orderBy('RAND()')->limit(8)->fetchArray();
	$this->lst_city = Doctrine::getTable('adCity')->createQuery()->orderBy('RAND()')->limit(4)->fetchArray();
//    //$param_initial = array('');
//    $param_initial = Array ('ciudad' => '', 'fecha-inicio' => Array ('day' => date('d'), 'month' =>  date('m')+0), 'fecha-final' => Array ('day' => date('d')+1, 'month' => date('m')+0));
//    $this->form =  new searchForm($param_initial);
//
//    // $this->forward('default', 'module');
////    $this->data = new fwoData();
//    $lst_ciudades = $this->data->fetchRcp('bookings.getCities', 'countrycodes=ad');
//    $this->lst_ciudad = $lst_ciudades;


  }
  public function executeCity(sfWebRequest $request) {
    $this->form =  new searchForm($this->getUser()->getAttribute('searching'));
    $this->slug_c = $request->getParameter('slug');
    $city_id = $request->getParameter('id');
    // nombre de la ciudad
    $param="languagecodes=es&countrycodes=ad&city_ids=".$city_id;
    $rs_city = $this->data->fetchRcp('bookings.getCities', $param);
    $this->city_name = $rs_city[0]['name'];
    // lista de hoteles
    $param="countrycodes=ad&city_ids=".$city_id;
    $lst_hoteles = $this->data->fetchRcp('bookings.getHotels', $param);
    $this->lst_hoteles = $lst_hoteles;
    // fotos de los hoteles
    $param="countrycodes=ad&city_ids=".$city_id;
    $this->lst_photo = $this->data->fetchRcp('bookings.getHotelPhotos',$param);
//    print_r($this->lst_photo );die();
    $param="countrycodes=ad&languagecodes=es&city_ids=".$city_id;
    $this->lst_desc = $this->data->fetchRcp('bookings.getHotelDescriptionTranslations',$param);
  }
  public function executeHotel(sfWebRequest $request) {
    if($this->getUser()->getAttribute('searching_dispo')) {
      $param_initial = $this->getUser()->getAttribute('searching_dispo');
    }else {
      $param_initial = Array ('fecha-inicio' => Array ('day' => date('d'), 'month' =>  date('m')+0), 'fecha-final' => Array ('day' => date('d')+1, 'month' => date('m')+0));
    }
    $this->form_dis =  new searchForm($param_initial);
    $this->form =  new searchForm($this->getUser()->getAttribute('searching'));

    $hotel_id = $request->getParameter('id');
    $this->slug_c = $request->getParameter('slug');
    $param="countrycodes=ad&hotel_ids=".$hotel_id;
    $this->rs_hotel = $this->data->fetchRcp('bookings.getHotels',$param);
    // datos de la ciudad y nombre del hotel
    $this->city_name  = $this->rs_hotel[0]['city'];
    $this->city_id  = $this->rs_hotel[0]['city_id'];
    $this->hotel_name  = $this->rs_hotel[0]['name'];
    //foto del hotel
    $param="countrycodes=ad&hotel_ids=".$hotel_id;
    $this->rs_photo = $this->data->fetchRcp('bookings.getHotelPhotos',$param);
    // fotos de los cuartos
    $param="countrycodes=ad&hotel_ids=".$hotel_id;
    $this->lst_photos_room = $this->data->fetchRcp('bookings.getRoomPhotos',$param);

    $param="countrycodes=ad&hotel_ids=".$hotel_id;
    $this->lst_hotel_desc = $this->data->fetchRcp('bookings.getHotelDescriptionTranslations',$param);

    if($request->isMethod('post')) {
      $val_dispo = $request->getParameter('search');
      $this->form_dis->bind($val_dispo);
      if($this->form_dis->isValid()) {
        $this->getUser()->setAttribute('searching_dispo',$this->form_dis->getValues());

        // Cuartos disponibles        
        $ar_date = $this->changeFormatDate($this->getUser()->getAttribute('searching_dispo'));        
        $parame="languagecode=es&arrival_date=".$ar_date['ini']."&departure_date=".$ar_date['fin']."&hotel_ids=".$hotel_id;
        $ar_rooms = $this->data->fetchRcp('bookings.getBlockAvailability',$parame);
        $this->lst_rooms = $ar_rooms[0];
//        print_r($this->lst_rooms);
      }
      $ar_date = $this->changeFormatDate($val_dispo);
      $param="arrival_date=".$ar_date['ini']."&departure_date=".$ar_date['fin']."&hotel_ids=".$hotel_id;
      if($this->hotel_avaible = $this->data->fetchRcp('bookings.getHotelAvailability',$param)) {
        $this->hotel_id = $hotel_id;
      }else {
        $this->getUser()->setFlash('notice', 'No existe cuartos disponibles');
        $this->redirect($request->getReferer());
      }

    }
    // Servicios del Hotel
    $facility_types=$this->data->fetchRcp('bookings.getFacilityTypes','languagecodes=es');
    foreach ($facility_types as $type){
      if($type['name']){
        $ar_facility_type[$type['facilitytype_id']] = $type['name'];
      }
    }
    $hotel_facilities_detail = $this->data->fetchRcp('bookings.getHotelFacilityTypes','languagecodes=es');
    $ar_facilities_detail= array();
    foreach ($hotel_facilities_detail as $detail){
      if($detail['name']){
        $ar_facilities_detail[$detail['hotelfacilitytype_id']] = $detail['name'];
      }
    }

    $param_services = "countrycodes=ad&hotel_ids=".$hotel_id;

    $ar_services = $this->data->fetchRcp('bookings.getHotelFacilities',$param_services);
    $ar_total_service = array();
    foreach ($ar_facility_type  as $key => $type){
      $item ='';
      foreach($ar_services as $row){
         if($row['facilitytype_id'] == $key){
           $item.= $ar_facilities_detail[$row['hotelfacilitytype_id']].', ';
         }
      }
      $ar_total_service[] = array('type' =>$type, 'items' => $item );

    }
    $this->lst_services = $ar_total_service;
    $this->hotel_id = $hotel_id;

  }
  public function executeHotelResult(sfWebRequest $request) {
    $this->form =  new searchForm($this->getUser()->getAttribute('searching'));
    $hotel_id = $request->getParameter('id');
    $this->slug_c = $request->getParameter('slug');
    $param="countrycodes=ad&hotel_ids=".$hotel_id;
    $this->rs_hotel = $this->data->fetchRcp('bookings.getHotels',$param);
    // datos de la ciudad y nombre del hotel
    $this->city_name  = $this->rs_hotel[0]['city'];
    $this->city_id  = $this->rs_hotel[0]['city_id'];
    $this->hotel_name  = $this->rs_hotel[0]['name'];
    //foto del hotel
    $param="countrycodes=ad&hotel_ids=".$hotel_id;
    $this->rs_photo = $this->data->fetchRcp('bookings.getHotelPhotos',$param);
    // fotos de los cuartos
    $param="countrycodes=ad&hotel_ids=".$hotel_id;
    $this->lst_photos_room = $this->data->fetchRcp('bookings.getRoomPhotos',$param);

    $param="countrycodes=ad&hotel_ids=".$hotel_id;
    $this->lst_hotel_desc = $this->data->fetchRcp('bookings.getHotelDescriptionTranslations',$param);

    // Cuartos disponibles
    $ar_date = $this->changeFormatDate($this->getUser()->getAttribute('searching'));
    $parame="languagecode=es&arrival_date=".$ar_date['ini']."&departure_date=".$ar_date['fin']."&hotel_ids=".$hotel_id;
    $ar_rooms = $this->data->fetchRcp('bookings.getBlockAvailability',$parame);
    $this->lst_rooms = $ar_rooms[0];

    // Servicios del Hotel
    $facility_types=$this->data->fetchRcp('bookings.getFacilityTypes','languagecodes=es');
    foreach ($facility_types as $type){
      if($type['name']){
        $ar_facility_type[$type['facilitytype_id']] = $type['name'];
      }
    }
    $hotel_facilities_detail = $this->data->fetchRcp('bookings.getHotelFacilityTypes','languagecodes=es');
    $ar_facilities_detail= array();
    foreach ($hotel_facilities_detail as $detail){
      if($detail['name']){
        $ar_facilities_detail[$detail['hotelfacilitytype_id']] = $detail['name'];
      }
    }

    $param_services = "countrycodes=ad&hotel_ids=".$hotel_id;

    $ar_services = $this->data->fetchRcp('bookings.getHotelFacilities',$param_services);
    $ar_total_service = array();
    foreach ($ar_facility_type  as $key => $type){
      $item ='';
      foreach($ar_services as $row){
         if($row['facilitytype_id'] == $key){
           $item.= $ar_facilities_detail[$row['hotelfacilitytype_id']].', ';
         }
      }
      $ar_total_service[] = array('type' =>$type, 'items' => $item );

    }
    $this->lst_services = $ar_total_service;
    $this->hotel_id = $hotel_id;

  }


  public function executeSearch(sfWebRequest $request) {
    $this->form =  new searchForm($this->getUser()->getAttribute('searching'));
    $param_search = $request->getParameter('search');
    $this->form->bind($param_search);
    if($this->form->isValid()) {
      $this->getUser()->setAttribute('searching',$this->form->getValues());
      $ar_date = $this->changeFormatDate($param_search);
      if(!$param_search['ciudad']) $this->redirect('homepage');
      $q_name = strtoupper($param_search['ciudad']);
      $param="languagecodes=es&countrycodes=ad";
      $lst_city = $this->data->fetchRcp('bookings.getCities', $param);
      foreach ($lst_city as $city) {
        $city_name =  strtoupper($city['name']);
        if(strpos($city_name, $q_name) > -1) {
          
          $param="arrival_date=".$ar_date['ini']."&departure_date=".$ar_date['fin']."&city_ids=".$city['city_id'];
          if($lst_hoteles = $this->data->fetchRcp('bookings.getHotelAvailability', $param)) {
            $ar_cities[] = $city;
          }

        }

        ///echo $city['name'].'<br>';
      }
      $this->lst_ciudad = $ar_cities;

    }








  }
  public function executeMapa(sfWebRequest $request) {
    $this->la = $request->getParameter('la');
    $this->lo = $request->getParameter('lo');
    $this->ciudad = $request->getParameter('ciudad');
    $this->hotel = $request->getParameter('hotel');
  }

  protected function changeFormatDate($param_search) {
    $diai = str_pad($param_search['fecha-inicio']['day'], 2, "0", STR_PAD_LEFT);
    $mesi = str_pad($param_search['fecha-inicio']['month'], 2, "0", STR_PAD_LEFT);
    $diaf = str_pad($param_search['fecha-final']['day'], 2, "0", STR_PAD_LEFT);
    $mesf = str_pad($param_search['fecha-final']['month'], 2, "0", STR_PAD_LEFT);
    $ini = '2011-'.$mesi.'-'.$diai;
    $fin = '2011-'.$mesf.'-'.$diaf;
    return array('ini' => $ini, 'fin' => $fin);
  }

  public function executeCityResult(sfWebRequest $request) {
    $this->form =  new searchForm($this->getUser()->getAttribute('searching'));
    $this->slug_c = $request->getParameter('slug');
    $city_id = $request->getParameter('id');
    // nombre de la ciudad
    $param="languagecodes=es&countrycodes=ad&city_ids=".$city_id;
    $rs_city = $this->data->fetchRcp('bookings.getCities', $param);
    $this->city_name = $rs_city[0]['name'];

    $search_sesion  = $this->getUser()->getAttribute('searching');
    $ar_date = $this->changeFormatDate($search_sesion);
    $param="arrival_date=".$ar_date['ini']."&departure_date=".$ar_date['fin']."&city_ids=".$city_id;
    $lst_hoteles = $this->data->fetchRcp('bookings.getHotelAvailability', $param);
    $ar_date = $this->changeFormatDate($this->getUser()->getAttribute('searching'));
    $ar = array();$ar_r= array();
    foreach ($lst_hoteles as $hotel) {
    	echo $hotel['hotel_id'].'<br>';
      $hotels = $this->data->fetchRcp('bookings.getHotels', 'countrycodes=ad&hotel_ids='.$hotel['hotel_id']);
      $hotels_photo = $this->data->fetchRcp('bookings.getHotelPhotos', 'countrycodes=ad&hotel_ids='.$hotel['hotel_id']);
      $hotels_description = $this->data->fetchRcp('bookings.getHotelDescriptionTranslations', 'countrycodes=ad&languagecodes=es&hotel_ids='.$hotel['hotel_id']);
      // Cuartos disponibles      
      $ar_rooms = $this->data->fetchRcp('bookings.getBlockAvailability',"languagecode=es&arrival_date=".$ar_date['ini']."&departure_date=".$ar_date['fin']."&hotel_ids=".$hotel['hotel_id']);
      $ar_r[] = $ar_rooms[0];
//      $ar_rooms[] = $ar_rooms;
      $ar_hotels[] = $hotels[0];
      $ar_hotels_photo[] = $hotels_photo[0];
      $ar_hotels_description[] = $hotels_description[0];
      
      
    }
	$this->lst_rooms = $ar_r;
    $this->lst_hoteles = $ar_hotels;
//    print_r($this->lst_hoteles);
    $this->lst_photo = $ar_hotels_photo;
    $this->lst_desc = $ar_hotels_description;
  }

  /*  Paginas estaticas */
  public function executeNosotros() {

  }
  public function executeFaq() {

  }
  public function executeCondicion() {

  }
  public function executeContacto() {

  }

}
