<?php

/* daily_match_prize.html */
class __TwigTemplate_7619d72ddb13e0b0cacd99d104dca9b11cfa3790bc70d1241dd5073f4117bef0 extends Twig_Template
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
        echo "积分赛-奖励设置
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
            <small>
                ";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["action_name"]) ? $context["action_name"] : null), "html", null, true);
        echo "积分赛-奖励设置
                <a href=\"javascript:;\" class=\"popovers red\" data-trigger=\"hover\" data-content=\"点我添加一个排名\" data-original-title=\"说明\" onclick=\"match_form.create_form()\"><i class=\"icon-plus\" ></i></a>
            </small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>

<form id=\"prize_form\" action=\"";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : null), "html", null, true);
        echo "\" method=\"post\">
<input type=\"hidden\" name=\"match_prize_info\" id=\"match_prize_info\" />
<input type=\"hidden\" name=\"match_id\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["match_id"]) ? $context["match_id"] : null), "html", null, true);
        echo "\" />
<div class=\"form-actions\">
    <button type=\"button\" class=\"btn red\" onclick=\"save()\">保存</button>
    <button type=\"reset\" class=\"btn\">重置</button>
</div>
</form>
";
    }

    // line 39
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 40
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/additional-methods.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
";
    }

    // line 46
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 47
        echo "<script src=\"/media/js/private/daily_match_prize.js\"></script>
<script>
   \$(function(){
       var options = {
           'prize_types' : ";
        // line 51
        echo (isset($context["prize_types"]) ? $context["prize_types"] : null);
        echo ",
           'forms' : ";
        // line 52
        echo ((array_key_exists("list", $context)) ? (_twig_default_filter((isset($context["list"]) ? $context["list"] : null), "{}")) : ("{}"));
        echo "
       };
        match_form.init(options);
   })
</script>
";
    }

    public function getTemplateName()
    {
        return "daily_match_prize.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 52,  109 => 51,  103 => 47,  100 => 46,  92 => 40,  89 => 39,  78 => 31,  73 => 29,  62 => 21,  54 => 15,  51 => 14,  44 => 8,  41 => 7,  35 => 4,  32 => 3,);
    }
}
