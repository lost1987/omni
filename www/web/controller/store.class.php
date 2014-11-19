<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-16
 * Time: 下午3:52
 */

namespace web\controller;

use core\Configure;
use core\Controller;
use core\Cookie;
use core\Encoder;
use utils\Page;
use utils\Tools;
use web\libs\Error;
use web\libs\exchange\FactoryExchange;
use web\libs\exchange\IExchange;
use web\libs\Helper;
use web\libs\UserUtil;
use web\model\ProfileModel;
use web\model\PurchaseProfileModel;
use web\model\StoreCategoryModel;
use web\model\StoreProductsModel;
use web\model\UserModel;

/**
 * 道具商城
 * Class Store
 * @package web\controller
 */
class Store extends Controller{

    function __construct(){
        parent::__construct();
        $this->scModel = StoreCategoryModel::instance();
        $this->spModel = StoreProductsModel::instance();
    }

    function index(){
            $this->category();
    }

    /**
     * 根据栏目来获取商品列表
     */
    function category(){
         $pagecount = 9;
         $category_id = intval($this->args[0]);
         $page = empty($this->args[1]) ? 1 : $this->args[1];
         $start = ($page - 1) * $pagecount;

         //用户是否登录
         $is_login = UserUtil::instance()->isLogin();
        //用户是否设置交易密码 默认未设置
        $is_set_purchase = 0;
        if($is_login){
            $uid = Cookie::instance()->userdata('uid');
            $is_set_purchase =  UserModel::instance()->is_set_purchase($uid);
            $user = ProfileModel::instance()->read($uid);
            $coupon = $user['coupon'];
            $ticket =  $user['ticket'];
            $diamond = $user['diamond'];
            $coins = $user['coins'];
        }

        //读取道具分类
        $categories = $this->scModel->lists();
        array_unshift($categories,array('id'=>0,'name'=>'全部'));
        foreach($categories as &$c){
            if($c['id'] == $category_id)
                    $c['class'] = 'on';
        }
        if(empty($category_id))
            $categories[0]['class'] = 'on';

        //读取分类的道具列表
        $products = $this->spModel->lists($start,$pagecount,$category_id);
        $products_total = $this->spModel->num_rows($category_id);
        $price_types = Configure::instance()->web['price_type'];
        foreach($products as &$p){
            $p['price_type_name'] = $price_types[ $p['price_type'] ];
            $p['price_name'] = $p['price'] . $p['price_type_name'];
            $p['price_type_column'] = $this->config->web['price_type_columns'][ $p['price_type'] ];
        }

        //数据输出合并
        $output_data = array(
            'categories' => $categories,
            'products' => $products,
            'is_login' => $is_login == true ? 1 : 0,
            'is_set_purchase' => $is_set_purchase == true ? 1 : 0,
            'token' => Cookie::instance()->get_csrf_cookie(),
            'navigator' => Helper::getControllerName(__NAMESPACE__,__CLASS__),
            'coupon' => empty($coupon) ? 0 : $coupon,
            'ticket' =>  empty($ticket) ? 0 : $ticket,
            'diamond' => empty($diamond) ? 0 : $diamond,
            'coins' => empty($coins) ? 0 : $coins
        );

        //分页代码初始化
        $page_params = array(
            'total_rows'=>$products_total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/store/category/'.$category_id.'/?',  #(必须)
            'now_page'  => $page,  #(必须)
            'list_rows' =>$pagecount, #(可选) 默认为15
            'li_classname'=>'active',
            'use_tag_li' => true
        );
        $pagination  = new Page($page_params);
        if($pagination->getTotalPage() > 1)
            $output_data['pagination'] = $pagination->show(1);

        $this->tpl->display('store.html',$output_data);
    }

    /**
     * 兑换 付钱
     * error: 0 正常  , 1 用户未登录 ,2 消费密码错误,3数据更新错误,4 对应资源不足
     */
    function purchase(){
        $response = array(
            'error' => 0
        );

        //验证token
        $this->csrf_token_validation(false);

        //验证登录
        if(!UserUtil::instance()->isLogin()){
            $response['error'] = Error::ERROR_NO_LOGIN;
            die(Encoder::instance()->encode($response));
        }

        //验证password
        $password = $this->input->post('password');
        $uid = Cookie::instance()->userdata('uid');
        $user = UserModel::instance()->getUserByUid($uid);
        $purchaseProfile= PurchaseProfileModel::instance()->read($uid);
        if(!UserUtil::instance()->is_purchase_password_valid($password,$purchaseProfile['purchase_password'],$user['user_number'])){
            $response['error'] = Error::ERROR_PURCHASE_PWD;
            die(Encoder::instance()->encode($response));
        }

        $product_id = $this->args[0];
        $product = $this->spModel->read($product_id);

        $category_id = $product['category_id'];
        if(in_array($category_id,array(1,5)))//资源消耗类
                $class = 'MonetaryExchange';
        else if($category_id == 2)//手机充值卡
                $class = 'CardExchange';
        else if($category_id == 3)//实物兑换
                $class = 'RealExchange';


        FactoryExchange::invoke($class)->doExchange($product, $user, $response);
    }
}