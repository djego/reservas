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
  }

  public function executeIndex(sfWebRequest $request) {
//    $lst_ciudades = $this->data->fetchRcp('bookings.getHotels', 'hotel_ids=220588');
    $this->ar_slug_city = $this->getArraySlugCity();
//    print_r($this->ar_slug_city);die();
    $this->lst_hotel = Doctrine::getTable('adHotel')->getHotelsMain();
    $this->lst_city = Doctrine::getTable('adCity')->getCitiesMain();

    $param_initial = array('fecha_entrada' => date('d/m/Y'), 'fecha_salida' => Utils::sumaDia(date("d/m/Y"), 1));
    $this->search_form = new newSearchForm($param_initial);
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
    $cid = $request->getParameter('id');
    $this->forward404Unless($this->rs_city = Doctrine::getTable('adCity')->find($cid)->toArray());
    $param_initial = array('destino' => $this->rs_city['name'], 'fecha_entrada' => date('d/m/Y'), 'fecha_salida' => Utils::sumaDia(date("d/m/Y"), 1));
    $this->search_form = new newSearchForm($param_initial);
    $this->filter = new orderForm($this->getUser()->getAttribute('order'));
    $order = $this->getUser()->getAttribute('order');
    $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
    $query = Doctrine::getTable('adHotel')->getHotelsCity($cid, $order['order']);
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
        $query = Doctrine::getTable('adHotel')->getHotelsCity($cid, $val['order']);
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('p', 1));
        $this->pager->init();
        $this->lst_hotel = $this->pager->getResults()->toArray();
      }
    }

  }

  public function executeCityHotelsResult(sfWebRequest $request) {
    $session_order = $this->getUser()->getAttribute('order');
    $cid = $request->getParameter('id');
    $this->forward404Unless($this->rs_city = Doctrine::getTable('adCity')->find($cid)->toArray());
    $ar_session = $this->getUser()->getAttribute('search_city');
    $ar_session['destino'] = $this->rs_city['name'];
    $this->search_form = new newSearchForm($ar_session);
    $this->filter = new orderForm($session_order);
    $search_sesion = $this->getUser()->getAttribute('search_city');
    $fecha_entrada = $this->changeFormatDate($search_sesion['fecha_entrada']);
    $fecha_salida = $this->changeFormatDate($search_sesion['fecha_salida']);
    $param = "arrival_date=" . $fecha_entrada . "&departure_date=" . $fecha_salida . "&city_ids=" . $this->rs_city['id'];
    $lst_hoteles_ok = $this->data->fetchRcp('bookings.getHotelAvailability', $param);
    $this->fecha_entrada = $fecha_entrada;
    $this->fecha_salida = $fecha_salida;
    $ar = array();
    foreach ($lst_hoteles_ok as $hotel_ok) {
      $ar[] = $hotel_ok['hotel_id'];
    }
//    if (!$orden = $request->getParameter('orden')) {

    $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
    $query = Doctrine::getTable('adHotel')->getHotelsCityResult2($cid, $ar, $ar_session['star'], $ar_session['facility'],$session_order['order']);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('p', 1));
    $this->pager->init();
    $this->lst_hotel = $this->pager->getResults()->toArray();

    if($request->isMethod('post')) {
      if($request->getParameter('search_pro')) {
        $ar_star = $request->getParameter('search_new');
        $this->search_form->bind($ar_star);
        if($this->search_form->isValid()) {
          $param_search = $this->search_form->getValues();
          $this->getUser()->setAttribute('search_city', $param_search);
//        print_r($param_search);die();
          $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
          $query = Doctrine::getTable('adHotel')->getHotelsCityResult2($cid, $ar,$param_search['star'],$param_search['facility'],$session_order['order']);

          $this->pager->setQuery($query);
          $this->pager->setPage($request->getParameter('p', 1));
          $this->pager->init();
          $this->lst_hotel = $this->pager->getResults()->toArray();
          $this->redirect('city_hotels_result', array('id' =>$this->rs_city['id'],'slug' => $this->rs_city['slug']));

        }
      }else {
        $this->filter->bind($request->getParameter('order_form'));
        if($this->filter->isValid()) {
          $val = $this->filter->getValues();
          $this->getUser()->setAttribute('order', $val);
          $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
          $query = Doctrine::getTable('adHotel')->getHotelsCityResult2($cid, $ar,$ar_session['star'],$ar_session['facility'],$val['order']);

          $this->pager->setQuery($query);
          $this->pager->setPage($request->getParameter('p', 1));
          $this->pager->init();
          $this->lst_hotel = $this->pager->getResults()->toArray();
        }

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
    $this->lst_service = Doctrine::getTable('adHotelService')->getService($this->hotel->id);
    $this->range = Utils::getDistance($this->hotel->longitude - 0.002, $this->hotel->latitude - 0.002, $this->hotel->longitude + 0.002, $this->hotel->latitude + 0.002);
    $this->hotels_nearby = Doctrine::getTable('adHotel')->getHotelsNearby($this->hotel->longitude, $this->hotel->latitude, 0.002, 0.002, $this->hotel['id']);
    $this->aditional_info = Doctrine::getTable('adHotelDescription')->getInfoAditional($this->hotel->id);
//    print_r($this->aditional_info);die();
    if ($this->getUser()->getAttribute('searching_dispo')) {
      $param_initial = $this->getUser()->getAttribute('searching_dispo');
    } else {
      $param_initial = array('fecha_entrada' => date('d/m/Y'), 'fecha_salida' => Utils::sumaDia(date("d/m/Y"), 1));
    }
    $this->form_dis = new searchForm($param_initial);
    $this->search_form = new newSearchForm($param_initial);
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
    $search_sesion = $this->getUser()->getAttribute('search_city');
    $this->search_form = new newSearchForm($search_sesion);

    $fecha_entrada = $this->changeFormatDate($search_sesion['fecha_entrada']);
    $fecha_salida = $this->changeFormatDate($search_sesion['fecha_salida']);
    $parame = "languagecode=es&arrival_date=" . $fecha_entrada . "&departure_date=" . $fecha_salida . "&hotel_ids=" . $this->hotel->id;
    $ar_rooms = $this->data->fetchRcp('bookings.getBlockAvailability', $parame);
    $this->lst_rooms = $ar_rooms[0];

    if($request->isMethod('post')) {
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

  public function executeMapa(sfWebRequest $request) {
    $this->la = $request->getParameter('la');
    $this->lo = $request->getParameter('lo');
    $this->ciudad = $request->getParameter('ciudad');
    $this->hotel = $request->getParameter('hotel');
  }

  protected function changeFormatDate($param_search) {
    $dat = str_replace('/', '-', $param_search);
    $data_day = substr($dat, 0, 2);
    $data_mes = substr($dat, 3, 2);
    $data_ano = substr($dat, 6, 4);
    return $data_ano . '-' . $data_mes . '-' . $data_day;
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
    $param_initial = array('fecha_entrada' => date('d/m/Y'), 'fecha_salida' => Utils::sumaDia(date("d/m/Y"), 1));
    $this->search_form = new newSearchForm($param_initial);

    $this->filter = new orderForm($this->getUser()->getAttribute('order'));
    $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
    $order = $this->getUser()->getAttribute('order');
    $query = Doctrine::getTable('adHotel')->getHotelsCity('',$order['order']);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('p', 1));
    $this->pager->init();
    $this->lst_hotel = $this->pager->getResults()->toArray();

    if($request->isMethod('post')) {
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

  public function executeFilterCheck(sfWebRequest $request) {

    $param_initial = array('fecha_entrada' => date('d/m/Y'), 'fecha_salida' => Utils::sumaDia(date("d/m/Y"), 1));
    $this->search_form = new newSearchForm($param_initial);
  }
}
