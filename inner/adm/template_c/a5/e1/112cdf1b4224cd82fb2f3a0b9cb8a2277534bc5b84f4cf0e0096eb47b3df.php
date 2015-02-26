<?php

/* user_list.html */
class __TwigTemplate_a5e1112cdf1b4224cd82fb2f3a0b9cb8a2277534bc5b84f4cf0e0096eb47b3df extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"am-cf am-padding\">
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\">用户</strong> / <small>列表</small></div>
</div>

<div class=\"am-g\">
<div class=\"am-u-md-12 am-cf\">
<div class=\"am-fl am-cf\">
    <form class=\"am-form-inline\">
        <div class=\"am-form-group am-form-icon\">
            <i class=\"am-icon-user\"></i>
            <input style=\"display:none\" mce_style=\"display:none\"><!--防止默认回车提交表单 简直脑残-->
            <input type=\"text\" name=\"search_user\" id=\"search_user\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["search_user"]) ? $context["search_user"] : null), "html", null, true);
        echo "\" class=\"am-form-field\" placeholder=\"账号或昵称\">
        </div>

        <button type=\"button\" id=\"search_btn\" class=\"am-btn am-btn-default\"><i class=\"am-icon-search\"></i>&nbsp;搜索</button>
    </form>
    </div>
    </div>
</div>
<div class=\"am-g\">
<div class=\"am-u-sm-12\">
<table class=\"am-table am-table-striped am-table-hover table-main\">
<thead>
<tr>
    <th class=\"table-check\"><input type=\"checkbox\" /></th>
    <th>UID</th>
    <th>账号</th>
    <th>昵称</th>
    <th>新蜂币</th>
    <th>可提现</th>
    <th>状态</th>
    <th>上级(uid 账号 昵称)</th>
    <th>操作</th>
</tr>
</thead>
<tbody>
";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 38
            echo "<tr>
    <td><input type=\"checkbox\" /></td>
    <td>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo "</td>
    <td><a href=\"javascript:;\">";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "login_name", array()), "html", null, true);
            echo "</a></td>
    <td>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "newcoins", array()), "html", null, true);
            echo "</td>
    <td><i class=\"am-icon-cny\">&nbsp;</i>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "money", array()), "html", null, true);
            echo "</td>
    <td rel=\"ajax_state\">";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "state", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 46
            echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "parent", array());
            echo "</td>
    <td>
        <div class=\"am-dropdown  common-btn-drop\" >
            <button class=\"am-btn am-btn-default am-btn-xs am-dropdown-toggle\" data-am-dropdown-toggle><span class=\"am-icon-list-ol\"></span> <span class=\"am-icon-caret-down\"></span></button>
            <ul class=\"am-dropdown-content\">
                <li><a href=\"javascript:;\" onclick=\"detail(";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo ")\"><i class=\"am-icon-table\">&nbsp;</i>新蜂币变化</a></li>
                <li><a href=\"javascript:;\" onclick=\"findChildren(";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo ")\"><i class=\"am-icon-users\">&nbsp;</i>下线</a></li>
                <li><a href=\"javascript:;\" onclick=\"setReward(";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo ")\"><i class=\"am-icon-gift\">&nbsp;</i>奖励</a></li>
                <li><a href=\"javascript:;\" onclick=\"depositApply(";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo ")\"><i class=\"am-icon-eye\">&nbsp;</i>提现申请</a></li>
                <li><a href=\"javascript:;\" onclick=\"forbidden(";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo ",this)\"><i class=\"am-icon-ban\">&nbsp;</i>禁止提现</a></li>
                <li><a href=\"javascript:;\" onclick=\"unForbidden(";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo ",this)\"><i class=\"am-icon-check\">&nbsp;</i>解禁提现</a></li>
                <li><a href=\"javascript:;\"><i class=\"am-icon-bookmark\">&nbsp;</i>兑换历史</a></li>
            </ul>
        </div>
    </td>
</tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "</tbody>
</table>
<div class=\"am-cf\">
    共 ";
        // line 66
        echo twig_escape_filter($this->env, (isset($context["total"]) ? $context["total"] : null), "html", null, true);
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
        // line 75
        $this->displayBlock('script', $context, $blocks);
    }

    public function block_script($context, array $blocks = array())
    {
        // line 76
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/standalone/user_list.js\"></script>
<script src=\"";
        // line 77
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/common-list.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "user_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 77,  160 => 76,  154 => 75,  145 => 69,  139 => 66,  134 => 63,  121 => 56,  117 => 55,  113 => 54,  109 => 53,  105 => 52,  101 => 51,  93 => 46,  89 => 45,  85 => 44,  81 => 43,  77 => 42,  73 => 41,  69 => 40,  65 => 38,  61 => 37,  33 => 12,  20 => 1,);
    }
}
