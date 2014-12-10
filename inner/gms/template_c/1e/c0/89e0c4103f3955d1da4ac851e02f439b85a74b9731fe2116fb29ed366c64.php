<?php

/* match_history_list.html */
class __TwigTemplate_1ec089e0c4103f3955d1da4ac851e02f439b85a74b9731fe2116fb29ed366c64 extends Twig_Template
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
        echo "比赛历史
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
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/datetimepicker.css\" />
";
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "<!-- BEGIN PAGE HEADER-->


<div class=\"row-fluid\">


    <div class=\"span12\">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class=\"page-title\">
            游戏管理
            <small>比赛历史</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>


</div>


<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->

<div class=\"row-fluid\">
    <div class=\"span12\">
        <!--表格查询区-->
        <form class=\"form-actions\" action=\"/matchHistory/lists/19\" method=\"get\" id=\"search_form\">
            <div class=\"control-group search_form_wrap span4\">
                <label class=\"control-label span2\"><b class=\"midnight\">开始时间</b></label>
                <div class=\"controls\">
                    <div class=\"input-append date form_datetime\">
                        <input size=\"16\" type=\"text\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, (isset($context["search_start_time"]) ? $context["search_start_time"] : null), "html", null, true);
        echo "\" name=\"start_time\" readonly class=\"m-wrap span2\">
                        <span class=\"add-on\"><i class=\"icon-calendar\"></i></span>
                    </div>
                </div>
            </div>
            <div class=\"control-group search_form_wrap span4\">
                <label class=\"control-label span2\"><b class=\"midnight\">结束时间</b></label>
                <div class=\"controls\">
                    <div class=\"input-append date form_datetime\">
                        <input size=\"16\" type=\"text\" value=\"";
        // line 58
        echo twig_escape_filter($this->env, (isset($context["search_end_time"]) ? $context["search_end_time"] : null), "html", null, true);
        echo "\" name=\"end_time\" readonly class=\"m-wrap span2\">
                        <span class=\"add-on\"><i class=\"icon-calendar\"></i></span>
                    </div>
                </div>
            </div>
            <div class=\"control-group search_form_wrap span4\">
                <label class=\"control-label span2\"><b class=\"midnight\">比赛类型</b></label>
                <div class=\"controls chzn-controls\">
                    <select class=\"span2 m-wrap\" name=\"match_type\">
                        <option value=\"-1\">全部</option>
                        ";
        // line 68
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["match_types"]) ? $context["match_types"] : null));
        foreach ($context['_seq'] as $context["val"] => $context["name"]) {
            // line 69
            echo "                        ";
            if ((((isset($context["val"]) ? $context["val"] : null) == (isset($context["search_match_type"]) ? $context["search_match_type"] : null)) && ((isset($context["search_match_type"]) ? $context["search_match_type"] : null) != ""))) {
                // line 70
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                echo "</option>
                        ";
            } else {
                // line 72
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                echo "</option>
                        ";
            }
            // line 74
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['val'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "                    </select>
                </div>
            </div>
            <div class=\"dataTables_filter\">
                <a href=\"javascript:;\" class=\"btn red\" onclick=\"\$('#search_form').submit();\"><i class=\"icon-search\"></i>&nbsp;查询</a>
            </div>
        </form>
        <br/>
        <div class=\"alert alert-error hide\">
            <button class=\"close\" data-dismiss=\"alert\"></button>
            请选择要处理的项目
        </div>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class=\"portlet\">
            <div class=\"portlet-title\">
                <div class=\"caption\"></div>
            </div>

            <div class=\"portlet-body\">
                <table class=\"table table-striped table-bordered table-hover table-full-width\" id=\"sample_1\">
                    <thead>
                    <tr>
                        <th class=\"hidden-phone\">ID</th>
                        <th>比赛ID</th>
                        <th>比赛类型</th>
                        <th>开始时间</th>
                        <th>结束时间</th>
                        <th style=\"text-align: center\">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
        // line 106
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 107
            echo "                    <tr rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" rel_c=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "product_id", array()), "html", null, true);
            echo "#";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\">
                        <td class=\"hidden-phone\">
                            <a href=\"javascript:;\">";
            // line 109
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "history_id", array()), "html", null, true);
            echo "</a>
                        </td>
                        <td>
                            ";
            // line 112
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_id", array()), "html", null, true);
            echo "
                        </td>
                        <td class=\"hidden-phone\">
                            <a href=\"javascript:;\">";
            // line 115
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "match_type_name", array()), "html", null, true);
            echo "</a>
                        </td>
                        <td>
                            ";
            // line 118
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "start_time", array()), "html", null, true);
            echo "
                        </td>
                        <td>
                            ";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "end_time", array()), "html", null, true);
            echo "
                        </td>
                        <td style=\"text-align: center\">
                            <a href=\"/matchHistory/match_history_detail_list/19?match_history_id=";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "history_id", array()), "html", null, true);
            echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i>详细</a>
                        </td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 128
        echo "                    </tbody>
                </table>
            </div>
        </div>
        <div class=\"row-fluid\">
            <div class=\"span6\">
                <div class=\"dataTables_info\" id=\"sample_2_info\" style=\"padding-top:0\">共";
        // line 134
        echo twig_escape_filter($this->env, ((array_key_exists("total", $context)) ? (_twig_default_filter((isset($context["total"]) ? $context["total"] : null), 0)) : (0)), "html", null, true);
        echo "条数据</div>
            </div>
            <div class=\"span6\">
                <div class=\"dataTables_paginate paging_bootstrap pagination\">
                    <ul>
                        ";
        // line 139
        echo (isset($context["pagiation"]) ? $context["pagiation"] : null);
        echo "
                    </ul>
                </div>
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

    // line 154
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 155
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/bootstrap-datetimepicker.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/bootstrap-datetimepicker.zh-CN.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/private/match_history_list.js\"></script>
";
    }

    // line 164
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 165
        echo "<script>
    jQuery(document).ready(function() {
        TableAdvanced.init();
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "match_history_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  280 => 165,  277 => 164,  266 => 155,  263 => 154,  246 => 139,  238 => 134,  230 => 128,  220 => 124,  214 => 121,  208 => 118,  202 => 115,  196 => 112,  190 => 109,  180 => 107,  176 => 106,  143 => 75,  137 => 74,  129 => 72,  121 => 70,  118 => 69,  114 => 68,  101 => 58,  89 => 49,  55 => 17,  52 => 16,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
