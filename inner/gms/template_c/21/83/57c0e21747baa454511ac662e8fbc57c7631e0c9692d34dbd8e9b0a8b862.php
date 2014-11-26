<?php

/* admin_add.html */
class __TwigTemplate_218357c0e21747baa454511ac662e8fbc57c7631e0c9692d34dbd8e9b0a8b862 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'javascript_plugins' => array($this, 'block_javascript_plugins'),
            'javascript_custom' => array($this, 'block_javascript_custom'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo twig_escape_filter($this->env, (isset($context["action_name"]) ? $context["action_name"] : null), "html", null, true);
        echo "用户
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/select2_metro.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/chosen.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/addtional.css\" />
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "<div class=\"row-fluid\">
    <div class=\"span12\">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class=\"page-title\">
            用户管理
            <small></small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>

<div class=\"row-fluid\">
<div class=\"span12\">
<!-- BEGIN VALIDATION STATES-->
<div class=\"portlet box\">

<div class=\"portlet-title\">
    <div class=\"caption\"><i class=\"icon-reorder\">";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["action_name"]) ? $context["action_name"] : null), "html", null, true);
        echo "用户</i></div>
    <div class=\"tools\">
        <a href=\"javascript:;\" class=\"collapse\"></a>
        <a href=\"#portlet-config\" data-toggle=\"modal\" class=\"config\"></a>
        <a href=\"javascript:;\" class=\"reload\"></a>
        <a href=\"javascript:;\" class=\"remove\"></a>
    </div>
</div>


<div class=\"portlet-body form\">
<!-- BEGIN FORM-->
<form action=\"";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : null), "html", null, true);
        echo "\" id=\"form_sample_2\" class=\"form-horizontal\" method=\"post\">
<input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 45
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" />
<div class=\"alert alert-error hide\">
    <button class=\"close\" data-dismiss=\"alert\"></button>
    您提交的信息有错误请更正后再保存
</div>

<div class=\"alert alert-success hide\">
    <button class=\"close\" data-dismiss=\"alert\"></button>
    保存成功!
</div>



";
        // line 58
        if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "account", array()) == "")) {
            // line 59
            echo "<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">账号</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input type=\"text\" name=\"account\" id=\"account\" data-required=\"1\" class=\"span3 m-wrap\" value=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "account", array()), "html", null, true);
            echo "\"/>
    </div>
</div>
";
        }
        // line 66
        echo "
<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">昵称</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input type=\"text\" name=\"nickname\" data-required=\"1\" class=\"span3 m-wrap\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

 ";
        // line 74
        if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "account", array()) == "")) {
            // line 75
            echo "<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">密码</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"password\" id=\"password\" type=\"password\" class=\"span3 m-wrap\" value=\"";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "password", array()), "html", null, true);
            echo "\"/>
    </div>
</div>


<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">确认密码</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"re_password\" type=\"password\" class=\"span3 m-wrap\" value=\"";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "password", array()), "html", null, true);
            echo "\"/>
    </div>
</div>
";
        }
        // line 90
        echo "
<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">超级管理员</b><span class=\"required\">*</span></label>
    <div class=\"controls chzn-controls\">
            <select class=\"span1 m-wrap\" name=\"superman\" disabled>
            ";
        // line 95
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "superman", array())) {
            // line 96
            echo "            <option value=\"0\" >否</option>
            <option value=\"1\" selected=\"selected\">是</option>
            ";
        } else {
            // line 99
            echo "            <option value=\"0\" selected=\"selected\">否</option>
            <option value=\"1\">是</option>
            ";
        }
        // line 102
        echo "        </select>
    </div>
</div>

<div class=\"form-actions\">
    <button type=\"submit\" class=\"btn red\">保存</button>
    <button type=\"reset\" class=\"btn\">重置</button>
</div>
</form>
<!-- END FORM-->
</div>
</div>
<!-- END VALIDATION STATES-->
</div>
</div>

";
    }

    // line 120
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 121
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/additional-methods.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
";
    }

    // line 127
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 128
        echo "<script src=\"/media/js/private/admin_add.js\"></script>
<script src=\"/media/js/md5.min.js\"></script>
<script>
    var success = ";
        // line 131
        echo twig_escape_filter($this->env, (isset($context["success"]) ? $context["success"] : null), "html", null, true);
        echo ";
   \$(function(){
       FormValidation.init();
        if(success == 1)
            \$('.alert-success').show();
   })
</script>
";
    }

    public function getTemplateName()
    {
        return "admin_add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 131,  213 => 128,  210 => 127,  202 => 121,  199 => 120,  179 => 102,  174 => 99,  169 => 96,  167 => 95,  160 => 90,  153 => 86,  142 => 78,  137 => 75,  135 => 74,  128 => 70,  122 => 66,  115 => 62,  110 => 59,  108 => 58,  92 => 45,  88 => 44,  73 => 32,  54 => 15,  51 => 14,  44 => 8,  41 => 7,  35 => 4,  32 => 3,);
    }
}
