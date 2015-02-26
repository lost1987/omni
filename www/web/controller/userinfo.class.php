<?php
    /**
     * Created by PhpStorm.
     * User: lost
     * Date: 14-9-18
     * Time: 下午3:09
     * 用户个人信息相关操作
     */

    namespace web\controller;

    use core\Controller;
    use core\DB;
    use core\Encoder;
    use core\Redis;
    use utils\Das;
    use utils\Page;
    use utils\Tools;
    use web\libs\Error;
    use web\libs\Helper;
    use common\Platform;
    use web\libs\UserResource;
    use web\libs\UserUtil;
    use core\Cookie;
    use core\Configure;
    use web\model\ArticlesModel;
    use web\model\GameSummaryModel;
    use web\model\ProductOrderModel;
    use web\model\ProfileModel;
    use web\model\PurchaseProfileModel;
    use web\model\UserAuthModel;
    use web\model\UserMessageModel;
    use web\model\UserModel;
    use web\model\UserResourceLogModel;

    /**
     * 用户信息
     * Class Userinfo
     * @package web\controller
     */
    class Userinfo extends Controller
    {
        /**
         * 用户详细页
         */
        function index()
        {
            UserUtil::instance()->checkLogin( '/error/index/' . Error::ERROR_NO_LOGIN );

            $uid = Cookie::instance()->userdata( 'uid' );
            $areas = Configure::instance()->web['areas'];
            $userModel = UserModel::instance();
            $user = $userModel->getUserProfile( $uid );

            $avatar_name = 'male';
            if ( $user['gender'] == 0 ) {//男
                $user['gender'] = '男';
                $user['avatar_path'] = STATIC_HOST . '/images/tx/male' . ( $user['avatar'] + 1 ) . '.jpg';
            } else {//女
                $user['gender'] = '女';
                $user['avatar_path'] = STATIC_HOST . '/images/tx/female' . ( $user['avatar'] + 1 ) . '.jpg';
                $avatar_name = 'female';
            }
            $user['area_name'] = $areas[ $user['area'] ];
            $user['mobile'] = Tools::entry_phone( $user['mobile'] );
            $vip_level = Cookie::instance()->userdata('vip_level');
            if($vip_level > 0)
                $this->output_data['vip'] = 1;

            $this->output_data['user'] = $user;
            $this->output_data['areas'] = $areas;
            $this->output_data['avatar_name'] = $avatar_name;
            $this->output_data['userAuth'] = UserUtil::instance()->get_auth($uid);

            /*读取purchaseprofile 数据***/
            $purchase = PurchaseProfileModel::instance()->read( $uid );
            $this->output_data['is_set_purchase'] = empty( $purchase['purchase_password'] ) ? 0 : 1;
            $this->output_data['csrf_token'] = Cookie::instance()->get_csrf_cookie();

            $this->output_data['userInfoActive'] = 'active';
            $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
            $this->tpl->display( 'user_info.html' , $this->output_data );
        }


        function myOrders(){
            UserUtil::instance()->checkLogin( '/error/index/' . Error::ERROR_NO_LOGIN );
            $uid = Cookie::instance()->userdata( 'uid' );

            $page = empty($this->args[0]) ? 1 : $this->args[0];
            $count = 10;
            $start = ($page - 1) * $count;

            /*读取订单**/
            $orderlist = ProductOrderModel::instance()->read( $uid , $start , $count );
            //为了兼容老版本商城
            foreach($orderlist as &$item){
                $item['product_name'] = empty($item['product_name']) ? $item['name'] : $item['product_name'];
            }
            $total = ProductOrderModel::instance()->read_num_rows($uid);
            $orderstatus = Configure::instance()->web['order_status'];
            if ( is_array( $orderlist ) ) {
                foreach ( $orderlist as &$order ) {
                    $order['status'] = $orderstatus[ $order['result'] ];
                    $order['create_at'] = substr($order['create_at'],0,10);
                }
            }
            //处理分页
            $params = array(
                'total_rows'=>$total, #(必须)
                'method'    =>'html', #(必须)
                'parameter' =>'/userinfo/myOrders/?',  #(必须)
                'now_page'  =>$page,  #(必须)
                'list_rows' =>$count, #(可选) 默认为15
                'use_tag_li' => true,
                'li_classname' =>'active'
            );
            $pagiation = new Page($params);
            if($pagiation->getTotalPage() > 1)
                $this->output_data['pagiation'] = $pagiation->show(1);

            $this->output_data['orderlist'] = $orderlist;
            $this->output_data['userOrderActive'] = 'active';
            $this->tpl->display('user_order.html',$this->output_data);
        }


        function myScore(){
            UserUtil::instance()->checkLogin( '/error/index/' . Error::ERROR_NO_LOGIN );
            $uid = $uid = Cookie::instance()->userdata( 'uid' );
            $profile = ProfileModel::instance()->read($uid);
            /*读取game sammuy**/
            $gs = GameSummaryModel::instance()->read( $uid );
            //获取用户的个人排名
            $r = new Redis( $this->config->web['redis']['host'] , $this->config->web['redis']['port'] );
            $redis = $r->getResource();
            $redis->select(2);
            $rank = $redis->hMGet( 'global:rank_info:user:' . Cookie::instance()->userdata( 'user_number' ) , array( 'coins_rank' ) );
            $this->output_data['myrank'] = (empty( $rank['coins_rank'] ) || intval( $rank['coins_rank'] ) == 9999) ? '/' : $rank['coins_rank'];
            $this->output_data['wins'] = empty( $gs['wins'] ) ? 0 : $gs['wins'];
            $this->output_data['total'] = empty( $gs['total'] ) ? 0 : $gs['total'];
            $this->output_data['ratio'] = UserUtil::instance()->userRatio( $this->output_data['wins'] , $this->output_data['total'] );
            $this->output_data['jinding'] = empty( $gs['goldtop'] ) ? 0 : $gs['goldtop'];
            $this->output_data['qingyise'] = empty( $gs['allonesuite'] ) ? 0 : $gs['allonesuite'];
            $this->output_data['fengyise'] = empty( $gs['allwind'] ) ? 0 : $gs['allwind'];
            $this->output_data['pengpenghu'] = empty( $gs['alltriples'] ) ? 0 : $gs['alltriples'];
            $this->output_data['profile'] = $profile;
            $this->output_data['userScoreActive'] = 'active';
            $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
            $this->tpl->display('user_achivement.html',$this->output_data);
        }


        function updateAvatar()
        {
            UserUtil::instance()->checkLogin();

            $uid = Cookie::instance()->userdata( 'uid' );
            $avatar = intval( $this->input->post( 'avatar' ) );

            $vipLv = UserModel::instance()->getVipLevel($uid);
            if($vipLv == 0 && $avatar > 2)
                $this->response(null,Error::ERROR_VIP_LEVEL_NOT_ENOUGH);

            $fields = array(
                'avatar' => $avatar
            );

            if ( !ProfileModel::instance()->updateProfile( $fields , $uid ) )
                $this->response(null,Error::ERROR_DATA_WRITE);

            $this->response();
        }


        function updateArea()
        {
            UserUtil::instance()->checkLogin();

            $area = intval( $this->input->post( 'area' ) );
            $profileModel = ProfileModel::instance();
            $uid = Cookie::instance()->userdata( 'uid' );
            if ( !$profileModel->updateProfile( array( 'area' => $area ) , $uid ) )
                $this->response(null,Error::ERROR_DATA_WRITE);
            $this->response($this->config->web['areas'][$area]);
        }

        function updatePassword()
        {
            /*
                * 0 修改成功
                * 1  旧密码错误
                * 3 登录信息过期
                * 4 网络错误
                */
            UserUtil::instance()->checkLogin();

            $old_pass = $this->input->post( 'old_pass' );
            $new_pass = $this->input->post( 'new_pass' );

            $uid = Cookie::instance()->userdata( 'uid' );
            $userModel = UserModel::instance();
            $user = $userModel->getUserByUid( $uid );

            if(strlen($old_pass) != 32 || strlen($new_pass) != 32)
                $this->response(null,Error::ERROR_STRING_FORMAT);

            if ( !UserUtil::instance()->is_password_valid( $old_pass , $user['password'] , $user['user_number'] ) )
                $this->response(null,Error::ERROR_LOGIN_PWD);

            $new_pass = UserUtil::instance()->makePassword( $new_pass , $user['user_number'] );

            if ( !$userModel->updateUser( array( 'password' => $new_pass ) , $uid ) )
                $this->response(null,Error::ERROR_DATA_WRITE);

            $this->response();
        }


        function updatePurchase()
        {
            /*
                        * 0 修改成功
                        * 1  旧密码错误
                        * 3 登录信息过期
                        * 4 网络错误
                        */
            UserUtil::instance()->checkLogin();

            $old_pass = $this->input->post( 'old_pass' );
            $new_pass = $this->input->post( 'new_pass' );

            $uid = Cookie::instance()->userdata( 'uid' );
            $userModel = UserModel::instance();
            $user = $userModel->getUserByUid( $uid );
            $purchaseModel = PurchaseProfileModel::instance();
            $purchase = $purchaseModel->read( $uid );

            if ( !UserUtil::instance()->is_purchase_password_valid( $old_pass , $purchase['purchase_password'] , $user['user_number'] ) )
                $this->response(null,Error::ERROR_PURCHASE_PWD);

            $new_pass = UserUtil::instance()->makePassword( $new_pass , $user['user_number'] );

            if ( !$purchaseModel->updateProfile( array( 'purchase_password' => $new_pass ) , $uid ) ) {
                $this->response(null,Error::ERROR_DATA_WRITE);
            }
            $this->response();
        }

        function setPurchase()
        {
            /*
                        * 0 修改成功
                        * 1  旧密码错误
                        * 3 登录信息过期
                        * 4 网络错误
                        */
            UserUtil::instance()->checkLogin();

            $new_pass = $this->input->post( 'new_pass' );

            $uid = Cookie::instance()->userdata( 'uid' );
            $userModel = UserModel::instance();
            $user = $userModel->getUserByUid( $uid );

            $new_pass = UserUtil::instance()->makePassword( $new_pass , $user['user_number'] );

            $model = PurchaseProfileModel::instance();
            $purchase_profile = $model->read( $uid );

            if ( false == $purchase_profile ) {//写入
                $fields = array(
                    'user_id'           => $uid ,
                    'purchase_password' => $new_pass ,
                    'confirmation_key'  => ''
                );
                if ( !PurchaseProfileModel::instance()->saveProfile( $fields ) )
                   $this->response(null,Error::ERROR_DATA_WRITE);

            } else {//更新
                $fields = array(
                    'purchase_password' => $new_pass
                );
                if ( !PurchaseProfileModel::instance()->updateProfile( $fields , $uid ) )
                    $this->response(null,Error::ERROR_DATA_WRITE);
            }

            $this->response();
        }

        /**
         * 用户订单详情
         */
        function showProductDetail()
        {
            UserUtil::instance()->checkLogin();

            $orderid = intval( $this->input->post( 'orderid' ) );
            $product = ProductOrderModel::instance()->readByOrderId( $orderid );
            $price_types = Configure::instance()->web['price_type'];
            $tool_types = Configure::instance()->web['tool_type'];
            $order_status = Configure::instance()->web['order_status'];
            $product['price_type'] = $price_types[ $product['price_type'] ];
            $product['tool_type'] = $tool_types[ $product['tool_type'] ];
            $product['status'] = $order_status[ $product['result'] ];
            $product['create_at'] = date( 'Y-m-d' , strtotime( $product['create_at'] ) );
            $product['mobile'] = empty($product['mobile']) ? '/' : $product['mobile'];
            $uid  =  Cookie::instance()->userdata('uid');

            $gmsDB = new DB();
            $gmsDB->init_db_from_config('gms');
            $sql = "SELECT express_no,express_name FROM gms_real_product_log WHERE user_id = ? AND product_id = ? AND handler_id  = ?";
            $gmsDB->execute($sql,array($uid,$product['product_id'],$product['handler_id']));
            $log = $gmsDB->fetch();
            if($log){
                $product['express'] = $log['express_name'].':'.$log['express_no'];
            }
            $gmsDB->close();

            $this->response($product);
        }
    }