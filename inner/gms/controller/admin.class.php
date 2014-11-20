<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/28
 * Time: 上午9:38
 */

namespace gms\controller;


use core\AdminController;
use core\Cookie;
use core\Encoder;
use core\Permission;
use core\Redirect;
use gms\libs\AdminUtil;
use gms\libs\ModuleDictionary;
use gms\libs\SystemLog;
use gms\model\Admin_M;
use gms\model\AdminModule_M;
use gms\model\Module_M;
use gms\model\Systemlog_M;
use utils\Page;
use gms\libs\Error;
use utils\Tools;

/**
 * 后台用户管理
 * Class Admin
 * @package gms\controller
 */
class Admin extends AdminController{

    function lists(){
        //检查权限
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_ADMIN_LIST);

        $page = empty($this->args[1]) ? 1 : $this->args[1];
        $count = 10;
        $start = ($page-1) * $count;

        //获取查询条件
        $search_params = $this->http_get_params();
        foreach($search_params as $k => $v){
            if(!empty($v) || $v == '0')
                $this->output_data['search_'.$k] = $v;
            else
                unset($search_params[$k]);
        }
        $query_string = http_build_query($search_params);

        $list = Admin_M::instance()->set_condition($search_params)->lists($start,$count);
        $total = Admin_M::instance()->set_condition($search_params)->num_rows();
        $this->init_navigator();

        $this->output_data['btn_edit_permission'] = 0;
        $this->output_data['btn_p_permission'] = 0;
        $this->output_data['btn_del_permission'] = 0;

        //检查按钮权限
        if(Cookie::instance()->userdata('is_administrator')){
            $this->output_data['btn_edit_permission'] = 1;
            $this->output_data['btn_p_permission'] = 1;
            $this->output_data['btn_del_permission'] = 1;
        }else{
            $session_p = Cookie::instance()->userdata('session_p');
            if(!empty($session_p)){
                $session_p = Encoder::instance()->decode($session_p);
                foreach($session_p as $p){
                    if($p['module_id'] == 2){
                        if( Permission::instance()->hasPermission($p['admin_permission'],2))
                            $this->output_data['btn_edit_permission'] = 1;
                        if( Permission::instance()->hasPermission($p['admin_permission'],4))
                            $this->output_data['btn_del_permission'] = 1;
                    }
                    else if($p['module_id'] == ModuleDictionary::ROOT_MODULE_PERMISSION){
                        if( Permission::instance()->hasPermission($p['admin_permission'],1))
                            $this->output_data['btn_p_permission'] = 1;
                    }
                }
            }
        }

        //初始化分页
        $page_params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/admin/lists/'.ModuleDictionary::ROOT_MODULE_ADMIN.'/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active',
            'query_string' => $query_string
        );

        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render('admin_list.html');
    }

    function add(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_ADMIN_ADD);
        $this->output_data['success'] = $this->args[1] == 'success' ? 1 : 0;
        $this->init_navigator();
        $this->output_data['action']  =  '/admin/save';
        $this->output_data['action_name'] = '添加';
        $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();
        $this->output_data['root_admins'] = Admin_M::instance()->get_admins_by_pid(0);

        if($this->args[1] == 'edit'){
            $id = $this->args[2];
            $this->output_data['item'] =   Admin_M::instance()->read($id);
            $this->output_data['action'] = '/admin/update/'.$id;
            $this->output_data['action_name'] = '编辑';
        }

        $this->render('admin_add.html');
    }

    function save(){
        $this->csrf_token_validation();
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_ADMIN_ADD);
        $fields = $this->input->post();
        $fields['password'] = AdminUtil::instance()->make_password($fields['password']);
        unset($fields['re_password']);
        $session_data = AdminUtil::instance()->session_data();
        $fields['pid'] = $session_data['id'];

        if(!Admin_M::instance()->save($fields))
            $this->set_error(Error::DATA_WRITE);

        SystemLog::instance()->save(2,"添加账号".$fields['account']);
        Redirect::instance()->forward('/admin/add/2/success');
    }

    function update(){
        $this->csrf_token_validation();
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_ADMIN_ADD);
        $fields = $this->input->post();
        $id = $this->args[0];
        if(!Admin_M::instance()->update($fields,$id))
            $this->set_error(Error::DATA_WRITE);

        SystemLog::instance()->save(2,"修改账号id#$id 的信息");
        Redirect::instance()->forward('/admin/lists/2');
    }

    function del(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_ADMIN_DELETE);
        $id = $this->args[1];

        try{
             $this->db->begin();
            if($id == 1)
                throw new \Exception(Error::DATA_DEL_FORBBIDEN);

             if(!Systemlog_M::instance()->del_by_admin_id($id))
                 throw new \Exception(Error::DATA_DELETE);

            if(!AdminModule_M::instance()->del_by_admin_id($id))
                throw new \Exception(Error::DATA_DELETE);

            if(!Admin_M::instance()->del($id))
                throw new \Exception(Error::DATA_DELETE);

            $this->db->commit();
            Redirect::instance()->forward('/admin/lists/2');
        }catch (\Exception $e){
            $this->db->rollback();
            $this->set_error($e->getMessage());
        }
    }

    function permission(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_PERMISSION_GIVE);
        $this->init_navigator();

        $admin_id = $this->args[1];
        $admin = Admin_M::instance()->read($admin_id);
        $admin['permissions'] = AdminModule_M::instance()->get_list_by_admin_id($admin_id);
        $this->output_data['admin'] = $admin;

        if(AdminUtil::instance()->is_administrator()) {
            $this->output_data['root_modules'] = Module_M::instance()->root_lists();
            $this->output_data['child_modules'] = Module_M::instance()->child_lists();
        }else{
            //取自己的最大权限[父账号的可见权限]
            $pid = $admin['pid'];
            $this->output_data['root_modules']  = AdminUtil::instance()->root_permission_modules($pid);
            $this->output_data['child_modules'] = AdminUtil::instance()->child_permission_modules($this->output_data['root_modules']);
        }

         foreach($this->output_data['child_modules'] as &$child){
             $child['has_permission'] = 0;
             foreach($admin['permissions'] as $ap){
                 if($ap['module_id'] == $child['pid'] && Permission::instance()->hasPermission($ap['admin_permission'],$child['module_permission'])) {
                     $child['has_permission'] = 1;
                     break 1;
                 }
             }
         }

        $this->output_data['action'] = '/admin/save_permission';
        $this->render('admin_permission.html');
    }

    function save_permission(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_PERMISSION_GIVE);

        $permissions = $this->input->post('permissions');
        $admin_id = $this->input->post('admin_id');
        $modules = explode('#',$permissions);
        $account = $this->input->post('account');

        try{
            $this->db->begin();

            if(!AdminModule_M::instance()->del_by_admin_id($admin_id))
                throw new \Exception(Error::DATA_DELETE);

            foreach($modules as $module){
                list($module_id,$permission) = explode(',',$module);
                $fields = array(
                    'admin_id' => $admin_id,
                    'module_id' => $module_id,
                    'admin_permission' => $permission
                );
                $temp = AdminModule_M::instance()->get_admin_module_by_admin_id($admin_id,$module_id);
                if(false == $temp)
                {
                    if(!AdminModule_M::instance()->save($fields))
                        throw new \Exception(Error::DATA_WRITE);
                }else{
                    if(!AdminModule_M::instance()->update($fields,$temp['id']))
                        throw new \Exception(Error::DATA_WRITE);
                }
            }

            $this->db->commit();
            SystemLog::instance()->save(11,'给['.$account.']分配权限');
            Redirect::instance()->forward('/admin/lists/2');
        }catch (\Exception $e){
            $this->db->rollback();
            $this->set_error($e->getMessage());
        }
    }

}