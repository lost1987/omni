<?php

/* module_add.html */
class __TwigTemplate_72ac3d84c9ef76f88f0c080418e2c654f3e92d67b226474f5ca77160a1b5ac9d extends Twig_Template
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
        echo "模块
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
            模块管理
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
        echo "模块</i></div>
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
    <label class=\"control-label\"><b class=\"midnight\">模块名称</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input type=\"text\" name=\"module_name\" data-required=\"1\" class=\"span6 m-wrap\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_name", array()), "html", null, true);
        echo "\"/>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">模块别名</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"module_alias\" type=\"text\" class=\"span6 m-wrap\" value=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_alias", array()), "html", null, true);
        echo "\"/>
    </div>
</div>


<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">模块权限</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"module_permission\" type=\"text\" class=\"span1 m-wrap\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_permission", array()), "html", null, true);
        echo "\"/>
    </div>
</div>


<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">模块路径</b>&nbsp;&nbsp;</label>
    <div class=\"controls\">
        <input name=\"module_url\" type=\"text\" class=\"span6 m-wrap\" value=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_url", array()), "html", null, true);
        echo "\"/>
    </div>
</div>


<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">父模块</b><span class=\"required\">*</span></label>
    <div class=\"controls chzn-controls\">
        <select id=\"root_chosen\" class=\"span6 chosen\" data-with-diselect=\"1\" name=\"pid\" data-placeholder=\"请选择\" tabindex=\"1\">
            ";
        // line 92
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["root_lists"]) ? $context["root_lists"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["root"]) {
            // line 93
            echo "                ";
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "pid", array()) == $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "id", array()))) {
                // line 94
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "id", array()), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "module_name", array()), "html", null, true);
                echo "</option>
                ";
            } else {
                // line 96
                echo "                     <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "module_name", array()), "html", null, true);
                echo "</option>
                ";
            }
            // line 98
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['root'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 99
        echo "        </select>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">可见</b><span class=\"required\">*</span></label>
    <div class=\"controls chzn-controls\">
        <select class=\"span1 m-wrap\" name=\"visible\">
            ";
        // line 107
        if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "visible", array()) == 1)) {
            // line 108
            echo "            <option value=\"0\" >否</option>
            <option value=\"1\" selected=\"selected\">是</option>
            ";
        } else {
            // line 111
            echo "            <option value=\"0\" >否</option>
            <option value=\"1\">是</option>
            ";
        }
        // line 114
        echo "        </select>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">模块图标</b><span class=\"required\">*</span></label>
    <div class=\"controls select2-wrapper\">
        <input name=\"icon\" type=\"text\" class=\"span6 m-wrap\"  value=\"";
        // line 121
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon", array()), "icon-th")) : ("icon-th")), "html", null, true);
        echo "\"/>
    </div>
</div>


<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">排序</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input name=\"orders\" type=\"text\" class=\"span1 m-wrap\" value=\"";
        // line 129
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "orders", array()), "html", null, true);
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

    // line 147
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 148
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/additional-methods.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
";
    }

    // line 154
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 155
        echo "<script src=\"/media/js/private/module_add.js\"></script>
<script>
    var success = ";
        // line 157
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
        return "module_add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  264 => 157,  260 => 155,  257 => 154,  249 => 148,  246 => 147,  225 => 129,  214 => 121,  205 => 114,  200 => 111,  195 => 108,  193 => 107,  183 => 99,  177 => 98,  169 => 96,  161 => 94,  158 => 93,  154 => 92,  142 => 83,  131 => 75,  120 => 67,  110 => 60,  92 => 45,  88 => 44,  73 => 32,  54 => 15,  51 => 14,  44 => 8,  41 => 7,  35 => 4,  32 => 3,);
    }
}
