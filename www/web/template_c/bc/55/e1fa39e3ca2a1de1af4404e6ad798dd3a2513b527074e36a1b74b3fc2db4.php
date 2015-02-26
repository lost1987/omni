<?php

/* service_handle.html */
class __TwigTemplate_bc55e1fa39e3ca2a1de1af4404e6ad798dd3a2513b527074e36a1b74b3fc2db4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("baseService.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "baseService.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "武汉麻将-客户服务
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将-客户服务
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将-客户服务
";
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "<div class=\"col-xs-7\">
    <div class=\"panel p15 inner pb50\">
        <h4 class=\"mTitle\">自助服务
            <small class=\"text-blue\"><span class=\"pl5 pr5 text-grey\">|</span>";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["func_title"]) ? $context["func_title"] : null), "html", null, true);
        echo "</small>
        </h4>
        <div class=\"alert alert-info\">
            <div class=\"p30\">
                <span class=\"text-orgD\">";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["result_content"]) ? $context["result_content"] : null), "html", null, true);
        echo "</span>
            </div>
        </div>

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "service_handle.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 24,  63 => 20,  58 => 17,  55 => 16,  50 => 12,  47 => 11,  42 => 8,  39 => 7,  34 => 4,  31 => 3,);
    }
}
