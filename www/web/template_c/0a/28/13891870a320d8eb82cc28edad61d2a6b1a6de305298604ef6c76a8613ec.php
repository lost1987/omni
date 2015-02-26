<?php

/* article_tablist.html */
class __TwigTemplate_0a2813891870a320d8eb82cc28edad61d2a6b1a6de305298604ef6c76a8613ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<ul class=\"nav nav-tabs nav01\" role=\"tablist\">
    <li class=\"";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["xwzx"]) ? $context["xwzx"] : null), "html", null, true);
        echo "\"><a href=\"/articles\"><span class=\"icon icon-globe\"></span>公告资讯</a></li>
    <li class=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["hdzq"]) ? $context["hdzq"] : null), "html", null, true);
        echo "\"><a href=\"/activity\"><span class=\"icon icon-boolom\"></span>活动专区</a></li>
    <li class=\"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["phb"]) ? $context["phb"] : null), "html", null, true);
        echo "\"><a href=\"/rank\"><span class=\"icon icon-rank\"></span>排行榜</a></li>
    <li class=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["xszn"]) ? $context["xszn"] : null), "html", null, true);
        echo "\"><a href=\"/introduce\"><span class=\"icon icon-dir\"></span>新手指南</a></li>
</ul>";
    }

    public function getTemplateName()
    {
        return "article_tablist.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
