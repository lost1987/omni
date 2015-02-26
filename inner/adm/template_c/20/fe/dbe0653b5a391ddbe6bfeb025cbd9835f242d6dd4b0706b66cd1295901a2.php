<?php

/* children.html */
class __TwigTemplate_20fedbe0653b5a391ddbe6bfeb025cbd9835f242d6dd4b0706b66cd1295901a2 extends Twig_Template
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
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\"><span class=\"am-badge am-badge-primary am-radius\">";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nickname", array()), "html", null, true);
        echo "</span></strong> / <small>下线列表</small></div>
</div>

<div class=\"am-g\">
<div class=\"am-u-md-12 am-cf\">
<div class=\"am-g\">
<div class=\"am-u-sm-12\">
<table class=\"am-table am-table-striped am-table-hover table-main\">
<thead>
<tr>
    <th class=\"table-check\"><input type=\"checkbox\" /></th>
    <th>UID</th>
    <th>账号</th>
    <th>昵称</th>
    <th>级</th>
</tr>
</thead>
<tbody>
";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 21
            echo "<tr>
    <td><input type=\"checkbox\" /></td>
    <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo "</td>
    <td><a href=\"javascript:;\">";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "login_name", array()), "html", null, true);
            echo "</a></td>
    <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "leaf", array()), "html", null, true);
            echo "</td>
</tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "</tbody>
</table>
<div class=\"am-cf\">
    共 ";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["total"]) ? $context["total"] : null), "html", null, true);
        echo " 条记录
    <div class=\"am-fr\">
        <ul class=\"am-pagination\">
            ";
        // line 35
        echo (isset($context["pagiation"]) ? $context["pagiation"] : null);
        echo "
        </ul>
    </div>
</div>
</div>
</div>
";
        // line 41
        $this->displayBlock('script', $context, $blocks);
    }

    public function block_script($context, array $blocks = array())
    {
        // line 42
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/common-list.js\"></script>
";
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
        return array (  99 => 42,  93 => 41,  84 => 35,  78 => 32,  73 => 29,  64 => 26,  60 => 25,  56 => 24,  52 => 23,  48 => 21,  44 => 20,  23 => 2,  20 => 1,);
    }
}
