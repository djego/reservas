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
  public function preExecute() {
    $this->data = new fwoData();
    $star_sesion = array('all' =>'all','star_1' => '','star_2' => '','star_3' => '','star_4' => '','star_5' => '');
    $facil_sesion = array('all' =>'all','facil_1' => '','facil_2' => '','facil_3' => '','facil_4' => '','facil_5' => '','facil_6' =>'','facil_7'=>'','facil_8'=>'');
    if(!$this->getUser()->getAttribute('star_session')) {
      $this->getUser()->setAttribute('star_session',$star_sesion);
    }
    if(!$this->getUser()->getAttribute('facil_session')) {
      $this->getUser()->setAttribute('facil_session',$facil_sesion);
    }
  }

  public function executeIndex(sfWebRequest $request) {
//    $lst_ciudades = $this->data->fetchRcp('bookings.getHotels', 'hotel_ids=220588');
    $this->ar_slug_city = $this->getArraySlugCity();
//    print_r($this->ar_slug_city);die();
//    $this->lst_hotel = Doctrine::getTable('adHotel')->getHotelsMain();
//    $this->lst_city = Doctrine::getTable('adCity')->getCitiesMain();

//    $param_initial = array('fecha_entrada' => date('d/m/Y'), 'fecha_salida' => Utils::sumaDia(date("d/m/Y"), 1));
//    $this->search_form = new newSearchForm($param_initial);
    $param_initial = array('fecha-inicio' => array('day' => date('d'), 'month' => date('m').'-'.date('Y')), 'fecha-final' => Utils::sumaDia(date('d/m/Y'), 1));
    $this->search_form = new searchHotelForm($param_initial);
    if ($request->isMethod('post')) {
      $params = $request->getParameter('search');
//    print_r($params);die();
      $this->search_form->bind($params);
      if ($this->search_form->isValid()) {
        $value = $this->search_form->getValues();
        $this->getUser()->setAttribute('search_date', $value);
        $this->redirect('hotels_result');
      }
    }


  }

  public function executeCity(sfWebRequest $request) {

    $this->lst_cities = Doctrine::getTable('adCity')->createQuery()->orderBy('name ASC')->fetchArray();
    $param_initial = array('fecha_entrada' => date('d/m/Y'), 'fecha_salida' => Utils::sumaDia(date("d/m/Y"), 1));
    $this->search_form = new newSearchForm($param_initial);
  }

  public function executeSearchCity(sfWebRequest $request) {
//    print_r($params);die();
    $this->search_form = new newSearchForm($this->getUser()->getAttribute('search_city'));
    $params = $request->getParameter('search_new');
//    print_r($params);die();
    $this->search_form->bind($params);
    if ($this->search_form->isValid()) {
      $var = $this->search_form->getValues();
      $this->getUser()->setAttribute('search_city', $this->search_form->getValues());
      $this->lst_cities = Doctrine::getTable('adCity')->createQuery()->where('name like "%' . $var['destino'] . '%"')->orderBy('name ASC')->fetchArray();
    }
//      print_r($this->search_form->getValues());die();
    if ($request->isMethod('post')) {
      $params = $request->getParameter('search_new');
//    print_r($params);die();
      $this->search_form->bind($params);
      if ($this->search_form->isValid()) {
        $var = $this->search_form->getValues();
        $this->getUser()->setAttribute('search_city', $this->search_form->getValues());
        $this->lst_cities = Doctrine::getTable('adCity')->createQuery()->where('name like "%' . $var['destino'] . '%"')->orderBy('name ASC')->fetchArray();
      }
    }
  }

  public function executeCityHotels(sfWebRequest $request) {
    $this->star_sesion = $this->getUser()->getAttribute('star_session');
    $this->facil_session = $this->getUser()->getAttribute('facil_session');
    $cid = $request->getParameter('id');
    $this->forward404Unless($this->rs_city = Doctrine::getTable('adCity')->find($cid)->toArray());
    $param_initial = array('destino' => $this->rs_city['name'], 'fecha_entrada' => date('d/m/Y'), 'fecha_salida' => Utils::sumaDia(date("d/m/Y"), 1));
    $this->search_form = new newSearchForm($param_initial);
    $this->filter = new orderForm($this->getUser()->getAttribute('order'));
    $order = $this->getUser()->getAttribute('order');
    $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
    $query = Doctrine::getTable('adHotel')->getHotelsCity($cid, $order['order'],$this->star_sesion,$this->facil_session);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('p', 1));
    $this->pager->init();
    $this->lst_hotel = $this->pager->getResults()->toArray();

    if ($request->isMethod('post')) {
      $this->filter->bind($request->getParameter('order_form'));
      if($this->filter->isValid()) {
        $val = $this->filter->getValues();
        $this->getUser()->setAttribute('order', $val);
        $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
        $query = Doctrine::getTable('adHotel')->getHotelsCity($cid, $val['order'],$this->star_sesion,$this->facil_session);
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('p', 1));
        $this->pager->init();
        $this->lst_hotel = $this->pager->getResults()->toArray();
      }
    }

  }

  public function executeHotelsResult(sfWebRequest $request) {
    $session_order = $this->getUser()->getAttribute('order');

    $ar_session = $this->getUser()->getAttribute('search_date');
    $this->star_sesion = $this->getUser()->getAttribute('star_session');
    $this->facil_session = $this->getUser()->getAttribute('facil_session');
//    print_r($ar_session);die();
    $this->search_form = new searchHotelForm($ar_session);
    $this->filter = new orderForm($session_order);
    $fecha_entrada = $this->changeFormatDate($ar_session['fecha-inicio']);
    $fecha_salida = $this->changeFormatDate($ar_session['fecha-final']);
    $param = "arrival_date=" . $fecha_entrada . "&departure_date=" . $fecha_salida . "&city_ids=-1456928";
    $lst_hoteles_ok = $this->data->fetchRcp('bookings.getHotelAvailability', $param);
    $this->fecha_entrada = $fecha_entrada;
    $this->fecha_salida = $fecha_salida;
    $ar = array();
    foreach ($lst_hoteles_ok as $hotel_ok) {
      $ar[] = $hotel_ok['hotel_id'];
    }
//    if (!$orden = $request->getParameter('orden')) {
//    print_r($this->star_sesion);die();
    $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
    $query = Doctrine::getTable('adHotel')->getHotelsCityResult2('-1456928', $ar, $this->star_sesion, $this->facil_session, $session_order['order']);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('p', 1));
    $this->pager->init();
    $this->lst_hotel = $this->pager->getResults()->toArray();

    if($request->isMethod('post')) {
      $this->filter->bind($request->getParameter('order_form'));
      if($this->filter->isValid()) {
        $val = $this->filter->getValues();
        $this->getUser()->setAttribute('order', $val);
        $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
        $query = Doctrine::getTable('adHotel')->getHotelsCityResult2($cid, $ar,$this->star_sesion,$this->facil_session,$val['order']);

        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('p', 1));
        $this->pager->init();
        $this->lst_hotel = $this->pager->getResults()->toArray();
      }

//
//      print_r($ar_star);
//die ();
    }


  }

  public function executeHotel(sfWebRequest $request) {

//    print_r($this->getUser()->getAttribute('searching_dispo'));
//    die();
    $this->ar_slug_city = $this->getArraySlugCity();
    $hid = $request->getParameter('id');
    $this->forward404Unless($this->hotel = Doctrine::getTable('adHotel')->find($hid));
    // Agregando visita
    $this->getUser()->addViewHotel($this->hotel);
    $this->lst_service = Doctrine::getTable('adHotelService')->getService($this->hotel->id);
    $this->range = Utils::getDistance($this->hotel->longitude - 0.002, $this->hotel->latitude - 0.002, $this->hotel->longitude + 0.002, $this->hotel->latitude + 0.002);
    $this->hotels_nearby = Doctrine::getTable('adHotel')->getHotelsNearby($this->hotel->longitude, $this->hotel->latitude, 0.002, 0.002, $this->hotel['id']);
    $this->aditional_info = Doctrine::getTable('adHotelDescription')->getInfoAditional($this->hotel->id);
//    print_r($this->aditional_info);die();
    if ($this->getUser()->getAttribute('searching_dispo')) {
      $param_initial = $this->getUser()->getAttribute('searching_dispo');
    } else {
      $param_initial = array('fecha-inicio' => array('day' => date('d'), 'month' => date('m').'-'.date('Y')), 'fecha-final' => Utils::sumaDia(date('d/m/Y'), 1));
    }
    $this->form_dis = new searchForm($param_initial);
    $this->search_form = new searchHotelForm($param_initial);
    if ($request->isMethod('post')) {
      $val_dispo = $request->getParameter('search_dispo');
      $this->form_dis->bind($val_dispo);
      if ($this->form_dis->isValid()) {
        $data_dispo  = $this->form_dis->getValues();
        $this->getUser()->setAttribute('searching_dispo', $data_dispo);
        // Cuartos disponibles
        $fecha_entrada = $this->changeFormatDate($data_dispo['fecha_entrada']);
        $fecha_salida = $this->changeFormatDate($data_dispo['fecha_salida']);
        $parame = "languagecode=es&arrival_date=" . $fecha_entrada . "&departure_date=" . $fecha_salida . "&hotel_ids=" . $this->hotel->id.'&detail_level=1';
        $ar_rooms = $this->data->fetchRcp('bookings.getBlockAvailability', $parame);
//        print_r($ar_rooms);die();
        if($ar_rooms == NULL) {
          $this->lst_rooms = false;
        }else {
          $this->lst_rooms = $ar_rooms[0];
        }
      }
    }
  }

  protected function getArraySlugCity() {
    $lst_city = Doctrine::getTable('adCity')->findAll();
    $ar_slug = array();
    foreach ($lst_city as $city) {
      $ar_slug[$city->id] = $city->slug;
    }
    return $ar_slug;
  }

  public function executeHotelResult(sfWebRequest $request) {

    $this->ar_slug_city = $this->getArraySlugCity();
    $hid = $request->getParameter('id');
    $this->forward404Unless($this->hotel = Doctrine::getTable('adHotel')->find($hid));
    $this->lst_service = Doctrine::getTable('adHotelService')->getService($this->hotel->id);
    $this->range = Utils::getDistance($this->hotel->longitude - 0.002, $this->hotel->latitude - 0.002, $this->hotel->longitude + 0.002, $this->hotel->latitude + 0.002);
    $this->hotels_nearby = Doctrine::getTable('adHotel')->getHotelsNearby($this->hotel->longitude, $this->hotel->latitude, 0.002, 0.002, $this->hotel['id']);
    $this->aditional_info = Doctrine::getTable('adHotelDescription')->getInfoAditional($this->hotel->id);
//    print_r($this->aditional_info);die();

    // Cuartos disponibles
    $search_sesion = $this->getUser()->getAttribute('search_date');
    $this->search_form = new searchHotelForm($search_sesion);
    $this->form_dis = new searchForm($search_sesion);

    $fecha_entrada = $this->changeFormatDate($search_sesion['fecha-inicio']);
    $fecha_salida = $this->changeFormatDate($search_sesion['fecha-final']);
    $parame = "languagecode=es&arrival_date=" . $fecha_entrada . "&departure_date=" . $fecha_salida . "&hotel_ids=" . $this->hotel->id;
    $ar_rooms = $this->data->fetchRcp('bookings.getBlockAvailability', $parame);
    $this->lst_rooms = $ar_rooms[0];

    if($request->isMethod('post')) {
      if($request->getParameter('bot_disp') == 'dispo') {
        $this->form_dis->bind($request->getParameter('search_dispo'));
        if($this->form_dis->isValid()) {
          $param_search = $this->form_dis->getValues();
          $this->getUser()->setAttribute('search_city',$param_search);
          $this->redirect($request->getReferer());
        }
      }else {
        $this->search_form->bind($request->getParameter('search_new'));
        if($this->search_form->isValid()) {
          $param_search = $this->search_form->getValues();
          $this->getUser()->setAttribute('search_city',$param_search);
          $fecha_entrada = $this->changeFormatDate($param_search['fecha_entrada']);
          $fecha_salida = $this->changeFormatDate($param_search['fecha_salida']);
          $parame = "languagecode=es&arrival_date=" . $fecha_entrada . "&departure_date=" . $fecha_salida . "&hotel_ids=" . $this->hotel->id;
          $ar_rooms = $this->data->fetchRcp('bookings.getBlockAvailability', $parame);
          $this->lst_rooms = $ar_rooms[0];
        }
      }
    }


  }

  public function executeMapa(sfWebRequest $request) {
    $this->la = $request->getParameter('la');
    $this->lo = $request->getParameter('lo');
    $this->ciudad = $request->getParameter('ciudad');
    $this->hotel = $request->getParameter('hotel');
  }

  protected function changeFormatDate($param_search) {

    $day = str_pad($param_search['day'], 2, "0", STR_PAD_LEFT);
    $mon = substr($param_search['month'],0,2);
    $year = substr($param_search['month'],3,4);

    return $year.'-'.$mon.'-'.$day;
  }


  public function executeCityResult(sfWebRequest $request) {
    $this->form = new searchForm($this->getUser()->getAttribute('searching'));
    $this->slug_c = $request->getParameter('slug');
    $city_id = $request->getParameter('id');
    // nombre de la ciudad
    $param = "languagecodes=es&countrycodes=ad&city_ids=" . $city_id;
    $rs_city = $this->data->fetchRcp('bookings.getCities', $param);
    $this->city_name = $rs_city[0]['name'];

    $search_sesion = $this->getUser()->getAttribute('searching');
    $ar_date = $this->changeFormatDate($search_sesion);
    $param = "arrival_date=" . $ar_date['ini'] . "&departure_date=" . $ar_date['fin'] . "&city_ids=" . $city_id;
    $lst_hoteles = $this->data->fetchRcp('bookings.getHotelAvailability', $param);
    $ar_date = $this->changeFormatDate($this->getUser()->getAttribute('searching'));
    $ar = array();
    $ar_r = array();
    foreach ($lst_hoteles as $hotel) {
      echo $hotel['hotel_id'] . '<br>';
      $hotels = $this->data->fetchRcp('bookings.getHotels', 'countrycodes=ad&hotel_ids=' . $hotel['hotel_id']);
      $hotels_photo = $this->data->fetchRcp('bookings.getHotelPhotos', 'countrycodes=ad&hotel_ids=' . $hotel['hotel_id']);
      $hotels_description = $this->data->fetchRcp('bookings.getHotelDescriptionTranslations', 'countrycodes=ad&languagecodes=es&hotel_ids=' . $hotel['hotel_id']);
      // Cuartos disponibles
      $ar_rooms = $this->data->fetchRcp('bookings.getBlockAvailability', "languagecode=es&arrival_date=" . $ar_date['ini'] . "&departure_date=" . $ar_date['fin'] . "&hotel_ids=" . $hotel['hotel_id']);
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
  public function executeAllHotels(sfWebRequest $request) {
    $this->ar_slug_city = $this->getArraySlugCity();
    $param_initial = array('fecha-inicio' => array('day' => date('d'), 'month' => date('m').'-'.date('Y')), 'fecha-final' => Utils::sumaDia(date('d/m/Y'), 1));
    $this->search_form = new searchHotelForm($param_initial);
    $this->star_sesion = $this->getUser()->getAttribute('star_session');
    $this->facil_session = $this->getUser()->getAttribute('facil_session');
//    print_r($this->star_sesion);
    $this->filter = new orderForm($this->getUser()->getAttribute('order'));
    $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
    $order = $this->getUser()->getAttribute('order');
    $query = Doctrine::getTable('adHotel')->getHotelsCity('',$order['order'],$this->star_sesion, $this->facil_session);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('p', 1));
    $this->pager->init();
    $this->lst_hotel = $this->pager->getResults()->toArray();

    if($request->isMethod('post')) {
//      print_r($request->getParameter('search'));
      $this->filter->bind($request->getParameter('order_form'));
      if($this->filter->isValid()) {
        $val = $this->filter->getValues();
        $this->getUser()->setAttribute('order', $val);
//        print_r($val);die();
        $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
        $query = Doctrine::getTable('adHotel')->getHotelsCity('',$val['order']);
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('p', 1));
        $this->pager->init();
        $this->lst_hotel = $this->pager->getResults()->toArray();
      }
    }
  }
  /*  Paginas estaticas */

  public function executeEsqui() {
    $param_initial = array('fecha_entrada' => date('d/m/Y'), 'fecha_salida' => Utils::sumaDia(date("d/m/Y"), 1));
    $this->search_form = new newSearchForm($param_initial);
  }

  public function executeExcursiones() {
    $param_initial = array('fecha_entrada' => date('d/m/Y'), 'fecha_salida' => Utils::sumaDia(date("d/m/Y"), 1));
    $this->search_form = new newSearchForm($param_initial);
  }

  public function executePaquetes() {
    $param_initial = array('fecha_entrada' => date('d/m/Y'), 'fecha_salida' => Utils::sumaDia(date("d/m/Y"), 1));
    $this->search_form = new newSearchForm($param_initial);
  }

  public function executeTurismo() {
    $param_initial = array('fecha_entrada' => date('d/m/Y'), 'fecha_salida' => Utils::sumaDia(date("d/m/Y"), 1));
    $this->search_form = new newSearchForm($param_initial);
  }

  public function executeAllstar(sfWebRequest $request) {
    $fil = $request->getParameter('chk');
    $star_filter = $this->getUser()->getAttribute('star_session');
    $star_filter['all'] = $fil;
    $star_filter['star_1'] = '';
    $star_filter['star_2'] = '';
    $star_filter['star_3'] = '';
    $star_filter['star_4'] = '';
    $star_filter['star_5'] = '';
    $this->getUser()->setAttribute('star_session',$star_filter);
    $this->redirect($request->getReferer());
  }

  public function executeOnestar(sfWebRequest $request) {
    $fil = $request->getParameter('chk');
    $cls = $request->getParameter('cls');
//     var_dump($fil);die();
    $star_filter = $this->getUser()->getAttribute('star_session');
    $star_filter[$cls] = $fil?$fil:'';
    $star_filter['all'] = '';
    $this->getUser()->setAttribute('star_session',$star_filter);

    $this->redirect($request->getReferer());
  }

  public function executeAllfacil(sfWebRequest $request) {
    $fil = $request->getParameter('chk');
    $facil_filter = $this->getUser()->getAttribute('facil_session');
    $facil_filter['all'] = 'all';
    $facil_filter['facil_1'] = '';
    $facil_filter['facil_2'] = '';
    $facil_filter['facil_3'] = '';
    $facil_filter['facil_4'] = '';
    $facil_filter['facil_5'] = '';
    $facil_filter['facil_6'] = '';
    $facil_filter['facil_7'] = '';
    $facil_filter['facil_8'] = '';
    $this->getUser()->setAttribute('facil_session',$facil_filter);
    $this->redirect($request->getReferer());
  }

  public function executeFacil(sfWebRequest $request) {
    $fil = $request->getParameter('chk');
    $cls = $request->getParameter('cls');
//     echo $cls;
//          die ();
    $facil_filter = $this->getUser()->getAttribute('facil_session');
    $facil_filter[$cls] = $fil?$fil:'';
    $facil_filter['all'] = '';
    $this->getUser()->setAttribute('facil_session',$facil_filter);
    $this->redirect($request->getReferer());
  }
}
