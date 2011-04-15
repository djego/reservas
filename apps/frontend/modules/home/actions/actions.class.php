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

	//$param_initial = array('');
	$param_initial = Array ('ciudad' => '', 'fecha-inicio' => Array ('day' => date('d'), 'month' =>  date('m')+0), 'fecha-final' => Array ('day' => date('d'), 'month' => date('m')+0)); 
	$this->form =  new searchForm($param_initial);

		    // $this->forward('default', 'module');
//    $this->data = new fwoData();
    $lst_ciudades = $this->data->fetchRcp('bookings.getCities', 'countrycodes=ad');
    $this->lst_ciudad = $lst_ciudades;

	
  }
  public function executeCity(sfWebRequest $request) {
//    if(!$city_id = $request->getParameter('id')){
//      $this->redirect('homepage');
//    }
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

  }

  public function executeSearch(sfWebRequest $request) {
  	$this->form =  new searchForm($this->getUser()->getAttribute('searching'));
  	
    $param_search = $request->getParameter('search');
	$this->form->bind($param_search);
	if($this->form->isValid()){
		$this->getUser()->setAttribute('searching',$this->form->getValues());
	}
//		print_r($param_search);die();
		if(!$param_search['ciudad']) $this->redirect('homepage');
    	$q_name = strtoupper($param_search['ciudad']);
    	$param="languagecodes=es&countrycodes=ad";
    	$lst_city = $this->data->fetchRcp('bookings.getCities', $param);
    	foreach ($lst_city as $city){
      		$city_name =  strtoupper($city['name']);
       		if(strpos($city_name, $q_name) > -1){
       			$diai = str_pad($param_search['fecha-inicio']['day'], 2, "0", STR_PAD_LEFT);
				$mesi = str_pad($param_search['fecha-inicio']['month'], 2, "0", STR_PAD_LEFT);
				$diaf = str_pad($param_search['fecha-final']['day'], 2, "0", STR_PAD_LEFT);
				$mesf = str_pad($param_search['fecha-final']['month'], 2, "0", STR_PAD_LEFT);
       			$ini = '2011-'.$mesi.'-'.$diai;
       			$fin = '2011-'.$mesf.'-'.$diaf;       			
       			
       			$param="arrival_date=".$ini."&departure_date=".$fin."&city_ids=".$city['city_id'];
    			if($lst_hoteles = $this->data->fetchRcp('bookings.getHotelAvailability', $param)){
    				$ar_cities[] = $city;
    			}
         		
       		}
       		
      	///echo $city['name'].'<br>';
    	}
    	$this->lst_ciudad = $ar_cities;
        

  }
}
