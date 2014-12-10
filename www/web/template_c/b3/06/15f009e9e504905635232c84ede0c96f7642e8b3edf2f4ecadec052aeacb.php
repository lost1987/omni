<?php

/* user_message.html */
class __TwigTemplate_b30615f009e9e504905635232c84ede0c96f7642e8b3edf2f4ecadec052aeacb extends Twig_Template
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
        echo "<title>武汉麻将-个人消息</title>
<meta name=\"keywords\" content=\"武汉麻将-个人消息\" />
<meta name=\"description\" content=\"武汉麻将-个人消息\" />
";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "<link href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<script src=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/user_message.js\"></script>
<style>
    .hid_more{
        height:28px;
    }
</style>
";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "<div id=\"m_content_2\">
    <h3><a href='/userinfo'><em></em></a><b class=\"xtgg\">个人消息</b></h3>
    <div class=\"gg_list\">
        <div class=\"one_box\">
                ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 25
            echo "                <div class=\"one
                ";
            // line 26
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "has_read", array()) == 0)) {
                // line 27
                echo "                    unread
                ";
            }
            // line 29
            echo "                ";
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index", array()) % 2) == 0)) {
                // line 30
                echo "                    even
                ";
            }
            // line 32
            echo "                    hid_more\" id=\"244\" name=\"#244\">

                    <a class=\"title\" href=\"javascript:;\" target=\"_blank\" rel=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "has_read", array()), "html", null, true);
            echo "|";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "msg_id", array()), "html", null, true);
            echo "\">From: ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "sender", array()), "html", null, true);
            echo "</a>
                    <span class=\"time\">";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "msg_time", array()), "html", null, true);
            echo "</span>
                    <span class=\"message\" style=\"display:none\">
                        ";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "content", array()), "html", null, true);
            echo "
                    </span>
                </div>
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "            <div class=\"pagination\">
                <ul>
                    ";
        // line 43
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "
                </ul>
            </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "user_message.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 43,  136 => 41,  118 => 37,  113 => 35,  105 => 34,  101 => 32,  97 => 30,  94 => 29,  90 => 27,  88 => 26,  85 => 25,  68 => 24,  62 => 20,  59 => 19,  48 => 11,  43 => 10,  40 => 9,  33 => 4,  30 => 3,);
    }
}
