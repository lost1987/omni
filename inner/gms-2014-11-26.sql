/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50621
 Source Host           : localhost
 Source Database       : gms

 Target Server Type    : MySQL
 Target Server Version : 50621
 File Encoding         : utf-8

 Date: 11/26/2014 11:27:46 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `gms_core_admin`
-- ----------------------------
DROP TABLE IF EXISTS `gms_core_admin`;
CREATE TABLE `gms_core_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(32) NOT NULL COMMENT '账号名',
  `password` varchar(32) NOT NULL COMMENT '账号密码',
  `nickname` varchar(32) NOT NULL COMMENT '账号所属别名',
  `cooperation_id` varchar(11) NOT NULL DEFAULT '0' COMMENT '合作运营商ID(存储请用1,2,3,4,5 这样的格式),-1代表所有都适用',
  `superman` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否是超级管理员 1:是 0:否 默认是0',
  `selected_server_id` int(11) NOT NULL DEFAULT '10001' COMMENT '最后一次选择的server的id',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父账号ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='gms用户表';

-- ----------------------------
--  Records of `gms_core_admin`
-- ----------------------------
BEGIN;
INSERT INTO `gms_core_admin` VALUES ('1', 'admin', '52f6e9b0d8bdc8c1053af659937f6006', '管理员', '-1', '1', '10001', '0');
COMMIT;

-- ----------------------------
--  Table structure for `gms_core_admin_module`
-- ----------------------------
DROP TABLE IF EXISTS `gms_core_admin_module`;
CREATE TABLE `gms_core_admin_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL COMMENT '管理员ID',
  `module_id` int(11) NOT NULL COMMENT '模块ID(顶级模块) 只需判断管理员的顶级模块权限即可判断子模块权限',
  `admin_permission` int(11) NOT NULL COMMENT '管理员此模块的权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='gms模块权限表';

-- ----------------------------
--  Table structure for `gms_core_module`
-- ----------------------------
DROP TABLE IF EXISTS `gms_core_module`;
CREATE TABLE `gms_core_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(32) NOT NULL COMMENT '模块名称',
  `module_alias` varchar(100) NOT NULL COMMENT '模块别名,通常为英文和php模块字典类对应',
  `module_permission` int(11) NOT NULL COMMENT '模块权限',
  `module_url` varchar(100) DEFAULT NULL COMMENT '模块路径',
  `pid` int(11) NOT NULL COMMENT '父模块ID',
  `visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否是隐藏模块:有时候模块需要记录日志,但不希望用户看到,这个时候可以设置此字段为0,即可不显示在用户界面',
  `icon` varchar(32) NOT NULL DEFAULT 'icon-th' COMMENT '根导航的icon classname,列表页为icon-th,表单页为icon-table,只对根导航有用',
  `orders` tinyint(3) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_name` (`module_name`),
  UNIQUE KEY `module_alias` (`module_alias`),
  UNIQUE KEY `module_alias_2` (`module_alias`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='gms模块表';

-- ----------------------------
--  Records of `gms_core_module`
-- ----------------------------
BEGIN;
INSERT INTO `gms_core_module` VALUES ('1', '用户登陆', 'module_login', '0', null, '0', '0', 'icon-th', '1'), ('2', '用户管理', 'root_module_admin', '7', '', '0', '1', 'icon-user', '2'), ('3', '添加用户', 'module_admin_add', '2', '/admin/add', '2', '1', 'icon-table', '2'), ('4', '用户列表', 'module_admin_list', '1', '/admin/lists', '2', '1', 'icon-th', '1'), ('5', '日志管理', 'root_module_logs', '1', '', '0', '1', 'icon-th', '19'), ('6', '系统日志列表', 'module_system_log_list', '1', '/systemLog/lists', '5', '1', 'icon-th', '1'), ('7', '模块管理', 'root_module_module', '7', '', '0', '1', 'icon-th', '100'), ('8', '模块列表', 'module_module_list', '1', '/module/lists', '7', '1', 'icon-th', '1'), ('9', '添加模块', 'module_module_add', '2', '/module/add', '7', '1', 'icon-th', '2'), ('10', '权限管理', 'root_module_permission', '1', '', '0', '0', 'icon-th', '1'), ('11', '权限分配', 'module_permission_give', '1', '', '10', '0', 'icon-th', '1'), ('12', '用户删除', 'module_admin_delete', '4', '', '2', '0', 'icon-th', '3'), ('13', '模块删除', 'module_module_del', '4', '', '7', '0', 'icon-th', '1'), ('17', '系统信息', 'root_module_system_info', '1', '', '0', '1', 'icon-th', '1'), ('18', 'php运行信息', 'module_system_info_php', '1', '/system/php_info', '17', '1', 'icon-th', '1'), ('19', '游戏管理', 'root_module_game', '255', '', '0', '1', 'icon-th', '3'), ('20', '玩家列表', 'module_game_players', '1', '/player/lists', '19', '1', 'icon-th', '1'), ('21', '玩家编辑', 'module_game_players_edit', '2', '/player/add', '19', '0', 'icon-th', '2'), ('22', '客服管理', 'root_module_services', '31', '', '0', '1', 'icon-th', '20'), ('23', '玩家反馈', 'module_services_feedback', '1', '/services/lists_feedback', '22', '1', 'icon-th', '1'), ('24', '玩家举报', 'module_services_tipoff', '2', '/services/lists_tipoff', '22', '1', 'icon-th', '2'), ('25', '玩家申述', 'module_services_suspend', '4', '/services/lists_suspend', '22', '1', 'icon-th', '4'), ('26', '玩家兑换', 'module_services_exchange', '8', '/services/lists_exchange', '22', '1', 'icon-th', '4'), ('27', '玩家抽奖', 'module_services_lottery', '16', '/services/lists_lottery', '22', '1', 'icon-th', '5'), ('28', '商品管理', 'root_module_store_products', '63', '', '0', '1', 'icon-th', '4'), ('29', '商品列表', 'module_store_products_list', '1', '/storeProduct/lists', '28', '1', 'icon-th', '1'), ('30', '添加商品', 'module_store_products_add', '2', '/storeProduct/add', '28', '1', 'icon-th', '2'), ('31', '删除商品', 'module_store_products_del', '4', '/storeProduct/del', '28', '0', 'icon-th', '3'), ('32', '积分赛列表', 'module_game_daily_match_list', '4', '/dailyMatch/lists', '19', '1', 'icon-th', '2'), ('33', '淘汰赛列表', 'module_game_knockout_match_list', '8', '/knockoutMatch/lists', '19', '1', 'icon-th', '3'), ('34', '积分赛编辑和设置奖励', 'module_game_daily_match_edit', '16', '', '19', '0', 'icon-th', '4'), ('35', '淘汰赛编辑和奖励设置', 'module_game_knockout_match_edit', '32', '', '19', '0', 'icon-th', '5'), ('36', '比赛审核', 'module_game_match_verify', '64', '', '19', '0', 'icon-th', '6'), ('37', '最新活动', 'root_module_activity', '7', '', '0', '1', 'icon-th', '5'), ('38', '活动列表', 'module_activity_list', '1', '/activity/lists', '37', '1', 'icon-th', '1'), ('39', '添加活动', 'module_activity_add', '2', '/activity/add', '37', '1', 'icon-th', '2'), ('40', '活动删除', 'module_activity_del', '4', '', '37', '0', 'icon-th', '3'), ('41', '比赛历史', 'module_game_match_history_list', '128', '/matchHistory/lists', '19', '1', 'icon-th', '4'), ('42', '商品栏目列表', 'module_store_category_list', '8', '/storeCategory/lists', '28', '1', 'icon-th', '4'), ('43', '商品栏目添加', 'module_store_category_add', '16', '/storeCategory/add', '28', '1', 'icon-th', '5'), ('44', '商品栏目删除', 'module_store_category_del', '32', '/storeCategory/del', '28', '0', 'icon-th', '6');
COMMIT;

-- ----------------------------
--  Table structure for `gms_core_servers`
-- ----------------------------
DROP TABLE IF EXISTS `gms_core_servers`;
CREATE TABLE `gms_core_servers` (
  `id` int(11) NOT NULL COMMENT '服务器ID',
  `server_name` varchar(32) NOT NULL COMMENT '服务器名',
  `server_db` varchar(32) NOT NULL COMMENT '服务器数据库名',
  `server_user` varchar(32) NOT NULL COMMENT '服务器数据库用户',
  `server_pass` varchar(32) DEFAULT NULL COMMENT '服务器数据库密码',
  `server_port` int(11) NOT NULL COMMENT '服务器数据库端口',
  `cooperation_id` int(11) NOT NULL DEFAULT '0' COMMENT '合作运营ID',
  `server_ip` varchar(15) NOT NULL COMMENT '服务器IP地址',
  `sid` int(11) NOT NULL COMMENT '游戏服务器编号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='gms服务器表';

-- ----------------------------
--  Records of `gms_core_servers`
-- ----------------------------
BEGIN;
INSERT INTO `gms_core_servers` VALUES ('10001', 's1', 'game', 'root', 'root', '3306', '1', '127.0.0.1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `gms_core_system_log`
-- ----------------------------
DROP TABLE IF EXISTS `gms_core_system_log`;
CREATE TABLE `gms_core_system_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL COMMENT '子模块ID(只记录模块表的子模块)',
  `module_name` varchar(32) NOT NULL COMMENT '模块名,为方便查询,增加此字段',
  `operation_time` int(11) NOT NULL COMMENT '操作时间',
  `admin_id` int(11) NOT NULL COMMENT '管理员ID',
  `account` varchar(32) NOT NULL COMMENT '账号,为方便查询增加此字段',
  `desp` varchar(300) NOT NULL COMMENT '描述',
  `ip` varchar(15) NOT NULL COMMENT '操作来源的IP地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='gms系统日志表';

-- ----------------------------
--  Table structure for `gms_mobile_product_log`
-- ----------------------------
DROP TABLE IF EXISTS `gms_mobile_product_log`;
CREATE TABLE `gms_mobile_product_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '玩家ID',
  `mobile` varchar(32) DEFAULT NULL COMMENT '充值的手机号',
  `order_num` varchar(200) DEFAULT NULL COMMENT '订单号',
  `money` decimal(10,0) DEFAULT NULL COMMENT '充值的金额',
  `sid` int(11) DEFAULT NULL COMMENT '服务器ID',
  `create_time` int(11) DEFAULT NULL COMMENT '充值的时间',
  `desp` varchar(500) DEFAULT NULL COMMENT '备注',
  `login_name` varchar(32) DEFAULT NULL COMMENT '玩家登陆账号',
  `admin_id` int(11) DEFAULT NULL COMMENT '负责发货的管理员ID',
  `admin_account` varchar(32) DEFAULT NULL COMMENT '负责发货的管理员账号',
  `handler_type` tinyint(1) DEFAULT NULL COMMENT '类型\n0 => ''feedback'', //用户反馈 1 => ''tipoff'',   //举报 2 => ''usersuspend'',//用户申述 3 => ''paymentorder'', //用户兑换 4 => ''lottery''//用户抽奖',
  `product_id` int(11) DEFAULT NULL COMMENT '产品ID',
  `handler_id` int(11) DEFAULT NULL COMMENT '兑换或抽奖的唯一ID',
  PRIMARY KEY (`id`),
  KEY `IDX_USER_ID` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='手机卡充值记录';

-- ----------------------------
--  Table structure for `gms_real_product_log`
-- ----------------------------
DROP TABLE IF EXISTS `gms_real_product_log`;
CREATE TABLE `gms_real_product_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '玩家ID',
  `product_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `express_name` varchar(32) DEFAULT NULL COMMENT '快递名',
  `express_no` varchar(200) DEFAULT NULL COMMENT '快递订单号',
  `address` varchar(500) DEFAULT NULL COMMENT '寄送地址',
  `desp` varchar(500) NOT NULL COMMENT '备注',
  `create_time` int(11) DEFAULT NULL COMMENT '寄送时间',
  `sid` int(11) DEFAULT NULL COMMENT '服务器ID',
  `login_name` varchar(32) DEFAULT NULL COMMENT '登陆账号',
  `admin_id` int(11) DEFAULT NULL COMMENT '发货 管理员ID',
  `admin_account` varchar(32) DEFAULT NULL COMMENT '发货管理员账号',
  `handler_type` tinyint(4) DEFAULT NULL COMMENT '类型\n0 => ''feedback'', //用户反馈 1 => ''tipoff'',   //举报 2 => ''usersuspend'',//用户申述 3 => ''paymentorder'', //用户兑换 4 => ''lottery''//用户抽奖\n',
  `handler_id` int(11) DEFAULT NULL COMMENT '兑换或抽奖的唯一ID',
  PRIMARY KEY (`id`),
  KEY `IDX_USER_ID` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='奖品/产品 实物发货信息';

-- ----------------------------
--  Table structure for `gms_verify`
-- ----------------------------
DROP TABLE IF EXISTS `gms_verify`;
CREATE TABLE `gms_verify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `json_content` varchar(1000) NOT NULL COMMENT '需要审核的预存内容 json格式为表字段',
  `state` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态 0=未审核 1= 审核通过 2=审核不通过',
  `type` tinyint(4) NOT NULL COMMENT '审核类型 1=积分赛[daily_match]  2=淘汰赛[knockout_match] 3=比赛奖励[match_prize]',
  `server_id` int(11) NOT NULL COMMENT '服务器ID',
  `create_time` int(11) NOT NULL COMMENT '提交审核的时间',
  `op_time` int(11) DEFAULT NULL COMMENT '审核的时间',
  `source_admin_id` int(11) NOT NULL COMMENT '提交审核的管理员ID',
  `op_admin_id` int(11) DEFAULT NULL COMMENT '审核的管理员ID',
  `abstract_id` int(11) DEFAULT NULL COMMENT '关联待审核内容的表的ID 如果涉及多表ID的话 可以用算法 table1_id * [基数] + table2_id 这样来存储',
  `remark` varchar(1000) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`),
  KEY `IDX_TYPE` (`type`) USING BTREE,
  KEY `IDX_ABSTRACT_ID` (`abstract_id`) USING BTREE,
  KEY `IDX_SERVER_ID` (`server_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='gms审核表';

SET FOREIGN_KEY_CHECKS = 1;
