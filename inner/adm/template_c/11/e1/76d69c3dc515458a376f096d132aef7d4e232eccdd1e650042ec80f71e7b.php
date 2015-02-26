<?php

/* redpack_add.html */
class __TwigTemplate_11e176d69c3dc515458a376f096d132aef7d4e232eccdd1e650042ec80f71e7b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"am-cf am-padding\">
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\">红包</strong> / <small>添加</small></div>
</div>

<div class=\"am-u-md-12\">
    <div class=\"am-panel am-panel-default\">
        <div class=\"am-panel-hd am-cf\" data-am-collapse=\"{target: '#collapse-panel-4'}\">卡密<span class=\"am-icon-chevron-down am-fr\" ></span></div>
        <div id=\"collapse-panel-4\" class=\"am-panel-bd am-collapse am-in\">
            <ul class=\"am-list admin-content-task\">
                <li>
                    <form class=\"am-form-inline\">
                        <div class=\"am-form-group am-form-icon\">
                            <input style=\"display:none\" mce_style=\"display:none\"><!--防止默认回车提交表单 简直脑残-->
                            <input type=\"text\" name=\"search_user\" id=\"cardno\"  class=\"am-form-field\" placeholder=\"卡号\">
                        </div>
                        <button type=\"button\" onclick=\"check()\" class=\"submit am-btn am-btn-secondary am-btn-xs\">查看卡号状态</button>
                    </form>
                    <code>
                        卡号:密码:金额(一行一个)<br/>
                        例子:1233456789:mima:30
                    </code>
                </li>
                <li>
                    <form class=\"am-form-inline\">
                        <div class=\"am-form-group am-form-icon\">
                            <input style=\"display:none\" mce_style=\"display:none\"><!--防止默认回车提交表单 简直脑残-->
                            <textarea cols=\"100\" rows=\"30\" id=\"content\"></textarea>
                        </div>
                        <div class=\"am-margin\">
                            <button type=\"button\" onclick=\"save()\" class=\"submit am-btn am-btn-primary am-btn-xs\">提交保存</button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>


<script>
    function check(){
        var cardno = \$(\"#cardno\").val();
        if(cardno.replace(/\\s+/g,'') == '')
        return;

        \$.iAjax('/redPack/check','cardno='+cardno,function(response){
            if(response == 1)
                \$.alert('提示','该卡号已使用');
            else
                \$.alert('提示','该卡号未使用');
        });
    }

    function save(){
        var content  = \$(\"#content\").val();
        if(content.replace(/\\s+/g,'') == '')
        return;

        \$.iAjax('/redPack/save','content='+content,function(response){
            \$.alert('提示','提交成功');
            \$(\"#content\").val('');
        },'POST');
    }
</script>";
    }

    public function getTemplateName()
    {
        return "redpack_add.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
