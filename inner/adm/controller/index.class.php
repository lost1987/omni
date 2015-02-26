<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/9
 * Time: 上午11:33
 */
namespace adm\controller;

use adm\core\AdmAutoValidationController;
use adm\libs\Navigator;
use adm\model\User_M;
use adm\model\UserDeposit_M;
use core\Cookie;
use core\Encoder;

class Index extends AdmAutoValidationController{

    function index(){
        $output_data = array(
            'navigator' => Navigator::instance()->htmlString(),
            'admin' => Encoder::instance()->decode(Cookie::instance()->userdata('session_data')),
            'userNumNewToday' => User_M::instance()->userNumNewToday(),
            'userNumTotal' => User_M::instance()->num_rows(),
            'moneyTotal' => UserDeposit_M::instance()->totalDepositMoney(),
            'unDoneDepositNum' => UserDeposit_M::instance()->unDoneDepositNum()
        );

        $this->tpl->display('index.html',$output_data);
    }

}