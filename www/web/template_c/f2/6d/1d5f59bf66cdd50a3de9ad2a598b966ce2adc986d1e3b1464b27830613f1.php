<?php

/* baseBlank.html */
class __TwigTemplate_f26d1d5f59bf66cdd50a3de9ad2a598b966ce2adc986d1e3b1464b27830613f1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'banner' => array($this, 'block_banner'),
            'content' => array($this, 'block_content'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <meta name=\"keywords\" content=\"";
        // line 7
        $this->displayBlock('keywords', $context, $blocks);
        echo "\">
    <meta name=\"description\" content=\"";
        // line 8
        $this->displayBlock('description', $context, $blocks);
        echo "\">
    <meta name=\"author\" content=\"\">

    <!-- Note there is no responsive meta tag here -->

    <title>";
        // line 13
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <!-- Bootstrap core CSS -->
    <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/css/bootstrap.css\" rel=\"stylesheet\">

    <!-- Custom styles for this template -->
    <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/css/main.css\" rel=\"stylesheet\">
    ";
        // line 20
        $this->displayBlock('css', $context, $blocks);
        // line 22
        echo "</head>

<body>

";
        // line 26
        $this->env->loadTemplate("header.html")->display($context);
        // line 27
        echo "
";
        // line 28
        $this->displayBlock('banner', $context, $blocks);
        // line 31
        echo "
<div class=\"main\">
    <div class=\"container\">
        ";
        // line 34
        $this->displayBlock('content', $context, $blocks);
        // line 36
        echo "    </div>
</div>
    </div> <!-- /container -->
</div>
";
        // line 40
        $this->env->loadTemplate("notice.html")->display($context);
        // line 41
        echo "<div class=\"\">
    <div class=\"container\">
        <div class=\"footer\">
            ";
        // line 44
        $this->env->loadTemplate("footer.html")->display($context);
        // line 45
        echo "        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Placed at the end of the document so the pages load faster -->
<script src=\"";
        // line 53
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.min.js\"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src=\"http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js\"></script>
<script src=\"http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js\"></script>
<![endif]-->
<script src=\"";
        // line 60
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/bootstrap.min.js\"></script>
<script src=\"";
        // line 61
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/common.js\"></script>
";
        // line 62
        $this->displayBlock('script', $context, $blocks);
        // line 64
        echo "</body>
</html>
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
    }

    // line 8
    public function block_description($context, array $blocks = array())
    {
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
    }

    // line 20
    public function block_css($context, array $blocks = array())
    {
        // line 21
        echo "    ";
    }

    // line 28
    public function block_banner($context, array $blocks = array())
    {
        // line 29
        echo "<div class=\"banner02\"></div>
";
    }

    // line 34
    public function block_content($context, array $blocks = array())
    {
        // line 35
        echo "        ";
    }

    // line 62
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "baseBlank.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 62,  168 => 35,  165 => 34,  160 => 29,  157 => 28,  153 => 21,  150 => 20,  145 => 13,  140 => 8,  135 => 7,  129 => 64,  127 => 62,  123 => 61,  119 => 60,  109 => 53,  99 => 45,  97 => 44,  92 => 41,  90 => 40,  84 => 36,  82 => 34,  77 => 31,  75 => 28,  72 => 27,  70 => 26,  64 => 22,  62 => 20,  58 => 19,  52 => 16,  46 => 13,  38 => 8,  34 => 7,  26 => 1,);
    }
}
