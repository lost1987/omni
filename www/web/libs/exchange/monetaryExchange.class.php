<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/23
 * Time: 下午2:49
 */

namespace web\libs\exchange;

use  core\Controller;
use  web\model\ProfileModel;
use  web\libs\Error;
use  core\Cookie;
use  web\libs\UserResource;
use  web\model\IndexHandleResultModel;
use  web\model\ProductOrderModel;
use core\Configure;
use core\Encoder;
use utils\Tools;

class MonetaryExchange extends Controller implements IExchange{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 兑换金币
     * @param $product 对应store_products 表里的产品
     * @param $user  用户数组
     * @param $response 上文传入的response数组
     * @throws \Exception
     * error : 4 对应资源不足
     */
    function doExchange($product, $user, $response)
    {
        $cost_amount = intval($product['price']);
        $add_amount = intval($product['tool']);

        $tool_types_columns = Configure::instance()->web['tool_type_columns'];
        $price_types_columns = Configure::instance()->web['price_type_columns'];

        $cost_name = $price_types_columns[$product['price_type']];
        $add_name = $tool_types_columns[$product['tool_type']];

        $uid = $user['uid'];
        $userProfile = ProfileModel::instance()->read($uid);
        if($cost_amount > $userProfile[ $cost_name ])
        {
            $response['error'] = Error::ERROR_RESOURCE_LESS;
            die(Encoder::instance()->encode($response));
        }

        try{
            $this->db->begin();
            $user_resource = UserResource::instance($userProfile);
            $user_resource->cost('_'.$cost_name,$cost_amount);
            $user_resource->add('_'.$add_name,$add_amount);

            if(!$user_resource->updateResource())
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $handleResultModel = IndexHandleResultModel::instance();
            $params = array(
                'handler_type' => 3,
                'reporter_name'=>$user['login_name'],
                'result' => 4,
                'note' => ''
            );

            if(!$handleResultModel->save($params))
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $handler_id = $this->db->insert_id();

            $productOrderModel = ProductOrderModel::instance();
            $params = array(
                'product_id' => $product['id'],
                'user_id' => $uid,
                'create_at' => date('Y-m-d H:i:s'),
                'ip' => Tools::getip(),
                'handler_id' => $handler_id,
                'name' => '',
                'address' => '',
                'mobile' => 0
            );

            if(!$productOrderModel->save($params))
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $this->db->commit();
            //成功
            die(Encoder::instance()->encode($response));

        }catch (\Exception $e){
            $this->db->rollback();
            //失败
            $response['error'] = $e->getMessage();
            die(Encoder::instance()->encode($response));
        }
    }
} 