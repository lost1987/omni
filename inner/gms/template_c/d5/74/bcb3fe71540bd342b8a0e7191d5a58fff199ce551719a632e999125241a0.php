<?php

/* store_products_list.html */
class __TwigTemplate_d574bcb3fe71540bd342b8a0e7191d5a58fff199ce551719a632e999125241a0 extends Twig_Template
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
        echo "商品列表
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
             商品管理
            <small>商品列表</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>


</div>


<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->

<div class=\"row-fluid\">
<div class=\"span12\">
    <!--表格查询区-->
    <form class=\"form-actions\" action=\"/storeProduct/lists/28\" method=\"get\" id=\"search_form\">
        <div class=\"control-group search_form_wrap span4\">
            <label class=\"control-label span2\"><b class=\"midnight\">商品名称</b>&nbsp;&nbsp;</label>
            <div class=\"controls chzn-controls search_form\">
                <input name=\"name\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, (isset($context["search_name"]) ? $context["search_name"] : null), "html", null, true);
        echo "\"/>
            </div>
        </div>
        <div class=\"control-group search_form_wrap span4\">
            <label class=\"control-label span2\"><b class=\"midnight\">商品类型</b></label>
            <div class=\"controls chzn-controls\">
                <select class=\"span2 m-wrap\" name=\"product_type\">
                    <option value=\"-1\">全部</option>
                    ";
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["product_types"]) ? $context["product_types"] : null));
        foreach ($context['_seq'] as $context["val"] => $context["name"]) {
            // line 56
            echo "                    ";
            if ((((isset($context["val"]) ? $context["val"] : null) == (isset($context["search_product_type"]) ? $context["search_product_type"] : null)) && ((isset($context["search_product_type"]) ? $context["search_product_type"] : null) != ""))) {
                // line 57
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                echo "</option>
                    ";
            } else {
                // line 59
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                echo "</option>
                    ";
            }
            // line 61
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['val'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "                </select>
            </div>
        </div>
        <div class=\"control-group search_form_wrap span4\">
            <label class=\"control-label span2\"><b class=\"midnight\">可见</b></label>
            <div class=\"controls\">
                <select class=\"span2 m-wrap\" name=\"is_visible\">
                    ";
        // line 69
        if (((isset($context["search_is_visible"]) ? $context["search_is_visible"] : null) == 1)) {
            // line 70
            echo "                    <option value=\"-1\">全部</option>
                    <option value=\"1\" selected=\"selected\">是</option>
                    <option value=\"0\">否</option>
                    ";
        } elseif ((((isset($context["search_is_visible"]) ? $context["search_is_visible"] : null) == 0) && ((isset($context["search_is_visible"]) ? $context["search_is_visible"] : null) != ""))) {
            // line 74
            echo "                    <option value=\"-1\">全部</option>
                    <option value=\"1\">是</option>
                    <option value=\"0\"  selected=\"selected\">否</option>
                    ";
        } else {
            // line 78
            echo "                    <option value=\"-1\" selected=\"selected\">全部</option>
                    <option value=\"1\">是</option>
                    <option value=\"0\">否</option>
                    ";
        }
        // line 82
        echo "                </select>
            </div>
        </div>
        <div class=\"control-group search_form_wrap span4\">
            <label class=\"control-label span2\"><b class=\"midnight\">置顶</b></label>
            <div class=\"controls\">
                <select class=\"span2 m-wrap\" name=\"is_top\">
                    ";
        // line 89
        if (((isset($context["search_is_top"]) ? $context["search_is_top"] : null) == 1)) {
            // line 90
            echo "                    <option value=\"-1\">全部</option>
                    <option value=\"1\" selected=\"selected\">是</option>
                    <option value=\"0\">否</option>
                    ";
        } elseif ((((isset($context["search_is_top"]) ? $context["search_is_top"] : null) == 0) && ((isset($context["search_is_top"]) ? $context["search_is_top"] : null) != ""))) {
            // line 94
            echo "                    <option value=\"-1\">全部</option>
                    <option value=\"1\">是</option>
                    <option value=\"0\"  selected=\"selected\">否</option>
                    ";
        } else {
            // line 98
            echo "                    <option value=\"-1\" selected=\"selected\">全部</option>
                    <option value=\"1\">是</option>
                    <option value=\"0\">否</option>
                    ";
        }
        // line 102
        echo "                </select>
            </div>
        </div>
        <div class=\"control-group search_form_wrap span4\">
            <label class=\"control-label span2\"><b class=\"midnight\">推荐</b></label>
            <div class=\"controls chzn-controls\">
                <select class=\"span2 m-wrap\" name=\"is_promote\">
                    ";
        // line 109
        if (((isset($context["search_is_promote"]) ? $context["search_is_promote"] : null) == 1)) {
            // line 110
            echo "                        <option value=\"-1\">全部</option>
                        <option value=\"1\" selected=\"selected\">是</option>
                        <option value=\"0\">否</option>
                    ";
        } elseif ((((isset($context["search_is_promote"]) ? $context["search_is_promote"] : null) == 0) && ((isset($context["search_is_promote"]) ? $context["search_is_promote"] : null) != ""))) {
            // line 114
            echo "                        <option value=\"-1\">全部</option>
                        <option value=\"1\">是</option>
                        <option value=\"0\"  selected=\"selected\">否</option>
                    ";
        } else {
            // line 118
            echo "                        <option value=\"-1\" selected=\"selected\">全部</option>
                        <option value=\"1\">是</option>
                        <option value=\"0\">否</option>
                    ";
        }
        // line 122
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
            <table class=\"table table-striped table-bordered table-hover table-full-width\" id=\"sample_1\">
                <thead>
                <tr>
                    <th> 商品ID</th>
                    <th class=\"hidden-phone\">商品名称</th>
                    <th>商品类型</th>
                    <th>商品栏目</th>
                    <th>可见</th>
                    <th>置顶</th>
                    <th>推荐</th>
                    <th>置顶时间</th>
                    <th>修改时间</th>
                    <th style=\"text-align: center\">操作</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 153
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 154
            echo "                <tr rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\">
                    <td class=\"highlight\">
                        ";
            // line 156
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "
                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"javascript:;\">";
            // line 159
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td class=\"hidden-phone\">
                        <a href=\"javascript:;\">";
            // line 162
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "product_type_name", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td>
                        ";
            // line 165
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "category_name", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 168
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "is_visible", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 171
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "is_top", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 174
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "is_promote", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 177
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "top_timestamp", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 180
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "modify_at", array()), "html", null, true);
            echo "
                    </td>
                    <td style=\"text-align: center\">
                        ";
            // line 183
            if (((isset($context["btn_edit_permission"]) ? $context["btn_edit_permission"] : null) == 1)) {
                // line 184
                echo "                        <a href=\"/storeProduct/add/28/edit/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\" class=\"btn mini black\" ><i class=\"icon-edit\"></i> 编辑</a>
                        ";
            }
            // line 186
            echo "                        ";
            if (((isset($context["btn_del_permission"]) ? $context["btn_del_permission"] : null) == 1)) {
                // line 187
                echo "                        <a href=\"javascript:confirm_del(";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo ")\" class=\"btn mini red\" ><i class=\"icon-trash\"></i> 删除</a>
                        ";
            }
            // line 189
            echo "                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 192
        echo "                </tbody>
            </table>
        </div>
    </div>
    <div class=\"row-fluid\">
        <div class=\"span6\">
            <div class=\"dataTables_info\" id=\"sample_2_info\" style=\"padding-top:0\">共";
        // line 198
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
        // line 216
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

    // line 261
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 262
        echo "<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/private/store_products_list.js\"></script>
";
    }

    // line 268
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 269
        echo "<script>
    jQuery(document).ready(function() {
        TableAdvanced.init();
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "store_products_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  426 => 269,  423 => 268,  415 => 262,  412 => 261,  365 => 216,  344 => 198,  336 => 192,  328 => 189,  322 => 187,  319 => 186,  313 => 184,  311 => 183,  305 => 180,  299 => 177,  293 => 174,  287 => 171,  281 => 168,  275 => 165,  269 => 162,  263 => 159,  257 => 156,  251 => 154,  247 => 153,  214 => 122,  208 => 118,  202 => 114,  196 => 110,  194 => 109,  185 => 102,  179 => 98,  173 => 94,  167 => 90,  165 => 89,  156 => 82,  150 => 78,  144 => 74,  138 => 70,  136 => 69,  127 => 62,  121 => 61,  113 => 59,  105 => 57,  102 => 56,  98 => 55,  87 => 47,  54 => 16,  51 => 15,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
