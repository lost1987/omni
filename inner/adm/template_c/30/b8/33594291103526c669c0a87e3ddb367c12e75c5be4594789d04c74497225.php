<?php

/* index.html */
class __TwigTemplate_30b833594291103526c669c0a87e3ddb367c12e75c5be4594789d04c74497225 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"am-cf am-padding\">
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\">概览</strong> <small></small></div>
</div>

<ul class=\"am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list \">
    <li><a href=\"#\" class=\"am-text-success\"><span class=\"am-icon-btn am-icon-user\"></span><br/>今日新增用户<br/>";
        // line 9
        echo twig_escape_filter($this->env, ((array_key_exists("userNumNewToday", $context)) ? (_twig_default_filter((isset($context["userNumNewToday"]) ? $context["userNumNewToday"] : null), 0)) : (0)), "html", null, true);
        echo "</a></li>
    <li><a href=\"\" class=\"am-text-warning\"><span class=\"am-icon-btn am-icon-users\"></span><br/>总用户<br/>";
        // line 10
        echo twig_escape_filter($this->env, ((array_key_exists("userNumTotal", $context)) ? (_twig_default_filter((isset($context["userNumTotal"]) ? $context["userNumTotal"] : null), 0)) : (0)), "html", null, true);
        echo "</a></li>
    <li><a href=\"#\" class=\"am-text-danger\"><span class=\"am-icon-btn am-icon-cny\"></span><br/>总支出金额<br/>";
        // line 11
        echo twig_escape_filter($this->env, ((array_key_exists("moneyTotal", $context)) ? (_twig_default_filter((isset($context["moneyTotal"]) ? $context["moneyTotal"] : null), "0.00")) : ("0.00")), "html", null, true);
        echo "</a></li>
    <li><a href=\"\" class=\"am-text-secondary\"><span class=\"am-icon-btn am-icon-file-text\"></span><br/>待处理提现<br/>";
        // line 12
        echo twig_escape_filter($this->env, ((array_key_exists("unDoneDepositNum", $context)) ? (_twig_default_filter((isset($context["unDoneDepositNum"]) ? $context["unDoneDepositNum"] : null), 0)) : (0)), "html", null, true);
        echo "</a></li>
</ul>

";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 12,  46 => 11,  42 => 10,  38 => 9,  31 => 4,  28 => 3,);
    }
}
