<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 14/10/23
     * Time: 下午2:51
     */

    namespace web\libs\exchange;

    use core\Controller;
    use web\libs\DataUtil;
    use  web\model\ProfileModel;
    use  web\libs\Error;
    use  web\libs\UserResource;
    use  web\model\IndexHandleResultModel;
    use  web\model\ProductOrderModel;
    use core\Configure;
    use utils\Tools;

    class RealExchange extends Controller implements IExchange{

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
        function doExchange($product, $user)
        {

            $name = $this->input->post('name');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');

            if(empty($name) || empty($mobile) || empty($address))
                $this->response(null,Error::ERROR_STRING_FORMAT);

            $cost_amount = intval($product['price']);
            $price_types_columns = Configure::instance()->web['price_type_columns'];
            $cost_name = $price_types_columns[$product['price_type']];

            $uid = $user['uid'];
            $userProfile = ProfileModel::instance()->read($uid);
            if($cost_amount > $userProfile[ $cost_name ])
                $this->response(null,Error::ERROR_RESOURCE_LESS);

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
                    'mobile' => $mobile,
                    'product_name' => $product['name'],
                    'cost_info' =>$product['price'].$this->config->web['price_type'][$product['price_type']],
                    'get_info' => empty($product['tool']) ? '/' : $product['tool'].$this->config->web['tool_type'][$product['tool_type']]
                );

                if(!$productOrderModel->save($params))
                    throw new \Exception(Error::ERROR_DATA_WRITE);

                $this->db->commit();

                DataUtil::instance()->doAfterExchange($product,$userProfile);
                //成功
                $this->response();

            }catch (\Exception $e){
                $this->db->rollback();
                Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'兑换实物出错',$e);
                //失败
                $this->response(null,$e->getMessage());
            }
        }

    }