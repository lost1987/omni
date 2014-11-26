<?php

/* knockout_match_list.html */
class __TwigTemplate_8256fafd8c18e0cb66b123c83e5066cff431b4412cc920754276508cd8a912c6 extends Twig_Template
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
        // line 64
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 65
            echo "                <tr rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
            echo "#";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_type", array()), "html", null, true);
            echo "\">
                    <td class=\"highlight\">
                        ";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
            echo "
                    </td>
                    <td class=\"hidden-phone\">
                        ";
            // line 70
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "active", array()) == 1)) {
                // line 71
                echo "                        启用
                        ";
            } else {
                // line 73
                echo "                        停用
                        ";
            }
            // line 75
            echo "                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"javascript:;\">";
            // line 77
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_type_name", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td>
                     ";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_hour", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_minute", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_week", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_weekday", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "entrance_minutes", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "signup_start_minutes", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "signup_end_minutes", array()), "html", null, true);
            echo "
                    </td>
                    <td style=\"text-align: center\">
                        ";
            // line 101
            if (((((isset($context["btn_edit_permission"]) ? $context["btn_edit_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "verify_match", array()) == 1)) && $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "verify_match_prize", array()))) {
                // line 102
                echo "                             <a href=\"/knockoutMatch/add/19/edit/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
                echo "\" class=\"btn mini grey\"><i class=\"icon-edit\"></i> 编辑</a>
                             <a href=\"/knockoutMatch/editPrize/19/";
                // line 103
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_type", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 编辑奖励</a>
                        ";
            }
            // line 105
            echo "                        ";
            if ((((isset($context["btn_verify_permission"]) ? $context["btn_verify_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "verify_match", array()) == 0))) {
                // line 106
                echo "                        <a href=\"/knockoutMatch/verifyList/19/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 审核比赛</a>
                        ";
            }
            // line 108
            echo "                        ";
            if ((((isset($context["btn_verify_permission"]) ? $context["btn_verify_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "verify_match_prize", array()) == 0))) {
                // line 109
                echo "                        <a href=\"/knockoutMatch/verifyPrizeList/19/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_type", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 审核奖励</a>
                        ";
            }
            // line 111
            echo "                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
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

    // line 128
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 129
        echo "<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/private/knockout_match_list.js\"></script>
";
    }

    // line 135
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 136
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
        return array (  255 => 136,  252 => 135,  244 => 129,  241 => 128,  226 => 114,  218 => 111,  210 => 109,  207 => 108,  201 => 106,  198 => 105,  191 => 103,  186 => 102,  184 => 101,  178 => 98,  172 => 95,  166 => 92,  160 => 89,  154 => 86,  148 => 83,  142 => 80,  136 => 77,  132 => 75,  128 => 73,  124 => 71,  122 => 70,  116 => 67,  108 => 65,  104 => 64,  54 => 16,  51 => 15,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
