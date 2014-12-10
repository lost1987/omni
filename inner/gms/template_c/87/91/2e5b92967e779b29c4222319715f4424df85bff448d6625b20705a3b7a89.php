<?php

/* knockout_match_add.html */
class __TwigTemplate_87912e5b92967e779b29c4222319715f4424df85bff448d6625b20705a3b7a89 extends Twig_Template
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
        echo "淘汰赛
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
        echo "淘汰赛</i></div>
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
    <label class=\"control-label\"><b class=\"\">比赛类型</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <select name=\"match_type\" >
        ";
        // line 62
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["match_types"]) ? $context["match_types"] : null));
        foreach ($context['_seq'] as $context["val"] => $context["match"]) {
            // line 63
            echo "                ";
            if (((isset($context["val"]) ? $context["val"] : null) == $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_type", array()))) {
                // line 64
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, (isset($context["match"]) ? $context["match"] : null), "html", null, true);
                echo "</option>
                ";
            } else {
                // line 66
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["match"]) ? $context["match"] : null), "html", null, true);
                echo "</option>
                ";
            }
            // line 68
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['val'], $context['match'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "        </select>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"\">报名费用</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
       <input  type=\"text\" class=\"span2\"  name=\"price_amount\" value=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["signup_price"]) ? $context["signup_price"] : null), "price_amount", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"\">费用类型</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <select name=\"price_type\"  class=\"span2\">
            ";
        // line 84
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["prize_types"]) ? $context["prize_types"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["prize"]) {
            // line 85
            echo "            ";
            if (($this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "type", array()) == $this->getAttribute((isset($context["signup_price"]) ? $context["signup_price"] : null), "price_type", array()))) {
                // line 86
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "type", array()), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "name", array()), "html", null, true);
                echo "</option>
            ";
            } else {
                // line 88
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "type", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "name", array()), "html", null, true);
                echo "</option>
            ";
            }
            // line 90
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prize'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "        </select>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"\">状态</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <select name=\"active\" class=\"span2\">
            ";
        // line 99
        if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "active", array()) == 1)) {
            // line 100
            echo "                <option value=\"1\" selected=\"selected\">启用</option>
                <option value=\"0\">停用</option>
            ";
        } else {
            // line 103
            echo "                <option value=\"1\" >启用</option>
                <option value=\"0\" selected=\"selected\">停用</option>
            ";
        }
        // line 106
        echo "        </select>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b>开始小时</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"start_hour\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_hour", array()), "html", null, true);
        echo "\"/>
    </div>
</div>


<div class=\"control-group\">
    <label class=\"control-label\"><b>开始分钟</b><span class=\"required\">*</span></label>
    <div class=\"controls\" >
        <input name=\"start_minute\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 121
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_minute", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"对于月赛，表示月赛在第几周举行，1表示第一周，-1表示最后一周，依次类推\" data-original-title=\"说明\" >开始周</a></b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input type=\"text\" name=\"start_week\" data-required=\"1\" class=\"span2 m-wrap\" value=\"";
        // line 128
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_week", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"对周赛与月赛，表示在周几举行，如6表示周六\" data-original-title=\"说明\" >周-天</a></b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"start_weekday\"  type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_weekday", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b ><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"提前N分钟进场\" data-original-title=\"说明\" >进场时间</a></b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"entrance_minutes\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 142
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "entrance_minutes", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b ><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"比赛前N分钟开始报名\" data-original-title=\"说明\" >报名开始时间</a></b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"signup_start_minutes\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 149
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "signup_start_minutes", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"比赛前N分钟停止报名\" data-original-title=\"说明\" >报名结束时间</a></b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"signup_end_minutes\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 156
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "signup_end_minutes", array()), "html", null, true);
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

    // line 174
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 175
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/additional-methods.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
";
    }

    // line 181
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 182
        echo "<script src=\"/media/js/private/knockout_match_add.js\"></script>
<script>
    var success = ";
        // line 184
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
        return "knockout_match_add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  321 => 184,  317 => 182,  314 => 181,  306 => 175,  303 => 174,  282 => 156,  272 => 149,  262 => 142,  252 => 135,  242 => 128,  232 => 121,  221 => 113,  212 => 106,  207 => 103,  202 => 100,  200 => 99,  190 => 91,  184 => 90,  176 => 88,  168 => 86,  165 => 85,  161 => 84,  150 => 76,  141 => 69,  135 => 68,  127 => 66,  119 => 64,  116 => 63,  112 => 62,  92 => 45,  88 => 44,  73 => 32,  54 => 15,  51 => 14,  44 => 8,  41 => 7,  35 => 4,  32 => 3,);
    }
}
