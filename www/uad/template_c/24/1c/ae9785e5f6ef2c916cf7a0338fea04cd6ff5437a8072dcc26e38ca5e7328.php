<?php

/* deposit_list.html */
class __TwigTemplate_241cae9785e5f6ef2c916cf7a0338fea04cd6ff5437a8072dcc26e38ca5e7328 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"am-cf am-padding\">
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\">提现记录</strong>  <small></small></div>
</div>

<div class=\"am-cf am-padding\">
    <label>我的邀请码:&nbsp;&nbsp;&nbsp;</label>
    <code>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["invite_code"]) ? $context["invite_code"] : null), "html", null, true);
        echo "</code>
</div>

<div class=\"am-g am-padding\">
    <div class=\"am-u-sm-12\">
        <table class=\"am-table am-table-striped am-table-hover table-main\">
            <thead>
            <tr>
                <th>提现单号</th>
                <th>收款账号</th>
                <th>收款人</th>
                <th>手续费</th>
                <th>提现金额</th>
                <th>处理状态</th>
                <th>实付</th>
                <th>处理时间</th>
            </tr>
            </thead>
            <tbody>
            ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 27
            echo "            <tr>
                <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "order_no", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "deposit_account", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "deposit_name", array()), "html", null, true);
            echo "</td>
                <td>￥";
            // line 31
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "handing_cost", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "handing_cost", array()), "0.00")) : ("0.00")), "html", null, true);
            echo "</td>
                <td>￥";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "money", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "state", array()), "html", null, true);
            echo "</td>
                <td>￥";
            // line 34
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "real_cost", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "real_cost", array()), "0.00")) : ("0.00")), "html", null, true);
            echo "</td>
                <td>";
            // line 35
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "done_time", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "done_time", array()), "/")) : ("/")), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <td>备注/原因:</td><td colspan=\"7\">";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "remark", array()), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "            </tbody>
        </table>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "deposit_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 41,  90 => 38,  84 => 35,  80 => 34,  76 => 33,  72 => 32,  68 => 31,  64 => 30,  60 => 29,  56 => 28,  53 => 27,  49 => 26,  27 => 7,  19 => 1,);
    }
}
