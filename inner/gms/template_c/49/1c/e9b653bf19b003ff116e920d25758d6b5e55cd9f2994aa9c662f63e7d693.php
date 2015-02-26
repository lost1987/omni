<?php

/* daily_match_add.html */
class __TwigTemplate_491ce9b653bf19b003ff116e920d25758d6b5e55cd9f2994aa9c662f63e7d693 extends Twig_Template
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
        echo "积分赛
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
            游戏管理
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
        echo "积分赛</i></div>
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



<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">名称</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input type=\"text\" name=\"name\" id=\"name\" data-required=\"1\" class=\"span3 m-wrap\" value=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">状态</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <select name=\"active\" class=\"span2\">
            ";
        // line 69
        if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "active", array()) == 1)) {
            // line 70
            echo "                <option value=\"1\" selected=\"selected\">启用</option>
                <option value=\"0\">停用</option>
            ";
        } else {
            // line 73
            echo "                <option value=\"1\" >启用</option>
                <option value=\"0\" selected=\"selected\">停用</option>
            ";
        }
        // line 76
        echo "        </select>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">开始小时</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"start_hour\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_hour", array()), "html", null, true);
        echo "\"/>
    </div>
</div>


<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">开始分钟</b><span class=\"required\">*</span></label>
    <div class=\"controls\" >
        <input name=\"start_minute\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_minute", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">比赛时长(分钟)</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input type=\"text\" name=\"dur_minutes\" data-required=\"1\" class=\"span2 m-wrap\" value=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "dur_minutes", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">比赛间隔(分钟)</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"break_minutes\"  type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "break_minutes", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">比赛场次</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"total_rounds\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "total_rounds", array()), "html", null, true);
        echo "\"/>
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

    // line 130
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 131
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/additional-methods.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
";
    }

    // line 137
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 138
        echo "<script src=\"/media/js/private/daily_match_add.js\"></script>
<script>
    var success = ";
        // line 140
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
        return "daily_match_add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 140,  219 => 138,  216 => 137,  208 => 131,  205 => 130,  184 => 112,  174 => 105,  164 => 98,  154 => 91,  143 => 83,  134 => 76,  129 => 73,  124 => 70,  122 => 69,  111 => 61,  92 => 45,  88 => 44,  73 => 32,  54 => 15,  51 => 14,  44 => 8,  41 => 7,  35 => 4,  32 => 3,);
    }
}
