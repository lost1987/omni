<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 14/10/23
     * Time: 上午9:59
     */

    namespace api\libs\exchange;


    use api\libs\Error;
    use core\Baseapi;
    use utils\Das;
    use web\libs\UserResource;
    use web\model\IndexHandleResultModel;
    use web\model\ProductOrderModel;

    class BaseExchange extends Baseapi
    {

        /**
         * 检查商品是否存在以及验证用户资源
         * @param $profile    用户资源信息
         * @param $product_id 商品ID
         * @return bool
         */
        protected function checkProductAndResource( $profile , $product )
        {

            if ( false == $product )
                $this->response( null , Error::NO_SUCH_PRODUCT );

            //得到价格的资源字段值 例如 coins,ticket等
            $price_type_column = $this->config->web['price_type_columns'][ $product['price_type'] ];
            if ( intval( $profile[ $price_type_column ] ) < intval( $product['price'] ) )
                $this->response( null , Error::NOT_ENOUGH_RESOURCE );

        }

        /**
         * 扣除和增加用户的资源
         * @param $profile
         * @param $product
         * @throws \Exception
         */
        protected function changeUserResource( $profile , $product )
        {
            $cost_amount = intval( $product['price'] );
            $add_amount = intval( $product['tool'] );

            $user_resource = UserResource::instance( $profile );

            if($cost_amount > 0) {
                $price_types_columns = $this->config->web['price_type_columns'];
                $cost_name = $price_types_columns[ $product['price_type'] ];
                $user_resource->cost( '_' . $cost_name , $cost_amount );
            }

            if ($add_amount > 0){
                $tool_types_columns = $this->config->web['tool_type_columns'];
                $add_name = $tool_types_columns[ $product['tool_type'] ];
                $user_resource->add( '_' . $add_name , $add_amount );
            }


            if ( !$user_resource->updateResource() )
                throw new \Exception( Error::DATA_WRITE_ERROR );
        }

        /**
         * 处理用户兑换商品的记录
         * @param $indexResultHandler
         * @param $productOrder
         * @throws \Exception
         */
        protected function saveUserProductInfo( $indexResultHandler , $productOrder )
        {
            $handleResultModel = IndexHandleResultModel::instance();
            if ( !$handleResultModel->save( $indexResultHandler ) )
                throw new \Exception( Error::DATA_WRITE_ERROR );

            $handler_id = $this->db->insert_id();
            $productOrder['handler_id'] = $handler_id;
            $productOrderModel = ProductOrderModel::instance();

            if ( !$productOrderModel->save( $productOrder ) )
                throw new \Exception( Error::DATA_WRITE_ERROR );
        }

    }