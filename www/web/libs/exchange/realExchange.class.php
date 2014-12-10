<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/23
 * Time: 下午2:51
 */

namespace web\libs\exchange;

use  web\model\ProfileModel;
use  web\libs\Error;
use  web\libs\UserResource;
use  web\model\IndexHandleResultModel;
use  web\model\ProductOrderModel;
use core\Configure;
use core\Encoder;
use utils\Tools;
use web\model\UserResourceLogModel;

class RealExchange extends  BaseExchange implements IExchange{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 兑换实物
     * @param $product 对应store_products 表里的产品
     * @param $user  用户数组
     * @param $response 上文传入的response数组
     * @throws \Exception
     * error : 4 对应资源不足
     */
    function doExchange($product, $user, $response)
    {

        $name = $this->args[1];
        $mobile = $this->args[2];
        $address = $this->input->post('address');

        if(empty($name) || empty($mobile) || empty($address)){
            $response['error'] = Error::ERROR_STRING_FORMAT;
            die(Encoder::instance()->encode($response));
        }

        $cost_amount = intval($product['price']);
        $price_types_columns = Configure::instance()->web['price_type_columns'];
        $cost_name = $price_types_columns[$product['price_type']];

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

            if(!$user_resource->updateResource())
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $handleResultModel = IndexHandleResultModel::instance();
            $params = array(
                'handler_type' => 3,
                'reporter_name'=>$user['login_name'],
                'result' => 0,
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
                'name' => $name,
                'address' => $address,
                'mobile' => $mobile
            );

            if(!$productOrderModel->save($params))
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $this->db->commit();
            $data = array(
                'action_type' => UserResource::ACTION_EXCHANGE,//资源变动类型:玩家兑换
                'tool_type' => $product['tool_type'],
                'price_type' => $product['price_type'],
                'price' => intval( $product['price'] ),
                'tool' => intval( $product['tool'] ),
                'uid' => $uid
            );
            UserResourceLogModel::instance()->save($data);
            $this->resourceChangeNotify($uid);
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