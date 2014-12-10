<?php

/* userinfo.html */
class __TwigTemplate_5abdedcc0a7e9edcbbe64d245d15aa69bcafa449c5f332c9d27caf1c4c97ee49 extends Twig_Template
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
        echo "<title>武汉麻将-个人中心</title>
<meta name=\"keywords\" content=\"武汉麻将-个人中心\" />
<meta name=\"description\" content=\"武汉麻将-个人中心\" />
";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "<script>
    var token = \"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\",
          is_set_purchase = ";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["is_set_purchase"]) ? $context["is_set_purchase"] : null), "html", null, true);
        echo ";

</script>
<link href=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.ext.js\" ></script>
<script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/md5.min.js\" ></script>
<link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/index_Style.css\">
<script type=\"text/javascript\" src=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/mydialog.js\" ></script>
<script type=\"text/javascript\" src=\"";
        // line 20
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/userinfo.js\" ></script>
";
    }

    // line 24
    public function block_content($context, array $blocks = array())
    {
        // line 25
        echo "<div class=\"pop-up-box\" style=\"display:none; height:1150px;\" ></div>
<!--content-->
<div id=\"m_content_2\">
    <h3><a href=\"/\"><em></em></a><b class=\"zhxx\">基本信息</b></h3>
    <div class=\"zhxx_box\">
        <div class=\"zhxx_lf\">
            <img src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar_path", array()), "html", null, true);
        echo "\" class=\"user_pic\" />
          <!--  <img src=\"";
        // line 32
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/vip.png\" class=\"vip\" /> -->
            <a href=\"javascript:_showDialog('avatar_dialog')\" class=\"edit_pic\">修改头像</a>
        </div>
        <div class=\"zhxx_mid\">
            <table width=\"400\" border=\"0\" cellspacing=\"9\" cellpadding=\"0\">
                <tr>
                    <td width=\"81\" align=\"right\" class=\"bold\">用户名：</td>
                    <td width=\"289\">";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "login_name", array()), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td width=\"81\" align=\"right\" class=\"bold\">昵称：</td>
                    <td width=\"289\">";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nickname", array()), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td align=\"right\" class=\"bold\">注册邮箱：</td>
                    ";
        // line 47
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array()) == "")) {
            // line 48
            echo "                    <td><span id=\"show_email\">（空）</span><a href=\"javascript:_showDialog('email_dialog')\" class=\"edit_note\">设置</a></td>
                    ";
        } else {
            // line 50
            echo "                    <td><span id=\"show_email\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array()), "html", null, true);
            echo "</span><a href=\"javascript:_showDialog('email_dialog')\" class=\"edit_note\">修改</a></td>
                    ";
        }
        // line 52
        echo "                </tr>
                <tr>
                    <td align=\"right\" class=\"bold\">性别：</td>
                    <td><span>";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "gender", array()), "html", null, true);
        echo "</span></td>
                </tr>
                <tr>
                    <td align=\"right\" class=\"bold\">所在地：</td>
                    <td><span id=\"show_area\">";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "area_name", array()), "html", null, true);
        echo "</span><a href=\"javascript:_showDialog('area_dialog')\" class=\"edit_note\">修改</a></td>
                </tr>
                <tr>
                    <td align=\"right\" class=\"bold\">手机号：</td>
                    <td id=\"show_mobile\">
                        ";
        // line 64
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "mobile", array()) != 0)) {
            // line 65
            echo "                            <span style=\"display:inline-block\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "mobile", array()), "html", null, true);
            echo "</span><a href=\"javascript:_showDialog('mobile_dialog')\" class=\"edit_note\">修改手机号</a>
                        ";
        } else {
            // line 67
            echo "                            <span>未设置<a href=\"javascript:_showDialog('mobile_dialog')\" class=\"edit_note\">绑定手机号</a><i>绑定后立即获得500金币</i></span>
                        ";
        }
        // line 69
        echo "                    </td>
                </tr>
                <tr>
                    <td align=\"right\" class=\"bold\">密码：</td>
                    <td><span>********</span><a href=\"javascript:_showDialog('password_dialog')\" class=\"edit_note\">修改</a></td>
                </tr>
                <tr>
                    <td align=\"right\" class=\"bold\">消费密码：</td>
                    <td>
                        ";
        // line 78
        if (((isset($context["is_set_purchase"]) ? $context["is_set_purchase"] : null) == 1)) {
            // line 79
            echo "                            <span id=\"show_purcharse\"> ******* </span><!--第一次设置新密码-->
                             <a href=\"javascript:_showDialog('purchase_dialog')\" class=\"edit_note\">修改</a>
                        ";
        } else {
            // line 82
            echo "                            <span id=\"show_purcharse\">（空）</span>
                            <a href=\"javascript:_showDialog('purchase_dialog')\" class=\"edit_note\">设置</a>
                        ";
        }
        // line 85
        echo "                    </td>
                </tr>
            </table>

        </div>
        <div class=\"zhxx_rt\">
            <div class=\"pa_box\">
                ";
        // line 92
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["user_messages"]) ? $context["user_messages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 93
            echo "                    <p>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "content", array()), "html", null, true);
            echo "</p>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        echo "                <p><a href=\"/user/messages\" class=\"a\">查看更多>></a></p>
            </div>
        </div>
    </div>
    <h3 class=\"zhxx_title_rebg\"><b class=\"wdmjrs_on\" onclick=\"tab('wdmjrs',this)\">我的麻将人生</b><b class=\"wddd\" onclick=\"tab('wddd',this)\">我的订单</b></h3>
    <div class=\"wdmjrs_box\">
        <table width=\"790\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"wdmjrs_table\" >
            <tr>
                <td width=\"222\" class=\"lf\">排名</td>
                <td width=\"568\" class=\"rt\">";
        // line 104
        echo twig_escape_filter($this->env, (isset($context["myrank"]) ? $context["myrank"] : null), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td class=\"lf\">金币</td>
                <td class=\"rt\" id=\"mygold\">";
        // line 108
        echo twig_escape_filter($this->env, (isset($context["coins"]) ? $context["coins"] : null), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td class=\"lf\">胜率</td>
                <td class=\"rt\">";
        // line 112
        echo twig_escape_filter($this->env, (isset($context["ratio"]) ? $context["ratio"] : null), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td class=\"lf\">金钻</td>
                <td class=\"rt\">";
        // line 116
        echo twig_escape_filter($this->env, (isset($context["diamond"]) ? $context["diamond"] : null), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td class=\"lf\">胡牌次数</td>
                <td class=\"rt\">";
        // line 120
        echo twig_escape_filter($this->env, (isset($context["wins"]) ? $context["wins"] : null), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td class=\"lf\">金顶次数</td>
                <td class=\"rt\">";
        // line 124
        echo twig_escape_filter($this->env, (isset($context["jinding"]) ? $context["jinding"] : null), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td class=\"lf\">清一色</td>
                <td class=\"rt\">";
        // line 128
        echo twig_escape_filter($this->env, (isset($context["qingyise"]) ? $context["qingyise"] : null), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td class=\"lf\">风一色</td>
                <td class=\"rt\">";
        // line 132
        echo twig_escape_filter($this->env, (isset($context["fengyise"]) ? $context["fengyise"] : null), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td class=\"lf\">碰碰胡</td>
                <td class=\"rt\">";
        // line 136
        echo twig_escape_filter($this->env, (isset($context["pengpenghu"]) ? $context["pengpenghu"] : null), "html", null, true);
        echo "</td>
            </tr>
        </table>
        <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"790\" style=\"display:none\" class=\"wddd_table\">
            <tr class=\"table_head_bg\">
                <td width=\"135\">订单号</td>
                <td width=\"297\">商品信息</td>
                <td width=\"145\">时间</td>
                <td width=\"120\">订单状态</td>
                <td width=\"93\">操作</td>
            </tr>
              ";
        // line 147
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orderlist"]) ? $context["orderlist"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 148
            echo "                    ";
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index", array()) % 2) == 0)) {
                // line 149
                echo "                        <tr class=\"table_light_bg\">
                    ";
            } else {
                // line 151
                echo "                        <tr class=\"table_dark_bg\">
                    ";
            }
            // line 153
            echo "                            <td>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "</td>
                            <td>";
            // line 154
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "</td>
                            <td>";
            // line 155
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "create_at", array()), "html", null, true);
            echo "</td>
                            <td>";
            // line 156
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "status", array()), "html", null, true);
            echo "</td>
                        <td><a href=\"javascript:showDetail( ";
            // line 157
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo " )\">详情</a></td>
                    </tr>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 160
        echo "        </table>
    </div>
</div>

<!-- popup start --->
<!--订单详情-->
<div class=\"note\" style=\"display:none\" id=\"order_dialog\">
        <div class=\"note_top\">
            <span class=\"note_ico_3\"></span><span>订单详情</span><span class=\"close\" onclick=\"closeDialog('note')\"></span>
        </div>
        <div class=\"note_content\" >
            <table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"dingdan_content\">
                <tbody>
                <tr>
                    <td width=\"78\" height=\"24\" align=\"right\">订单编号：</td>
                    <td width=\"111\" id=\"detail_order_id\"></td>
                    <td width=\"76\" align=\"right\">订单时间：</td>
                    <td width=\"95\" id=\"detail_create\"></td>
                </tr>
                <tr>
                    <td align=\"right\" class=\"bg_2\">商品名称：</td>
                    <td class=\"bg_2\" id=\"detail_product_name\"></td>
                    <td align=\"right\" class=\"bg_2\">订单状态：</td>
                    <td class=\"bg_2\" id=\"detail_status\"></td>
                </tr>
                <tr>
                    <td align=\"right\" id=\"detail_cost_name\"></td>
                    <td id=\"detail_cost\"></td>
                    <td align=\"right\"></td>
                    <td></td>
                </tr>
                <!--   <tr>
                       <td align=\"right\" class=\"bg_2\"><strong>收货信息</strong>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                       <td colspan=\"3\" class=\"bg_2\"></td>
                   </tr>
                   <tr>
                       <td align=\"right\">姓名：</td>
                       <td>张三</td>
                       <td align=\"right\">电话：</td>
                       <td>18621209864</td>
                   </tr>
                   <tr>
                       <td align=\"right\" class=\"bg_2\">地址：</td>
                       <td colspan=\"3\" class=\"bg_2\">武汉市徐东二路创意园1栋526</td>
                   </tr>-->
                <tr>
                    <td colspan=\"4\" align=\"center\" style=\"padding:10px 0\"><input type=\"button\" value=\"关闭\" class=\"p_btn_2\" onclick=\"closeDialog('note')\"/></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class=\"note_btm\"></div>
</div>
<!--订单 end-->

<!--change password-->
<form class=\"note\" id=\"password_dialog\" style=\"display:none\" >
        <div class=\"note_top\">
            <span class=\"note_ico_3\"></span><span>修改密码</span><span class=\"close\" onclick=\"closeDialog('note')\"></span>
        </div>
        <div class=\"note_content\">
            <table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"edit_pin\">
                <tbody>
                <tr>
                    <td width=\"93\" height=\"50\" align=\"right\" valign=\"top\" class=\"title\">旧密码：</td>
                    <td width=\"232\" valign=\"top\">
                        <input type=\"password\" class=\"pin_box\" name=\"old_pass\">
                        <label></label>
                    </td>
                </tr>
                <tr>
                    <td height=\"50\" align=\"right\" valign=\"top\" class=\"title\">新密码：</td>
                    <td valign=\"top\">
                        <input type=\"password\" class=\"pin_box\" name=\"new_pass\">
                        <label></label>
                    </td>
                </tr>
                <tr>
                    <td height=\"50\" align=\"right\" valign=\"top\" class=\"title\">确认密码：</td>
                    <td valign=\"top\">
                        <input type=\"password\" class=\"pin_box\" name=\"new_pass1\">
                        <label></label>
                    </td>
                </tr>
                <tr>
                    <td colspan=\"2\"><input type=\"button\" onclick=\"changePassword()\" value=\"确定\" class=\"p_btn_1\" style=\"margin-left:72px\" /> <input type=\"button\" onclick=\"closeDialog('note')\" value=\"取消\" class=\"p_btn_2\" /></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class=\"note_btm\"></div>
</form>

<!--change email-->
<form class=\"note\" id=\"email_dialog\" style=\"display:none\" >
        <div class=\"note_top\">
            <span class=\"note_ico_3\"></span><span>修改邮箱</span><span class=\"close\" onclick=\"closeDialog('note')\"></span>
        </div>
        <div class=\"note_content\">
            <table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"edit_pin\">
                <tbody>
                <tr>
                    <td height=\"50\" align=\"right\" valign=\"top\" class=\"title\">新邮箱：</td>
                    <td valign=\"top\">
                        <input type=\"text\" class=\"pin_box\" name=\"email\" >
                        <label></label>
                    </td>
                </tr>
                <tr>
                    <td colspan=\"2\"><input type=\"button\" value=\"确定\" onclick=\"changeEmail()\" class=\"p_btn_1\" style=\"margin-left:72px\" /> <input type=\"button\" onclick=\"closeDialog('note')\" value=\"取消\" class=\"p_btn_2\" /></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class=\"note_btm\"></div>
</form>

<!--area dialog-->
<form class=\"note\" id=\"area_dialog\" style=\"display:none\" >
        <div class=\"note_top\">
            <span class=\"note_ico_3\"></span><span>修改地区</span><span class=\"close\" onclick=\"closeDialog('note')\"></span>
        </div>
        <div class=\"note_content\">
            <table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"edit_pin\">
                <tbody>
                <tr>
                    <td height=\"50\" align=\"right\" valign=\"top\" class=\"title\">我在：</td>
                    <td valign=\"top\">
                        <select name=\"area\" id='area_chg'>
                            ";
        // line 289
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["areas"]) ? $context["areas"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 290
            echo "                            ";
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0", array()) == $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "area", array()))) {
                // line 291
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0", array()), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, (isset($context["item"]) ? $context["item"] : null), "html", null, true);
                echo "</option>
                            ";
            } else {
                // line 293
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0", array()), "html", null, true);
                echo "\" >";
                echo twig_escape_filter($this->env, (isset($context["item"]) ? $context["item"] : null), "html", null, true);
                echo "</option>
                            ";
            }
            // line 295
            echo "                            ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 296
        echo "                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan=\"2\"><input type=\"button\" value=\"确定\" onclick=\"changeArea()\" class=\"p_btn_1\" style=\"margin-left:72px\" /> <input type=\"button\" onclick=\"closeDialog('note')\" value=\"取消\" class=\"p_btn_2\" /></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class=\"note_btm\"></div>
</form>


<!--mobile dialog-->
<form class=\"note\" id=\"mobile_dialog\" style=\"display:none\" >
        <div class=\"note_top\">
            <span class=\"note_ico_3\"></span><span>修改手机号</span><span class=\"close\" onclick=\"closeDialog('note')\"></span>
        </div>
        <div class=\"note_content\">
            <table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"edit_pin\">
                <tbody>
                <tr>
                    <td height=\"50\" align=\"right\" valign=\"top\" class=\"title\">新手机号：</td>
                    <td valign=\"top\">
                        <input type=\"text\" class=\"pin_box\" name=\"mobile\">
                        <label></label>
                    </td>
                </tr>
                <tr>
                    <td colspan=\"2\"><input type=\"button\" value=\"确定\" onclick=\"changeMobile()\" class=\"p_btn_1\" style=\"margin-left:72px\" /> <input type=\"button\" onclick=\"closeDialog('note')\" value=\"取消\" class=\"p_btn_2\" /></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class=\"note_btm\"></div>
</form>

<form class=\"note\" id=\"purchase_dialog\" style=\"display:none\" >
        <div class=\"note_top\">
            <span class=\"note_ico_3\"></span><span>修改消费密码:</span><span class=\"close\" onclick=\"closeDialog('note')\"></span>
        </div>
        <div class=\"note_content\">
            <table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"edit_pin\">
                <tbody>
                ";
        // line 340
        if (((isset($context["is_set_purchase"]) ? $context["is_set_purchase"] : null) == 1)) {
            // line 341
            echo "                <tr rel=\"old_purchase_tr\">
                    ";
        } else {
            // line 343
            echo "                <tr rel=\"old_purchase_tr\"  style=\"display: none\">
                    ";
        }
        // line 345
        echo "                    <td height=\"50\" align=\"right\" valign=\"top\" class=\"title\">旧消费密码：</td>
                    <td valign=\"top\">
                        <input type=\"password\" class=\"pin_box\" name=\"p_old\">
                        <label></label>
                    </td>
                </tr>

                <tr>
                    <td height=\"50\" align=\"right\" valign=\"top\" class=\"title\">新消费密码：</td>
                    <td valign=\"top\">
                        <input type=\"password\" class=\"pin_box\" name=\"p_new\">
                        <label></label>
                    </td>
                </tr>
                <tr>
                    <td height=\"50\" align=\"right\" valign=\"top\" class=\"title\">确认消费密码：</td>
                    <td valign=\"top\">
                        <input type=\"password\" class=\"pin_box\" name=\"p_new1\">
                        <label></label>
                    </td>
                </tr>
                <tr>
                    <td colspan=\"2\"><input type=\"button\" value=\"确定\" onclick=\"changePurcharse()\" class=\"p_btn_1\" style=\"margin-left:72px\" /> <input type=\"button\" onclick=\"closeDialog('note')\" value=\"取消\" class=\"p_btn_2\" /></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class=\"note_btm\"></div>
</form>


<div class=\"tck note\" style=\"display:none\" id=\"avatar_dialog\" >
        <div class=\"tck_top\"><h3 class=\"xztx\">选择头像</h3><span class=\"close\" onclick=\"closeDialog('note')\"></span>
        </div>
        <div style=\"height:252px; padding:0 30px 0 32px\" class=\"tck_mid\">
            <div class=\"modify_head\">
                <table width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                    <tr>
                        ";
        // line 383
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 384
            echo "                        ";
            if (((isset($context["i"]) ? $context["i"] : null) == $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar", array()))) {
                // line 385
                echo "                        <td><img id=\"";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
                echo "/img/tx/";
                echo twig_escape_filter($this->env, (isset($context["avatar_name"]) ? $context["avatar_name"] : null), "html", null, true);
                echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : null) + 1), "html", null, true);
                echo ".jpg\" class=\"candidate on\"/></td>
                        ";
            } else {
                // line 387
                echo "                        <td><img id=\"";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
                echo "/img/tx/";
                echo twig_escape_filter($this->env, (isset($context["avatar_name"]) ? $context["avatar_name"] : null), "html", null, true);
                echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : null) + 1), "html", null, true);
                echo ".jpg\" class=\"candidate\"/></td>
                        ";
            }
            // line 389
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 390
        echo "                    </tr>
                </table>
            </div>
            <div class=\"modify_head_btn\"><input type=\"button\" class=\"y_btn2\" onclick=\"changeAvatar()\" value=\"确认\" id=\"\"><input type=\"button\" class=\"y_btn3\" onclick=\"closeDialog('note')\" value=\"取消\" id=\"\"></div>
        </div>
        <div class=\"tck_btm\"></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "userinfo.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  665 => 390,  659 => 389,  648 => 387,  637 => 385,  634 => 384,  630 => 383,  590 => 345,  586 => 343,  582 => 341,  580 => 340,  534 => 296,  520 => 295,  512 => 293,  504 => 291,  501 => 290,  484 => 289,  353 => 160,  336 => 157,  332 => 156,  328 => 155,  324 => 154,  319 => 153,  315 => 151,  311 => 149,  308 => 148,  291 => 147,  277 => 136,  270 => 132,  263 => 128,  256 => 124,  249 => 120,  242 => 116,  235 => 112,  228 => 108,  221 => 104,  210 => 95,  201 => 93,  197 => 92,  188 => 85,  183 => 82,  178 => 79,  176 => 78,  165 => 69,  161 => 67,  155 => 65,  153 => 64,  145 => 59,  138 => 55,  133 => 52,  127 => 50,  123 => 48,  121 => 47,  114 => 43,  107 => 39,  97 => 32,  93 => 31,  85 => 25,  82 => 24,  76 => 20,  72 => 19,  68 => 18,  64 => 17,  60 => 16,  56 => 15,  50 => 12,  46 => 11,  43 => 10,  40 => 9,  33 => 4,  30 => 3,);
    }
}
