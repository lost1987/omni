<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/21
 * Time: 下午5:01
 */

namespace api\libs\exchange;
use utils\Tools;
use web\libs\UserResource;
use web\model\StoreProductsModel;
use web\model\UserResourceLogModel;

/**
 * 兑换货币类商品类
 * Class MonetaryExchange
 * @package api\libs\exchange
 */
class MonetaryExchange extends BaseExchange implements IExchange{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }
    /**
     * 兑换的具体实现
     * @param $profile 用户的资源信息
     * @param $product_id 商品IDM
     * @param $login_name 用户的登录账号
     * @return json
     */
    function doExchange($profile, $product_id,$login_name)
    {
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
                    'name' => '',
                    'address' => '',
                    'mobile' => 0
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