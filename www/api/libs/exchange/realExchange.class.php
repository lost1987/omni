<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/21
 * Time: 下午5:02
 */

namespace api\libs\exchange;

use api\libs\Error;
use utils\Tools;
use web\libs\DataUtil;
use web\libs\UserResource;
use web\libs\UserUtil;
use web\model\StoreProductsModel;
use web\model\UserModel;
use web\model\UserResourceLogModel;

class RealExchange extends BaseExchange implements IExchange{

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
        $address = $this->input->post('address');
        if(!Tools::is_mobile($mobile))
            $this->response(null,Error::FORM_STRING_FORMAT);
        if(empty($name))
            $this->response(null,Error::FORM_STRING_FORMAT);
        if(empty($address))
            $this->response(null,Error::FORM_STRING_FORMAT);

        $product = StoreProductsModel::instance()->read($product_id);
        $user = UserModel::instance()->getUserByLoginName($login_name);
        $product['price'] = UserUtil::instance()->vipResourceDiscount($product['price'],$user['vip_level']);
        unset($user);
        $this->checkProductAndResource($profile,$product);

        try{
            $this -> db -> begin();
            //更改用户资源
            $this ->changeUserResource($profile,$product);

            $indexResultHandler = array(
                'handler_type' => 3,
                'reporter_name'=>$login_name,
                'result' => 0,
                'note' => ''
            );

            $productOrder = array(
                'product_id' => $product['id'],
                'user_id' => $profile['user_id'],
                'create_at' => date('Y-m-d H:i:s'),
                'ip' => Tools::getip(),
                'name' => $name,
                'address' => $address,
                'mobile' => $mobile,
                'product_name' => $product['name'],
                'cost_info' =>$product['price'].$this->config->web['price_type'][$product['price_type']],
                'get_info' => empty($product['tool']) ? '/' : $product['tool'].$this->config->web['tool_type'][$product['tool_type']]
            );

            //处理商品记录
            $this->saveUserProductInfo($indexResultHandler,$productOrder);
            $this-> db -> commit();

            DataUtil::instance()->doAfterExchange($product,$profile);
            $this->response(null);

        }catch (\Exception $e){
            $this->db->rollback();
            $this->response(null,$e->getMessage());
        }

    }

} 