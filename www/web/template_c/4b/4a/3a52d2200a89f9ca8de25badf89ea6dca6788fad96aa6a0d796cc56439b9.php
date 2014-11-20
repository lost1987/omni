<?php

/* store.html */
class __TwigTemplate_4b4a3a52d2200a89f9ca8de25badf89ea6dca6788fad96aa6a0d796cc56439b9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'seo' => array($this, 'block_seo'),
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
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

    // line 3
    public function block_seo($context, array $blocks = array())
    {
        // line 4
        echo "<title>武汉麻将-道具商城</title>
<meta name=\"keywords\" content=\"武汉麻将-道具商城\" />
<meta name=\"description\" content=\"武汉麻将-道具商城\" />
";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "<script>
    var token = \"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\";
    var  is_login = ";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["is_login"]) ? $context["is_login"] : null), "html", null, true);
        echo ",
           is_set_purchase = ";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["is_set_purchase"]) ? $context["is_set_purchase"] : null), "html", null, true);
        echo ",
            coupon=";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["coupon"]) ? $context["coupon"] : null), "html", null, true);
        echo ",
            diamond = ";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["diamond"]) ? $context["diamond"] : null), "html", null, true);
        echo ",
            coins = ";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["coins"]) ? $context["coins"] : null), "html", null, true);
        echo ",
            ticket = ";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["ticket"]) ? $context["ticket"] : null), "html", null, true);
        echo ";
</script>
<link href=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"";
        // line 20
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.ext.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 21
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/md5.min.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/mydialog.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 23
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/store.js\"></script>
";
    }

    // line 27
    public function block_content($context, array $blocks = array())
    {
        // line 28
        echo "<!--pop-up box-->
<div class=\"pop-up-box\" style=\"display:none; height:1220px\"></div>
<div id=\"error_tip\" class=\"djsc_tck\" style=\"display:none\">
    <div class=\"djsc_tck_top\">
        <h3>提示</h3>
    </div>
    <div class=\"djsc_tck_btm\">
        <div class=\"djsc_tck_btm_inside\">
            <p style=\"padding-top:15px; text-align:center\" id=\"tip_content\">对不起，您尚未<a href=\"/\">登录</a>. 请进入登录页面</p>
            <input id=\"\" value=\"关闭\" type=\"button\" onclick=\"closeDialog('djsc_tck')\" class=\"btn_2\" style=\"float:none; margin:30px 0 20px 160px\" />
        </div>
    </div>
</div>

<!--金币兑换-->
<div id=\"dialog_1\" class=\"djsc_tck\" style=\"display:none\">
    <div class=\"djsc_tck_top\">
        <h3></h3>
    </div>
    <div class=\"djsc_tck_btm\">
        <div class=\"djsc_tck_btm_inside\">
            <table width=\"350\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                <tr>
                    <td width=\"90\" align=\"right\" valign=\"top\">消费密码：</td>
                    <td width=\"260\"><input name=\"\" id=\"dialog_password\" type=\"password\" class=\"djsc_input_1\" />
                        <label id=\"dialog_1_tip\" style=\"display:none\">密码输入有误</label></td>
                </tr>
                <tr>
                    <td height=\"70\">&nbsp;</td>
                    <td><input id=\"\" value=\"确认兑换\" type=\"button\" class=\"btn_1\" onclick=\"do_exchange()\"/>
                        <input id=\"\" value=\"取消\" type=\"button\" class=\"btn_2\" onclick=\"closeDialog('djsc_tck')\"/></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!--金币兑换-->
<div id=\"dialog_5\" class=\"djsc_tck\" style=\"display:none\">
    <div class=\"djsc_tck_top\">
        <h3></h3>
    </div>
    <div class=\"djsc_tck_btm\">
        <div class=\"djsc_tck_btm_inside\">
            <table width=\"350\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                <tr>
                    <td width=\"90\" align=\"right\" valign=\"top\">消费密码：</td>
                    <td width=\"260\"><input name=\"\" id=\"dialog_5_password\" type=\"password\" class=\"djsc_input_1\" />
                        <label id=\"dialog_5_tip\" style=\"display:none\">密码输入有误</label></td>
                </tr>
                <tr>
                    <td height=\"70\">&nbsp;</td>
                    <td><input id=\"\" value=\"确认兑换\" type=\"button\" class=\"btn_1\" onclick=\"do_exchange_ticket()\"/>
                        <input id=\"\" value=\"取消\" type=\"button\" class=\"btn_2\" onclick=\"closeDialog('djsc_tck')\"/></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div id=\"success_1\" class=\"djsc_tck\" style=\"display:none\">
    <div class=\"djsc_tck_top\">
        <h3>您正在兑换 10000金币</h3>
    </div>
    <div class=\"djsc_tck_btm\">
        <div class=\"djsc_tck_btm_inside\">
            <p style=\"padding-top:15px; text-align:center\">您已成功兑换 10000金币，请 <a href=\"#\">进入游戏</a> 查看</p>
            <input id=\"\" value=\"关闭\" type=\"button\" onclick=\"closeDialog('djsc_tck')\" class=\"btn_2\" style=\"float:none; margin:30px 0 20px 160px\" />
        </div>
    </div>
</div>

<!--手机充值卡兑换-->
<div id=\"dialog_2\" class=\"djsc_tck\" style=\"display:none\">
    <div class=\"djsc_tck_top\">
        <h3>您正在兑换 50元手机话费</h3>
    </div>
    <div class=\"djsc_tck_btm\">
        <div class=\"djsc_tck_btm_inside\">
            <p>您正在兑换Iphone 5S，该操作将消耗<span class=\"red bold\">4500奖券</span>为了保证能正确为您充值，请您仔细填写以下信息。</p>
            <table width=\"350\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                <tr>
                    <td width=\"88\" align=\"right\" valign=\"top\">姓名：</td>
                    <td width=\"262\"><input name=\"\" id=\"mobile_name\" type=\"text\" class=\"djsc_input_1\" />
                        <label style=\"display:none\">请输入正确的充值号码</label></td>
                </tr>
                <tr>
                    <td align=\"right\" valign=\"top\">需充值号码：</td>
                    <td><input name=\"\" id=\"mobile_number\" type=\"text\" class=\"djsc_input_1\" />
                        <label style=\"display:none\">请输入正确的充值号码</label></td>
                </tr>
                <tr>
                    <td align=\"right\" valign=\"top\">确认号码：</td>
                    <td><input name=\"\" id=\"confirm_number\" type=\"text\" class=\"djsc_input_1\" />
                        <label style=\"display:none\">请输入正确的充值号码</label></td>
                </tr>
                <tr>
                    <td align=\"right\" valign=\"top\">消费密码：</td>
                    <td><input name=\"\" type=\"password\" id=\"mobile_pwd\" class=\"djsc_input_1\" />
                        <label style=\"display:none\" >密码输入有误</label></td>
                </tr>
                <tr>
                    <td height=\"70\">&nbsp;</td>
                    <td><input id=\"\" value=\"确认兑换\" type=\"button\" onclick=\"do_exchange_mobile()\" class=\"btn_1\" />
                        <input id=\"\" value=\"取消\" type=\"button\" onclick=\"closeDialog('djsc_tck')\" class=\"btn_2\" /></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!--产品实物兑换-->
<div id=\"dialog_3\"  class=\"djsc_tck\" style=\"display:none\">
    <div class=\"djsc_tck_top\">
        <h3>您正在兑换 Iphone 5S</h3>
    </div>
    <div class=\"djsc_tck_btm\">
        <div class=\"djsc_tck_btm_inside\">
            <p>您正在兑换Iphone 5S，该操作将消耗<span class=\"red bold\">4500奖券</span>。为了保证您能尽快收到兑换的物品，请详细填写以下信息。</p>
            <table width=\"350\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                <tr>
                    <td width=\"77\" align=\"right\" valign=\"top\">姓名：</td>
                    <td width=\"258\"><input name=\"\" id=\"product_name\" type=\"text\" class=\"djsc_input_1\" /><label>请输入正确的电话号码</label></td>
                </tr>
                <tr>
                    <td align=\"right\" valign=\"top\">手机：</td>
                    <td><input name=\"\" type=\"text\" id=\"product_mobile\" class=\"djsc_input_1\" />
                        <label>请输入正确的电话号码</label></td>
                </tr>
                <tr>
                    <td align=\"right\" valign=\"top\">确认手机：</td>
                    <td><input name=\"\" type=\"text\" id=\"product_mobile_confirm\" class=\"djsc_input_1\" />
                        <label>请输入正确的电话号码</label></td>
                </tr>
                <tr>
                    <td align=\"right\" valign=\"top\">消费密码：</td>
                    <td><input name=\"\" type=\"password\" id=\"product_password\" class=\"djsc_input_1\" />
                        <label>密码输入有误</label></td>
                </tr>
                <tr>
                    <td align=\"right\" valign=\"top\">地址：</td>
                    <td><textarea cols=\"25\" rows=\"5\" class=\"djsc_input_2\" id=\"product_address\"></textarea><label>请输入正确的电话号码</label></td>
                </tr>
                <tr>
                    <td height=\"70\">&nbsp;</td>
                    <td><input id=\"\" value=\"确认兑换\" type=\"button\" class=\"btn_1\"  onclick=\"do_exchange_product()\"/>
                        <input id=\"\" value=\"取消\" type=\"button\" class=\"btn_2\" onclick=\"closeDialog('djsc_tck')\"/></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!--content-->
<div id=\"m_content_2\">
    <h3 style=\"width:964px\"><a href=\"/\"><em></em></a><b class=\"tgxx\">道具商城</b></h3>
    <div class=\"djsc_box\">
        <div class=\"djsc_top\"></div>
        <div class=\"djsc_m_lf\">
            <ul>
                ";
        // line 185
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 186
            echo "                <a href=\"/store/category/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\"><li  class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "class", array()), "html", null, true);
            echo "\" rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "</li></a>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 188
        echo "            </ul>
        </div>
        <div class=\"djsc_m_rt\">
            <div class=\"djsc_content\">
                <ul>
                    ";
        // line 193
        if ((twig_length_filter($this->env, (isset($context["products"]) ? $context["products"] : null)) == 0)) {
            // line 194
            echo "                         <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/img/jqqd.jpg\"  />
                    ";
        } else {
            // line 196
            echo "                        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 197
                echo "                             <li>
                                 <img src=\"";
                // line 198
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array()), "html", null, true);
                echo "\" class=\"sp\" /> <span>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "price_name", array()), "html", null, true);
                echo "</span> <a href=\"javascript:;\" onclick=\"exchange(";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo ",'";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
                echo "',";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "category_id", array()), "html", null, true);
                echo ",'";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "price_type_name", array()), "html", null, true);
                echo "','";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "price_name", array()), "html", null, true);
                echo "','";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "price_type_column", array()), "html", null, true);
                echo "')\">兑换</a>
                                 ";
                // line 199
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "is_top", array())) {
                    // line 200
                    echo "                                 <b class=\"hot\"></b>
                                 ";
                }
                // line 202
                echo "                                 ";
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "is_promote", array())) {
                    // line 203
                    echo "                                 <b class=\"new\"></b>
                                 ";
                }
                // line 205
                echo "                             </li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 207
            echo "                    ";
        }
        // line 208
        echo "                </ul>
                <div style=\"clear:both\"></div>
            </div>
            <div class=\"pagination\">
                <ul>
                  <!--  <li class=\"active\"><a>1</a></li>
                    <li><a href=\"?page=2\">2</a></li>
                    <li><a class=\"next\" href=\"?page=2\">下一页</a></li>-->
                    ";
        // line 216
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "
                </ul>
            </div>
        </div>
        <div class=\"djsc_btm\"></div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "store.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  352 => 216,  342 => 208,  339 => 207,  332 => 205,  328 => 203,  325 => 202,  321 => 200,  319 => 199,  301 => 198,  298 => 197,  293 => 196,  287 => 194,  285 => 193,  278 => 188,  263 => 186,  259 => 185,  100 => 28,  97 => 27,  91 => 23,  87 => 22,  83 => 21,  79 => 20,  75 => 19,  70 => 17,  66 => 16,  62 => 15,  58 => 14,  54 => 13,  50 => 12,  46 => 11,  43 => 10,  40 => 9,  33 => 4,  30 => 3,);
    }
}
