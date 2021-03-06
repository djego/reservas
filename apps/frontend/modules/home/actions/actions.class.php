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
    $star_sesion = array('all' => 'all', 'star_1' => '', 'star_2' => '', 'star_3' => '', 'star_4' => '', 'star_5' => '');
    $facil_sesion = array('all' => 'all', 'facil_1' => '', 'facil_2' => '', 'facil_3' => '', 'facil_4' => '', 'facil_5' => '', 'facil_6' => '', 'facil_7' => '', 'facil_8' => '');
    $currency = array('moneda' => 'EUR');
    if (!$this->getUser()->getAttribute('star_session')) {
      $this->getUser()->setAttribute('star_session', $star_sesion);
    }
    if (!$this->getUser()->getAttribute('facil_session')) {
      $this->getUser()->setAttribute('facil_session', $facil_sesion);
    }
    if (!$this->getUser()->getAttribute('currency')) {
      $this->getUser()->setAttribute('currency', $currency);
    }

    $this->cx = new currencyExchange();
    $this->cx->getData();
  }

  public function executeIndex(sfWebRequest $request) {


    $this->lst_tours = Doctrine::getTable('tourRoom')->getToursMain()->execute();
    $this->lst_others = Doctrine::getTable('tourRoom')->getToursOthers();
//    print_r($this->lst_tours);
//    die();
    $this->ar_num_hotels = Doctrine::getTable('adHotel')->getNumHotels();
    if ($this->getUser()->getAttribute('star_session')) {
      $this->getUser()->getAttributeHolder()->remove('star_session');
    }
    $this->search_form = new searchHotelForm(appFrontend::fechasiniciales());

    if ($request->getParameter('un_date')) {
      $this->redirect('all_hotel');
    }
  }

  public function executeStarHotel(sfWebRequest $request) {
    $star = $request->getParameter('star');
    $session_star = $this->getUser()->getAttribute('star_session');
    $session_star['star_' . $star] = $star;
    $this->getUser()->setAttribute('star_session', $session_star);
    $this->redirect('all_hotel');
  }

  public function executeToursHotels(sfWebRequest $request) {

    $this->forward404Unless($this->tours = Doctrine::getTable('tourRoom')->find($request->getParameter('id')));
    $this->search_form = new searchHotelForm(appFrontend::fechasiniciales());
    $this->star_sesion = $this->getUser()->getAttribute('star_session');
    $this->facil_session = $this->getUser()->getAttribute('facil_session');
    $this->form_currency = new currencyForm($this->getUser()->getAttribute('currency'));
    $this->filter = new order2Form($this->getUser()->getAttribute('order'));
    $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
    $order = $this->getUser()->getAttribute('order');
    $query = Doctrine::getTable('adHotel')->getHotelsTour($this->tours->latitude, $this->tours->longitude, sfConfig::get('app_dis_la'), sfConfig::get('app_dis_lo'), $order['order'], $this->star_sesion, $this->facil_session);
    $this->num_hotels = Doctrine::getTable('adHotel')->getNumHotels($this->facil_session);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('p', 1));
    $this->pager->init();
    $this->lst_hotel = $this->pager->getResults()->toArray();

    $this->range = Utils::getDistance($this->tours->longitude - sfConfig::get('app_dis_lo'), $this->tours->latitude - sfConfig::get('app_dis_la'), $this->tours->longitude + sfConfig::get('app_dis_lo'), $this->tours->latitude + sfConfig::get('app_dis_la'));
    // Destinos cercanos
    $destiny = Doctrine::getTable('tourRoom')->findAll()->toArray();
    $ar_lst = array();

    foreach ($destiny as $des) {
      $dis = Utils::getDistance($this->tours->longitude, $this->tours->latitude, $des['longitude'], $des['latitude'], 2);
      $des['distancia'] = $dis;
      $ar_lst[$des['type']][] = $des;
    }
    $this->lst_destiny = $ar_lst;
    // FIn de destinos cercanos
    if ($request->isMethod('post')) {

//      print_r($request->getParameter('search'));
      $this->filter->bind($request->getParameter('order_form'));
      if ($this->filter->isValid()) {
        $val = $this->filter->getValues();
        $this->getUser()->setAttribute('order', $val);
        $this->redirect($request->getReferer());
      }
    }
  }

  public function executeHotelsResult(sfWebRequest $request) {
    

    if ($request->getParameter('un_date')) {
      $this->redirect('all_hotel');
    }
    if ($params = $request->getParameter('search')) {
//    print_r($params);die();
      $search_form = new searchHotelForm();
      $search_form->bind($params);
      if ($search_form->isValid()) {
        $value = $search_form->getValues();
//      $this->getUser()->setAttribute('search_date', $value);
      }
    }
    $session_order = $this->getUser()->getAttribute('order');
    $ar_session = $value;
//    print_r($ar_session);
    $this->star_sesion = $this->getUser()->getAttribute('star_session');
    $this->facil_session = $this->getUser()->getAttribute('facil_session');
//    print_r($ar_session);die();
    $this->form_currency = new currencyForm($this->getUser()->getAttribute('currency'));
    $this->search_form = new searchHotelForm($ar_session);
    $this->filter = new orderForm($session_order);
    $fecha_entrada = Utils::changeFormatDate($ar_session['fecha-inicio']);
    $fecha_salida = Utils::changeFormatDate($ar_session['fecha-final']);
    $param = "arrival_date=" . $fecha_entrada . "&departure_date=" . $fecha_salida . "&city_ids=".sfConfig::get('app_city_id');
    $lst_hoteles_ok = $this->data->fetchRcp('bookings.getHotelAvailability', $param);
    $this->fecha_entrada = $fecha_entrada;
    $this->fecha_salida = $fecha_salida;
    $ar = array();
    if ($lst_hoteles_ok) {
      foreach ($lst_hoteles_ok as $hotel_ok) {
        $ar[] = $hotel_ok['hotel_id'];
      }
    }

    // Destinos cercanos
    $destiny = Doctrine::getTable('tourRoom')->findAll()->toArray();
    $ar_lst = array();
    foreach ($destiny as $des) {
      $ar_lst[$des['type']][] = $des;
    }
    $this->lst_destiny = $ar_lst;
    // FIn de destinos cercanos

    $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
    $query = Doctrine::getTable('adHotel')->getHotelsCityResult2(sfConfig::get('app_city_id'), $ar, $this->star_sesion, $this->facil_session, $session_order['order']);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('p', 1));
    $this->pager->init();
    $ar_dispo_hotels = $this->pager->getResults()->toArray();

    $curr = $this->getUser()->getAttribute('currency');
    $ar_rooms = array();
    foreach ($ar_dispo_hotels as $dispo_hotel) {
      $parame = "languagecode=es&arrival_date=" . $fecha_entrada . "&departure_date=" . $fecha_salida . "&hotel_ids=" . $dispo_hotel['id'];
      $ar_rooms = $this->data->fetchRcp('bookings.getBlockAvailability', $parame);
      $ar_new_rooms = array();
      $ar_price = array();
      foreach ($ar_rooms[0]['block'] as $blok) {
        $blok['min_price'][0]['currency'] = $curr['moneda'];
        $blok['min_price'][0]['price'] = number_format($this->cx->Convert("EUR", $curr['moneda'], $blok['min_price'][0]['price']), 2, '.', '');
        $blok['rack_rate'][0]['currency'] = $curr['moneda'];
        $blok['rack_rate'][0]['price'] = number_format($this->cx->Convert("EUR", $curr['moneda'], $blok['rack_rate'][0]['price']), 2, '.', '');
        $ar_price[] = $blok['min_price'][0]['price'];
        $ar_new_rooms[] = $blok;
      }
      $ar_rooms[0]['block'] = $ar_new_rooms;
      $dispo_hotel['detail_rooms'] = $ar_rooms[0];
      $dispo_hotel['preciobajo'] = min($ar_price);
      $ar_ultimate_hotels[$dispo_hotel['preciobajo']] = $dispo_hotel;
    }
    ksort($ar_ultimate_hotels);
    $this->lst_hotel = $ar_ultimate_hotels;

    $this->num_hotels = Doctrine::getTable('adHotel')->getNumHotels($this->facil_session, $ar);

    if ($request->isMethod('post')) {
      $this->filter->bind($request->getParameter('order_form'));
      if ($this->filter->isValid()) {
        $val = $this->filter->getValues();
        $this->getUser()->setAttribute('order', $val);
        $this->redirect($request->getReferer());
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
    $this->form_currency = new currencyForm($this->getUser()->getAttribute('currency'));
    $this->lst_service = Doctrine::getTable('adHotelService')->getService($this->hotel->id);
    $this->range = Utils::getDistance($this->hotel->longitude - 0.002, $this->hotel->latitude - 0.002, $this->hotel->longitude + 0.002, $this->hotel->latitude + 0.002);
    $this->hotels_nearby = Doctrine::getTable('adHotel')->getHotelsNearby($this->hotel->longitude, $this->hotel->latitude, 0.002, 0.002, $this->hotel['id']);
    $this->aditional_info = Doctrine::getTable('adHotelDescription')->getInfoAditional($this->hotel->id);
    // Destinos cercanos
    $destiny = Doctrine::getTable('tourRoom')->findAll()->toArray();
    $ar_lst = array();
    foreach ($destiny as $des) {
      $dis = Utils::getDistance($this->hotel->longitude, $this->hotel->latitude, $des['longitude'], $des['latitude'], 2);
      $des['distancia'] = $dis;
      $ar_lst[$des['type']][] = $des;
    }
//    print_r($ar_lst);
//    die();
    $this->lst_destiny = $ar_lst;
    // FIn de destinos cercanos

    $param_initial = appFrontend::fechasiniciales();

    $this->form_dis = new dispoForm($param_initial);
    $this->search_form = new searchHotelForm($param_initial);

    if ($request->getParameter('search') || $request->getParameter('dispo')) {
      if ($request->getParameter('search')) {

        $params = $request->getParameter('search');
        $this->search_form->bind($params);
        if ($this->search_form->isValid()) {
          $data_dispo = $this->search_form->getValues();
        }
      } elseif ($request->getParameter('dispo')) {
        $val_dispo = $request->getParameter('dispo');
        $this->form_dis->bind($val_dispo);
        if ($this->form_dis->isValid()) {
          $data_dispo = $this->form_dis->getValues();
        }
      }

      $this->form_dis = new dispoForm($data_dispo);
      $this->search_form = new searchHotelForm($data_dispo);
//        $this->getUser()->setAttribute('searching_dispo', $data_dispo);
      // Cuartos disponibles

      $fecha_entrada = Utils::changeFormatDate($data_dispo['fecha-inicio']);
      $fecha_salida = Utils::changeFormatDate($data_dispo['fecha-final']);

      $parame = "languagecode=es&arrival_date=" . $fecha_entrada . "&departure_date=" . $fecha_salida . "&hotel_ids=" . $this->hotel->id . '&detail_level=1';
      $ar_rooms = $this->data->fetchRcp('bookings.getBlockAvailability', $parame);
//        print_r($ar_rooms);die();
      if ($ar_rooms == NULL) {
        $this->lst_rooms = false;
      } else {

        $curr = $this->getUser()->getAttribute('currency');
        foreach ($ar_rooms[0]['block'] as $blok) {
          $blok['min_price'][0]['currency'] = $curr['moneda'];
          $blok['min_price'][0]['price'] = number_format($this->cx->Convert("EUR", $curr['moneda'], $blok['min_price'][0]['price']), 2, '.', '');
          $blok['rack_rate'][0]['currency'] = $curr['moneda'];
          $blok['rack_rate'][0]['price'] = number_format($this->cx->Convert("EUR", $curr['moneda'], $blok['rack_rate'][0]['price']), 2, '.', '');

          foreach ($blok['incremental_price'] as $inc) {
            $inc['currency'] = $curr['moneda'];
            $inc['price'] = number_format($this->cx->Convert("EUR", $curr['moneda'], $inc['price']), 2, '.', '');
            $car[] = $inc;
          }
          $blok['incremental_price'] = $car;
          $ar_new_rooms[] = $blok;
        }
        $ar_rooms[0]['block'] = $ar_new_rooms;
        $this->lst_rooms = $ar_rooms[0];
//          print_r($this->lst_rooms);die();
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
    $this->form_currency = new currencyForm($this->getUser()->getAttribute('currency'));
    // Cuartos disponibles

    if ($request->getParameter('search')) {
      $params = $request->getParameter('search');
      unset($params['_csrf_token']);
    } else {
      $this->form_dis = new dispoForm();
      $this->form_dis->bind($request->getParameter('dispo'));
      if ($this->form_dis->isValid()) {
        $params = $this->form_dis->getValues();
      }
    }

    $search_sesion = $params;
    $this->search_form = new searchHotelForm($search_sesion);
    $this->form_dis = new dispoForm($search_sesion);

    $fecha_entrada = Utils::changeFormatDate($search_sesion['fecha-inicio']);
    $fecha_salida = Utils::changeFormatDate($search_sesion['fecha-final']);
    $parame = "languagecode=es&arrival_date=" . $fecha_entrada . "&departure_date=" . $fecha_salida . "&hotel_ids=" . $this->hotel->id . '&detail_level=1';
    $ar_rooms = $this->data->fetchRcp('bookings.getBlockAvailability', $parame);
    $curr = $this->getUser()->getAttribute('currency');
    foreach ($ar_rooms[0]['block'] as $blok) {
      $blok['min_price'][0]['currency'] = $curr['moneda'];
      $blok['min_price'][0]['price'] = number_format($this->cx->Convert("EUR", $curr['moneda'], $blok['min_price'][0]['price']), 2, '.', '');
      $blok['rack_rate'][0]['currency'] = $curr['moneda'];
      $blok['rack_rate'][0]['price'] = number_format($this->cx->Convert("EUR", $curr['moneda'], $blok['rack_rate'][0]['price']), 2, '.', '');

      foreach ($blok['incremental_price'] as $inc) {
        $inc['currency'] = $curr['moneda'];
        $inc['price'] = number_format($this->cx->Convert("EUR", $curr['moneda'], $inc['price']), 2, '.', '');
        $car[] = $inc;
      }
      $blok['incremental_price'] = $car;
      $ar_new_rooms[] = $blok;
    }
    $ar_rooms[0]['block'] = $ar_new_rooms;
    $this->lst_rooms = $ar_rooms[0];
    // Destinos cercanos
    $destiny = Doctrine::getTable('tourRoom')->findAll()->toArray();
    $ar_lst = array();
    foreach ($destiny as $des) {
      $dis = Utils::getDistance($this->hotel->longitude, $this->hotel->latitude, $des['longitude'], $des['latitude'], 2);
      $des['distancia'] = $dis;
      $ar_lst[$des['type']][] = $des;
    }
    $this->lst_destiny = $ar_lst;
    // FIn de destinos cercanos
  }

  public function executeMapa(sfWebRequest $request) {
    $this->la = $request->getParameter('la');
    $this->lo = $request->getParameter('lo');
    $this->ciudad = $request->getParameter('ciudad');
    $this->hotel = $request->getParameter('hotel');
  }

  protected function changeFormatDate($param_search) {
    $day = str_pad($param_search['day'], 2, "0", STR_PAD_LEFT);
    $mon = str_pad(substr($param_search['month'], 5, 2), 2, "0", STR_PAD_LEFT);
    $year = substr($param_search['month'], 0, 4);

    return $year . '-' . $mon . '-' . $day;
  }

  public function executeAllHotels(sfWebRequest $request) {
    $this->ar_slug_city = $this->getArraySlugCity();
    $this->search_form = new searchHotelForm(appFrontend::fechasiniciales());
    $this->star_sesion = $this->getUser()->getAttribute('star_session');
    $this->facil_session = $this->getUser()->getAttribute('facil_session');
//    print_r($this->star_sesion);
    $this->filter = new orderForm($this->getUser()->getAttribute('order'));
    $this->form_currency = new currencyForm($this->getUser()->getAttribute('currency'));
    $this->pager = new sfDoctrinePager('adHotel', sfConfig::get('app_max_hotels'));
    $order = $this->getUser()->getAttribute('order');
    $query = Doctrine::getTable('adHotel')->getHotelsCity('', $order['order'], $this->star_sesion, $this->facil_session);
    $this->num_hotels = Doctrine::getTable('adHotel')->getNumHotels($this->facil_session);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('p', 1));
    $this->pager->init();
    $this->lst_hotel = $this->pager->getResults()->toArray();
    // Destinos cercanos
    $destiny = Doctrine::getTable('tourRoom')->findAll()->toArray();
    $ar_lst = array();
    foreach ($destiny as $des) {
      $ar_lst[$des['type']][] = $des;
    }
    $this->lst_destiny = $ar_lst;
    // FIn de destinos cercanos
    if ($request->isMethod('post')) {
      if ($request->getParameter('search_button') == 'list') {
        $params = $request->getParameter('search');
//      print_r($params);die();
        $this->search_form->bind($params);
        if ($this->search_form->isValid()) {
          $value = $this->search_form->getValues();
          $this->getUser()->setAttribute('search_date', $value);
          $this->redirect('hotels_result');
        }
      } else {
//      print_r($request->getParameter('search'));
        $this->filter->bind($request->getParameter('order_form'));
        if ($this->filter->isValid()) {
          $val = $this->filter->getValues();
          $this->getUser()->setAttribute('order', $val);
          $this->redirect($request->getReferer());
        }
      }
    }
  }

  public function executeChangeCurrency(sfWebRequest $request) {
    $form_currency = new currencyForm();
    $form_currency->bind($request->getParameter('currency_form'));
    if ($form_currency->isValid()) {
      $val = $form_currency->getValues();
      $this->getUser()->setAttribute('currency', $val);
      $this->redirect($request->getReferer());
    }
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
    $this->getUser()->setAttribute('star_session', $star_filter);
    $this->redirect($request->getReferer());
  }

  public function executeOnestar(sfWebRequest $request) {
    $fil = $request->getParameter('chk');
    $cls = $request->getParameter('cls');
//     var_dump($fil);die();
    $star_filter = $this->getUser()->getAttribute('star_session');
    $star_filter[$cls] = $fil ? $fil : '';
    $star_filter['all'] = '';
    $this->getUser()->setAttribute('star_session', $star_filter);

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
    $this->getUser()->setAttribute('facil_session', $facil_filter);
    $this->redirect($request->getReferer());
  }

  public function executeFacil(sfWebRequest $request) {
    $fil = $request->getParameter('chk');
    $cls = $request->getParameter('cls');
//     echo $cls;
//          die ();
    $facil_filter = $this->getUser()->getAttribute('facil_session');
    $facil_filter[$cls] = $fil ? $fil : '';
    $facil_filter['all'] = '';
    $this->getUser()->setAttribute('facil_session', $facil_filter);
    $this->redirect($request->getReferer());
  }
  
  public function executeAudioGuia(sfWebRequest $request) {
    $this->ar_slug_city = $this->getArraySlugCity();
    $this->search_form = new searchHotelForm(appFrontend::fechasiniciales());
    $this->star_sesion = $this->getUser()->getAttribute('star_session');
    $this->facil_session = $this->getUser()->getAttribute('facil_session');
//    print_r($this->star_sesion);
    $this->filter = new orderForm($this->getUser()->getAttribute('order'));
    $this->form_currency = new currencyForm($this->getUser()->getAttribute('currency'));
    $this->num_hotels = Doctrine::getTable('adHotel')->getNumHotels($this->facil_session);
    
    // Destinos cercanos
    $destiny = Doctrine::getTable('tourRoom')->findAll()->toArray();
    $ar_lst = array();
    foreach ($destiny as $des) {
      $ar_lst[$des['type']][] = $des;
    }
    $this->lst_destiny = $ar_lst;
  }

}
