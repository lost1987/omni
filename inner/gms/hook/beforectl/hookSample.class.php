<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/17
 * Time: 下午2:42
 */
namespace gms\hook\beforectl;

class HookSample {

    function call1($omni){
        error_log('hook called ');
    }

} 