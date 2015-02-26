<?php

/* children.html */
class __TwigTemplate_f34956fbc4547bae16c463e33dda89ebc87ed9f268a4c9176d9a5e82e1da3be9 extends Twig_Template
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
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\">好友管理</strong>  <small></small></div>
</div>

<div class=\"am-cf am-padding\">
    <label>我的邀请码:&nbsp;&nbsp;&nbsp;</label>
    <code>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["invite_code"]) ? $context["invite_code"] : null), "html", null, true);
        echo "</code>
</div>

<div class=\"am-g am-padding\">
    <div class=\"am-u-md-12 am-cf\">
            <table class=\"am-table am-table-striped am-table-hover table-main\">
                <tr>
                    <th>今日新增下线</th>
                    <th>本周新增下线</th>
                    <th>本月新增下线</th>
                    <th>总下线</th>
                </tr>
                <tr>
                    <td>";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["todayChild"]) ? $context["todayChild"] : null), "html", null, true);
        echo "</td>
                    <td>";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["weekChild"]) ? $context["weekChild"] : null), "html", null, true);
        echo "</td>
                    <td>";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["monthChild"]) ? $context["monthChild"] : null), "html", null, true);
        echo "</td>
                    <td>";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["totalChild"]) ? $context["totalChild"] : null), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>今日下线收益</th>
                    <th>本周下线收益</th>
                    <th>本月下线收益</th>
                    <th>总收益</th>
                </tr>
                <tr>
                    <td>";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["todayIncome"]) ? $context["todayIncome"] : null), "html", null, true);
        echo "</td>
                    <td>";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["weekIncome"]) ? $context["weekIncome"] : null), "html", null, true);
        echo "</td>
                    <td>";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["monthIncome"]) ? $context["monthIncome"] : null), "html", null, true);
        echo "</td>
                    <td>";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["totalIncome"]) ? $context["totalIncome"] : null), "html", null, true);
        echo "</td>
                </tr>
            </table>
    </div>
</div>

<div class=\"am-g am-padding\">
    <div class=\"am-u-md-12 am-cf\">
        <div class=\"am-fl am-cf\">
            <form class=\"am-form-inline am-margin-left-sm\">
                <div class=\"am-form-group am-form-icon am-margin-right-sm\">
                    <input type=\"text\" name=\"search_nickname\" id=\"search_nickname\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, (isset($context["search_nickname"]) ? $context["search_nickname"] : null), "html", null, true);
        echo "\" class=\"am-form-field form_datetime\" placeholder=\"下线昵称\">
                </div>
                <button type=\"button\" id=\"search_btn\"  class=\"am-btn am-btn-default\"><i class=\"am-icon-search\"></i>&nbsp;搜索</button>
            </form>
        </div>
    </div>
</div>

<div class=\"am-g am-padding\">
    <div class=\"am-u-sm-12\">
        <table class=\"am-table am-table-striped am-table-hover table-main\">
            <thead>
            <tr>
                <th>昵称</th>
                <th>充值提成</th>
                <th>提现提成</th>
                <th>成长提成</th>
                <th>签到提成</th>
                <th>总收益</th>
            </tr>
            </thead>
            <tbody>
            ";
        // line 68
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 69
            echo "            <tr>
                <td>";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "incomeRecharge", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "incomeDeposit", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "incomeLevelup", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "incomeSign", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "incomeTotal", array()), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "            </tbody>
        </table>
        <div class=\"am-cf\">
            共 ";
        // line 81
        echo twig_escape_filter($this->env, (isset($context["num_rows"]) ? $context["num_rows"] : null), "html", null, true);
        echo " 条记录
            <div class=\"am-fr\">
                <ul class=\"am-pagination\">
                    ";
        // line 84
        echo (isset($context["pagiation"]) ? $context["pagiation"] : null);
        echo "
                </ul>
            </div>
        </div>
    </div>
</div>
<script src=\"";
        // line 90
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/common-list.js\"></script>
<script src=\"";
        // line 91
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/standalone/children.js\"></script>";
    }

    public function getTemplateName()
    {
        return "children.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 91,  174 => 90,  165 => 84,  159 => 81,  154 => 78,  145 => 75,  141 => 74,  137 => 73,  133 => 72,  129 => 71,  125 => 70,  122 => 69,  118 => 68,  93 => 46,  79 => 35,  75 => 34,  71 => 33,  67 => 32,  55 => 23,  51 => 22,  47 => 21,  43 => 20,  27 => 7,  19 => 1,);
    }
}
