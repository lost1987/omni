<?php

/* player_add.html */
class __TwigTemplate_a1e13bfa01689a4eb321ee5aca55006cbe59d855df102f43c829a37c2ad71d29 extends Twig_Template
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
        echo "玩家
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
        echo "玩家,您正在修改玩家[<b class=\"red\">";
        echo twig_escape_filter($this->env, (isset($context["login_name"]) ? $context["login_name"] : null), "html", null, true);
        echo "</b>]的资源</i></div>
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
                    <input type=\"hidden\" name=\"id\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, (isset($context["uid"]) ? $context["uid"] : null), "html", null, true);
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
                        <label class=\"control-label\"><b class=\"midnight\">金币</b><span class=\"required\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"coins\" data-required=\"1\" class=\"span3 m-wrap\" value=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "coins", array()), "html", null, true);
        echo "\"/>
                        </div>
                    </div>

                    <div class=\"control-group\">
                        <label class=\"control-label\"><b class=\"midnight\">钻石</b><span class=\"required\">*</span></label>
                        <div class=\"controls\">
                            <input name=\"diamond\" type=\"text\" class=\"span3 m-wrap\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "diamond", array()), "html", null, true);
        echo "\"/>
                        </div>
                    </div>


                    <div class=\"control-group\">
                        <label class=\"control-label\"><b class=\"midnight\">门票</b><span class=\"required\">*</span></label>
                        <div class=\"controls\">
                            <input name=\"ticket\" type=\"text\" class=\"span3 m-wrap\" value=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "ticket", array()), "html", null, true);
        echo "\"/>
                        </div>
                    </div>


                    <div class=\"control-group\">
                        <label class=\"control-label\"><b class=\"midnight\">奖券</b>&nbsp;&nbsp;</label>
                        <div class=\"controls\">
                            <input name=\"coupon\" type=\"text\" class=\"span3 m-wrap\" value=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "coupon", array()), "html", null, true);
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

    // line 102
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 103
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/additional-methods.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
";
    }

    // line 109
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 110
        echo "<script src=\"/media/js/private/player_add.js\"></script>
<script>
    \$(function(){
        FormValidation.init();
    })
</script>
";
    }

    public function getTemplateName()
    {
        return "player_add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 110,  180 => 109,  172 => 103,  169 => 102,  148 => 84,  137 => 76,  126 => 68,  116 => 61,  98 => 46,  94 => 45,  90 => 44,  73 => 32,  54 => 15,  51 => 14,  44 => 8,  41 => 7,  35 => 4,  32 => 3,);
    }
}
