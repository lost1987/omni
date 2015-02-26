<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/20
 * Time: 上午9:50
 * 商城相关
 */

namespace api\controller;


use api\libs\Error;
use api\libs\exchange\FactoryExchange;
use core\Baseapi;
use utils\Tools;
use web\libs\UserUtil;
use web\model\ProfileModel;
use web\model\PurchaseProfileModel;
use web\model\UserModel;

/**
 * 商品,资源兑换类
 * Class Store
 * @package api\controller
 */
class Store extends Baseapi{

    /**
     * 读取所有商品
     */
    function lists(){
        $session = $this->check_session( $this->input->post( 'sessionid' ) );
        if ( !$session )
            $this->response( null , Error::USER_NOT_LOGIN );

        $uid = $session['uid'];
        $vipLv = UserModel::instance()->getVipLevel($uid);

        $sql = " SELECT id,image,is_promote,name,price,price_type,top_timestamp,is_top,product_type FROM store_products WHERE is_visible=1";
        $this->db->execute($sql);
        $products = $this->db->fetch_all();
        if(false == $products)
            $this->response(0);

        foreach($products as &$product){
                $product['price_type_display'] = $this->config->web['price_type'][ $product['price_type'] ];
                $product['is_promote'] = $product['is_promote'] ? true : false;
                $product['is_top'] = $product['is_top'] ? true : false;
                $product['top_timestamp'] = empty($product['top_timestamp']) ? 0 : $product['top_timestamp'];
                $product['image'] = WWW_HOST.$product['image'];
                $product['price'] = UserUtil::instance()->vipResourceDiscount($product['price'],$vipLv);
                unset($product['price_type']);
        }

        $products = Tools::std_multi_array_format($products);

        $output = array(
            'meta' => array(
                'limit' => 0,
                'offset' => 0,
                'total_count' => count($products)
            ),
            'objects' => $products
        );

        $this->response($output);
    }

    /**
     * 兑换
     */
    function exchange(){
        $session = $this->check_session($this->input->post('sessionid'));
        if(!$session)
            $this->response(null,Error::USER_NOT_LOGIN);

        $uid = $session['uid'];
        $user_number = $session['user_number'];
        $login_name = $session['login_name'];
        $purchase_password = $this->input->post('purchase_password');
        //验证消费密码
        $gprofile = PurchaseProfileModel::instance()->read($uid);
        if(empty($gprofile['purchase_password']))
             $this->response(null,Error::PASSWORD_UNSET);

        $password = UserUtil::instance()->makePassword($purchase_password,$user_number);
        if($password != $gprofile['purchase_password'])
            $this->response(null,Error::PASSWORD_INVALID);

        //兑换类型
        $type = $this->args[0];
        if(empty($type))
            $this->response(null,Error::EXCHANGE_TYPE_ERROR);

        $profile = ProfileModel::instance()->read($uid);
        $class = ucfirst($type).'Exchange';
        $product_id = $this->input->post('product_id');
        FactoryExchange::invoke($class)->doExchange($profile,$product_id,$login_name);

    }



} 