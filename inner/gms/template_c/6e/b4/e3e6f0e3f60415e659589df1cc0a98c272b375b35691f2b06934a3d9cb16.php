<?php

/* knockout_match_add.html */
class __TwigTemplate_6eb4e3e6f0e3f60415e659589df1cc0a98c272b375b35691f2b06934a3d9cb16 extends Twig_Template
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
    <label class=\"control-label\"><b class=\"\">比赛名称</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input  type=\"text\" class=\"span3\"  name=\"name\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"\">比赛类型</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <select name=\"match_type\" >
        ";
        // line 68
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["match_types"]) ? $context["match_types"] : null));
        foreach ($context['_seq'] as $context["val"] => $context["match"]) {
            // line 69
            echo "                ";
            if (((isset($context["val"]) ? $context["val"] : null) == $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_type", array()))) {
                // line 70
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, (isset($context["match"]) ? $context["match"] : null), "html", null, true);
                echo "</option>
                ";
            } else {
                // line 72
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["match"]) ? $context["match"] : null), "html", null, true);
                echo "</option>
                ";
            }
            // line 74
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['val'], $context['match'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "        </select>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"\">报名费用</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
       <input  type=\"text\" class=\"span2\"  name=\"price_amount\" value=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["signup_price"]) ? $context["signup_price"] : null), "price_amount", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"\">费用类型</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <select name=\"price_type\"  class=\"span2\">
            ";
        // line 90
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["prize_types"]) ? $context["prize_types"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["prize"]) {
            // line 91
            echo "            ";
            if (($this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "type", array()) == $this->getAttribute((isset($context["signup_price"]) ? $context["signup_price"] : null), "price_type", array()))) {
                // line 92
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "type", array()), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "name", array()), "html", null, true);
                echo "</option>
            ";
            } else {
                // line 94
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "type", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "name", array()), "html", null, true);
                echo "</option>
            ";
            }
            // line 96
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prize'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "        </select>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"\">底价</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input  type=\"text\" class=\"span2\"  name=\"base_price\" value=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "base_price", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"\">底价类型</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <select name=\"base_price_type\"  class=\"span2\">
            ";
        // line 112
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["prize_types"]) ? $context["prize_types"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["prize"]) {
            // line 113
            echo "            ";
            if (($this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "type", array()) == $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "base_price_type", array()))) {
                // line 114
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "type", array()), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "name", array()), "html", null, true);
                echo "</option>
            ";
            } else {
                // line 116
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "type", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "name", array()), "html", null, true);
                echo "</option>
            ";
            }
            // line 118
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prize'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 119
        echo "        </select>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"\">竞拍时长(秒)</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input  type=\"text\" class=\"span2\"  name=\"auction_time\" value=\"";
        // line 126
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "auction_time", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"\">状态</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <select name=\"active\" class=\"span2\">
            ";
        // line 134
        if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "active", array()) == 1)) {
            // line 135
            echo "                <option value=\"1\" selected=\"selected\">启用</option>
                <option value=\"0\">停用</option>
            ";
        } else {
            // line 138
            echo "                <option value=\"1\" >启用</option>
                <option value=\"0\" selected=\"selected\">停用</option>
            ";
        }
        // line 141
        echo "        </select>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b>开始小时</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"start_hour\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 148
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_hour", array()), "html", null, true);
        echo "\"/>
    </div>
</div>


<div class=\"control-group\">
    <label class=\"control-label\"><b>开始分钟</b><span class=\"required\">*</span></label>
    <div class=\"controls\" >
        <input name=\"start_minute\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 156
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_minute", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"对于月赛，表示月赛在第几周举行，1表示第一周，-1表示最后一周，依次类推\" data-original-title=\"说明\" >开始周</a></b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input type=\"text\" name=\"start_week\" data-required=\"1\" class=\"span2 m-wrap\" value=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_week", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"对周赛与月赛，表示在周几举行，如6表示周六\" data-original-title=\"说明\" >周-天</a></b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"start_weekday\"  type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 170
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_weekday", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b ><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"提前N分钟进场\" data-original-title=\"说明\" >进场时间</a></b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"entrance_minutes\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 177
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "entrance_minutes", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b ><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"比赛前N分钟开始报名\" data-original-title=\"说明\" >报名开始时间</a></b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"signup_start_minutes\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 184
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "signup_start_minutes", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"比赛前N分钟停止报名\" data-original-title=\"说明\" >报名结束时间</a></b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"signup_end_minutes\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 191
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

    // line 209
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 210
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/additional-methods.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
";
    }

    // line 216
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 217
        echo "<script src=\"/media/js/private/knockout_match_add.js\"></script>
<script>
    var success = ";
        // line 219
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
        return array (  389 => 219,  385 => 217,  382 => 216,  374 => 210,  371 => 209,  350 => 191,  340 => 184,  330 => 177,  320 => 170,  310 => 163,  300 => 156,  289 => 148,  280 => 141,  275 => 138,  270 => 135,  268 => 134,  257 => 126,  248 => 119,  242 => 118,  234 => 116,  226 => 114,  223 => 113,  219 => 112,  208 => 104,  199 => 97,  193 => 96,  185 => 94,  177 => 92,  174 => 91,  170 => 90,  159 => 82,  150 => 75,  144 => 74,  136 => 72,  128 => 70,  125 => 69,  121 => 68,  110 => 60,  92 => 45,  88 => 44,  73 => 32,  54 => 15,  51 => 14,  44 => 8,  41 => 7,  35 => 4,  32 => 3,);
    }
}
