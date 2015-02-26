<?php

/* user_resource_log_list.html */
class __TwigTemplate_c58f06105c94d63e9369f24030b931774db230cc0a8171ef9b97218caba6f486 extends Twig_Template
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
        echo "玩家资源-";
        echo twig_escape_filter($this->env, (isset($context["login_name"]) ? $context["login_name"] : null), "html", null, true);
        echo "
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
            玩家资源
            <small><b class=\"red\">";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["login_name"]) ? $context["login_name"] : null), "html", null, true);
        echo "</b></small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>


</div>


<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->

<div class=\"row-fluid\">
    <div class=\"span12\">
        <!--表格查询区-->
        <form class=\"form-actions\" action=\"/userResourceLog/lists/22/";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["login_name"]) ? $context["login_name"] : null), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, (isset($context["uid"]) ? $context["uid"] : null), "html", null, true);
        echo "\" method=\"get\" id=\"search_form\">
            <div class=\"control-group search_form_wrap span4\">
                <label class=\"control-label span2\"><b class=\"midnight\">时间起始</b></label>
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
                <label class=\"control-label span2\"><b class=\"midnight\">时间结束</b></label>
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
                <label class=\"control-label span2\"><b class=\"midnight\">行为</b></label>
                <div class=\"controls\">
                   <select name=\"action_type\">
                       ";
        // line 67
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["actions"]) ? $context["actions"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 68
            echo "                       ";
            if (((isset($context["search_action_type"]) ? $context["search_action_type"] : null) == (isset($context["key"]) ? $context["key"] : null))) {
                // line 69
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "</option>
                       ";
            } else {
                // line 71
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "</option>
                       ";
            }
            // line 73
            echo "                       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "                   </select>
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
                <div class=\"actions\">
                   <!-- <a href=\"javascript:handle_multi(3)\" class=\"btn grey\"><i class=\"icon-ok\"></i> 回复</a> -->
                </div>
            </div>


            <div class=\"portlet-body\">
                <table class=\"table table-striped table-bordered table-hover table-full-width\" id=\"sample_1\">
                    <thead>
                    <tr>
                        <th class=\"hidden-phone\">行为</th>
                        <th>消耗类型</th>
                        <th>消耗数量</th>
                        <th>获取类型</th>
                        <th>获取数量</th>
                        <th>时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
        // line 105
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 106
            echo "                    <tr rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\">
                        <td class=\"hidden-phone\">
                            <a href=\"javascript:;\">";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "action", array()), "html", null, true);
            echo "</a>
                        </td>
                        <td>
                            ";
            // line 111
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "price_type", array()), "html", null, true);
            echo "
                        </td>
                        <td class=\"hidden-phone\">
                            <a href=\"javascript:;\">";
            // line 114
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "price", array()), "html", null, true);
            echo "</a>
                        </td>
                        <td>
                            ";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "tool_type", array()), "html", null, true);
            echo "
                        </td>
                        <td>
                            <a href=\"javascript:;\">";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "tool", array()), "html", null, true);
            echo "</a>
                        </td>
                        <td>
                            ";
            // line 123
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "create_time", array()), "html", null, true);
            echo "
                        </td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 127
        echo "                    </tbody>
                </table>
            </div>
        </div>
        <div class=\"row-fluid\">
            <div class=\"span6\">
                <div class=\"dataTables_info\" id=\"sample_2_info\" style=\"padding-top:0\">共";
        // line 133
        echo twig_escape_filter($this->env, ((array_key_exists("total", $context)) ? (_twig_default_filter((isset($context["total"]) ? $context["total"] : null), 0)) : (0)), "html", null, true);
        echo "条数据</div>
            </div>
            <div class=\"span6\">
                <div class=\"dataTables_paginate paging_bootstrap pagination\">
                    <ul>
                        ";
        // line 138
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
        echo "<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/bootstrap-datetimepicker.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/bootstrap-datetimepicker.zh-CN.js\"></script>
";
    }

    // line 162
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 163
        echo "<script type=\"text/javascript\" src=\"/media/js/private/user_resource_log.js\"></script>
<script>
    \$(function(){
        handleDatetimePicker();
    })
</script>
";
    }

    public function getTemplateName()
    {
        return "user_resource_log_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 163,  281 => 162,  272 => 155,  269 => 154,  251 => 138,  243 => 133,  235 => 127,  225 => 123,  219 => 120,  213 => 117,  207 => 114,  201 => 111,  195 => 108,  189 => 106,  185 => 105,  152 => 74,  146 => 73,  138 => 71,  130 => 69,  127 => 68,  123 => 67,  111 => 58,  99 => 49,  89 => 44,  69 => 27,  57 => 17,  54 => 16,  45 => 9,  42 => 8,  35 => 5,  32 => 4,);
    }
}
