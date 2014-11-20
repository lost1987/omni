<?php

/* match_prize_verify.html */
class __TwigTemplate_d7b2b24df6bd8e1988358a73411ce8aff8f0ab715b7f7b57e26f6ef7ee89b720 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'javascript_plugins' => array($this, 'block_javascript_plugins'),
            'javascript_custom' => array($this, 'block_javascript_custom'),
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "比赛奖励审核
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/select2_metro.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/chosen.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/addtional.css\" />
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "<div class=\"row-fluid\">
    <div class=\"span12\">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class=\"page-title\">
            游戏管理
            <small>比赛奖励审核</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>

<div class=\"row-fluid\">
<div class=\"span12\">
<!-- BEGIN VALIDATION STATES-->
<div class=\"portlet box\">

<div class=\"portlet-title\">
    <div class=\"caption\"><i class=\"icon-reorder\"></i></div>
    <div class=\"tools\">
        <a href=\"javascript:;\" class=\"collapse\"></a>
        <a href=\"#portlet-config\" data-toggle=\"modal\" class=\"config\"></a>
        <a href=\"javascript:;\" class=\"reload\"></a>
        <a href=\"javascript:;\" class=\"remove\"></a>
    </div>
</div>


<div class=\"portlet-body form\">
    ";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 44
            echo "    <table class=\"table table-striped table-bordered table-hover table-full-width\" >
        <thead>
        <tr>
            <th> VERIFY_ID</th>
            <th> MATCH_ID</th>
            <th class=\"hidden-phone\">比赛类型</th>
            <th class=\"hidden-phone\">审核类型</th>
            <th>提交时间</th>
            <th>提交人</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td> ";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "</td>
            <td> ";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
            echo "</td>
            <td> ";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_type_name", array()), "html", null, true);
            echo "</td>
            <td> ";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type_name", array()), "html", null, true);
            echo "</td>
            <td> ";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "create_time", array()), "html", null, true);
            echo "</td>
            <td> ";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "source_admin_name", array()), "html", null, true);
            echo "</td>
        </tr>
        </tbody>
    </table>
    <table class=\"table table-striped table-bordered table-hover table-full-width\" id=\"sample_1\">
        <thead>
        <tr>
            <th>排名</th>
            <th>奖励</th>
        </tr>
        </thead>
        <tbody>
        ";
            // line 74
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "prizes_content", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["prize"]) {
                // line 75
                echo "        <tr>
            <td class=\"highlight\">
                ";
                // line 77
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "rank", array()), "html", null, true);
                echo "
            </td>
            <td class=\"hidden-phone\">
                ";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prize"]) ? $context["prize"] : null), "content", array()), "html", null, true);
                echo "
            </td>
        </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prize'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "        </tbody>
    </table>
    <form action=\"";
            // line 86
            echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : null), "html", null, true);
            echo "\" id=\"match_form\" class=\"form-inline\" method=\"post\">
        <input type=\"hidden\" name=\"json_content\" value=\"";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "json_content", array()), "html", null, true);
            echo "\" />
        <input type=\"hidden\" name=\"verify\" value=\"0\" />
        <input type=\"hidden\" name=\"verify_id\" value=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" />
        <input type=\"hidden\" name=\"abstract_id\" value=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "abstract_id", array()), "html", null, true);
            echo "\" />
        <div class=\"control-group\">
            <label class=\"control-label\"><b class=\"midnight\">备注</b></label>
            <div class=\"controls\">
                <textarea name=\"remark\" rows=\"4\" class=\"span4\"></textarea>
            </div>
        </div>
        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn\" onclick=\"verify_pass(1,this)\">通过</button>
            <button type=\"button\" class=\"btn red\" onclick=\"verify_pass(0,this)\">不通过</button>
        </div>
    </form>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        echo "</div>
</div>
<!-- END VALIDATION STATES-->
</div>
</div>

";
    }

    // line 111
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 112
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/additional-methods.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
";
    }

    // line 118
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 119
        echo "<script>
function verify_pass(state,node){
    \$(node).parent().parent().find(\"input[name='verify']\").val(state);
    \$(\"#match_form\").submit();
}
</script>
";
    }

    public function getTemplateName()
    {
        return "match_prize_verify.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  221 => 119,  218 => 118,  210 => 112,  207 => 111,  197 => 103,  178 => 90,  174 => 89,  169 => 87,  165 => 86,  161 => 84,  151 => 80,  145 => 77,  141 => 75,  137 => 74,  122 => 62,  118 => 61,  114 => 60,  110 => 59,  106 => 58,  102 => 57,  87 => 44,  83 => 43,  53 => 15,  50 => 14,  43 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
