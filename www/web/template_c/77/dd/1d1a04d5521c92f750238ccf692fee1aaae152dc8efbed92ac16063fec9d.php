<?php

/* rank.html */
class __TwigTemplate_77dd1d1a04d5521c92f750238ccf692fee1aaae152dc8efbed92ac16063fec9d extends Twig_Template
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
        echo "<title>武汉麻将-封神榜</title>
<meta name=\"keywords\" content=\"武汉麻将-封神榜\" />
<meta name=\"description\" content=\"武汉麻将-封神榜\" />
";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "<script>
    var token = '";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "',rank_keys=[];
        ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rank_keys"]) ? $context["rank_keys"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 13
            echo "            rank_keys['";
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
            echo "'] = '";
            echo twig_escape_filter($this->env, (isset($context["item"]) ? $context["item"] : null), "html", null, true);
            echo "';
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "</script>
<link href=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.ext.js\" ></script>
<script type=\"text/javascript\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/rank.js\" ></script>
";
    }

    // line 22
    public function block_content($context, array $blocks = array())
    {
        // line 23
        echo "<div id=\"m_content_2\">
    <h3><a href=\"/\"><em></em></a><b class=\"tgxx\">封神榜</b></h3>
    <div class=\"fsb_box\">
        <div class=\"fsb_top\"></div>
        <div class=\"fsb_m_lf\">
            <ul>
                <li class=\"on\" rel=\"coins\">排名</li>
                <li rel=\"win_rate\">胜率</li>
                <li rel=\"alltriples\">碰碰胡</li>
                <li rel=\"littlewin\">小胡</li>
                <li rel=\"allwind\">风一色</li>
                <li rel=\"all258\">将一色</li>
                <li rel=\"allothers\">全求人</li>
                <li rel=\"allonesuite\">清一色</li>
                <li rel=\"lastdrawablecard\">海底捞</li>
                <li rel=\"winquadruplecard\">杠上开花</li>
                <li rel=\"quadruplerobbery\">抢杠</li>
                <li rel=\"topgold\">金顶</li>
                <li rel=\"topdiamond\">钻石顶</li>
            </ul>
        </div>
        <div class=\"fsb_m_rt\">
            <div class=\"pm_menu\"><a href=\"javascript:;\" rel=\"global\" class=\"on\">总排名</a>
                <!--<a href=\"javascript:;\" rel=\"week\">周排名</a>--></div>
            <table width=\"577\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                <tr>
                    <th width=\"98\">排名</th>
                    <th width=\"144\">用户</th>
                    <th width=\"100\">所在地</th>
                    <th width=\"127\">金币</th>
                    <th width=\"108\" id=\"sp\">胜率</th>
                </tr>
                ";
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orderlist"]) ? $context["orderlist"] : null));
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
        foreach ($context['_seq'] as $context["idx"] => $context["item"]) {
            // line 56
            echo "                <tr rel=\"render\">
                    ";
            // line 57
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0", array()) % 2) == 0)) {
                // line 58
                echo "                            <td class=\"dark_bg\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "order", array()), "html", null, true);
                echo "</td>
                            ";
                // line 59
                if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isme", array()) == 1)) {
                    // line 60
                    echo "                                <td class=\"dark_bg\"><font color=\"red\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
                    echo "</font></td>
                            ";
                } else {
                    // line 62
                    echo "                                 <td class=\"dark_bg\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
                    echo "</td>
                            ";
                }
                // line 64
                echo "                            <td class=\"dark_bg\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "area", array()), "html", null, true);
                echo "</td>
                            <td class=\"dark_bg\">";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "coins", array()), "html", null, true);
                echo "</td>
                            <td class=\"dark_bg\">";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "win_rate", array()), "html", null, true);
                echo "</td>
                    ";
            } else {
                // line 68
                echo "                            <td>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "order", array()), "html", null, true);
                echo "</td>
                            ";
                // line 69
                if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isme", array()) == 1)) {
                    // line 70
                    echo "                                <td><font color=\"red\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
                    echo "</font></td>
                            ";
                } else {
                    // line 72
                    echo "                                <td>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
                    echo "</td>
                            ";
                }
                // line 74
                echo "                            <td>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "area", array()), "html", null, true);
                echo "</td>
                            <td>";
                // line 75
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "coins", array()), "html", null, true);
                echo "</td>
                            <td>";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "win_rate", array()), "html", null, true);
                echo "</td>
                    ";
            }
            // line 78
            echo "                </tr>
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
        unset($context['_seq'], $context['_iterated'], $context['idx'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "            </table>
            <p style=\"margin-bottom:30px\">*此排名每日更新,完成局数大于10的参与排名</p>
        </div>
        <div class=\"fsb_btm\"></div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "rank.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 80,  207 => 78,  202 => 76,  198 => 75,  193 => 74,  187 => 72,  181 => 70,  179 => 69,  174 => 68,  169 => 66,  165 => 65,  160 => 64,  154 => 62,  148 => 60,  146 => 59,  141 => 58,  139 => 57,  136 => 56,  119 => 55,  85 => 23,  82 => 22,  76 => 18,  72 => 17,  68 => 16,  65 => 15,  54 => 13,  50 => 12,  46 => 11,  43 => 10,  40 => 9,  33 => 4,  30 => 3,);
    }
}
