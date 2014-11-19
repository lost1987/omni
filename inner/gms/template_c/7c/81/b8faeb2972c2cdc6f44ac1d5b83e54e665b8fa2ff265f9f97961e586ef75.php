<?php

/* error.html */
class __TwigTemplate_7c81b8faeb2972c2cdc6f44ac1d5b83e54e665b8fa2ff265f9f97961e586ef75 extends Twig_Template
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
        echo "error code : ";
        echo twig_escape_filter($this->env, (isset($context["error_code"]) ? $context["error_code"] : null), "html", null, true);
    }

    public function getTemplateName()
    {
        return "error.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
