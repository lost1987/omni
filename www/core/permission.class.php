<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/29
 * Time: 下午4:38
 */

namespace core;


class Permission
{

    private static $_instance = null;

    static function instance(){
         if(self::$_instance == null)
             self::$_instance = new self;
        return self::$_instance;
    }
    /**
     * 赋予权限
     * @param array popes 权限
     * @return int 权值
     */
    public function give($permissions)
    {

        if (!is_array($permissions)) {
            exit("params must be array");
        }
        $value = 0;
        foreach ($permissions as $k => $v) {
            $value |= intval($v);
        }
        return $value;
    }


    /**
     * 判断是否有权限
     * @param int user_pope
     * @param int module_pope
     * return boolean
     */
    public function hasPermission($user_permission, $module_permission)
    {
        $user_permission = intval($user_permission);
        $module_permission = intval($module_permission);

        if (!empty($user_permission)
            && !empty($module_permission)
            && $user_permission != 0
            && $module_permission != 0
        ) {
            if ($user_permission & $module_permission) {
                return TRUE;
            }
        }

        return FALSE;
    }

}