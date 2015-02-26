<?php

/* join_us.html */
class __TwigTemplate_b7354a0743fbfa0a58840cb2cd1cd93fd0cb99eccfdea0131734d2880381b86a extends Twig_Template
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
        echo "<title>武汉麻将-关于我们</title>
<meta name=\"keywords\" content=\"武汉麻将-关于我们\" />
<meta name=\"description\" content=\"武汉麻将-关于我们\" />
";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/css/foundation.css\">
<link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/css/styles.css\">
<link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/css/join.css\">
<link href=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<style>
    a.join_temp_btn{width:77px; height:77px; padding:18px 0 0 0; display:inline-block; text-indent:-99999px}
</style>
<script>
function show_page(name){
    \$('iframe').attr('src',\"";
        // line 19
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/aboutus/\"+name);
}
</script>
";
    }

    // line 25
    public function block_content($context, array $blocks = array())
    {
        // line 26
        echo "<!--content-->
<div id=\"m_content_2\" style=\"padding-top:0\">
    <div id=\"how-1\" class=\"how hero\" style=\"height:290px; width:989px; margin:0 auto\">
        <div class=\"row\" style=\"height:290px;background:url(";
        // line 29
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/img/joinus.jpg) -30px 0 no-repeat;\">
            <div style=\"height:290px; position:relative\">
                <a href=\"javascript:;\" target=\"join\" class=\"join_temp_btn\" onclick=\"show_page('infous')\" style=\"position:absolute; left:100px; bottom:19px\">关于我们</a>
                <a href=\"javascript:;\" target=\"join\" class=\"join_temp_btn\" onclick=\"show_page('infous_1')\" style=\"position:absolute; right:138px; bottom:19px\">招聘岗位</a>
            </div>
        </div>
    </div>

    <div style=\"display:block; visibility:visible; height:1250px; padding:0;\" class=\"white how\" id=\"how-gray-2\">
        <div style=\"height:1230px;\" class=\"row\">
            <iframe width=\"100%\" height=\"100%\" frameborder=\"0\" scrolling=\"no\" src=\"";
        // line 39
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/aboutus/infous\" name=\"join\"></iframe>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "join_us.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 39,  81 => 29,  76 => 26,  73 => 25,  65 => 19,  56 => 13,  52 => 12,  48 => 11,  43 => 10,  40 => 9,  33 => 4,  30 => 3,);
    }
}
