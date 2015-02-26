<?php

/* maintain.html */
class __TwigTemplate_8bc95e6f5e6b844fc8fab9cc888affc39157d0647281f8117468daa51914ccfe extends Twig_Template
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

    // line 2
    public function block_seo($context, array $blocks = array())
    {
        // line 3
        echo "<title>武汉麻将</title>
<meta name=\"keywords\" content=\"武汉麻将\" />
<meta name=\"description\" content=\"武汉麻将\" />
";
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
        // line 8
        echo "<link href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "<div id=\"m_content_2\">
    <div class=\"khfw_box\">
        <div class=\"question_box\" style=\"border-bottom:0\">
            <p class=\"qa_suc\">";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["msg"]) ? $context["msg"] : null), "html", null, true);
        echo "！</p>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "maintain.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 15,  53 => 12,  50 => 11,  43 => 8,  40 => 7,  33 => 3,  30 => 2,);
    }
}
