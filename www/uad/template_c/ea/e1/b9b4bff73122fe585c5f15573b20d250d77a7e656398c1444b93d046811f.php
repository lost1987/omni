<?php

/* index_lite.html */
class __TwigTemplate_eae1b9b4bff73122fe585c5f15573b20d250d77a7e656398c1444b93d046811f extends Twig_Template
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
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/css/select2.min.css\">
<link rel=\"stylesheet\" href=\"";
        // line 2
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/css/bootstrap-datetimepicker-master.min.css\">
<link rel=\"stylesheet\" href=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/css/bootstrap-datetimepicker.min.css\">

<div class=\"am-cf am-padding\">
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\">概览</strong>  <small></small></div>
</div>

<ul class=\"am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list \">
    <li><a href=\"#\" class=\"am-text-success\"><span class=\"am-icon-btn am-icon-money\"></span><br/>新蜂币<br/>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["total"]) ? $context["total"] : null), "newcoins", array()), "html", null, true);
        echo "</a><br/>可兑换￥";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["total"]) ? $context["total"] : null), "cny", array()), "html", null, true);
        echo "</li>
    <li><a href=\"#\" class=\"am-text-warning\"><span class=\"am-icon-btn am-icon-cny\"></span><br/>累计提现<br/>￥";
        // line 11
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["total"]) ? $context["total"] : null), "deposit", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["total"]) ? $context["total"] : null), "deposit", array()), "0")) : ("0")), "html", null, true);
        echo "</a></li>
    <li><a href=\"#\" class=\"am-text-danger\"><span class=\"am-icon-btn am-icon-group\"></span><br/>下线人数<br/>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["total"]) ? $context["total"] : null), "children", array()), "html", null, true);
        echo "</a></li>
    <li></li>
</ul>

<div class=\"am-cf am-padding\">
    <label>我的邀请码:&nbsp;&nbsp;&nbsp;</label>
    <code>";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["invite_code"]) ? $context["invite_code"] : null), "html", null, true);
        echo "</code>
</div>

<div class=\"am-g am-padding\">
    <div class=\"am-u-md-12 am-cf\">
        <div class=\"am-fl am-cf\">
            <form class=\"am-form-inline\">
                <div class=\"am-form-group am-form-icon am-margin-right-sm\">
                    <label>开始时间</label>
                    <input type=\"text\" name=\"search_change_time_start\" id=\"search_change_time_start\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["search_change_time_start"]) ? $context["search_change_time_start"] : null), "html", null, true);
        echo "\" class=\"am-form-field form_datetime\" placeholder=\"申请日期\">
                </div>

                <div class=\"am-form-group am-form-icon am-margin-right-sm\">
                    <label>结束时间</label>
                    <input type=\"text\" name=\"search_change_time_end\" id=\"search_change_time_end\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["search_change_time_end"]) ? $context["search_change_time_end"] : null), "html", null, true);
        echo "\" class=\"am-form-field form_datetime\" placeholder=\"申请日期\">
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
                <th>新蜂币</th>
                <th>时间</th>
                <th>描述</th>
            </tr>
            </thead>
            <tbody>
            ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 53
            echo "            <tr>
                <td>";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "coins_change", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "change_time", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "action", array()), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "            </tbody>
        </table>
        <div class=\"am-cf\">
            共 ";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["num_rows"]) ? $context["num_rows"] : null), "html", null, true);
        echo " 条记录
            <div class=\"am-fr\">
                <ul class=\"am-pagination\">
                    ";
        // line 65
        echo (isset($context["pagiation"]) ? $context["pagiation"] : null);
        echo "
                </ul>
            </div>
        </div>
    </div>
</div>

<script src=\"";
        // line 72
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/bootstrap-datetimepicker.min.js\"></script>
<script src=\"";
        // line 73
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/bootstrap-datetimepicker.zh-CN.js\"></script>
<script src=\"";
        // line 74
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/standalone/index.js\"></script>
<script src=\"";
        // line 75
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/common-list.js\"></script>";
    }

    public function getTemplateName()
    {
        return "index_lite.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 75,  153 => 74,  149 => 73,  145 => 72,  135 => 65,  129 => 62,  124 => 59,  115 => 56,  111 => 55,  107 => 54,  104 => 53,  100 => 52,  77 => 32,  69 => 27,  57 => 18,  48 => 12,  44 => 11,  38 => 10,  28 => 3,  24 => 2,  19 => 1,);
    }
}
