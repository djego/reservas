<?php

class myUser extends sfBasicSecurityUser {

  public function addViewHotel(adHotel $hotel) {
    $ids = $this->getAttribute('hotel_history', array());
    if (!in_array($hotel->getId(), $ids)) {
      array_unshift($ids, $hotel->getId());
      $this->setAttribute('hotel_history', array_slice($ids, 0, 3));
    }
  }

  public function getHotelHistory() {
    $ids = $this->getAttribute('hotel_history', array());
    if (!empty($ids)) {
      return Doctrine_Core::getTable('adHotel')
              ->createQuery('a')
              ->whereIn('a.id', $ids)
              ->execute()
      ;
    }
    return array();
  }
}
