<?php

/* activity_detail.html */
class __TwigTemplate_76c45089da03f84209f07a3ada1921f1bc999f9a8cbb697741ff5534ea3e97af extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'seo' => array($this, 'block_seo'),
            'head' => array($this, 'block_head'),
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
    public function block_seo($context, array $blocks = array())
    {
        // line 4
        echo "<title>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "name", array()), "html", null, true);
        echo "</title>
<meta name=\"keywords\" content=\"武汉麻将-";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "name", array()), "html", null, true);
        echo "\" />
<meta name=\"description\" content=\"武汉麻将-";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "name", array()), "html", null, true);
        echo "\" />
";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "<link href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/index_Style.css\">
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "<!--content-->
<div id=\"m_content_2\">
    <div class=\"zxhd_banner\">
        <h2 class=\"zxhd_title\">";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "name", array()), "html", null, true);
        echo "</h2>
        <img src=\"http://";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "web_image_url", array()), "html", null, true);
        echo "\" class=\"zxhd_pic\" style=\"display:\" />
    </div>
    <div class=\"hdgz\" style=\"height:auto\">
        ";
        // line 22
        echo $this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "content", array());
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "activity_detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 22,  74 => 19,  70 => 18,  65 => 15,  62 => 14,  56 => 11,  51 => 10,  48 => 9,  42 => 6,  38 => 5,  33 => 4,  30 => 3,);
    }
}
