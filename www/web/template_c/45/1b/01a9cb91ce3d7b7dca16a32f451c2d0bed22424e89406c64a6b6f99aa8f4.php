<?php

/* activity_list.html */
class __TwigTemplate_451b01a9cb91ce3d7b7dca16a32f451c2d0bed22424e89406c64a6b6f99aa8f4 extends Twig_Template
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
        echo "<title>武汉麻将-最新活动</title>
<meta name=\"keywords\" content=\"武汉麻将-最新活动\" />
<meta name=\"description\" content=\"武汉麻将-最新活动\" />
";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "<link href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<style>
    .one_box .one.unread a.title{background:url('');text-indent:0px;}
    .one_box .one a.title{background:url('');text-indent:0px;}
</style>
";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "<!--content-->
<div id=\"m_content_2\">
    <h3><a href=\"/\"><em></em></a><b class=\"xtgg\">最新活动</b></h3>
    <div class=\"gg_list\">
        <div class=\"one_box\">

          <!--  <div class=\"one unread hid_more\">
                <a class=\"title\">查找某张牌在剩下的牌中的近似位置</a>
                <span class=\"time\">2014-03-04</span>
                <span class=\"message\">又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？BabyBox为了感谢广大网友这一年的支持和厚爱，特来给您送礼了又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？为了感谢广大网友这一年的支持和厚爱，特来给您送礼了又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？为了感谢广大网友这一年的支持和厚爱，特来给您送礼了又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？BabyBox为了感谢广大网友这一年的支持和厚爱，特来给您送礼了又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？BabyBox为了感谢广大网友这一年的支持和厚爱，特来给您送礼了又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？BabyBox为了感谢广大网友这一年的支持和厚爱，特来给您送礼了<a href=\"#\" class=\"more\">查看详情>></a></span>
            </div>
            <div class=\"one even hid_more\">
                <a class=\"title\">查找某张牌在剩下的牌中的近似位置</a>
                <span class=\"time\">2014-03-04</span>
                <span class=\"message\">又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？BabyBox为了感谢广大网友这一年的支持和厚爱，特来给您送礼了又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？为了感谢广大网友这一年的支持和厚爱，特来给您送礼了又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？BabyBox为了感谢广大网友这一年的支持和厚爱，特来给您送礼了又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？BabyBox为了感谢广大网友这一年的支持和厚爱，特来给您送礼了又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？BabyBox为了感谢广大网友这一年的支持和厚爱，特来给您送礼了<a href=\"#\" class=\"more\">查看详情>></a></span>
            </div>
            <div class=\"one hid_more\">
                <a class=\"title\">查找某张牌在剩下的牌中的近似位置</a>
                <span class=\"time\">2014-03-04</span>
                <span class=\"message\">又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？BabyBox为了感谢广大网友这一年的支持和厚爱，特来给您送礼了又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？Ba感谢广大网友这一年的支持和厚爱，特来给您送礼了又是一年岁末时，圣诞、元旦竞相到来，在这美好的节日里收到礼物了吗？BabyBox为了感谢广大网友这一年的支持和厚爱，特来给您送礼了<a href=\"#\" class=\"more\">查看详情>></a></span>
            </div>
-->
            ";
        // line 41
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
            // line 42
            echo "                ";
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index", array()) % 2) == 0)) {
                // line 43
                echo "                    <div class=\"one even  hid_more\">
                ";
            } else {
                // line 45
                echo "                    <div class=\"one  hid_more\">
                ";
            }
            // line 47
            echo "                    <a class=\"title\" href=\"/activity/detail/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "</a>
                    <span class=\"time\">";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "publish_time", array()), "html", null, true);
            echo "</span>
                    <span class=\"message\">";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "content", array()), "html", null, true);
            echo "<a href=\"/activity/detail/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" class=\"more\" target=\"_blank\">查看详情>></a></span>
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
        // line 52
        echo "
        </div>
        <div class=\"pagination\">
            <ul>
             ";
        // line 56
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
        return "activity_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 56,  139 => 52,  120 => 49,  116 => 48,  109 => 47,  105 => 45,  101 => 43,  98 => 42,  81 => 41,  57 => 19,  54 => 18,  43 => 10,  40 => 9,  33 => 4,  30 => 3,);
    }
}
