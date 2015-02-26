<?php

/* baseArticle.html */
class __TwigTemplate_b1e3ee11da5dbd47d333196ef878e42f1f94efa33a72094d2f02987b7da1406b extends Twig_Template
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
            'content' => array($this, 'block_content'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <meta name=\"keywords\" content=\"";
        // line 6
        $this->displayBlock('keywords', $context, $blocks);
        echo "\">
    <meta name=\"description\" content=\"";
        // line 7
        $this->displayBlock('description', $context, $blocks);
        echo "\">
    <meta name=\"author\" content=\"\">

    <!-- Note there is no responsive meta tag here -->

    <title>";
        // line 12
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <!-- Bootstrap core CSS -->
    <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/css/bootstrap.css\" rel=\"stylesheet\">

    <!-- Custom styles for this template -->
    <link href=\"";
        // line 18
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
<div class=\"banner02\"></div>

<div class=\"main\">
    <div class=\"container\">
        ";
        // line 32
        $this->env->loadTemplate("floatCode.html")->display($context);
        // line 33
        echo "        <div class=\"row\">
            ";
        // line 34
        $this->env->loadTemplate("index_left_bar.html")->display($context);
        // line 35
        echo "            ";
        $this->displayBlock('content', $context, $blocks);
        // line 37
        echo "        </div>
    </div> <!-- /container -->
</div>

<div class=\"\">
    <div class=\"container\">
        <div class=\"footer\">
            ";
        // line 44
        $this->env->loadTemplate("footer.html")->display($context);
        // line 45
        echo "        </div>
    </div>
</div>
";
        // line 48
        $this->env->loadTemplate("notice.html")->display($context);
        // line 49
        echo "<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src=\"";
        // line 52
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.min.js\"></script>
<script src=\"";
        // line 53
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/jquery.SuperSlide.2.1.1.js\"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src=\"http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js\"></script>
<script src=\"http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js\"></script>
<![endif]-->
<script src=\"";
        // line 60
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/jquery.datetimepicker.js\"></script>
<script src=\"";
        // line 61
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/bootstrap.min.js\"></script>
<script src=\"";
        // line 62
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/common.js\"></script>
<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/calendar.js\"></script>
";
        // line 64
        $this->displayBlock('script', $context, $blocks);
        // line 66
        echo "</body>
</html>
";
    }

    // line 6
    public function block_keywords($context, array $blocks = array())
    {
    }

    // line 7
    public function block_description($context, array $blocks = array())
    {
    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
    }

    // line 20
    public function block_css($context, array $blocks = array())
    {
        // line 21
        echo "    ";
    }

    // line 35
    public function block_content($context, array $blocks = array())
    {
        // line 36
        echo "            ";
    }

    // line 64
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "baseArticle.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 64,  174 => 36,  171 => 35,  167 => 21,  164 => 20,  159 => 12,  154 => 7,  149 => 6,  143 => 66,  141 => 64,  137 => 63,  133 => 62,  129 => 61,  125 => 60,  115 => 53,  111 => 52,  106 => 49,  104 => 48,  99 => 45,  97 => 44,  88 => 37,  85 => 35,  83 => 34,  80 => 33,  78 => 32,  71 => 27,  69 => 26,  63 => 22,  61 => 20,  56 => 18,  50 => 15,  44 => 12,  36 => 7,  32 => 6,  25 => 1,);
    }
}
