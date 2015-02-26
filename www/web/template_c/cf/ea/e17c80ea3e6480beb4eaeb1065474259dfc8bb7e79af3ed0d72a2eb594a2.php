<?php

/* activity.html */
class __TwigTemplate_cfeae17c80ea3e6480beb4eaeb1065474259dfc8bb7e79af3ed0d72a2eb594a2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("baseArticle.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "baseArticle.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "武汉麻将-活动中心
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将-活动中心
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将-活动中心
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "<div class=\"col-xs-8\">
    ";
        // line 17
        $this->env->loadTemplate("article_tablist.html")->display($context);
        // line 18
        echo "    <div class=\"panel p30\" style=\"min-height: 510px;\">
        <h2 class=\"sTitle\">
            <span class=\"icon icon-globe-b\"></span>
                <span class=\"bl1\">
                  <span class=\"uppercase\">Activity</span><br>活动中心
                </span>

            <div class=\"input-group pull-right input-r\">
            </div>
            <!-- /input-group -->
        </h2>
        <div>
            <div class=\"row nopd\">
                <ul class=\"list list01\">
                    ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 33
            echo "                    <li class=\"pt15 pb15\">
                        <div class=\"media\">
                            <a class=\"pull-left pr15\">
                                <img class=\"media-object\" src=\"http://";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "web_image_url", array()), "html", null, true);
            echo "\" width=144 height=72\" alt=\"Image\">
                            </a>

                            <div class=\"media-body\">
                                <h4 class=\"media-heading pr\"><a href=\"/activity/detail/";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\"><strong>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "</strong></a><span class=\"time\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "publish_time", array()), "html", null, true);
            echo "</span>
                                </h4>

                                <p class=\"mbn\">";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "content", array()), "html", null, true);
            echo "... <a href=\"/activity/detail/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" class=\"text-org pull-right font12\">> 更多</a></p>
                            </div>
                        </div>
                    </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "                </ul>
                <div class=\"text-right\">
                    <ul class=\"pagination\">
                       ";
        // line 51
        echo (isset($context["pagiation"]) ? $context["pagiation"] : null);
        echo "
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "activity.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 51,  118 => 48,  105 => 43,  95 => 40,  88 => 36,  83 => 33,  79 => 32,  63 => 18,  61 => 17,  58 => 16,  55 => 15,  50 => 12,  47 => 11,  42 => 8,  39 => 7,  34 => 4,  31 => 3,);
    }
}
