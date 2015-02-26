<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 15/1/27
     * Time: 下午5:40
     */

    namespace web\controller;


    use core\Controller;
    use core\Cookie;
    use core\Redirect;
    use core\Redis;
    use utils\Curl;
    use utils\Tools;
    use web\libs\Error;
    use web\libs\Sms;
    use web\libs\UserUtil;
    use web\model\ArticlesModel;
    use web\model\UserAuthModel;
    use web\model\UserModel;

    class UserAuth extends Controller
    {

        function __construct()
        {
            parent::__construct();
            $r = new Redis( $this->config->web['redis']['host'] , $this->config->web['redis']['port'] );
            if ( !$r ) {
                Tools::debug_log( __CLASS__ , __FUNCTION__ , __FILE__ , '无法连接到redis' );
                Redirect::instance()->forward( '/error/index/' . Error::ERROR_COMMON );
            }
            $this->_redis = $r->getResource();
            $this->_redis->select( 2 );
        }

        /**
         * 手机认证页面
         */
        function mobile()
        {
            UserUtil::instance()->checkLogin( '/error/index/' . Error::ERROR_NO_LOGIN );

            $uid = Cookie::instance()->userdata( 'uid' );
            //检查用户是否认证了
            $auths = UserUtil::instance()->get_auth( $uid );
            if ( $auths[ UserUtil::USER_AUTH_SMS ] )
                Redirect::instance()->forward( '/userAuth/authDone/m' );

            $rkey = Sms::instance()->getRedisKey( $uid , 'mobile' );
            $reidSms = $this->_redis->hGetAll( $rkey );
            $this->output_data['secondsRemain'] = 0;
            if ( !empty( $reidSms['create_time'] ) ) {
                $smsSendTime = $reidSms['create_time'];
                $this->output_data['secondsRemain'] = 60 - ( time() - $smsSendTime );
                if ( $this->output_data['secondsRemain'] < 0 )
                    $this->output_data['secondsRemain'] = 0;
            }
            $this->output_data['userInfoActive'] = 'active';
            $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
            $this->tpl->display( 'user_info_phone.html' , $this->output_data );
        }

        /**
         * 获取短信验证码
         */
        function getSmsCode()
        {
            UserUtil::instance()->checkLogin();
            $sessionid = Cookie::instance()->userdata( 'sessionid' , false );
            $mobile = $this->input->post( 'mobile' );
            if ( !Tools::is_mobile( $mobile ) )
                $this->response( null , Error::ERROR_STRING_FORMAT );
            $params = array(
                'sessionid' => $sessionid ,
                'mobile'    => $mobile
            );
            $c = new Curl();
            $url = API_HOST . '/userAuth/smsCode';
            $result = $c->post( $url , $params );
            $c->close();
            if ( $c->error )
                $this->response( null , Error::ERROR_COMMON );
            die( $result );
        }

        /**
         * 进行手机认证
         */
        function authMobile()
        {
            UserUtil::instance()->checkLogin();
            $smsCode = $this->input->post( 'smsCode' );

            if ( empty( $smsCode ) )
                $this->response( null , Error::ERROR_COMMON );

            $params = array(
                'sessionid' => Cookie::instance()->userdata( 'sessionid' , false ) ,
                'sms_code'  => $smsCode ,
                't'         => UserUtil::USER_AUTH_SMS
            );

            $url = API_HOST . '/userAuth/auth';
            $c = new Curl();
            $result = $c->post( $url , $params );
            $c->close();
            if ( $c->error )
                $this->response( null , Error::ERROR_COMMON );
            die( $result );
        }

        /**
         * 解除手机认证
         */
        function unAuthMobile()
        {
            UserUtil::instance()->checkLogin();
            $mobile = $this->input->post( 'mobile' );
            if ( !Tools::is_mobile( $mobile ) )
                $this->response( null , Error::ERROR_STRING_FORMAT );

            $uid = Cookie::instance()->userdata( 'uid' );
            $user = UserModel::instance()->getUserByUid( $uid );
            if ( strcmp( $mobile , $user['mobile'] ) !== 0 )
                $this->response( null , Error::ERROR_MOBILE_UNMATCHED );

            $params = array(
                'sessionid' => Cookie::instance()->userdata( 'sessionid' , false ) ,
                'mobile'    => $mobile
            );
            $url = API_HOST . '/userAuth/smsUnAuth';
            $c = new Curl();
            $result = $c->post( $url , $params );
            $c->close();
            if ( $c->error )
                $this->response( null , Error::ERROR_COMMON );
            die( $result );
        }

        /**
         * 邮箱认证页面
         */
        function email()
        {
            UserUtil::instance()->checkLogin( '/error/index/' . Error::ERROR_NO_LOGIN );

            $uid = Cookie::instance()->userdata( 'uid' );
            //检查用户是否认证了
            $auths = UserUtil::instance()->get_auth( $uid );
            if ( $auths[ UserUtil::USER_AUTH_MAIL ] )
                Redirect::instance()->forward( '/userAuth/authDone/e' );

            $this->output_data['userInfoActive'] = 'active';
            $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
            $this->tpl->display( 'user_info_email.html' , $this->output_data );
        }

        /**
         * 进行邮箱认证
         */
        function authEmail()
        {
            UserUtil::instance()->checkLogin();
            $email = $this->input->post( 'email' );

            if ( !Tools::isValidEmail( $email ) )
                $this->response( null , Error::ERROR_STRING_FORMAT );

            $params = array(
                'sessionid' => Cookie::instance()->userdata( 'sessionid' , false ) ,
                'mail'      => $email ,
                't'         => UserUtil::USER_AUTH_MAIL
            );

            $url = API_HOST . '/userAuth/auth';
            $c = new Curl();
            $result = $c->post( $url , $params );
            $c->close();
            if ( $c->error )
                $this->response( null , Error::ERROR_COMMON );
            die( $result );
        }

        /**
         * 解除邮箱认证
         */
        function unAuthEmail()
        {
            UserUtil::instance()->checkLogin();
            $email = $this->input->post( 'email' );
            if ( !Tools::isValidEmail( $email ) )
                $this->response( null , Error::ERROR_STRING_FORMAT );

            $uid = Cookie::instance()->userdata( 'uid' );
            $user = UserModel::instance()->getUserByUid( $uid );
            if ( strcmp( $email , $user['email'] ) !== 0 )
                $this->response( null , Error::ERROR_EMAIL_UNMATCHED );

            $params = array(
                'sessionid' => Cookie::instance()->userdata( 'sessionid' , false ) ,
                'mail'      => $email
            );
            $url = API_HOST . '/userAuth/mailUnAuth';
            $c = new Curl();
            $result = $c->post( $url , $params );
            $c->close();
            if ( $c->error )
                $this->response( null , Error::ERROR_COMMON );
            die( $result );
        }


        /**
         * id认证页面
         */
        function idCard()
        {
            UserUtil::instance()->checkLogin( '/error/index/' . Error::ERROR_NO_LOGIN );

            $uid = Cookie::instance()->userdata( 'uid' );
            //检查用户是否认证了
            $auths = UserUtil::instance()->get_auth( $uid );
            if ( $auths[ UserUtil::USER_AUTH_IDCARD ] )
                Redirect::instance()->forward( '/userAuth/authDone/i' );

            $this->output_data['userInfoActive'] = 'active';
            $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
            $this->tpl->display( 'user_info_anti.html' , $this->output_data );
        }


        /**
         * 进行id认证
         */
        function authIDCard()
        {
            UserUtil::instance()->checkLogin();
            $realname = $this->input->post( 'realname' );
            $idCard = $this->input->post( 'idCard' );

            if ( Tools::strlen_ex( $realname ) < 2 || Tools::strlen_ex( $realname ) > 5 || strlen( $idCard ) < 15 || strlen( $idCard ) > 18 )
                $this->response( null , Error::ERROR_STRING_FORMAT );

            $params = array(
                'sessionid' => Cookie::instance()->userdata( 'sessionid' , false ) ,
                'name'      => $realname ,
                't'         => UserUtil::USER_AUTH_IDCARD ,
                'cardNo'    => $idCard
            );

            $url = API_HOST . '/userAuth/auth';
            $c = new Curl();
            $result = $c->post( $url , $params );
            $c->close();
            if ( $c->error )
                $this->response( null , Error::ERROR_COMMON );
            die( $result );
        }


        /**
         * 解除认证页面
         */
        function authDone()
        {
            UserUtil::instance()->checkLogin( '/error/index/' . Error::ERROR_NO_LOGIN );
            $action = $this->args[0];
            $uid = Cookie::instance()->userdata( 'uid' );
            $this->output_data['action'] = $action;
            $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
            switch ($action) {
                case 'i' :
                    //检查用户是否认证了
                    $auths = UserUtil::instance()->get_auth( $uid );
                    if ( !$auths[ UserUtil::USER_AUTH_IDCARD ] )
                        Redirect::instance()->forward( '/userAuth/idCard' );

                    $user = UserModel::instance()->getUserByUid( $uid );
                    $this->output_data['idCard'] = Tools::entry_string( $user['id_card'] , '*' );
                    $this->output_data['userInfoActive'] = 'active';
                    $this->tpl->display( 'user_info_unAuth.html' , $this->output_data );
                    break;
                case 'm':
                    //检查用户是否认证了
                    $auths = UserUtil::instance()->get_auth( $uid );
                    if ( !$auths[ UserUtil::USER_AUTH_SMS ] )
                        Redirect::instance()->forward( '/userAuth/mobile' );

                    $user = UserModel::instance()->getUserByUid( $uid );
                    $this->output_data['mobile'] = Tools::entry_string( $user['mobile'] , '*' );
                    $this->output_data['userInfoActive'] = 'active';
                    $this->tpl->display( 'user_info_unAuth.html' , $this->output_data );

                    break;
                case 'e':
                    //检查用户是否认证了
                    $auths = UserUtil::instance()->get_auth( $uid );
                    if ( !$auths[ UserUtil::USER_AUTH_MAIL ] )
                        Redirect::instance()->forward( '/userAuth/email' );

                    $user = UserModel::instance()->getUserByUid( $uid );
                    $this->output_data['email'] = Tools::entry_string( $user['email'] , '*' );
                    $this->output_data['userInfoActive'] = 'active';
                    $this->tpl->display( 'user_info_unAuth.html' , $this->output_data );
                    break;
            }
        }
    }