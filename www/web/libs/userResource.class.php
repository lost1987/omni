<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-24
 * Time: 上午11:16
 */

namespace web\libs;
use web\model\ProfileModel;
use web\model\UserModel;

/***
 * 用户的资源操作类
 * Class UserResource
 * @package web\libs
 */
class UserResource {

    //金币
    const COINS = '_coins';
    //钻石
    const DIAMOND = '_diamond';
    //票
    const TICKET = '_ticket';
    //礼券
    const COUPON = '_coupon';

    const EGG = '_egg';

    const FLOWER = '_flower';

    const HORN = '_horn';

    const PRIVATE_ROOM_CARD = '_private_room_card';

    //action_type
    const ACTION_EXCHANGE = 1;
    const ACTION_LOTTERY = 2;
    const ACTION_PAYMENT = 3;
    const ACTION_REGISTER = 4;
    const ACTION_SETMOBILE = 5;

    private $_coins = null;

    private $_diamond = null;

    private $_ticket = null;

    private $_coupon = null;

    private $_egg = null;

    private $_flower = null;

    private $_horn = null;

    private $_private_room_card = null;

    private $_uid = null;

    private static $_instance = null;

    private $userProfileModel = null;

    /**
     * 用户profile表的数据
     * @param array $userProfile
     */
    function __construct(Array $userProfile){
            $this->userProfileModel = ProfileModel::instance();
            $this->_coins = $userProfile['coins'];
            $this->_diamond = $userProfile['diamond'];
            $this->_coupon = $userProfile['coupon'];
            $this->_ticket = $userProfile['ticket'];
            $this->_uid = $userProfile['user_id'];
            $this->_flower = $userProfile['flower'];
            $this->_egg = $userProfile['egg'];
            $this->_horn = $userProfile['horn'];
            $this->_private_room_card = $userProfile['private_room_card'];
    }

    static function instance(Array $userProfile){
         if(self::$_instance == null)
             self::$_instance = new self($userProfile);
        return self::$_instance;
    }

    /**
     * @param $resource_type 资源字段前 需加'_'  例如字段是diamond 那么传入的就应该是_diamond
     * @param int $amount
     */
    function add($resource_type,$amount=1){
            $this->$resource_type += $amount;
    }

    /**
     * @param $resource_type
     * @param int $amount
     */
    function cost($resource_type,$amount=1){
            $this->$resource_type -= $amount;
    }

    function updateResource(){
            $params = array(
                'coins' => $this->_coins,
                'diamond'=>$this->_diamond,
                'coupon' => $this->_coupon,
                'ticket' => $this->_ticket,
                'flower' => $this->_flower,
                'egg'=>$this->_egg,
                'horn'=>$this->_horn,
                'private_room_card'=>$this->_private_room_card
            );

            return $this->userProfileModel->updateProfile($params,$this->_uid);
    }

    /**
     * 动态获取资源
     * @param $resource_type
     * @return mixed
     */
    function getResource($resource_type){
        return $this->$resource_type;
    }

    /**
     * @return null
     */
    public function getCoins()
    {
        return $this->_coins;
    }

    /**
     * @return null
     */
    public function getCoupon()
    {
        return $this->_coupon;
    }

    /**
     * @return null
     */
    public function getDiamond()
    {
        return $this->_diamond;
    }

    /**
     * @return null
     */
    public function getTicket()
    {
        return $this->_ticket;
    }

    /**
     * @return null
     */
    public function getUid()
    {
        return $this->_uid;
    }

    /**
     * @return null
     */
    public function getEgg()
    {
        return $this->_egg;
    }

    /**
     * @return null
     */
    public function getFlower()
    {
        return $this->_flower;
    }

    /**
     * @return null
     */
    public function getHorn()
    {
        return $this->_horn;
    }

    /**
     * @return null
     */
    public function getPrivateRoomCard()
    {
        return $this->_private_room_card;
    }
} 