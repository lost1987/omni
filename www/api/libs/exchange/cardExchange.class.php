<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/23
 * Time: 上午9:40
 */

namespace api\libs\exchange;


use api\libs\Error;
use utils\Tools;
use web\libs\UserResource;
use web\model\StoreProductsModel;
use web\model\UserResourceLogModel;

class CardExchange  extends BaseExchange implements IExchange{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 兑换的具体实现
     * @param $profile 用户的资源信息
     * @param $product_id 商品ID
     * @param $login_name 用户的登录账号
     * @return json
     */
    function doExchange($profile, $product_id, $login_name)
    {
            //验证必填信息
            $name = $this->input->post('name');
            $mobile = $this->input->post('mobile');
            $mobile1 = $this->input->post('mobile1');
            if(!Tools::is_mobile($mobile))
                    $this->response(null,Error::FORM_STRING_FORMAT);
            if($mobile != $mobile1)
                    $this->response(null,Error::STRING_CMP_ERROR);
            if(empty($name))
                    $this->response(null,Error::FORM_STRING_FORMAT);

            $product = StoreProductsModel::instance()->read($product_id);
            $this->checkProductAndResource($profile,$product);

            try{
                $this -> db -> begin();
                //更改用户资源
                $this ->changeUserResource($profile,$product);

                $indexResultHandler = array(
                    'handler_type' => 3,
                    'reporter_name'=>$login_name,
                    'result' => 4,
                    'note' => ''
                );

                $productOrder = array(
                    'product_id' => $product['id'],
                    'user_id' => $profile['user_id'],
                    'create_at' => date('Y-m-d H:i:s'),
                    'ip' => Tools::getip(),
                    'name' => $name,
                    'address' => '',
                    'mobile' => $mobile
                );

                //处理商品记录
                $this->saveUserProductInfo($indexResultHandler,$productOrder);
                $this-> db -> commit();
                $data = array(
                    'action_type' => UserResource::ACTION_EXCHANGE,//资源变动类型:玩家兑换
                    'tool_type' => $product['tool_type'],
                    'price_type' => $product['price_type'],
                    'price' => intval( $product['price'] ),
                    'tool' => intval( $product['tool'] ),
                    'uid' => $profile['uid']
                );
                UserResourceLogModel::instance()->save($data);
                $this->resourceChangeNotify($profile['user_id']);
                $this->response(null);

            }catch (\Exception $e){
                $this->db->rollback();
                $this->response(null,$e->getMessage());
            }
    }


} 