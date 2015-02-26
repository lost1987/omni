<?php

/* index.html */
class __TwigTemplate_25716eb8192040e0f889b66f2a04c6633460bf6352ab15c7837e239fccbea46f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'script' => array($this, 'block_script'),
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

    // line 2
    public function block_css($context, array $blocks = array())
    {
        // line 3
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/css/select2.min.css\">
<link rel=\"stylesheet\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/css/bootstrap-datetimepicker-master.min.css\">
<link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/css/bootstrap-datetimepicker.min.css\">
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"am-cf am-padding\">
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\">概览</strong>  <small></small></div>
</div>

<ul class=\"am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list \">
    <li><a href=\"#\" class=\"am-text-success\"><span class=\"am-icon-btn am-icon-money\"></span><br/>新蜂币<br/>";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["total"]) ? $context["total"] : null), "newcoins", array()), "html", null, true);
        echo "</a><br/>可兑换￥";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["total"]) ? $context["total"] : null), "cny", array()), "html", null, true);
        echo "</li>
    <li><a href=\"#\" class=\"am-text-warning\"><span class=\"am-icon-btn am-icon-cny\"></span><br/>累计提现<br/>￥";
        // line 14
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["total"]) ? $context["total"] : null), "deposit", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["total"]) ? $context["total"] : null), "deposit", array()), "0")) : ("0")), "html", null, true);
        echo "</a></li>
    <li><a href=\"#\" class=\"am-text-danger\"><span class=\"am-icon-btn am-icon-group\"></span><br/>下线人数<br/>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["total"]) ? $context["total"] : null), "children", array()), "html", null, true);
        echo "</a></li>
    <li></li>
</ul>

<div class=\"am-cf am-padding\">
    <label>我的邀请码:&nbsp;&nbsp;&nbsp;</label>
    <code class=\"am-margin-right-sm\">";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["invite_code"]) ? $context["invite_code"] : null), "html", null, true);
        echo "</code>
</div>

<div class=\"am-g am-padding\">
    <div class=\"am-u-md-12 am-cf\">
        <div class=\"am-fl am-cf\">
            <a class=\"am-badge am-badge-primary am-round\">查询我的新蜂币变化:</a><br/><br/>
            <form class=\"am-form-inline\">
                <div class=\"am-form-group am-form-icon am-margin-right-sm\">
                    <label>开始时间</label>
                    <input type=\"text\" name=\"search_change_time_start\" id=\"search_change_time_start\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["search_change_time_start"]) ? $context["search_change_time_start"] : null), "html", null, true);
        echo "\" class=\"am-form-field form_datetime\" placeholder=\"申请日期\">
                </div>

                <div class=\"am-form-group am-form-icon am-margin-right-sm\">
                    <label>结束时间</label>
                    <input type=\"text\" name=\"search_change_time_end\" id=\"search_change_time_end\" value=\"";
        // line 36
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
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 57
            echo "            <tr>
                <td>";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "coins_change", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "change_time", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "action", array()), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "            </tbody>
        </table>
        <div class=\"am-cf\">
            共 ";
        // line 66
        echo twig_escape_filter($this->env, (isset($context["num_rows"]) ? $context["num_rows"] : null), "html", null, true);
        echo " 条记录
            <div class=\"am-fr\">
                <ul class=\"am-pagination\">
                    ";
        // line 69
        echo (isset($context["pagiation"]) ? $context["pagiation"] : null);
        echo "
                </ul>
            </div>
        </div>
    </div>
</div>
";
    }

    // line 77
    public function block_script($context, array $blocks = array())
    {
        // line 78
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/bootstrap-datetimepicker.min.js\"></script>
<script src=\"";
        // line 79
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/bootstrap-datetimepicker.zh-CN.js\"></script>
<script src=\"";
        // line 80
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/standalone/index.js\"></script>
<script src=\"";
        // line 81
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/common-list.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 81,  179 => 80,  175 => 79,  170 => 78,  167 => 77,  156 => 69,  150 => 66,  145 => 63,  136 => 60,  132 => 59,  128 => 58,  125 => 57,  121 => 56,  98 => 36,  90 => 31,  77 => 21,  68 => 15,  64 => 14,  58 => 13,  51 => 8,  48 => 7,  42 => 5,  38 => 4,  33 => 3,  30 => 2,);
    }
}
