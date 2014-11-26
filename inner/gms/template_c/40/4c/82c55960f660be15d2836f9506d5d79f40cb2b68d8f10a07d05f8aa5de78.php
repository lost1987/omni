<?php

/* knockout_match_verify.html */
class __TwigTemplate_404c82c55960f660be15d2836f9506d5d79f40cb2b68d8f10a07d05f8aa5de78 extends Twig_Template
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
        echo "淘汰赛审核
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
            <small>淘汰赛审核</small>
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
            <th class=\"hidden-phone\">类型</th>
            <th>提交时间</th>
            <th>提交人</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td> ";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "</td>
            <td> ";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type_name", array()), "html", null, true);
            echo "</td>
            <td> ";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "create_time", array()), "html", null, true);
            echo "</td>
            <td> ";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "source_admin_name", array()), "html", null, true);
            echo "</td>
        </tr>
        </tbody>
    </table>
    <table class=\"table table-striped table-bordered table-hover table-full-width\" id=\"sample_1\">
        <thead>
        <tr>
            <th> MATCH_ID</th>
            <th class=\"hidden-phone\">状态</th>
            <th>比赛类型</th>
            <th>起始小时</th>
            <th>起始分钟</th>
            <th><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"对于月赛，表示月赛在第几周举行，1表示第一周，-1表示最后一周，依次类推\" data-original-title=\"说明\" >开始周</a></th>
            <th><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"对周赛与月赛，表示在周几举行，如6表示周六\" data-original-title=\"说明\" >周-天</a></th>
            <th><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"提前N分钟进场\" data-original-title=\"说明\" >进场时间</a></th>
            <th><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"比赛前N分钟开始报名\" data-original-title=\"说明\" >报名开始时间</a></th>
            <th><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"比赛前N分钟停止报名\" data-original-title=\"说明\" >报名结束时间</a></th>
            <th>消耗资源</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class=\"highlight\">
                ";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "abstract_id", array()), "html", null, true);
            echo "
            </td>
            <td class=\"hidden-phone\">
                ";
            // line 84
            if (($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match", array()), "active", array()) == 1)) {
                // line 85
                echo "                启用
                ";
            } else {
                // line 87
                echo "                停用
                ";
            }
            // line 89
            echo "            </td>
            <td class=\"hidden-phone\">
                <a href=\"javascript:;\">";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match", array()), "match_type_name", array()), "html", null, true);
            echo "</a>
            </td>
            <td>
                ";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match", array()), "start_hour", array()), "html", null, true);
            echo "
            </td>
            <td>
                ";
            // line 97
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match", array()), "start_minute", array()), "html", null, true);
            echo "
            </td>
            <td>
                ";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match", array()), "start_week", array()), "html", null, true);
            echo "
            </td>
            <td>
                ";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match", array()), "start_weekday", array()), "html", null, true);
            echo "
            </td>
            <td>
                ";
            // line 106
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match", array()), "entrance_minutes", array()), "html", null, true);
            echo "
            </td>
            <td>
                ";
            // line 109
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match", array()), "signup_start_minutes", array()), "html", null, true);
            echo "
            </td>
            <td>
                ";
            // line 112
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match", array()), "signup_end_minutes", array()), "html", null, true);
            echo "
            </td>
            <td>
                ";
            // line 115
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match", array()), "price_amount", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match", array()), "price_type", array()), "html", null, true);
            echo "
            </td>
        </tr>
        </tbody>
    </table>
    <form action=\"/knockoutMatch/verifyMatch\" id=\"match_form\" class=\"form-inline\" method=\"post\">
        <input type=\"hidden\" name=\"json_content\" value=\"";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "json_content", array()), "html", null, true);
            echo "\" />
        <input type=\"hidden\" name=\"verify\" value=\"0\" />
        <input type=\"hidden\" name=\"verify_id\" value=\"";
            // line 123
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" />
        <input type=\"hidden\" name=\"match_id\" value=\"";
            // line 124
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
        // line 137
        echo "</div>
</div>
<!-- END VALIDATION STATES-->
</div>
</div>

";
    }

    // line 145
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 146
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/additional-methods.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
";
    }

    // line 152
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 153
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
        return "knockout_match_verify.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 153,  265 => 152,  257 => 146,  254 => 145,  244 => 137,  225 => 124,  221 => 123,  216 => 121,  206 => 115,  200 => 112,  194 => 109,  188 => 106,  182 => 103,  176 => 100,  170 => 97,  164 => 94,  158 => 91,  154 => 89,  150 => 87,  146 => 85,  144 => 84,  138 => 81,  112 => 58,  108 => 57,  104 => 56,  100 => 55,  87 => 44,  83 => 43,  53 => 15,  50 => 14,  43 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
