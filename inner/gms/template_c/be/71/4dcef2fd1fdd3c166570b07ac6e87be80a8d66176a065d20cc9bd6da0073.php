<?php

/* services_suspend_list.html */
class __TwigTemplate_be714dcef2fd1fdd3c166570b07ac6e87be80a8d66176a065d20cc9bd6da0073 extends Twig_Template
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
        echo "玩家申述
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
            客服管理
            <small>玩家申述</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>


</div>


<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->

<div class=\"row-fluid\">
    <div class=\"span12\">
        <!--表格查询区-->
        <form class=\"form-actions\" action=\"/services/lists_suspend/22\" method=\"get\" id=\"search_form\">
            <div class=\"control-group search_form_wrap span4\">
                <label class=\"control-label span2\"><b class=\"midnight\">账号</b>&nbsp;&nbsp;</label>
                <div class=\"controls chzn-controls search_form\">
                    <input name=\"reporter_name\" type=\"text\" class=\"span2 m-wrap\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, (isset($context["search_reporter_name"]) ? $context["search_reporter_name"] : null), "html", null, true);
        echo "\"/>
                </div>
            </div>
            <div class=\"control-group search_form_wrap span4\">
                <label class=\"control-label span2\"><b class=\"midnight\">处理状态</b></label>
                <div class=\"controls chzn-controls\">
                    <select class=\"span2 m-wrap\" name=\"result\">
                        <option value=\"-1\">全部</option>
                        ";
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["handle_result_list"]) ? $context["handle_result_list"] : null));
        foreach ($context['_seq'] as $context["val"] => $context["name"]) {
            // line 57
            echo "                        ";
            if ((((isset($context["val"]) ? $context["val"] : null) == (isset($context["search_result"]) ? $context["search_result"] : null)) && ((isset($context["search_result"]) ? $context["search_result"] : null) != ""))) {
                // line 58
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                echo "</option>
                        ";
            } else {
                // line 60
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                echo "</option>
                        ";
            }
            // line 62
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['val'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "                    </select>
                </div>
            </div>
            <div class=\"control-group search_form_wrap span1\">
                <label class=\"control-label\"></label>
                <div class=\"controls\">
                </div>
            </div>
            <div class=\"control-group search_form_wrap span4\">
                <label class=\"control-label span2\"><b class=\"midnight\">申诉时间起始</b></label>
                <div class=\"controls\">
                    <div class=\"input-append date form_datetime\">
                        <input size=\"16\" type=\"text\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, (isset($context["search_start_time"]) ? $context["search_start_time"] : null), "html", null, true);
        echo "\" name=\"start_time\" readonly class=\"m-wrap span2\">
                        <span class=\"add-on\"><i class=\"icon-calendar\"></i></span>
                    </div>
                </div>
            </div>
            <div class=\"control-group search_form_wrap span4\">
                <label class=\"control-label span2\"><b class=\"midnight\">申诉时间结束</b></label>
                <div class=\"controls\">
                    <div class=\"input-append date form_datetime\">
                        <input size=\"16\" type=\"text\" value=\"";
        // line 84
        echo twig_escape_filter($this->env, (isset($context["search_end_time"]) ? $context["search_end_time"] : null), "html", null, true);
        echo "\" name=\"end_time\" readonly class=\"m-wrap span2\">
                        <span class=\"add-on\"><i class=\"icon-calendar\"></i></span>
                    </div>
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
                        <th><input type=\"checkbox\" class=\"group-checkable\" data-set=\"#sample_1 .checkboxes\" /></th>
                        <th class=\"hidden-phone\">账号</th>
                        <th>手机号</th>
                        <th>ip</th>
                        <th>提交时间</th>
                        <th>处理人</th>
                        <th>处理时间</th>
                        <th>状态</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
        // line 119
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 120
            echo "                    <tr rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\">
                        <td><input type=\"checkbox\" class=\"checkboxes\" value=\"";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "handler_id", array()), "html", null, true);
            echo "#";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "user_id", array()), "html", null, true);
            echo "\" /></td>
                        <td class=\"hidden-phone\">
                            <a href=\"javascript:;\">";
            // line 123
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "login_name", array()), "html", null, true);
            echo "</a>
                        </td>
                        <td>
                            ";
            // line 126
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "mobile", array()), "html", null, true);
            echo "
                        </td>
                        <td class=\"hidden-phone\">
                            <a href=\"javascript:;\">";
            // line 129
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "ip", array()), "html", null, true);
            echo "</a>
                        </td>
                        <td>
                            ";
            // line 132
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "create_at", array()), "html", null, true);
            echo "
                        </td>
                        <td>
                            ";
            // line 135
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "assign_to", array()), "html", null, true);
            echo "
                        </td>
                        <td>
                            ";
            // line 138
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "handle_time", array()), "html", null, true);
            echo "
                        </td>
                        <td>
                            ";
            // line 141
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "result_name", array()), "html", null, true);
            echo "
                        </td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 145
        echo "                    </tbody>
                </table>
            </div>
        </div>
        <div class=\"row-fluid\">
            <div class=\"span6\">
                <div class=\"dataTables_info\" id=\"sample_2_info\" style=\"padding-top:0\">共";
        // line 151
        echo twig_escape_filter($this->env, ((array_key_exists("total", $context)) ? (_twig_default_filter((isset($context["total"]) ? $context["total"] : null), 0)) : (0)), "html", null, true);
        echo "条数据</div>
            </div>
            <div class=\"span6\">
                <div class=\"dataTables_paginate paging_bootstrap pagination\">
                    <ul>
                        ";
        // line 156
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
<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\"  style=\"display:none\"
     aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"
                        aria-hidden=\"true\">×
                </button>
                <h4 class=\"modal-title\" id=\"myModalLabel\">
                    请选择要回复的内容
                </h4>
            </div>
            <form action=\"\" id=\"\" class=\"form-inline\" >
                <div class=\"modal-body\" style=\"max-height:800px;\">
                    <div class=\"control-group\">
                        ";
        // line 187
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["service_reply"]) ? $context["service_reply"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["reply"]) {
            // line 188
            echo "                        <div class=\"controls\">
                            ";
            // line 189
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index", array()) == 1)) {
                // line 190
                echo "                            <label><input type=\"radio\" name=\"reply_radio\" value=\"";
                echo twig_escape_filter($this->env, (isset($context["reply"]) ? $context["reply"] : null), "html", null, true);
                echo "\" checked=\"checked\"/>";
                echo twig_escape_filter($this->env, (isset($context["reply"]) ? $context["reply"] : null), "html", null, true);
                echo "</label>
                            ";
            } else {
                // line 192
                echo "                            <label><input type=\"radio\" name=\"reply_radio\" value=\"";
                echo twig_escape_filter($this->env, (isset($context["reply"]) ? $context["reply"] : null), "html", null, true);
                echo "\" />";
                echo twig_escape_filter($this->env, (isset($context["reply"]) ? $context["reply"] : null), "html", null, true);
                echo "</label>
                            ";
            }
            // line 194
            echo "                        </div>
                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reply'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 196
        echo "                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\"><b class=\"midnight\">自定义</b>&nbsp;&nbsp;</label>
                        <div class=\"controls\">
                            <textarea rows=\"3\" cols=\"5\"  class=\"span4\" name=\"custom_reply\" id=\"custom_reply\" disabled=\"true\"></textarea>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <div class=\"form-actions\">
                        <button type=\"button\" class=\"btn red\" onclick=\"handle_reply(3)\">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
";
    }

    // line 217
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 218
        echo "<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/bootstrap-datetimepicker.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/bootstrap-datetimepicker.zh-CN.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/common/service_reply.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/private/suspend.js\"></script>
";
    }

    // line 227
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 228
        echo "<script>
    jQuery(document).ready(function() {
        TableAdvanced.init();
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "services_suspend_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  396 => 228,  393 => 227,  382 => 218,  379 => 217,  357 => 196,  342 => 194,  334 => 192,  326 => 190,  324 => 189,  321 => 188,  304 => 187,  270 => 156,  262 => 151,  254 => 145,  244 => 141,  238 => 138,  232 => 135,  226 => 132,  220 => 129,  214 => 126,  208 => 123,  201 => 121,  196 => 120,  192 => 119,  154 => 84,  142 => 75,  128 => 63,  122 => 62,  114 => 60,  106 => 58,  103 => 57,  99 => 56,  88 => 48,  55 => 17,  52 => 16,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
