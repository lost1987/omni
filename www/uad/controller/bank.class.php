<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/12
 * Time: 上午10:56
 */

namespace uad\controller;


use uad\core\UadAutoValidationController;
use utils\Tools;

class Bank extends UadAutoValidationController{

    function getBankName(){
        $card_no = str_replace(' ','',$this->input->post('card_no'));
        if(!Tools::bankCardLuhn($card_no))
            $this->response(0);
        $this->response(1);
    }

} 