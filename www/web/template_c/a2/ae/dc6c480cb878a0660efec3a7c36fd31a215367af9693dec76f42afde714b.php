<?php

/* user_achivement.html */
class __TwigTemplate_a2aedc6c480cb878a0660efec3a7c36fd31a215367af9693dec76f42afde714b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("basePersonnal.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "basePersonnal.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "武汉麻将-个人中心
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将-个人中心
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将-个人中心
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "            <div class=\"col-xs-7\">
              <div class=\"panel p15 inner pb50\">
                <h4 class=\"mTitle\">个人战绩</h4>
                <div>
                  <ul class=\"nav nav-tabs nav02\" role=\"tablist\">
                    <li><a>我的财富</a></li>
                  </ul>
                  <div class=\"p15\">
                    <table class=\"table\">
                      <tbody>
                        <tr><td><span class=\"icon icon-fortune01\"></span> ";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "coins", array()), "html", null, true);
        echo "</td><td><span class=\"icon icon-fortune02\"></span> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "diamond", array()), "html", null, true);
        echo "</td></tr>
                        <tr><td><span class=\"icon icon-fortune03\"></span> ";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "ticket", array()), "html", null, true);
        echo "</td><td><span class=\"icon icon-fortune04\"></span> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "coupon", array()), "html", null, true);
        echo "</td></tr>
                      </tbody>
                    </table>
                  </div>
                  <ul class=\"nav nav-tabs nav02\" role=\"tablist\">
                    <li><a>个人排名</a></li>
                  </ul>
                  <div class=\"p15\">
                      <table class=\"table table-border\" >
                          <tr>
                              <td>排名</td>
                              <td>";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["myrank"]) ? $context["myrank"] : null), "html", null, true);
        echo "</td>
                          </tr>
                          <tr>
                              <td>胜率</td>
                              <td>";
        // line 42
        echo twig_escape_filter($this->env, (isset($context["ratio"]) ? $context["ratio"] : null), "html", null, true);
        echo "</td>
                          </tr>
                          <tr>
                              <td>胡牌次数</td>
                              <td>";
        // line 46
        echo twig_escape_filter($this->env, (isset($context["wins"]) ? $context["wins"] : null), "html", null, true);
        echo "</td>
                          </tr>
                          <tr>
                              <td>金顶次数</td>
                              <td>";
        // line 50
        echo twig_escape_filter($this->env, (isset($context["jinding"]) ? $context["jinding"] : null), "html", null, true);
        echo "</td>
                          </tr>
                          <tr>
                              <td>清一色</td>
                              <td>";
        // line 54
        echo twig_escape_filter($this->env, (isset($context["qingyise"]) ? $context["qingyise"] : null), "html", null, true);
        echo "</td>
                          </tr>
                          <tr>
                              <td>风一色</td>
                              <td>";
        // line 58
        echo twig_escape_filter($this->env, (isset($context["fengyise"]) ? $context["fengyise"] : null), "html", null, true);
        echo "</td>
                          </tr>
                          <tr>
                              <td>碰碰胡</td>
                              <td>";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["pengpenghu"]) ? $context["pengpenghu"] : null), "html", null, true);
        echo "</td>
                          </tr>
                      </table>
                  </div>
                </div>
              </div>
            </div>
";
    }

    public function getTemplateName()
    {
        return "user_achivement.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 62,  127 => 58,  120 => 54,  113 => 50,  106 => 46,  99 => 42,  92 => 38,  76 => 27,  70 => 26,  58 => 16,  55 => 15,  50 => 12,  47 => 11,  42 => 8,  39 => 7,  34 => 4,  31 => 3,);
    }
}
