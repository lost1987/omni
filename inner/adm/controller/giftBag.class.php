<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/6
 * Time: 上午11:24
 */

namespace adm\controller;


use adm\core\AdmAutoValidationController;
use adm\libs\AdmError;
use adm\model\GiftBag_M;
use core\Encoder;
use utils\Tools;

class GiftBag extends AdmAutoValidationController{

    function index(){
        $gifts = GiftBag_M::instance()->lists();
        $this->output_data['gifts'] = $gifts;
        $content = $this->tpl->render('gift.html',$this->output_data);
        $this->response($content);
    }

    function update(){
        $post = $this->input->post();
        $id = $post['id'];
        unset($post['id']);
        $post = Tools::std_array_format($post);
        $fields = array(
            'items' => Encoder::instance()->encode($post)
        );
        if(!GiftBag_M::instance()->update($fields,$id))
            $this->response(null,AdmError::DATA_WRITE);
        $this->response();
    }

} 