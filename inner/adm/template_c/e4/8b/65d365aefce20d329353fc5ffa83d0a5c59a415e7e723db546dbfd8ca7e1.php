<?php

/* redpack_list.html */
class __TwigTemplate_e48b65d365aefce20d329353fc5ffa83d0a5c59a415e7e723db546dbfd8ca7e1 extends Twig_Template
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
<div class=\"am-cf am-padding\">
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\">红包</strong> / <small>列表</small></div>
</div>

<div class=\"am-g\">
<div class=\"am-u-md-12 am-cf\">
<div class=\"am-fl am-cf\">
    <form class=\"am-form-inline\">
        <div class=\"am-form-group am-form-icon\">
            <input style=\"display:none\" mce_style=\"display:none\"><!--防止默认回车提交表单 简直脑残-->
        </div>
        <div class=\"am-form-group am-form-select am-margin-right-sm\">
            <label>发放状态</label>
            <select id=\"search_state\" class=\"select2 span4\" select=\"-1\">
                ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["search_states"]) ? $context["search_states"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 17
            echo "                ";
            if (((isset($context["key"]) ? $context["key"] : null) == ((array_key_exists("search_state", $context)) ? (_twig_default_filter((isset($context["search_state"]) ? $context["search_state"] : null), (-1))) : ((-1))))) {
                // line 18
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "</option>
                ";
            } else {
                // line 20
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "</option>
                ";
            }
            // line 22
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "            </select>
            <span class=\"am-form-caret\"></span>
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
    <th>卡号</th>
    <th>状态</th>
    <th>金额</th>
</tr>
</thead>
<tbody>
";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 44
            echo "<tr>
    <td>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "cardno", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "state", array()), "html", null, true);
            echo "</td>
    <td><a href=\"javascript:;\">";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "money", array()), "html", null, true);
            echo "</a></td>
</tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "</tbody>
</table>
<div class=\"am-cf\">
    共 ";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["total"]) ? $context["total"] : null), "html", null, true);
        echo " 条记录
    <div class=\"am-fr\">
        <ul class=\"am-pagination\">
            ";
        // line 56
        echo (isset($context["pagiation"]) ? $context["pagiation"] : null);
        echo "
        </ul>
    </div>
</div>
</div>
</div>

<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/select2.min.js\"></script>
<script src=\"";
        // line 64
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/common-list.js\"></script>
<script src=\"";
        // line 65
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/standalone/redpack_list.js\"></script>";
    }

    public function getTemplateName()
    {
        return "redpack_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 65,  138 => 64,  134 => 63,  124 => 56,  118 => 53,  113 => 50,  104 => 47,  100 => 46,  96 => 45,  93 => 44,  89 => 43,  67 => 23,  61 => 22,  53 => 20,  45 => 18,  42 => 17,  38 => 16,  19 => 1,);
    }
}
