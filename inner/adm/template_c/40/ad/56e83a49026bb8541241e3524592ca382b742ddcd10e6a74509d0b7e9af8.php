<?php

/* newcoins_detail.html */
class __TwigTemplate_40ad56e83a49026bb8541241e3524592ca382b742ddcd10e6a74509d0b7e9af8 extends Twig_Template
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
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\"><span class=\"am-badge am-badge-primary am-radius\">";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nickname", array()), "html", null, true);
        echo "</span></strong> / <small>新蜂币日志</small></div>
</div>

<div class=\"am-g am-padding\">
    <div class=\"am-u-md-12 am-cf\">
        <div class=\"am-fl am-cf\">
            <form class=\"am-form-inline\">
                <div class=\"am-form-group am-form-icon am-margin-right-sm\">
                    <label>开始时间</label>
                    <input type=\"text\" name=\"search_change_time_start\" id=\"search_change_time_start\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["search_change_time_start"]) ? $context["search_change_time_start"] : null), "html", null, true);
        echo "\" class=\"am-form-field form_datetime\" placeholder=\"申请日期\">
                </div>

                <div class=\"am-form-group am-form-icon am-margin-right-sm\">
                    <label>结束时间</label>
                    <input type=\"text\" name=\"search_change_time_end\" id=\"search_change_time_end\" value=\"";
        // line 20
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
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 41
            echo "            <tr>
                <td>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "coins_change", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "change_time", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "action", array()), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "            </tbody>
        </table>
        <div class=\"am-cf\">
            共 ";
        // line 50
        echo twig_escape_filter($this->env, (isset($context["total"]) ? $context["total"] : null), "html", null, true);
        echo " 条记录
            <div class=\"am-fr\">
                <ul class=\"am-pagination\">
                    ";
        // line 53
        echo (isset($context["pagiation"]) ? $context["pagiation"] : null);
        echo "
                </ul>
            </div>
        </div>
    </div>
</div>
<script> var uid = ";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "uid", array()), "html", null, true);
        echo "; </script>
<script src=\"";
        // line 60
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/bootstrap-datetimepicker.min.js\"></script>
<script src=\"";
        // line 61
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/bootstrap-datetimepicker.zh-CN.js\"></script>
<script src=\"";
        // line 62
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/standalone/newcoins_detail.js\"></script>
<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/common-list.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "newcoins_detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 63,  133 => 62,  129 => 61,  125 => 60,  121 => 59,  112 => 53,  106 => 50,  101 => 47,  92 => 44,  88 => 43,  84 => 42,  81 => 41,  77 => 40,  54 => 20,  46 => 15,  34 => 6,  28 => 3,  24 => 2,  19 => 1,);
    }
}
