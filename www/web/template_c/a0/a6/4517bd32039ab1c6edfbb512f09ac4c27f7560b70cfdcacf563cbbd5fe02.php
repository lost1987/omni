<?php

/* rankList.html */
class __TwigTemplate_a0a64517bd32039ab1c6edfbb512f09ac4c27f7560b70cfdcacf563cbbd5fe02 extends Twig_Template
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
            'script' => array($this, 'block_script'),
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
        echo "武汉麻将-游戏排行
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将-游戏排行
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将-游戏排行
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "          <div class=\"col-xs-8\">
            ";
        // line 17
        $this->env->loadTemplate("article_tablist.html")->display($context);
        // line 18
        echo "            <div class=\"panel p30\">
              <h2 class=\"sTitle\">
                <span class=\"icon icon-rank-b\"></span>
                <span class=\"bl1\">
                  <span class=\"uppercase\">Raking</span><br>游戏排行
                </span>
                <div class=\"input-group pull-right input-r\">
                </div><!-- /input-group -->
              </h2>
              <div>
                <div class=\"row nopd border bg-blueL\">
                  <div class=\"col-xs-2\">
                    <div class=\"leftSide pt30 pb30 pl10\">
                      <ul class=\"nav nav-pills nav-stacked\" role=\"tablist\">
                        <li class=\"active\"><a href=\"javascript:;\" rel=\"coins\">财富</a></li>
                        <li><a href=\"javascript:;\" rel=\"win_rate\">胜率</a></li>
                        <li><a href=\"javascript:;\" rel=\"littlewin\">小胡</a></li>
                        <li><a href=\"javascript:;\" rel=\"alltriples\">碰碰胡</a></li>
                        <li><a href=\"javascript:;\" rel=\"allonesuite\">清一色</a></li>
                        <li><a href=\"javascript:;\" rel=\"all258\">将一色</a></li>
                        <li><a href=\"javascript:;\" rel=\"allwind\">风一色</a></li>
                        <li><a href=\"javascript:;\" rel=\"allothers\">全求人</a></li>
                        <li><a href=\"javascript:;\" rel=\"winquadruplecard\">杠上开花</a></li>
                        <li><a href=\"javascript:;\" rel=\"lastdrawablecard\">海底捞</a></li>
                        <li><a href=\"javascript:;\" rel=\"quadruplerobbery\">抢杠</a></li>
                        <li><a href=\"javascript:;\" rel=\"topgold\">金顶</a></li>
                        <li><a href=\"javascript:;\" rel=\"topdiamond\">钻石顶</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class=\"col-xs-10 bg-white\">
                    <div class=\"p10\" style=\"min-height:670px;\">
                      <table class=\"table table-border table-hover\" >
                        <thead>
                          <tr>
                              <th>排名</th>
                              <th>用户</th>
                              <th>所在地</th>
                              <th>金币</th>
                              <th id=\"sp\">胜率</th>
                          </tr>
                        </thead>
                        <tbody>
                        ";
        // line 61
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orderlist"]) ? $context["orderlist"] : null));
        foreach ($context['_seq'] as $context["idx"] => $context["item"]) {
            // line 62
            echo "                        <tr>
                            <td class=\"text-center\">";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "order", array()), "html", null, true);
            echo "</td>
                            ";
            // line 64
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isme", array()) == 1)) {
                // line 65
                echo "                            <td><font color=\"red\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
                echo "</font></td>
                            ";
            } else {
                // line 67
                echo "                            <td>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
                echo "</td>
                            ";
            }
            // line 69
            echo "                            <td>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "area", array()), "html", null, true);
            echo "</td>
                            <td class=\"text-right\">";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "coins", array()), "html", null, true);
            echo "</td>
                            <td class=\"text-right\">";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "win_rate", array()), "html", null, true);
            echo "</td>
                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['idx'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
 <input type=\"hidden\" name=\"token\" id=\"token\" value=\"";
        // line 82
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" />
";
    }

    // line 84
    public function block_script($context, array $blocks = array())
    {
        // line 85
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/rank.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "rankList.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 85,  168 => 84,  162 => 82,  152 => 74,  143 => 71,  139 => 70,  134 => 69,  128 => 67,  122 => 65,  120 => 64,  116 => 63,  113 => 62,  109 => 61,  64 => 18,  62 => 17,  59 => 16,  56 => 15,  51 => 12,  48 => 11,  43 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
