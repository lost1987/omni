<?php

/* baseService.html */
class __TwigTemplate_1a6a23724e24eb445de25b91d0aab98aef5fe26477d3e77b9eb8bf045c95b7e5 extends Twig_Template
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
        <div class=\"\">
            <div class=\"row\">
                <div class=\"col-xs-2\">
                    <div class=\"bg-blueD inner\">
                        <div class=\"mainTitle\">
                            <h3 class=\"sTitle\">
                                <a href=\"/service\">
                                <span class=\"icon icon-heart\"></span>
                                <span class=\"bl1\">
                                  <span class=\"uppercase\">SERVICE</span><br>客服
                                </span>
                                </a>
                            </h3>
                        </div>
                        <div class=\"leftSide pt30 pb30 pl10\">
                            <ul class=\"nav nav-pills nav-stacked\" role=\"tablist\">
                                <li class=\"";
        // line 50
        echo twig_escape_filter($this->env, (isset($context["fwzn"]) ? $context["fwzn"] : null), "html", null, true);
        echo "\"><a href=\"/service\"><span class=\"icon icon-arrowR-org\"></span>服务指南</a></li>
                                <li class=\"";
        // line 51
        echo twig_escape_filter($this->env, (isset($context["zzfw"]) ? $context["zzfw"] : null), "html", null, true);
        echo "\"><a href=\"/service/selfService\"><span class=\"icon icon-arrowR-org\"></span>自助服务</a></li>
                                <li class=\"";
        // line 52
        echo twig_escape_filter($this->env, (isset($context["bzzx"]) ? $context["bzzx"] : null), "html", null, true);
        echo "\"><a href=\"/service/helpCenter\"><span class=\"icon icon-arrowR-org\"></span>帮助中心</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        ";
        // line 57
        $this->displayBlock('content', $context, $blocks);
        // line 59
        echo "
        ";
        // line 60
        $this->env->loadTemplate("faq_right_bar.html")->display($context);
        // line 61
        echo "    </div> <!-- /container -->
</div>

<div class=\"\">
    <div class=\"container\">
        <div class=\"footer\">
            ";
        // line 67
        $this->env->loadTemplate("footer.html")->display($context);
        // line 68
        echo "        </div>
    </div>
</div>
";
        // line 71
        $this->env->loadTemplate("notice.html")->display($context);
        // line 72
        echo "<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Placed at the end of the document so the pages load faster -->
<script src=\"";
        // line 76
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.min.js\"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src=\"http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js\"></script>
<script src=\"http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js\"></script>
<![endif]-->
<script src=\"";
        // line 82
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/bootstrap.min.js\"></script>
<script src=\"";
        // line 83
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/common.js\"></script>
";
        // line 84
        $this->displayBlock('script', $context, $blocks);
        // line 86
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

    // line 57
    public function block_content($context, array $blocks = array())
    {
        // line 58
        echo "        ";
    }

    // line 84
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "baseService.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 84,  202 => 58,  199 => 57,  194 => 29,  191 => 28,  187 => 21,  184 => 20,  179 => 13,  174 => 8,  169 => 7,  163 => 86,  161 => 84,  157 => 83,  153 => 82,  144 => 76,  138 => 72,  136 => 71,  131 => 68,  129 => 67,  121 => 61,  119 => 60,  116 => 59,  114 => 57,  106 => 52,  102 => 51,  98 => 50,  77 => 31,  75 => 28,  72 => 27,  70 => 26,  64 => 22,  62 => 20,  58 => 19,  52 => 16,  46 => 13,  38 => 8,  34 => 7,  26 => 1,);
    }
}
