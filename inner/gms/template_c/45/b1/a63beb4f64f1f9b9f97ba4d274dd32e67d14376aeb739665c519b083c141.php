<?php

/* services_lottery_list.html */
class __TwigTemplate_45b1a63beb4f64f1f9b9f97ba4d274dd32e67d14376aeb739665c519b083c141 extends Twig_Template
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
        echo "玩家抽奖
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
            <small>玩家抽奖</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>


</div>


<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->

<div class=\"row-fluid\">
    <div class=\"span12\">
        <!--表格查询区-->
        <form class=\"form-actions\" action=\"/services/lists_lottery/22\" method=\"get\" id=\"search_form\">
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
            <div class=\"control-group search_form_wrap span4\">
                <label class=\"control-label span2\"><b class=\"midnight\">抽奖时间起始</b></label>
                <div class=\"controls\">
                    <div class=\"input-append date form_datetime\">
                        <input size=\"16\" type=\"text\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, (isset($context["search_start_time"]) ? $context["search_start_time"] : null), "html", null, true);
        echo "\" name=\"start_time\" readonly class=\"m-wrap span2\">
                        <span class=\"add-on\"><i class=\"icon-calendar\"></i></span>
                    </div>
                </div>
            </div>
            <div class=\"control-group search_form_wrap span4\">
                <label class=\"control-label span2\"><b class=\"midnight\">抽奖时间结束</b></label>
                <div class=\"controls\">
                    <div class=\"input-append date form_datetime\">
                        <input size=\"16\" type=\"text\" value=\"";
        // line 79
        echo twig_escape_filter($this->env, (isset($context["search_end_time"]) ? $context["search_end_time"] : null), "html", null, true);
        echo "\" name=\"end_time\" readonly class=\"m-wrap span2\">
                        <span class=\"add-on\"><i class=\"icon-calendar\"></i></span>
                    </div>
                </div>
            </div>
            <div class=\"control-group search_form_wrap span4\">
                <label class=\"control-label span2\"><b class=\"midnight\">奖品</b></label>
                <div class=\"controls chzn-controls\">
                    <select class=\"span2 m-wrap\" name=\"product_id\">
                        <option value=\"-1\">全部</option>
                        ";
        // line 89
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 90
            echo "                        ";
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()) == (isset($context["search_product_id"]) ? $context["search_product_id"] : null))) {
                // line 91
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
                echo "</option>
                        ";
            } else {
                // line 93
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
                echo "</option>
                        ";
            }
            // line 95
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
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
                        <th><input type=\"checkbox\" class=\"group-checkable\" data-set=\"#sample_1 .checkboxes\" /></th>
                        <th class=\"hidden-phone\">账号</th>
                        <th>ip</th>
                        <th>提交时间</th>
                        <th>处理人</th>
                        <th>处理时间</th>
                        <th>状态</th>
                        <th style=\"text-align: center\">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
        // line 129
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 130
            echo "                    <tr rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" rel_c=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "product_id", array()), "html", null, true);
            echo "#";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\">
                        <td><input type=\"checkbox\" class=\"checkboxes\" value=\"";
            // line 131
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "#";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "user_id", array()), "html", null, true);
            echo "\" /></td>
                        <td class=\"hidden-phone\">
                            <a href=\"javascript:;\">";
            // line 133
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "reporter_name", array()), "html", null, true);
            echo "</a>
                        </td>
                        <td class=\"hidden-phone\">
                            <a href=\"javascript:;\">";
            // line 136
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "ip", array()), "html", null, true);
            echo "</a>
                        </td>
                        <td>
                            ";
            // line 139
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "create_at", array()), "html", null, true);
            echo "
                        </td>
                        <td>
                            ";
            // line 142
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "assign_to", array()), "html", null, true);
            echo "
                        </td>
                        <td>
                            ";
            // line 145
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "handle_time", array()), "html", null, true);
            echo "
                        </td>
                        <td>
                            ";
            // line 148
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "result_name", array()), "html", null, true);
            echo "
                        </td>
                        <td style=\"text-align: center\">
                            ";
            // line 151
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "product_type", array()) == 0)) {
                // line 152
                echo "                            ";
                if (((((isset($context["btn_fahuo_permission"]) ? $context["btn_fahuo_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "result", array()) != 4)) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "result", array()) != 2))) {
                    // line 153
                    echo "                                <a href=\"javascript:;\" onclick=\"consignment(this)\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 发货</a>
                                <input type=\"hidden\" name=\"params\"  value=\"";
                    // line 154
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "address", array()), "html", null, true);
                    echo "#";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "user_id", array()), "html", null, true);
                    echo "#";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "reporter_name", array()), "html", null, true);
                    echo "#";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                    echo "#";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "product_id", array()), "html", null, true);
                    echo "\"/>
                            ";
                } elseif (((((isset($context["btn_handle_permission"]) ? $context["btn_handle_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "result", array()) != 2)) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "result", array()) == 4))) {
                    // line 156
                    echo "                             <a href=\"javascript:;\" onclick=\"handle(this)\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 处理</a>
                            <input type=\"hidden\" name=\"params\"  value=\"";
                    // line 157
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                    echo "#";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "product_id", array()), "html", null, true);
                    echo "\"/>
                            ";
                } else {
                    // line 159
                    echo "                            /
                            ";
                }
                // line 161
                echo "                            ";
            } elseif (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "product_type", array()) == 1)) {
                // line 162
                echo "                            ";
                if ((((isset($context["btn_fahuo_permission"]) ? $context["btn_fahuo_permission"] : null) == 1) && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "result", array()) != 2))) {
                    // line 163
                    echo "                                <a href=\"javascript:;\" onclick=\"mobilement(this)\" class=\"btn mini grey\" ><i class=\"icon-edit\"></i> 充值</a>
                                <input type=\"hidden\" name=\"params\"  value=\"";
                    // line 164
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "mobile", array()), "html", null, true);
                    echo "#";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "user_id", array()), "html", null, true);
                    echo "#";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "reporter_name", array()), "html", null, true);
                    echo "#";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                    echo "#";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "product_id", array()), "html", null, true);
                    echo "\"/>
                            ";
                } else {
                    // line 166
                    echo "                            /
                            ";
                }
                // line 168
                echo "                            ";
            } else {
                // line 169
                echo "                            /
                            ";
            }
            // line 171
            echo "                        </td>
                    </tr>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 175
        echo "                    </tbody>
                </table>
            </div>
        </div>
        <div class=\"row-fluid\">
            <div class=\"span6\">
                <div class=\"dataTables_info\" id=\"sample_2_info\" style=\"padding-top:0\">共";
        // line 181
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
        // line 199
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
                确认要将该发货单设为完成吗?<b class=\"red\">(请务必确认玩家收到物品后再进行该操作)</b>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" onclick=\"confirm_done()\"
                        data-dismiss=\"modal\">确认
                </button>
                <button type=\"button\" class=\"btn btn-primary\" onclick=\"cancel_done()\">
                    取消
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- 模态框（Modal）发货单 -->
<div class=\"modal fade\" id=\"sendModal\" tabindex=\"-1\" role=\"dialog\" style=\"display:none\"
     aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"
                        aria-hidden=\"true\">×
                </button>
                <h4 class=\"modal-title\" id=\"sendModalLabel\">
                    提交发货单
                </h4>
            </div>
            <form action=\"\" id=\"consignmentForm\" class=\"form-inline\" >
                <div class=\"modal-body\" style=\"max-height:800px;\">
                    <div class=\"control-group\">
                        <label class=\"control-label\"><b class=\"midnight\">快递公司</b><span class=\"required\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"express_name\" data-required=\"1\" class=\"span4\" />
                        </div>
                    </div>

                    <div class=\"control-group\">
                        <label class=\"control-label\"><b class=\"midnight\">快递单号</b><span class=\"required\">*</span></label>
                        <div class=\"controls\">
                            <input name=\"express_no\" type=\"text\" class=\"span4\" />
                        </div>
                    </div>

                    <div class=\"control-group\">
                        <label class=\"control-label\"><b class=\"midnight\">发往地址</b><span class=\"required\">*</span></label>
                        <div class=\"controls\">
                            <textarea rows=\"3\" cols=\"5\"  class=\"span4\" name=\"address\"></textarea>
                        </div>
                    </div>

                    <div class=\"control-group\">
                        <label class=\"control-label\"><b class=\"midnight\">备注</b>&nbsp;&nbsp;</label>
                        <div class=\"controls\">
                            <textarea rows=\"3\" cols=\"5\"  class=\"span4\" name=\"desp\"></textarea>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <div class=\"form-actions\">
                        <button type=\"submit\" class=\"btn red\">提交</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 模态框（Modal）手机充值单 -->
<div class=\"modal fade\" id=\"mobileModal\" tabindex=\"-1\" role=\"dialog\" style=\"display:none\"
     aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"
                        aria-hidden=\"true\">×
                </button>
                <h4 class=\"modal-title\" id=\"mobileModalLabel\">
                    提交发货单
                </h4>
            </div>
            <form action=\"\" id=\"mobileForm\" class=\"form-inline\" >
                <div class=\"modal-body\" style=\"max-height:800px;\">
                    <div class=\"control-group\">
                        <label class=\"control-label\"><b class=\"midnight\">充值手机号</b><span class=\"required\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"mobile\" data-required=\"1\" class=\"span4\" />
                        </div>
                    </div>

                    <div class=\"control-group\">
                        <label class=\"control-label\"><b class=\"midnight\">充值卡号或订单号</b><span class=\"required\">*</span></label>
                        <div class=\"controls\">
                            <input name=\"order_num\" type=\"text\" class=\"span4\" />
                        </div>
                    </div>

                    <div class=\"control-group\">
                        <label class=\"control-label\"><b class=\"midnight\">金额(元)</b><span class=\"required\">*</span></label>
                        <div class=\"controls\">
                            <input  type=\"text\"  class=\"span1\" name=\"money\"></textarea>
                        </div>
                    </div>

                    <div class=\"control-group\">
                        <label class=\"control-label\"><b class=\"midnight\">备注</b>&nbsp;&nbsp;</label>
                        <div class=\"controls\">
                            <textarea rows=\"3\" cols=\"5\"  class=\"span4\" name=\"desp\"></textarea>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <div class=\"form-actions\">
                        <button type=\"submit\" class=\"btn red\">提交</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
";
    }

    // line 352
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 353
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/jquery.dataTables.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/DT_bootstrap.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/bootstrap-datetimepicker.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/bootstrap-datetimepicker.zh-CN.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/private/lottery.js\"></script>
";
    }

    // line 362
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 363
        echo "<script>
    jQuery(document).ready(function() {
        TableAdvanced.init();
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "services_lottery_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  560 => 363,  557 => 362,  546 => 353,  543 => 352,  388 => 199,  367 => 181,  359 => 175,  350 => 171,  346 => 169,  343 => 168,  339 => 166,  326 => 164,  323 => 163,  320 => 162,  317 => 161,  313 => 159,  306 => 157,  303 => 156,  290 => 154,  287 => 153,  284 => 152,  282 => 151,  276 => 148,  270 => 145,  264 => 142,  258 => 139,  252 => 136,  246 => 133,  239 => 131,  230 => 130,  226 => 129,  191 => 96,  185 => 95,  177 => 93,  169 => 91,  166 => 90,  162 => 89,  149 => 79,  137 => 70,  128 => 63,  122 => 62,  114 => 60,  106 => 58,  103 => 57,  99 => 56,  88 => 48,  55 => 17,  52 => 16,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
