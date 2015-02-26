<?php

/* module_list.html */
class __TwigTemplate_20e9ffafb2071a66b246b0f1d5bad2f4c88c1e35ed93b5eadbc79a2257f3abd1 extends Twig_Template
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
        echo "模块列表
";
    }

    // line 8
    public function block_css($context, array $blocks = array())
    {
        // line 9
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/select2_metro.css\"/>
<link rel=\"stylesheet\" href=\"/media/css/DT_bootstrap.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/chosen.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/common/form_search.css\" />
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
             模块管理
            <small>模块列表</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>


<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->
<div class=\"row-fluid\">
<div class=\"span12\">
    <!--表格查询区-->
    <form class=\"form-actions\" action=\"/module/lists/7\" method=\"get\" id=\"search_form\">
        <div class=\"control-group search_form_wrap\">
            <label class=\"control-label\"><b class=\"midnight\">模块过滤器</b>&nbsp;&nbsp;</label>
            <div class=\"controls chzn-controls search_form\">
                <select id=\"root_chosen\" class=\"chosen span2\" data-with-diselect=\"1\" name=\"pid\" data-placeholder=\"请选择\" tabindex=\"1\">
                    ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["root_lists"]) ? $context["root_lists"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["root"]) {
            // line 43
            echo "                    ";
            if (($this->getAttribute((isset($context["root"]) ? $context["root"] : null), "id", array()) == (isset($context["search_pid"]) ? $context["search_pid"] : null))) {
                // line 44
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "id", array()), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "module_name", array()), "html", null, true);
                echo "</option>
                    ";
            } else {
                // line 46
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "module_name", array()), "html", null, true);
                echo "</option>
                    ";
            }
            // line 48
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['root'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "                </select>
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
            <table class=\"table table-striped table-bordered table-hover table-full-width\">
                <thead>
                <tr>
                    <th> ID</th>
                    <th class=\"hidden-phone\">模块名称</th>
                    <th>模块别名</th>
                    <th>模块权限</th>
                    <th>模块路径</th>
                    <th>父模块</th>
                    <th>模块ICON</th>
                    <th>排序</th>
                    <th>可见</th>
                    <th style=\"text-align: center\">操作</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 79
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 80
            echo "                <tr>
                    <td class=\"highlight\">
                        ";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "
                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"/module/lists/7?pid=";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_name", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"javascript:;\">";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_alias", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"javascript:;\">";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_permission", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td>
                        <a href=\"javascript:;\">";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_url", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td>
                        <a href=\"javascript:;\">
                            ";
            // line 98
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["root_lists"]) ? $context["root_lists"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["root"]) {
                // line 99
                echo "                                ";
                if (($this->getAttribute((isset($context["root"]) ? $context["root"] : null), "id", array()) == $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "pid", array()))) {
                    // line 100
                    echo "                                         ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "module_name", array()), "html", null, true);
                    echo "
                                ";
                }
                // line 102
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['root'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 103
            echo "                        </a>
                    </td>
                    <td>
                        <a href=\"javascript:;\">";
            // line 106
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td>
                        <a href=\"javascript:;\">";
            // line 109
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "orders", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td>
                        ";
            // line 112
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "visible", array()) == 1)) {
                // line 113
                echo "                            是
                        ";
            } else {
                // line 115
                echo "                            否
                        ";
            }
            // line 117
            echo "                    </td>
                    <td style=\"text-align: center\">
                        ";
            // line 119
            if ((isset($context["btn_edit_permission"]) ? $context["btn_edit_permission"] : null)) {
                // line 120
                echo "                        <a href=\"/module/add/7/edit/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 编辑</a>
                        ";
            }
            // line 122
            echo "                        <!--
                        ";
            // line 123
            if ((isset($context["btn_del_permission"]) ? $context["btn_del_permission"] : null)) {
                // line 124
                echo "                        <a href=\"javascript:;\" class=\"btn mini red\" onclick=\"confirm_del(";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo ")\"><i class=\"icon-trash\"></i> 删除</a>
                        ";
            }
            // line 126
            echo "                        -->
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 130
        echo "                </tbody>
            </table>
        </div>

    </div>
    <div class=\"row-fluid\">
        <div class=\"span6\">
            <div class=\"dataTables_info\" id=\"sample_2_info\" style=\"padding-top:0\">共";
        // line 137
        echo twig_escape_filter($this->env, ((array_key_exists("total", $context)) ? (_twig_default_filter((isset($context["total"]) ? $context["total"] : null), 0)) : (0)), "html", null, true);
        echo "条数据</div>
        </div>
        <div class=\"span6\">
            <div class=\"dataTables_paginate paging_bootstrap pagination\">
                <ul>
                 ";
        // line 142
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

    // line 188
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 189
        echo "<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
";
    }

    // line 196
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 197
        echo "<script src=\"/media/js/private/module_list.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "module_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  342 => 197,  339 => 196,  330 => 189,  327 => 188,  279 => 142,  271 => 137,  262 => 130,  253 => 126,  247 => 124,  245 => 123,  242 => 122,  236 => 120,  234 => 119,  230 => 117,  226 => 115,  222 => 113,  220 => 112,  214 => 109,  208 => 106,  203 => 103,  197 => 102,  191 => 100,  188 => 99,  184 => 98,  177 => 94,  171 => 91,  165 => 88,  157 => 85,  151 => 82,  147 => 80,  143 => 79,  111 => 49,  105 => 48,  97 => 46,  89 => 44,  86 => 43,  82 => 42,  55 => 17,  52 => 16,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
