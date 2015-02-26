<?php

/* basePersonnal.html */
class __TwigTemplate_ebd3d181a5cdb5d611ecfab741c23881d89404cb3e34c74c23b4678ffc743c1c extends Twig_Template
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
                                <a href=\"/userinfo\">
                                <span class=\"icon icon-user-w\"></span>
                                <span class=\"bl1\">
                                  <span class=\"uppercase\">USER</span><br>个人中心
                                </span>
                                </a>
                            </h3>
                        </div>
                        <div class=\"leftSide pt30 pb30 pl10\">
                            <ul class=\"nav nav-pills nav-stacked\" role=\"tablist\">
                                <li class=\"";
        // line 50
        echo twig_escape_filter($this->env, (isset($context["userInfoActive"]) ? $context["userInfoActive"] : null), "html", null, true);
        echo "\"><a href=\"/userinfo\"><span class=\"icon icon-arrowR-org\"></span>账号信息</a></li>
                                <li class=\"";
        // line 51
        echo twig_escape_filter($this->env, (isset($context["userOrderActive"]) ? $context["userOrderActive"] : null), "html", null, true);
        echo "\"><a href=\"/userinfo/myOrders\"><span class=\"icon icon-arrowR-org\"></span>我的订单</a></li>
                                <li class=\"";
        // line 52
        echo twig_escape_filter($this->env, (isset($context["userScoreActive"]) ? $context["userScoreActive"] : null), "html", null, true);
        echo "\"><a href=\"/userinfo/myScore\"><span class=\"icon icon-arrowR-org\"></span>个人战绩</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

        ";
        // line 58
        $this->displayBlock('content', $context, $blocks);
        // line 60
        echo "
        ";
        // line 61
        $this->env->loadTemplate("faq_right_bar.html")->display($context);
        // line 62
        echo "    </div>
</div>
    </div> <!-- /container -->
</div>

<div class=\"\">
    <div class=\"container\">
        <div class=\"footer\">
            ";
        // line 70
        $this->env->loadTemplate("footer.html")->display($context);
        // line 71
        echo "        </div>
    </div>
</div>
";
        // line 74
        $this->env->loadTemplate("notice.html")->display($context);
        // line 75
        echo "<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Placed at the end of the document so the pages load faster -->
<script src=\"";
        // line 79
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.min.js\"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src=\"http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js\"></script>
<script src=\"http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js\"></script>
<![endif]-->
<script src=\"";
        // line 86
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/bootstrap.min.js\"></script>
<script src=\"";
        // line 87
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/common.js\"></script>
";
        // line 88
        $this->displayBlock('script', $context, $blocks);
        // line 90
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

    // line 58
    public function block_content($context, array $blocks = array())
    {
        // line 59
        echo "        ";
    }

    // line 88
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "basePersonnal.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 88,  206 => 59,  203 => 58,  198 => 29,  195 => 28,  191 => 21,  188 => 20,  183 => 13,  178 => 8,  173 => 7,  167 => 90,  165 => 88,  161 => 87,  157 => 86,  147 => 79,  141 => 75,  139 => 74,  134 => 71,  132 => 70,  122 => 62,  120 => 61,  117 => 60,  115 => 58,  106 => 52,  102 => 51,  98 => 50,  77 => 31,  75 => 28,  72 => 27,  70 => 26,  64 => 22,  62 => 20,  58 => 19,  52 => 16,  46 => 13,  38 => 8,  34 => 7,  26 => 1,);
    }
}
