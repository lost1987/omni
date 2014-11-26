<?php

/* daily_match_list.html */
class __TwigTemplate_cc5b885cbd317a65173eb186cb84120fd64bc4be7bc2cd1400ed972927569ec9 extends Twig_Template
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
        echo "积分赛
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
            <small>积分赛</small>
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
                    <th>比赛名</th>
                    <th>起始小时</th>
                    <th>起始分钟</th>
                    <th>比赛时长(分钟)</th>
                    <th>比赛间隔(分钟)</th>
                    <th>比赛场次</th>
                    <th style=\"text-align: center\">操作</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 62
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 63
            echo "                <tr rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
            echo "\">
                    <td class=\"highlight\">
                        ";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
            echo "
                    </td>
                    <td class=\"hidden-phone\">
                        ";
            // line 68
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "active", array()) == 1)) {
                // line 69
                echo "                            启用
                        ";
            } else {
                // line 71
                echo "                            停用
                        ";
            }
            // line 73
            echo "                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"javascript:;\">";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td>
                     ";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_hour", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_minute", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "dur_minutes", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "break_minutes", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "total_rounds", array()), "html", null, true);
            echo "
                    </td>
                    <td style=\"text-align: center\">
                        ";
            // line 93
            if (((((isset($context["btn_edit_permission"]) ? $context["btn_edit_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "verify_match", array()) == 1)) && $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "verify_match_prize", array()))) {
                // line 94
                echo "                             <a href=\"/dailyMatch/add/19/edit/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 编辑</a>
                             <a href=\"/dailyMatch/editPrize/19/";
                // line 95
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 编辑奖励</a>
                        ";
            }
            // line 97
            echo "                        ";
            if ((((isset($context["btn_verify_permission"]) ? $context["btn_verify_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "verify_match", array()) == 0))) {
                // line 98
                echo "                            <a href=\"/dailyMatch/verifyList/19/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 审核比赛</a>
                        ";
            }
            // line 100
            echo "                        ";
            if ((((isset($context["btn_verify_permission"]) ? $context["btn_verify_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "verify_match_prize", array()) == 0))) {
                // line 101
                echo "                            <a href=\"/dailyMatch/verifyPrizeList/19/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 审核奖励</a>
                        ";
            }
            // line 103
            echo "                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 106
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

    // line 120
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 121
        echo "<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/private/daily_match_list.js\"></script>
";
    }

    // line 127
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 128
        echo "<script>
    jQuery(document).ready(function() {
        TableAdvanced.init();
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "daily_match_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  235 => 128,  232 => 127,  224 => 121,  221 => 120,  206 => 106,  198 => 103,  192 => 101,  189 => 100,  183 => 98,  180 => 97,  175 => 95,  170 => 94,  168 => 93,  162 => 90,  156 => 87,  150 => 84,  144 => 81,  138 => 78,  132 => 75,  128 => 73,  124 => 71,  120 => 69,  118 => 68,  112 => 65,  106 => 63,  102 => 62,  54 => 16,  51 => 15,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
