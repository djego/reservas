<?php

/**
 * tourRoom
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class tourRoom extends BasetourRoom
{

  public function getHotel(){
    $q = Doctrine::getTable('adHotel')->createQuery();
    $q->select('COUNT(*) as htotal');
    $q->where('latitude > '.($this->latitude - sfConfig::get('app_dis_la')));
    $q->andWhere('latitude < '.($this->latitude + sfConfig::get('app_dis_la')));
    $q->andWhere('longitude > '.($this->longitude - sfConfig::get('app_dis_lo')));
    $q->andWhere('longitude < '.($this->longitude + sfConfig::get('app_dis_lo')));
    $res = $q->fetchOne();
    return $res['htotal'];
  }
}