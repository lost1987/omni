<?php

/* php_env.html */
class __TwigTemplate_263d8a195efec8a5adc072d594ccd61f16b24692facfc7b1678e022816084511 extends Twig_Template
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        // line 5
        echo "php运行环境
";
    }

    // line 8
    public function block_css($context, array $blocks = array())
    {
        // line 9
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/select2_metro.css\"/>
<link rel=\"stylesheet\" href=\"/media/css/DT_bootstrap.css\"/>
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "<!-- BEGIN PAGE HEADER-->


<div class=\"row-fluid\">
    <div class=\"span12\">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class=\"page-title\">
            php运行环境
            <small></small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>


<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->

<div class=\"row-fluid\">
    <div class=\"span12\">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class=\"portlet\">
            <div class=\"portlet-title\">
                <div class=\"caption\"></div>
                <div class=\"tools\">
                    <a href=\"javascript:;\" class=\"collapse\"></a>
                </div>
            </div>


            <div class=\"portlet-body\">
                ";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["obj"]) ? $context["obj"] : null), "twig_info"), "html", null, true);
        echo "
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->
</div>
";
    }

    // line 60
    public function block_javascript_plugins($context, array $blocks = array())
    {
    }

    // line 63
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 64
        echo "<script>
    var cssText ='table {border-collapse: collapse;}';
    cssText +='.center {text-align: center;}';
    cssText +='.center table { margin-left: auto; margin-right: auto; text-align: left;}';
    cssText +='.center th { text-align: center !important; }';
    cssText +='td, th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}';
    cssText +='h1 {font-size: 150%;}';
    cssText +='h2 {font-size: 125%;}';
    cssText +='.p {text-align: left;}';
    cssText += '.e {background-color: #ccccff; font-weight: bold; color: #000000;}';
    cssText +='.h {background-color: #9999cc; font-weight: bold; color: #000000;}';
    cssText +='.v {background-color: #cccccc; color: #000000;}';
    cssText +='.vr {background-color: #cccccc; text-align: right; color: #000000;}';
    cssText +='img {float: right; border: 0px;}';
    cssText +='hr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}';

    \$(\"style\").html(cssText);
</script>
";
    }

    public function getTemplateName()
    {
        return "php_env.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 64,  107 => 63,  102 => 60,  87 => 47,  52 => 14,  49 => 13,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
