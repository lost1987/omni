<?php

/* player_list.html */
class __TwigTemplate_8b795049e47825452db00847009216df2d378f229eebc481cdff045b8ab5015d extends Twig_Template
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
        echo "玩家列表
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
            <small>玩家列表</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>


</div>


<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->

<div class=\"row-fluid\">
<div class=\"span12\">
    <!--表格查询区-->
    <form class=\"form-actions\" action=\"/player/lists/19\" method=\"get\" id=\"search_form\">
        <div class=\"control-group search_form_wrap\">
            <label class=\"control-label\" style=\"width:100px;\"><b class=\"midnight\">账号或昵称</b></label>
            <div class=\"controls chzn-controls search_form\">
                <input name=\"login_name\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, (isset($context["search_login_name"]) ? $context["search_login_name"] : null), "html", null, true);
        echo "\"/>
            </div>
        </div>
        <div class=\"dataTables_filter\">
            <a href=\"javascript:;\" class=\"btn red\" onclick=\"\$('#search_form').submit();\"><i class=\"icon-search\"></i>&nbsp;查询</a>
        </div>
    </form>
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class=\"portlet\">
        <div class=\"portlet-title\">
            <div class=\"caption\"></div>
        </div>

        <div class=\"portlet-body\">
            <table class=\"table table-striped table-bordered table-hover table-full-width\" id=\"sample_1\">
                <thead>
                <tr>
                    <th> UID</th>
                    <th class=\"hidden-phone\">账号</th>
                    <th>昵称</th>
                    <th>USER_NUMBER</th>
                    <th>状态</th>
                    <th>手机号</th>
                    <th>邮箱</th>
                    <th style=\"text-align: center\">操作</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 75
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 76
            echo "                <tr rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo "\">
                    <td class=\"highlight\">
                        ";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo "
                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"javascript:;\">";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "login_name", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"javascript:;\">";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td>
                        ";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "user_number", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 90
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "forbidden", array()) == 1)) {
                // line 91
                echo "                                封停
                        ";
            } else {
                // line 93
                echo "                                正常
                        ";
            }
            // line 95
            echo "                    </td>
                    <td>
                        ";
            // line 97
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "mobile", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "email", array()), "html", null, true);
            echo "
                    </td>
                    <td style=\"text-align: center\">
                        ";
            // line 103
            if (((isset($context["btn_edit_permission"]) ? $context["btn_edit_permission"] : null) == 1)) {
                // line 104
                echo "                                <a href=\"/player/add/19/edit/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "login_name", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" style=\"width:80px;text-align:left\"><i class=\"icon-edit\"></i>编辑</a><br/>
                                ";
                // line 105
                if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "forbidden", array()) == 0)) {
                    // line 106
                    echo "                                    <a href=\"javascript:forbidden(";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
                    echo ",'";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "login_name", array()), "html", null, true);
                    echo "')\" class=\"btn mini grey\" style=\"width:80px;text-align:left\"><i class=\" icon-ban-circle\"></i>封停</a><br/>
                                    <a href=\"javascript:;\" class=\"btn mini grey\" style=\"width:80px;text-align:left\" disabled=\"disabled\"><i class=\"icon-ok-circle\"></i>解封</a><br/>
                               ";
                } else {
                    // line 109
                    echo "                                    <a href=\"javascript:;\" class=\"btn mini grey\" style=\"width:80px;text-align:left\" disabled=\"disabled\"><i class=\" icon-ban-circle\"></i>封停</a><br/>
                                    <a href=\"javascript:unforbidden(";
                    // line 110
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
                    echo ",'";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "login_name", array()), "html", null, true);
                    echo "')\" class=\"btn mini grey\" style=\"width:80px;text-align:left\" ><i class=\"icon-ok-circle\"></i>解封</a><br/>
                                ";
                }
                // line 112
                echo "                                 <a href=\"javascript:reset_password(";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "user_number", array()), "html", null, true);
                echo ",'";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "login_name", array()), "html", null, true);
                echo "')\" class=\"btn mini grey\" style=\"width:80px;text-align:left\"><i class=\"icon-lock\"></i>重置登陆密码</a><br/>
                                 <a href=\"javascript:reset_purchase_password(";
                // line 113
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "user_number", array()), "html", null, true);
                echo ",'";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "login_name", array()), "html", null, true);
                echo "')\" class=\"btn mini grey\" style=\"width:80px;text-align:left\"><i class=\"icon-lock\"></i>重置消费密码</a><br/>
                        ";
            }
            // line 115
            echo "                        <a href=\"/userResourceLog/lists/19/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "login_name", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo "\" class=\"btn mini grey\" style=\"width:80px;text-align:left\"><i class=\"icon-jpy\"></i>资源日志</a><br/>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 119
        echo "                </tbody>
            </table>
        </div>
    </div>
    <div class=\"row-fluid\">
        <div class=\"span6\">
            <div class=\"dataTables_info\" id=\"sample_2_info\" style=\"padding-top:0\">共";
        // line 125
        echo twig_escape_filter($this->env, ((array_key_exists("total", $context)) ? (_twig_default_filter((isset($context["total"]) ? $context["total"] : null), 0)) : (0)), "html", null, true);
        echo "条数据</div>
        </div>
        <div class=\"span6\">
            <div class=\"dataTables_paginate paging_bootstrap pagination\">
                <ul>
                 ";
        // line 130
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


<!-- END PAGE -->
<!-- 模态框（Modal） -->
<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\"
     aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"
                        aria-hidden=\"true\">×
                </button>
                <h4 class=\"modal-title\" id=\"myModalLabel\">
                    请确认
                </h4>
            </div>
            <div class=\"modal-body\">
                确认要删除该项目吗?
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" onclick=\"del()\"
                        data-dismiss=\"modal\">确认
                </button>
                <button type=\"button\" class=\"btn btn-primary\" onclick=\"cancel_del()\">
                    取消
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
";
    }

    // line 175
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 176
        echo "<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/private/player_list.js\"></script>
";
    }

    // line 182
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 183
        echo "<script>
    jQuery(document).ready(function() {
        TableAdvanced.init();
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "player_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  316 => 183,  313 => 182,  305 => 176,  302 => 175,  255 => 130,  247 => 125,  239 => 119,  226 => 115,  217 => 113,  208 => 112,  201 => 110,  198 => 109,  189 => 106,  187 => 105,  180 => 104,  178 => 103,  172 => 100,  166 => 97,  162 => 95,  158 => 93,  154 => 91,  152 => 90,  146 => 87,  140 => 84,  134 => 81,  128 => 78,  122 => 76,  118 => 75,  87 => 47,  54 => 16,  51 => 15,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
