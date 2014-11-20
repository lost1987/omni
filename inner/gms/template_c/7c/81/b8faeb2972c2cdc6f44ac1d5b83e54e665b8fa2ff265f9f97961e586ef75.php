<?php

/* error.html */
class __TwigTemplate_7c81b8faeb2972c2cdc6f44ac1d5b83e54e665b8fa2ff265f9f97961e586ef75 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
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
    public function block_css($context, array $blocks = array())
    {
        // line 4
        echo "<link href=\"/media/css/error.css\" rel=\"stylesheet\" type=\"text/css\"/>
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
    <div class=\"container-fluid\">

        <!-- BEGIN PAGE HEADER-->

        <div class=\"row-fluid\">

            <div class=\"span12\">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class=\"page-title\">
                    错误! <small></small>
                </h3>
            </div>
        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class=\"row-fluid\">

            <div class=\"span12 page-500\">

                <div class=\" number\" style=\"font-size: 100px;\">

                    CODE:";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["error_code"]) ? $context["error_code"] : null), "html", null, true);
        echo "

                </div>

                <div class=\" details\">

                    <h3>请记住错误代码,联系管理员.</h3>

                    <p>

                        We are fixing it!<br />

                        Please come back in a while.<br /><br />

                    </p>

                </div>

            </div>

        </div>
    </div>
";
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
        return array (  67 => 33,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
