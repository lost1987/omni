<?php

/* index.html */
class __TwigTemplate_bbe74b4676b783ed04d37deff2b99b6b9e8bd8af52b19698c5640582fe72e8a1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
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
        echo "        后台首页
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"media/css/select2_metro.css\" />
<link rel=\"stylesheet\" href=\"media/css/DT_bootstrap.css\" />
";
    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
    }

    // line 16
    public function block_javascript($context, array $blocks = array())
    {
        // line 17
        echo "<script type=\"text/javascript\" src=\"media/js/select2.min.js\"></script>

<script type=\"text/javascript\" src=\"media/js/jquery.dataTables.js\"></script>

<script type=\"text/javascript\" src=\"media/js/DT_bootstrap.js\"></script>

<script src=\"media/js/table-editable.js\"></script>
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
        return array (  56 => 17,  53 => 16,  48 => 12,  42 => 8,  39 => 7,  34 => 4,  31 => 3,);
    }
}
