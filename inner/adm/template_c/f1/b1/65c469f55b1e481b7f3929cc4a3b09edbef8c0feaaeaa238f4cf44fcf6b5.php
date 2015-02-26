<?php

/* user_deposit_list.html */
class __TwigTemplate_f1b165c469f55b1e481b7f3929cc4a3b09edbef8c0feaaeaa238f4cf44fcf6b5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'css' => array($this, 'block_css'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('css', $context, $blocks);
        // line 6
        echo "<div class=\"am-cf am-padding\">
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\">用户</strong> / <small>提现申请</small></div>
</div>

<div class=\"am-g\">
<div class=\"am-u-md-12 am-cf\">
<div class=\"am-fl am-cf\">
    <form class=\"am-form-inline\">
        <div class=\"am-form-group am-form-icon am-margin-right-sm\">
            <label>申请单号</label>
            <input style=\"display:none\" mce_style=\"display:none\"><!--防止默认回车提交表单 简直脑残-->
            <input type=\"text\" name=\"search_order_no\" id=\"search_order_no\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["search_order_no"]) ? $context["search_order_no"] : null), "html", null, true);
        echo "\" class=\"am-form-field\" placeholder=\"提现单号\">
        </div>

        <div class=\"am-form-group am-form-icon am-margin-right-sm\">
            <label>uid</label>
            <input type=\"text\" name=\"search_uid\" id=\"search_uid\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["search_uid"]) ? $context["search_uid"] : null), "html", null, true);
        echo "\" class=\"am-form-field\" placeholder=\"uid\">
        </div>

        <div class=\"am-form-group am-form-select am-margin-right-sm\">
            <label>处理状态</label>
            <select id=\"search_state\" class=\"select2 span4\" select=\"-1\">
                <option value=\"-1\">全部</option>
                ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["search_states"]) ? $context["search_states"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 30
            echo "                    ";
            if (((isset($context["key"]) ? $context["key"] : null) == ((array_key_exists("search_state", $context)) ? (_twig_default_filter((isset($context["search_state"]) ? $context["search_state"] : null), (-1))) : ((-1))))) {
                // line 31
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "</option>
                    ";
            } else {
                // line 33
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "</option>
                    ";
            }
            // line 35
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "            </select>
            <span class=\"am-form-caret\"></span>
        </div>

        <button type=\"button\" id=\"search_btn\"  class=\"am-btn am-btn-default\"><i class=\"am-icon-search\"></i>&nbsp;搜索</button>
        <br/><br/>

        <div class=\"am-form-group am-form-icon am-margin-right-sm\">
            <label>开始时间</label>
            <input type=\"text\" name=\"search_create_time\" id=\"search_create_time_start\" value=\"";
        // line 45
        echo twig_escape_filter($this->env, (isset($context["search_create_time_start"]) ? $context["search_create_time_start"] : null), "html", null, true);
        echo "\" class=\"am-form-field form_datetime\" placeholder=\"申请日期\">
        </div>

        <div class=\"am-form-group am-form-icon am-margin-right-sm\">
            <label>结束时间</label>
            <input type=\"text\" name=\"search_create_time\" id=\"search_create_time_end\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, (isset($context["search_create_time_end"]) ? $context["search_create_time_end"] : null), "html", null, true);
        echo "\" class=\"am-form-field form_datetime\" placeholder=\"申请日期\">
        </div>
    </form>
    </div>
    </div>
</div>
<div class=\"am-g\">
<div class=\"am-u-sm-12\" style=\"overflow-x:auto\">
<table class=\"am-table am-table-striped am-table-hover table-main\" style=\"width:150% ;max-width:150%\">
<thead>
<tr>
    <th class=\"table-check\"><input type=\"checkbox\" /></th>
    <th>UID</th>
    <th width=\"100\">账号</th>
    <th>昵称</th>
    <th>收款人</th>
    <th>收款账户</th>
    <th>开户银行</th>
    <th>提现单号</th>
    <th>提现金额</th>
    <th>提现方式</th>
    <th>处理状态</th>
    <th>申请时间</th>
    <th>实付</th>
    <th>手续费</th>
    <th>处理时间</th>
    <th>操作</th>
</tr>
</thead>
<tbody>
";
        // line 80
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 81
            echo "<tr>
    <td><input type=\"checkbox\" /></td>
    <td>";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid", array()), "html", null, true);
            echo "</td>
    <td><a href=\"javascript:;\">";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "login_name", array()), "html", null, true);
            echo "</a></td>
    <td>";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "deposit_name", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "deposit_account", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "deposit_bank_name", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "order_no", array()), "html", null, true);
            echo "</td>
    <td><a rel=\"ajax_money\" class=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "importantClass", array()), "html", null, true);
            echo "\">￥";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "money", array()), "html", null, true);
            echo "</a></td>
    <td><a rel=\"ajax_platform\" class=\"";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "importantClass", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "deposit_platform", array()), "html", null, true);
            echo "</a></td>
    <td><a rel=\"ajax_state\" class=\"";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "importantClass", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "deposit_state", array()), "html", null, true);
            echo "</a></td>
    <td>";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "create_time", array()), "html", null, true);
            echo "</td>
    <td rel=\"ajax_real_cost\">￥";
            // line 94
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "real_cost", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "real_cost", array()), "0.00")) : ("0.00")), "html", null, true);
            echo "</td>
    <td rel=\"ajax_handing_cost\">￥";
            // line 95
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "handing_cost", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "handing_cost", array()), "0.00")) : ("0.00")), "html", null, true);
            echo "</td>
    <td rel=\"ajax_doneTime\">";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "done_time", array()), "html", null, true);
            echo "</td>
    <td rel=\"ajax_operation\">
        ";
            // line 98
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "state", array()) == 0)) {
                // line 99
                echo "        <div class=\"am-dropdown common-btn-drop\" data-am-dropdown>
            <button class=\"am-btn am-btn-default am-btn-xs am-dropdown-toggle\" data-am-dropdown-toggle><span class=\"am-icon-list-ol\"></span> <span class=\"am-icon-caret-down\"></span></button>
            <ul class=\"am-dropdown-content\">
                <li><a href=\"javascript:;\" onclick=\"give(";
                // line 102
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo ",this)\">汇款</a></li>
                <li><a href=\"javascript:;\" onclick=\"unGive(";
                // line 103
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo ",this)\"><i class=\"am-icon-ban\" style=\"color:red\"></i>&nbsp;不予汇款</a></li>
            </ul>
        </div>
        ";
            } else {
                // line 107
                echo "        /
        ";
            }
            // line 109
            echo "    </td>
</tr>
<tr><td></td><td>备注/原因:</td><td colspan=\"14\" rel=\"ajax_remark\">";
            // line 111
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "remark", array()), "html", null, true);
            echo "</td></tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "</tbody>
</table>

<div class=\"am-modal am-modal-confirm\" tabindex=\"-1\" id=\"unGiveModal\">
    <div class=\"am-modal-dialog\">
        <div class=\"am-modal-hd\">请填写不予汇款的原因</div>
        <div class=\"am-modal-bd\">
            <textarea cols=\"50\" rows=\"5\" id=\"modal_remark\"></textarea>
        </div>
        <div class=\"am-modal-footer\">
            <span class=\"am-modal-btn\" id=\"unGiveModal-btn-no\">取消</span>
            <span class=\"am-modal-btn\" id=\"unGiveModal-btn-yes\">确定</span>
        </div>
    </div>
</div>

<div class=\"am-modal am-modal-confirm\" tabindex=\"-1\" id=\"give-alert\">
    <div class=\"am-modal-dialog\">
        <div class=\"am-modal-hd\" id=\"give-title\">请注意,该操作不可逆,请确认汇款</div>
        <div class=\"am-modal-bd am-padding\" id=\"give-content\">
            <form id=\"giveForm\" class=\"am-margin-left-lg\">
            <div class=\"am-text-left am-form-inline am-margin-bottom-xs\">
                <label>实付&nbsp;&nbsp;&nbsp;</label>
                <input type=\"text\" name=\"real_cost\" id=\"real_cost\" class=\"am-form-field am-margin-right-sm\"/>
            </div>
            <div class=\"am-text-left am-form-inline\">
                <label>手续费</label>
                <input type=\"text\" name=\"handing_cost\" id=\"handing_cost\" class=\"am-form-field am-margin-right-sm\"/>
            </div>
            </form>
        </div>
        <div class=\"am-modal-footer\">
            <span class=\"am-modal-btn\" id=\"give-btn-no\">取消</span>
            <span class=\"am-modal-btn\" id=\"give-btn-yes\">确定</span>
        </div>
    </div>
</div>

<div class=\"am-cf\">
    共 ";
        // line 152
        echo twig_escape_filter($this->env, (isset($context["total"]) ? $context["total"] : null), "html", null, true);
        echo " 条记录
    <div class=\"am-fr\">
        <ul class=\"am-pagination\">
            ";
        // line 155
        echo (isset($context["pagiation"]) ? $context["pagiation"] : null);
        echo "
        </ul>
    </div>
</div>
<hr />
<p>注：.....</p>
</div>
</div>
<script src=\"";
        // line 163
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/jquery.validate.min.js\"></script>
<script src=\"";
        // line 164
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/bootstrap-datetimepicker.min.js\"></script>
<script src=\"";
        // line 165
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/bootstrap-datetimepicker.zh-CN.js\"></script>
<script src=\"";
        // line 166
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/select2.min.js\"></script>
<script src=\"";
        // line 167
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/standalone/deposit_list.js\"></script>
<script src=\"";
        // line 168
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/common-list.js\"></script>";
    }

    // line 1
    public function block_css($context, array $blocks = array())
    {
        // line 2
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/css/bootstrap-datetimepicker-master.min.css\">
<link rel=\"stylesheet\" href=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/css/bootstrap-datetimepicker.min.css\">
<link rel=\"stylesheet\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/css/select2.min.css\">
";
    }

    public function getTemplateName()
    {
        return "user_deposit_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  334 => 4,  330 => 3,  325 => 2,  322 => 1,  317 => 168,  313 => 167,  309 => 166,  305 => 165,  301 => 164,  297 => 163,  286 => 155,  280 => 152,  239 => 113,  231 => 111,  227 => 109,  223 => 107,  216 => 103,  212 => 102,  207 => 99,  205 => 98,  200 => 96,  196 => 95,  192 => 94,  188 => 93,  182 => 92,  176 => 91,  170 => 90,  166 => 89,  162 => 88,  158 => 87,  154 => 86,  150 => 85,  146 => 84,  142 => 83,  138 => 81,  134 => 80,  101 => 50,  93 => 45,  82 => 36,  76 => 35,  68 => 33,  60 => 31,  57 => 30,  53 => 29,  43 => 22,  35 => 17,  22 => 6,  20 => 1,);
    }
}
