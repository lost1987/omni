<?php

/* user_match_history_list.html */
class __TwigTemplate_e634c010ffbb460c0864a21bbd7b68c9a5ed3b46a5802076f2d819f077b59d9d extends Twig_Template
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
        echo "比赛历史详细
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
            比赛历史
            <small>详细</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>


</div>


<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->

<div class=\"row-fluid\">
    <div class=\"span12\">
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
                        <th>排名</th>
                        <th class=\"hidden-phone\">UID</th>
                        <th>账号</th>
                        <th>昵称</th>
                        <th>胜率</th>
                        <th>钻石</th>
                        <th>海选积分</th>
                        <th>机器人</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
        // line 67
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 68
            echo "                    <tr>
                        <td>
                            ";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "rank", array()), "html", null, true);
            echo "
                        </td>
                        <td class=\"hidden-phone\">
                            <a href=\"javascript:;\">";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo "</a>
                        </td>
                        <td>
                            ";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "login_name", array()), "html", null, true);
            echo "
                        </td>
                        <td class=\"hidden-phone\">
                            <a href=\"javascript:;\">";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
            echo "</a>
                        </td>
                        <td>
                            ";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "win_rate", array()), "html", null, true);
            echo "
                        </td>
                        <td>
                            ";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "diamonds", array()), "html", null, true);
            echo "
                        </td>
                        <td>
                            ";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "points_delta", array()), "html", null, true);
            echo "
                        </td>
                        <td>
                            ";
            // line 91
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "is_robot", array())) {
                // line 92
                echo "                                是
                            ";
            } else {
                // line 94
                echo "                                否
                            ";
            }
            // line 96
            echo "                        </td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 99
        echo "                    </tbody>
                </table>
            </div>
            <a href=\"";
        // line 102
        echo twig_escape_filter($this->env, (isset($context["http_referer"]) ? $context["http_referer"] : null), "html", null, true);
        echo "\" class=\"btn mini grey\"><i class=\" icon-share-alt\">&nbsp;</i>返回</a><br/>
        </div>
        <div class=\"row-fluid\">
            <div class=\"span6\">
                <div class=\"dataTables_info\" id=\"sample_2_info\" style=\"padding-top:0\">共";
        // line 106
        echo twig_escape_filter($this->env, ((array_key_exists("total", $context)) ? (_twig_default_filter((isset($context["total"]) ? $context["total"] : null), 0)) : (0)), "html", null, true);
        echo "条数据</div>
            </div>
            <div class=\"span6\">
                <div class=\"dataTables_paginate paging_bootstrap pagination\">
                    <ul>
                        ";
        // line 111
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

    // line 126
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 127
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
";
    }

    // line 133
    public function block_javascript_custom($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "user_match_history_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 133,  215 => 127,  212 => 126,  195 => 111,  187 => 106,  180 => 102,  175 => 99,  167 => 96,  163 => 94,  159 => 92,  157 => 91,  151 => 88,  145 => 85,  139 => 82,  133 => 79,  127 => 76,  121 => 73,  115 => 70,  111 => 68,  107 => 67,  54 => 16,  51 => 15,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
