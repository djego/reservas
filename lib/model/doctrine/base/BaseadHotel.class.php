<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('adHotel', 'doctrine');

/**
 * BaseadHotel
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $chkin_from
 * @property string $chkin_to
 * @property string $chkout_from
 * @property string $chkout_to
 * @property string $city
 * @property integer $city_id
 * @property int $class_and
 * @property boolean $class_is_estimated
 * @property double $commission
 * @property string $countrycode
 * @property string $currencycode
 * @property string $district
 * @property integer $hoteltype_id
 * @property boolean $is_closed
 * @property string $latitude
 * @property string $longitude
 * @property int $max_persons_in_reservation
 * @property int $max_rooms_in_reservation
 * @property double $maxrate
 * @property double $minrate
 * @property int $nr_rooms
 * @property boolean $preferred
 * @property int $ranking
 * @property int $review_nr
 * @property string $review_score
 * @property string $url
 * @property string $zip
 * @property string $small_photo
 * @property string $medium_photo
 * @property string $big_photo
 * @property Doctrine_Collection $HotelDescs
 * @property Doctrine_Collection $RoomPhotos
 * @property Doctrine_Collection $HotelServices
 * 
 * @method integer             getId()                         Returns the current record's "id" value
 * @method string              getName()                       Returns the current record's "name" value
 * @method string              getAddress()                    Returns the current record's "address" value
 * @method string              getChkinFrom()                  Returns the current record's "chkin_from" value
 * @method string              getChkinTo()                    Returns the current record's "chkin_to" value
 * @method string              getChkoutFrom()                 Returns the current record's "chkout_from" value
 * @method string              getChkoutTo()                   Returns the current record's "chkout_to" value
 * @method string              getCity()                       Returns the current record's "city" value
 * @method integer             getCityId()                     Returns the current record's "city_id" value
 * @method int                 getClassAnd()                   Returns the current record's "class_and" value
 * @method boolean             getClassIsEstimated()           Returns the current record's "class_is_estimated" value
 * @method double              getCommission()                 Returns the current record's "commission" value
 * @method string              getCountrycode()                Returns the current record's "countrycode" value
 * @method string              getCurrencycode()               Returns the current record's "currencycode" value
 * @method string              getDistrict()                   Returns the current record's "district" value
 * @method integer             getHoteltypeId()                Returns the current record's "hoteltype_id" value
 * @method boolean             getIsClosed()                   Returns the current record's "is_closed" value
 * @method string              getLatitude()                   Returns the current record's "latitude" value
 * @method string              getLongitude()                  Returns the current record's "longitude" value
 * @method int                 getMaxPersonsInReservation()    Returns the current record's "max_persons_in_reservation" value
 * @method int                 getMaxRoomsInReservation()      Returns the current record's "max_rooms_in_reservation" value
 * @method double              getMaxrate()                    Returns the current record's "maxrate" value
 * @method double              getMinrate()                    Returns the current record's "minrate" value
 * @method int                 getNrRooms()                    Returns the current record's "nr_rooms" value
 * @method boolean             getPreferred()                  Returns the current record's "preferred" value
 * @method int                 getRanking()                    Returns the current record's "ranking" value
 * @method int                 getReviewNr()                   Returns the current record's "review_nr" value
 * @method string              getReviewScore()                Returns the current record's "review_score" value
 * @method string              getUrl()                        Returns the current record's "url" value
 * @method string              getZip()                        Returns the current record's "zip" value
 * @method string              getSmallPhoto()                 Returns the current record's "small_photo" value
 * @method string              getMediumPhoto()                Returns the current record's "medium_photo" value
 * @method string              getBigPhoto()                   Returns the current record's "big_photo" value
 * @method Doctrine_Collection getHotelDescs()                 Returns the current record's "HotelDescs" collection
 * @method Doctrine_Collection getRoomPhotos()                 Returns the current record's "RoomPhotos" collection
 * @method Doctrine_Collection getHotelServices()              Returns the current record's "HotelServices" collection
 * @method adHotel             setId()                         Sets the current record's "id" value
 * @method adHotel             setName()                       Sets the current record's "name" value
 * @method adHotel             setAddress()                    Sets the current record's "address" value
 * @method adHotel             setChkinFrom()                  Sets the current record's "chkin_from" value
 * @method adHotel             setChkinTo()                    Sets the current record's "chkin_to" value
 * @method adHotel             setChkoutFrom()                 Sets the current record's "chkout_from" value
 * @method adHotel             setChkoutTo()                   Sets the current record's "chkout_to" value
 * @method adHotel             setCity()                       Sets the current record's "city" value
 * @method adHotel             setCityId()                     Sets the current record's "city_id" value
 * @method adHotel             setClassAnd()                   Sets the current record's "class_and" value
 * @method adHotel             setClassIsEstimated()           Sets the current record's "class_is_estimated" value
 * @method adHotel             setCommission()                 Sets the current record's "commission" value
 * @method adHotel             setCountrycode()                Sets the current record's "countrycode" value
 * @method adHotel             setCurrencycode()               Sets the current record's "currencycode" value
 * @method adHotel             setDistrict()                   Sets the current record's "district" value
 * @method adHotel             setHoteltypeId()                Sets the current record's "hoteltype_id" value
 * @method adHotel             setIsClosed()                   Sets the current record's "is_closed" value
 * @method adHotel             setLatitude()                   Sets the current record's "latitude" value
 * @method adHotel             setLongitude()                  Sets the current record's "longitude" value
 * @method adHotel             setMaxPersonsInReservation()    Sets the current record's "max_persons_in_reservation" value
 * @method adHotel             setMaxRoomsInReservation()      Sets the current record's "max_rooms_in_reservation" value
 * @method adHotel             setMaxrate()                    Sets the current record's "maxrate" value
 * @method adHotel             setMinrate()                    Sets the current record's "minrate" value
 * @method adHotel             setNrRooms()                    Sets the current record's "nr_rooms" value
 * @method adHotel             setPreferred()                  Sets the current record's "preferred" value
 * @method adHotel             setRanking()                    Sets the current record's "ranking" value
 * @method adHotel             setReviewNr()                   Sets the current record's "review_nr" value
 * @method adHotel             setReviewScore()                Sets the current record's "review_score" value
 * @method adHotel             setUrl()                        Sets the current record's "url" value
 * @method adHotel             setZip()                        Sets the current record's "zip" value
 * @method adHotel             setSmallPhoto()                 Sets the current record's "small_photo" value
 * @method adHotel             setMediumPhoto()                Sets the current record's "medium_photo" value
 * @method adHotel             setBigPhoto()                   Sets the current record's "big_photo" value
 * @method adHotel             setHotelDescs()                 Sets the current record's "HotelDescs" collection
 * @method adHotel             setRoomPhotos()                 Sets the current record's "RoomPhotos" collection
 * @method adHotel             setHotelServices()              Sets the current record's "HotelServices" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseadHotel extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ad_hotel');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('address', 'string', 250, array(
             'type' => 'string',
             'length' => 250,
             ));
        $this->hasColumn('chkin_from', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('chkin_to', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('chkout_from', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('chkout_to', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('city', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('city_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('class_and', 'int', 3, array(
             'type' => 'int',
             'length' => 3,
             ));
        $this->hasColumn('class_is_estimated', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('commission', 'double', null, array(
             'type' => 'double',
             ));
        $this->hasColumn('countrycode', 'string', 2, array(
             'type' => 'string',
             'default' => 'ad',
             'length' => 2,
             ));
        $this->hasColumn('currencycode', 'string', 5, array(
             'type' => 'string',
             'length' => 5,
             ));
        $this->hasColumn('district', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('hoteltype_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('is_closed', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('latitude', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('longitude', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('max_persons_in_reservation', 'int', 2, array(
             'type' => 'int',
             'length' => 2,
             ));
        $this->hasColumn('max_rooms_in_reservation', 'int', 2, array(
             'type' => 'int',
             'length' => 2,
             ));
        $this->hasColumn('maxrate', 'double', null, array(
             'type' => 'double',
             ));
        $this->hasColumn('minrate', 'double', null, array(
             'type' => 'double',
             ));
        $this->hasColumn('nr_rooms', 'int', 2, array(
             'type' => 'int',
             'length' => 2,
             ));
        $this->hasColumn('preferred', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('ranking', 'int', 2, array(
             'type' => 'int',
             'length' => 2,
             ));
        $this->hasColumn('review_nr', 'int', 2, array(
             'type' => 'int',
             'length' => 2,
             ));
        $this->hasColumn('review_score', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('url', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('zip', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('small_photo', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('medium_photo', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('big_photo', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('adHotelDescription as HotelDescs', array(
             'local' => 'id',
             'foreign' => 'hotel_id'));

        $this->hasMany('adHotelRoomPhoto as RoomPhotos', array(
             'local' => 'id',
             'foreign' => 'hotel_id'));

        $this->hasMany('adHotelService as HotelServices', array(
             'local' => 'id',
             'foreign' => 'hotel_id'));

        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->actAs($sluggable0);
    }
}