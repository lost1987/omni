<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/28
 * Time: 下午5:57
 */

namespace gms\libs;

/**
 * 模块字典 需要和模块表同步
 * Class ModuleDictionary
 * @package gms\libs
 */
class ModuleDictionary {

    //module_alias  =  module_id
    /**
     * 用户登陆
     */
    const ROOT_MODULE_LOGIN = 1;

    /**
     * 用户管理
     */
    const ROOT_MODULE_ADMIN= 2;

    /**
     * 添加/编辑 用户
     */
    const MODULE_ADMIN_ADD = 3;

    /**
     * 用户列表
     */
    const MODULE_ADMIN_LIST= 4;

    /**
     * 日志管理
     */
    const ROOT_MODULE_LOGS = 5;

    /**
     * 系统日志列表
     */
    const MODULES_SYSTEM_LOG_LIST = 6;

    /**
     * 模块管理
     */
    const ROOT_MODULE_MODULE = 7;

    /**
     * 模块列表
     */
    const MODULE_MODULE_LIST = 8;

    /**
     * 添加模块
     */
    const MODULE_MODULE_ADD = 9;

    /**
     * 权限管理
     */
    const ROOT_MODULE_PERMISSION = 10;

    /**
     * 赋予权限
     */
    const MODULE_PERMISSION_GIVE = 11;

    /**
     * 删除用户
     */
    const MODULE_ADMIN_DELETE = 12;

    /**
     * 删除模块
     */
    const MODULE_MODULE_DEL = 13;

    /**
     * 系统信息
     */
    const ROOT_MODULE_SYSTEM_INFO = 17;

    /**
     * PHP运行时 配置
     */
    const MODULE_SYSTEM_INFO_PHP = 18;

    /**
     * 游戏管理
     */
    const ROOT_MODULE_GAME = 19;

    /**
     * 玩家列表
     */
    const MODULE_GAME_PLAYERS = 20;

    /**
     * 编辑玩家
     */
    const MODULE_GAME_PLAYERS_ADD = 21;

    /**
     * 客服管理
     */
    const ROOT_MODULE_SERVICES = 22;

    /**
     * 反馈列表
     */
    const MODULE_SERVICES_FEEDBACK = 23;

    /**
     * 玩家举报
     */
    const MODULE_SERVICES_TIPOFF = 24;

    /**
     * 玩家申述
     */
    const MODULE_SERVICES_SUSPEND = 25;

    /**
     * 玩家兑换
     */
    const MODULE_SERVICES_EXCHANGE = 26;

    /**
     * 玩家抽奖
     */
    const MODULE_SERVICES_LOTTERY = 27;

    /**
     * 商品管理
     */
    const ROOT_MODULE_STORE_PRODUCTS = 28;

    /**
     * 商品列表
     */
    const MODULE_STORE_PRODUCTS_LIST = 29;

    /**
     * 添加/编辑商品
     */
    const MODULE_STORE_PRODUCTS_ADD = 30;


    /**
     * 删除商品
     */
    const MODULE_STORE_PRODUCTS_DEL = 31;

    /**
    * 积分赛列表
    */
    const MODULE_GAME_DAILY_MATCH_LIST = 32;

    /**
     *淘汰赛列表
     */
    const MODULE_GAME_KNOCKOUT_MATCH_LIST = 33;

    /**
     * 编辑积分赛
     */
    const MODULE_GAME_DAILY_MATCH_EDIT = 34;

    /**
     * 编辑淘汰赛
     */
    const MODULE_GAME_KNOCKOUT_MATCH_EDIT  = 35;

    /**
     * 比赛相关审核
     */
    const MODULE_GAME_MATCH_VERIFY = 36;


    /**
     * 最新活动
     */
    const ROOT_MODULE_ACTIVITY = 37;


    /**
     * 最新活动 列表
     */
    const MODULE_ACTIVITY_LIST = 38;


    /**
     * 最新活动 添加/编辑
     */
    const MODULE_ACTIVITY_ADD = 39;


    /**
     * 最新活动 删除
     */
    const MODULE_ACTIVITY_DEL = 40;

    /**
     * 比赛历史
     */
    const MODULE_GAME_MATCH_HISTORY_LIST = 41;

    /**
     * 商品栏目列表
     */
    const MODULE_STORE_CATEGORY_LIST = 42;

    /**
     * 商品栏目添加
     */
    const MODULE_STORE_CATEGORY_ADD = 43;

    /**
     * 商品栏目删除
     */
    const MODULE_STORE_CATEGORY_DEL = 44;

} 