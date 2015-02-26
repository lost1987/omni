<?php

/* newsCenter.html */
class __TwigTemplate_42623ad600ea021af173b2524282966850b3d0a8c0652f877c080b6549d0ba9a extends Twig_Template
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
        echo "武汉麻将-公告资讯
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将-公告资讯
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将-公告资讯
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
        echo "            <div class=\"panel p30\" style=\"min-height: 510px;\">
              <h2 class=\"sTitle\">
                <span class=\"icon icon-globe-b\"></span>
                <span class=\"bl1\">
                  <span class=\"uppercase\">NEWS</span><br>公告资讯
                </span>
              </h2>
              <ul class=\"mt20 list list01 pr mbn\">
                  ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 27
            echo "                  <li><span class=\"time\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "publish_time", array()), "html", null, true);
            echo "</span><a href=\"/articles/detail/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\"><span class=\"text-grey\">[";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "category_name", array()), "html", null, true);
            echo "]</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
            echo "</a></li>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "              </ul>
              <div class=\"text-right\">
                <ul class=\"pagination mbn\">
                    ";
        // line 32
        echo (isset($context["pagiation"]) ? $context["pagiation"] : null);
        echo "
                </ul>
              </div>
            </div>
          </div>
";
    }

    public function getTemplateName()
    {
        return "newsCenter.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 32,  92 => 29,  77 => 27,  73 => 26,  63 => 18,  61 => 17,  58 => 16,  55 => 15,  50 => 12,  47 => 11,  42 => 8,  39 => 7,  34 => 4,  31 => 3,);
    }
}
