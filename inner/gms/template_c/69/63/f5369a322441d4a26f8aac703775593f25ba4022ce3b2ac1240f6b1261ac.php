<?php

/* knockout_match_list.html */
class __TwigTemplate_6963f5369a322441d4a26f8aac703775593f25ba4022ce3b2ac1240f6b1261ac extends Twig_Template
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        // line 5
        echo "淘汰赛
";
    }

    // line 8
    public function block_css($context, array $blocks = array())
    {
        // line 9
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/select2_metro.css\"/>
<link rel=\"stylesheet\" href=\"/media/css/DT_bootstrap.css\"/>
<link rel=\"stylesheet\" href=\"/media/css/common/form_search.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/addtional.css\" />
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "<!-- BEGIN PAGE HEADER-->


<div class=\"row-fluid\">
    <div class=\"span12\">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class=\"page-title\">
             游戏管理
            <small>淘汰赛</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>


</div>


<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->

<div class=\"row-fluid\">
<div class=\"span12\">
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class=\"portlet\">
        <div class=\"portlet-title\">
            <div class=\"caption\"></div>
        </div>

        <div class=\"portlet-body\">
            <table class=\"table table-striped table-bordered table-hover table-full-width\" id=\"sample_1\">
                <thead>
                <tr>
                    <th> MATCH_ID</th>
                    <th class=\"hidden-phone\">状态</th>
                    <th>比赛名称</th>
                    <th>比赛类型</th>
                    <th>起始小时</th>
                    <th>起始分钟</th>
                    <th><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"对于月赛，表示月赛在第几周举行，1表示第一周，-1表示最后一周，依次类推\" data-original-title=\"说明\" >开始周</a></th>
                    <th><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"对周赛与月赛，表示在周几举行，如6表示周六\" data-original-title=\"说明\" >周-天</a></th>
                    <th><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"提前N分钟进场\" data-original-title=\"说明\" >进场时间</a></th>
                    <th><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"比赛前N分钟开始报名\" data-original-title=\"说明\" >报名开始时间</a></th>
                    <th><a href=\"javascript:;\" class=\"popovers\" data-trigger=\"hover\" data-content=\"比赛前N分钟停止报名\" data-original-title=\"说明\" >报名结束时间</a></th>
                    <th style=\"text-align: center\">操作</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 65
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 66
            echo "                <tr rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
            echo "#";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_type", array()), "html", null, true);
            echo "\">
                    <td class=\"highlight\">
                        ";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
            echo "
                    </td>
                    <td class=\"hidden-phone\">
                        ";
            // line 71
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "active", array()) == 1)) {
                // line 72
                echo "                        启用
                        ";
            } else {
                // line 74
                echo "                        停用
                        ";
            }
            // line 76
            echo "                    </td>
                    <td>
                        ";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "
                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"javascript:;\">";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_type_name", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td>
                     ";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_hour", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_minute", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_week", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_weekday", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "entrance_minutes", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 99
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "signup_start_minutes", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "signup_end_minutes", array()), "html", null, true);
            echo "
                    </td>
                    <td style=\"text-align: center\">
                        ";
            // line 105
            if (((((isset($context["btn_edit_permission"]) ? $context["btn_edit_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "verify_match", array()) == 1)) && $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "verify_match_prize", array()))) {
                // line 106
                echo "                             <a href=\"/knockoutMatch/add/19/edit/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
                echo "\" class=\"btn mini grey\"><i class=\"icon-edit\"></i> 编辑</a>
                             <a href=\"/knockoutMatch/editPrize/19/";
                // line 107
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_type", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 编辑奖励</a>
                        ";
            }
            // line 109
            echo "                        ";
            if ((((isset($context["btn_verify_permission"]) ? $context["btn_verify_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "verify_match", array()) == 0))) {
                // line 110
                echo "                        <a href=\"/knockoutMatch/verifyList/19/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 审核比赛</a>
                        ";
            }
            // line 112
            echo "                        ";
            if ((((isset($context["btn_verify_permission"]) ? $context["btn_verify_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "verify_match_prize", array()) == 0))) {
                // line 113
                echo "                        <a href=\"/knockoutMatch/verifyPrizeList/19/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_type", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 审核奖励</a>
                        ";
            }
            // line 115
            echo "                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 118
        echo "                </tbody>
            </table>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>
</div>
<!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->
</div>
";
    }

    // line 132
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 133
        echo "<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/private/knockout_match_list.js\"></script>
";
    }

    // line 139
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 140
        echo "<script>
    jQuery(document).ready(function() {
        TableAdvanced.init();
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "knockout_match_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  262 => 140,  259 => 139,  251 => 133,  248 => 132,  233 => 118,  225 => 115,  217 => 113,  214 => 112,  208 => 110,  205 => 109,  198 => 107,  193 => 106,  191 => 105,  185 => 102,  179 => 99,  173 => 96,  167 => 93,  161 => 90,  155 => 87,  149 => 84,  143 => 81,  137 => 78,  133 => 76,  129 => 74,  125 => 72,  123 => 71,  117 => 68,  109 => 66,  105 => 65,  54 => 16,  51 => 15,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
