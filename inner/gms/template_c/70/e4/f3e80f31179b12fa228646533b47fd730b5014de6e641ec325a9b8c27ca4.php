<?php

/* system_log_list.html */
class __TwigTemplate_70e4f3e80f31179b12fa228646533b47fd730b5014de6e641ec325a9b8c27ca4 extends Twig_Template
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
        echo "日志管理
";
    }

    // line 8
    public function block_css($context, array $blocks = array())
    {
        // line 9
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/select2_metro.css\"/>
<link rel=\"stylesheet\" href=\"/media/css/DT_bootstrap.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/chosen.css\" />
<link rel=\"stylesheet\" href=\"/media/css/common/form_search.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/addtional.css\" />
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
             日志管理
            <small>系统日志</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>


</div>


<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->

<div class=\"row-fluid\">
<div class=\"span12\">
    <!--表格查询区-->
    <form class=\"form-actions\" action=\"/systemLog/lists/5\" method=\"get\" id=\"search_form\">
        <div class=\"control-group search_form_wrap\">
            <label class=\"control-label\"><b class=\"midnight\">模块过滤器</b>&nbsp;&nbsp;</label>
            <div class=\"controls chzn-controls search_form\">
                <select id=\"root_chosen\" class=\"chosen span2\" data-with-diselect=\"1\" name=\"module_id\" data-placeholder=\"请选择\" tabindex=\"1\">
                    ";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["module_list"]) ? $context["module_list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 50
            echo "                    ";
            if (($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "id", array()) == (isset($context["search_module_id"]) ? $context["search_module_id"] : null))) {
                // line 51
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "id", array()), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "module_name", array()), "html", null, true);
                echo "</option>
                    ";
            } else {
                // line 53
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "module_name", array()), "html", null, true);
                echo "</option>
                    ";
            }
            // line 55
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "                </select>
            </div>
        </div>
        <div class=\"dataTables_filter\">
            <a href=\"javascript:;\" class=\"btn red\" onclick=\"\$('#search_form').submit();\"><i class=\"icon-search\"></i>&nbsp;查询</a>
        </div>
    </form>
    <br/>
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class=\"portlet\">
        <div class=\"portlet-title\">
            <div class=\"caption\"></div>
        </div>

        <div class=\"portlet-body\">
            <table class=\"table table-striped table-bordered table-hover table-full-width\">
                <thead>
                <tr>
                    <th class=\"hidden-phone\">模块名</th>
                    <th>管理员</th>
                    <th>ip</th>
                    <th>时间</th>
                    <th width=\"500\">内容</th>
                    <th style=\"text-align: center\">操作</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 83
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 84
            echo "                <tr>
                    <td class=\"highlight\">
                        ";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_name", array()), "html", null, true);
            echo "
                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"javascript:;\">";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "account", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"javascript:;\">";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "ip", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"javascript:;\">";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "operation_time", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td>
                       ";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "desp", array()), "html", null, true);
            echo "
                    </td>
                    <td style=\"text-align: center\">
                        ";
            // line 101
            if (((isset($context["btn_edit_permission"]) ? $context["btn_edit_permission"] : null) == 1)) {
                // line 102
                echo "                             <a href=\"/admin/add/2/edit/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\" class=\"btn mini black\" ><i class=\"icon-edit\"></i> 编辑</a>
                        ";
            }
            // line 104
            echo "                        ";
            if (((isset($context["btn_p_permission"]) ? $context["btn_p_permission"] : null) == 1)) {
                // line 105
                echo "                            <a href=\"/admin/permission/2/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\" class=\"btn mini black\" ><i class=\"icon-edit\"></i> 权限</a>
                        ";
            }
            // line 107
            echo "                        ";
            if ((((isset($context["btn_del_permission"]) ? $context["btn_del_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()) != 1))) {
                // line 108
                echo "                            <a href=\"javascript:;\" class=\"btn mini red\" onclick=\"confirm_del(";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo ")\"><i class=\"icon-trash\"></i> 删除</a>
                        ";
            }
            // line 110
            echo "                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "                </tbody>
            </table>
        </div>
    </div>
    <div class=\"row-fluid\">
        <div class=\"span6\">
            <div class=\"dataTables_info\" id=\"sample_2_info\" style=\"padding-top:0\">共";
        // line 119
        echo twig_escape_filter($this->env, ((array_key_exists("total", $context)) ? (_twig_default_filter((isset($context["total"]) ? $context["total"] : null), 0)) : (0)), "html", null, true);
        echo "条数据</div>
        </div>
        <div class=\"span6\">
            <div class=\"dataTables_paginate paging_bootstrap pagination\">
               <!-- <ul>
                    <li class=\"prev disabled\"><a href=\"#\">← <span class=\"hidden-480\">上一页</span></a></li>
                    <li class=\"active\"><a href=\"#\">1</a></li>
                    <li><a href=\"#\">2</a></li>
                    <li><a href=\"#\">3</a></li>
                    <li><a href=\"#\">4</a></li>
                    <li><a href=\"#\">5</a></li>
                    <li class=\"next\">
                        <a href=\"#\">
                        <span class=\"hidden-480\">下一页</span> →
                        </a>
                    </li>
                </ul>-->
                <ul>
                 ";
        // line 137
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

    // line 182
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 183
        echo "<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
";
    }

    // line 189
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 190
        echo "<script type=\"text/javascript\" src=\"/media/js/private/admin_list.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "system_log_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  309 => 190,  306 => 189,  298 => 183,  295 => 182,  248 => 137,  227 => 119,  219 => 113,  211 => 110,  205 => 108,  202 => 107,  196 => 105,  193 => 104,  187 => 102,  185 => 101,  179 => 98,  173 => 95,  167 => 92,  161 => 89,  155 => 86,  151 => 84,  147 => 83,  118 => 56,  112 => 55,  104 => 53,  96 => 51,  93 => 50,  89 => 49,  55 => 17,  52 => 16,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
