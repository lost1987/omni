<?php

/* game_server.html */
class __TwigTemplate_7180931c21178150540df191bffc19cb2fd9df444e9ad7bc0ac1b9aa514b6b14 extends Twig_Template
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
        echo "  游戏服务器设定
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
            游戏服务器设定
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
    <div class=\"caption\"><i class=\"icon-reorder\">设定</i></div>
    <div class=\"tools\">
        <a href=\"javascript:;\" class=\"collapse\"></a>
        <a href=\"#portlet-config\" data-toggle=\"modal\" class=\"config\"></a>
        <a href=\"javascript:;\" class=\"reload\"></a>
        <a href=\"javascript:;\" class=\"remove\"></a>
    </div>
</div>


<div class=\"portlet-body form\">
<!-- BEGIN FORM-->
<form action=\"/system/save_server\" id=\"form_sample_2\" class=\"form-horizontal\" method=\"post\">
<input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 45
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" />
<input type=\"hidden\" name=\"id\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["server"]) ? $context["server"] : null), "id", array()), "html", null, true);
        echo "\" />
<div class=\"alert alert-error hide\">
    <button class=\"close\" data-dismiss=\"alert\"></button>
    您提交的信息有错误请更正后再保存
</div>

<div class=\"alert alert-success hide\">
    <button class=\"close\" data-dismiss=\"alert\"></button>
    保存成功!
</div>



<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">手机端允许访问</b><span class=\"required\">*</span></label>
    <div class=\"controls chzn-controls\">
            <select class=\"span1 m-wrap\" name=\"mobile_status\">
            ";
        // line 63
        if ($this->getAttribute((isset($context["server"]) ? $context["server"] : null), "mobile_status", array())) {
            // line 64
            echo "            <option value=\"0\" >否</option>
            <option value=\"1\" selected=\"selected\">是</option>
            ";
        } else {
            // line 67
            echo "            <option value=\"0\" selected=\"selected\">否</option>
            <option value=\"1\">是</option>
            ";
        }
        // line 70
        echo "        </select>
    </div>
</div>

    <div class=\"control-group\">
        <label class=\"control-label\"><b class=\"midnight\">web端允许访问</b><span class=\"required\">*</span></label>
        <div class=\"controls chzn-controls\">
            <select class=\"span1 m-wrap\" name=\"web_status\">
                ";
        // line 78
        if ($this->getAttribute((isset($context["server"]) ? $context["server"] : null), "web_status", array())) {
            // line 79
            echo "                <option value=\"0\" >否</option>
                <option value=\"1\" selected=\"selected\">是</option>
                ";
        } else {
            // line 82
            echo "                <option value=\"0\" selected=\"selected\">否</option>
                <option value=\"1\">是</option>
                ";
        }
        // line 85
        echo "            </select>
        </div>
    </div>

    <div class=\"control-group\">
        <label class=\"control-label\"><b class=\"midnight\">手机端版本</b><span class=\"required\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" name=\"mobile_version\" data-required=\"1\" class=\"span3 m-wrap\" value=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["server"]) ? $context["server"] : null), "mobile_version", array()), "html", null, true);
        echo "\"/>
        </div>
    </div>

    <div class=\"control-group\">
        <label class=\"control-label\"><b class=\"midnight\">是否强制升级手机端</b><span class=\"required\">*</span></label>
        <div class=\"controls chzn-controls\">
            <select class=\"span1 m-wrap\" name=\"mobile_force_update\">
                ";
        // line 100
        if ($this->getAttribute((isset($context["server"]) ? $context["server"] : null), "mobile_force_update", array())) {
            // line 101
            echo "                <option value=\"0\" >否</option>
                <option value=\"1\" selected=\"selected\">是</option>
                ";
        } else {
            // line 104
            echo "                <option value=\"0\" selected=\"selected\">否</option>
                <option value=\"1\">是</option>
                ";
        }
        // line 107
        echo "            </select>
        </div>
    </div>

    <div class=\"control-group\">
        <label class=\"control-label\"><b class=\"midnight\">维护提示语</b><span class=\"required\">*</span></label>
        <div class=\"controls\">
            <textarea class=\"span6 m-wrap\" rows=\"3\" name=\"hold_msg\">";
        // line 114
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["server"]) ? $context["server"] : null), "hold_msg", array()), "html", null, true);
        echo "</textarea>
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

    // line 132
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 133
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/additional-methods.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
";
    }

    // line 139
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 140
        echo "<script src=\"/media/js/private/game_server.js\"></script>
<script>
    var success = ";
        // line 142
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
        return "game_server.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 142,  219 => 140,  216 => 139,  208 => 133,  205 => 132,  184 => 114,  175 => 107,  170 => 104,  165 => 101,  163 => 100,  152 => 92,  143 => 85,  138 => 82,  133 => 79,  131 => 78,  121 => 70,  116 => 67,  111 => 64,  109 => 63,  89 => 46,  85 => 45,  53 => 15,  50 => 14,  43 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
