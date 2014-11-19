[导航链接规则]
列表页:
/controller/list/root_module_id/page

表单:
    跳转到表单:
                add : <option value="{{item.id}}">{{root.module_name}}</option>
                edit : /controller/add/root_module_id/edit/id
保存数据: /controller/save
修改数据: /controller/update/id

添加成功:/controller/method/root_module_id/success
修改成功:/controller/list/root_module_id
