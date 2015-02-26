<?php

/* invite_friends.html */
class __TwigTemplate_1ad887a6c40d9ec35a2d93cd4002f5ea8f5dcd5c3de3fa52d51dc58ed1e74168 extends Twig_Template
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
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\">邀请好友</strong>  <small></small></div>
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
        <a class=\"am-badge am-badge-primary am-round\">新蜂币奖励:</a><br/><br/>
        <table class=\"am-table am-table-striped am-table-hover table-main\">
            <caption class=\"am-text-left\"><b style=\"font-size: 1.4rem\">1.充值返利</b></caption>
            <thead>
            <tr>
                <th></th>
                <th>一级下线</th>
                <th>二级下线</th>
                <th>三级下线</th>
                <th>四级下线</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>返现比例</td>
                <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rechargeReward"]) ? $context["rechargeReward"] : null), "ratio1", array()), "html", null, true);
        echo "</td>
                <td>";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rechargeReward"]) ? $context["rechargeReward"] : null), "ratio2", array()), "html", null, true);
        echo "</td>
                <td>";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rechargeReward"]) ? $context["rechargeReward"] : null), "ratio3", array()), "html", null, true);
        echo "</td>
                <td>";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rechargeReward"]) ? $context["rechargeReward"] : null), "ratio4", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td>公式</td>
                <td>下线充值金额*10000*";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rechargeReward"]) ? $context["rechargeReward"] : null), "ratio1", array()), "html", null, true);
        echo "</td>
                <td>下线充值金额*10000*";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rechargeReward"]) ? $context["rechargeReward"] : null), "ratio2", array()), "html", null, true);
        echo "</td>
                <td>下线充值金额*10000*";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rechargeReward"]) ? $context["rechargeReward"] : null), "ratio3", array()), "html", null, true);
        echo "</td>
                <td>下线充值金额*10000*";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rechargeReward"]) ? $context["rechargeReward"] : null), "ratio4", array()), "html", null, true);
        echo "</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class=\"am-g am-padding\">
    <div class=\"am-u-sm-12\">
        <table class=\"am-table am-table-striped am-table-hover table-main\">
            <caption class=\"am-text-left\"><b style=\"font-size: 1.4rem\">2.提现奖励</b></caption>
            <thead>
            <tr>
                <th></th>
                <th>一级下线</th>
                <th>二级下线</th>
                <th>三级下线</th>
                <th>四级下线</th>
            </tr>
            </thead>
            <tbody>
                ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 4));
        foreach ($context['_seq'] as $context["_key"] => $context["j"]) {
            // line 59
            echo "                    <tr>
                        <td> 提现达到";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["depositReward"]) ? $context["depositReward"] : null), ("ratio" . (isset($context["j"]) ? $context["j"] : null)), array(), "array"), ((isset($context["j"]) ? $context["j"] : null) - 1), array(), "array"), "money", array()), "html", null, true);
            echo "元 </td>
                        ";
            // line 61
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 4));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 62
                echo "                            <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["depositReward"]) ? $context["depositReward"] : null), ("ratio" . (isset($context["i"]) ? $context["i"] : null)), array(), "array"), ((isset($context["j"]) ? $context["j"] : null) - 1), array(), "array"), "newcoins", array()), "html", null, true);
                echo "</td>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['j'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "            </tbody>
        </table>
    </div>
</div>


<div class=\"am-g am-padding\">
    <div class=\"am-u-sm-12\">
        <table class=\"am-table am-table-striped am-table-hover table-main\">
            <caption class=\"am-text-left\"><b style=\"font-size: 1.4rem\">3.成长奖励</b></caption>
            <thead>
            <tr>
                <th>游戏等级</th>
                <th>一级下线</th>
                <th>二级下线</th>
                <th>三级下线</th>
                <th>四级下线</th>
            </tr>
            </thead>
            <tbody>
            ";
        // line 86
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 3));
        foreach ($context['_seq'] as $context["_key"] => $context["j"]) {
            // line 87
            echo "            <tr>
                <td> ";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["levelUpReward"]) ? $context["levelUpReward"] : null), ("ratio" . (isset($context["j"]) ? $context["j"] : null)), array(), "array"), ((isset($context["j"]) ? $context["j"] : null) - 1), array(), "array"), "lv", array()), "html", null, true);
            echo "级 </td>
                ";
            // line 89
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 4));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 90
                echo "                <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["levelUpReward"]) ? $context["levelUpReward"] : null), ("ratio" . (isset($context["i"]) ? $context["i"] : null)), array(), "array"), ((isset($context["j"]) ? $context["j"] : null) - 1), array(), "array"), "newcoins", array()), "html", null, true);
                echo "</td>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['j'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "            </tbody>
        </table>
    </div>
</div>

<div class=\"am-g am-padding\">
    <div class=\"am-u-sm-12\">
        <table class=\"am-table am-table-striped am-table-hover table-main\">
            <caption class=\"am-text-left\"><b style=\"font-size: 1.4rem\">4.登录奖励</b></caption>
            <thead>
            <tr>
                <th>累计签到</th>
                <th>一级下线</th>
                <th>二级下线</th>
                <th>三级下线</th>
                <th>四级下线</th>
            </tr>
            </thead>
            <tbody>
            ";
        // line 113
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 3));
        foreach ($context['_seq'] as $context["_key"] => $context["j"]) {
            // line 114
            echo "            <tr>
                <td> ";
            // line 115
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["loginReward"]) ? $context["loginReward"] : null), ("ratio" . (isset($context["j"]) ? $context["j"] : null)), array(), "array"), ((isset($context["j"]) ? $context["j"] : null) - 1), array(), "array"), "days", array()), "html", null, true);
            echo "天 </td>
                ";
            // line 116
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 4));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 117
                echo "                <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["loginReward"]) ? $context["loginReward"] : null), ("ratio" . (isset($context["i"]) ? $context["i"] : null)), array(), "array"), ((isset($context["j"]) ? $context["j"] : null) - 1), array(), "array"), "newcoins", array()), "html", null, true);
                echo "</td>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 119
            echo "            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['j'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        echo "            </tbody>
        </table>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "invite_friends.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 121,  234 => 119,  225 => 117,  221 => 116,  217 => 115,  214 => 114,  210 => 113,  189 => 94,  182 => 92,  173 => 90,  169 => 89,  165 => 88,  162 => 87,  158 => 86,  136 => 66,  129 => 64,  120 => 62,  116 => 61,  112 => 60,  109 => 59,  105 => 58,  81 => 37,  77 => 36,  73 => 35,  69 => 34,  62 => 30,  58 => 29,  54 => 28,  50 => 27,  27 => 7,  19 => 1,);
    }
}
