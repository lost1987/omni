<?php

/* article_list.html */
class __TwigTemplate_39d4eeeed1538ed1c78151afdb76f70de57ad304c64721e1feea73e199c6c984 extends Twig_Template
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
        echo "文章列表
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
            文章列表
            <small></small>
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
            <table class=\"table table-striped table-bordered table-hover table-full-width\">
                <thead>
                <tr>
                    <th> ID</th>
                    <th class=\"hidden-phone\">标题</th>
                    <th>栏目</th>
                    <th>标记</th>
                    <th>图片</th>
                    <th>发布时间</th>
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
            echo "                <tr>
                    <td class=\"highlight\">
                        ";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "
                    </td>
                    <td class=\"highlight\">
                        <a href=\"";
            // line 68
            echo twig_escape_filter($this->env, twig_constant("WWW_HOST"), "html", null, true);
            echo "/articles/detail/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" target=\"_blank\" class=\"popovers\" data-trigger=\"hover\" data-content=\"点击查看\" data-original-title=\"说明\" >";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
            echo "</a>
                    </td>
                    <td class=\"hidden-phone\">
                        ";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "category_name", array()), "html", null, true);
            echo "
                    </td>
                    <td class=\"hidden-phone\">
                        ";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "flag", array()), "html", null, true);
            echo "
                    </td>
                    <td>
                        <img src = \"http://";
            // line 77
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array()), "html", null, true);
            echo "\" width=\"99\" height=\"86\" />
                    </td>
                    <td>
                        ";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "publish_time", array()), "html", null, true);
            echo "
                    </td>
                    <td style=\"text-align: center\">
                        ";
            // line 83
            if (((isset($context["btn_edit_permission"]) ? $context["btn_edit_permission"] : null) == 1)) {
                // line 84
                echo "                             <a href=\"/article/add/49/edit/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 编辑</a>
                        ";
            }
            // line 86
            echo "                        ";
            if (((isset($context["btn_del_permission"]) ? $context["btn_del_permission"] : null) == 1)) {
                // line 87
                echo "                            <a href=\"javascript:;\" class=\"btn mini grey\" onclick=\"confirm_del(";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo ")\"><i class=\"icon-trash\"></i> 删除</a>
                        ";
            }
            // line 89
            echo "                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "                </tbody>
            </table>
        </div>
    </div>
    <div class=\"row-fluid\">
        <div class=\"span6\">
            <div class=\"dataTables_info\" id=\"sample_2_info\" style=\"padding-top:0\">共";
        // line 98
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
        // line 116
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

    // line 161
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 162
        echo "<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
";
    }

    // line 167
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 168
        echo "<script type=\"text/javascript\" src=\"/media/js/private/article_list.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "article_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  264 => 168,  261 => 167,  254 => 162,  251 => 161,  204 => 116,  183 => 98,  175 => 92,  167 => 89,  161 => 87,  158 => 86,  152 => 84,  150 => 83,  144 => 80,  138 => 77,  132 => 74,  126 => 71,  116 => 68,  110 => 65,  106 => 63,  102 => 62,  54 => 16,  51 => 15,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
