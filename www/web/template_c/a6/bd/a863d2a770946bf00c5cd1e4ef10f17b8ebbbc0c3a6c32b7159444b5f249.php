<?php

/* index.html */
class __TwigTemplate_a6bda863d2a770946bf00c5cd1e4ef10f17b8ebbbc0c3a6c32b7159444b5f249 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'seo' => array($this, 'block_seo'),
            'head' => array($this, 'block_head'),
            'two_dimension_code' => array($this, 'block_two_dimension_code'),
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
        echo "<title>武汉麻将-首页</title>
<meta name=\"keywords\" content=\"武汉麻将-首页\" />
<meta name=\"description\" content=\"武汉麻将-首页\" />
 ";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "<script>
    var errCode = ";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["code"]) ? $context["code"] : null), "html", null, true);
        echo ",lottery_times = ";
        echo twig_escape_filter($this->env, (isset($context["lottery_times"]) ? $context["lottery_times"] : null), "html", null, true);
        echo " ,token = \"";
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\",is_login=";
        echo twig_escape_filter($this->env, (isset($context["is_login"]) ? $context["is_login"] : null), "html", null, true);
        echo ";
</script>
<link href=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/index_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/choujiang.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/jieri.css\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.ext.js\" ></script>
<script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/md5.min.js\" ></script>
<script type=\"text/javascript\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/index.js\" ></script>
<script type=\"text/javascript\" src=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/mydialog.js\" ></script>
<script type=\"text/javascript\" src=\"";
        // line 20
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/lottery.js\" ></script>
";
    }

    // line 23
    public function block_two_dimension_code($context, array $blocks = array())
    {
        // line 24
        echo "<!--二维码-->
<div class=\"code_download\"><h5 class=\"dl\">武汉麻将二维码客户端下载</h5><img src=\"";
        // line 25
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/code_download.jpg\" /><h5 class=\"wx\">武汉麻将二维码微信扫一扫</h5><img src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/code_weixin.png\" /></div>

";
    }

    // line 29
    public function block_content($context, array $blocks = array())
    {
        // line 30
        echo "<div style=\"z-index: 99;display:none\" class=\"tck\" id=\"get_lottery\">
    <div class=\"tck_top\"><h3 class=\"congratulation\">恭喜您中奖！</h3><span class=\"close\" onclick=\"closeDialog('tck')\">关闭</span></div>
    <div class=\"tck_mid\">
        <p class=\"jp\">500金币</p>
        <p>立即<a href=\"/game/\">进入游戏</a>爽一下吧</p>
        <div class=\"modify_head_btn\"><input type=\"button\" onclick=\"closeDialog('tck')\" class=\"y_btn2\" value=\"继续抽奖\" id=\"\"><input type=\"button\" class=\"y_btn3\" value=\"分享微博\" id=\"\" onclick=\"wb_shared()\"><p class=\"note2\">每天首次分享微博可以获得3次抽奖机会</p></div>
    </div>
    <div class=\"tck_btm\"></div>
</div>

<div style=\"z-index: 99;display:none\" class=\"tck\" id=\"get_nothing\">
    <div class=\"tck_top\"><h3 class=\"xztx\">您的帐号抽奖次数不足</h3><span class=\"close\" onclick=\"closeDialog('tck')\">关闭</span></div>
    <div class=\"tck_mid\">
        <p>您可以<a href=\"/game/\">进入游戏</a>赢取更多抽奖机会！</p>
        <div class=\"modify_head_btn\"><input type=\"button\" onclick=\"closeDialog('tck')\" class=\"y_btn2\" value=\"确定\" id=\"\"></div>
    </div>
    <div class=\"tck_btm\"></div>
</div>

<div style=\"display:none; z-index:99\" class=\"tck\" id=\"get_real\">
    <div class=\"tck_top\"><h3 class=\"congratulation\">恭喜您中奖!</h3><span class=\"close\" onclick=\"closeDialog('tck')\">关闭</span></div>
    <div class=\"tck_mid\">
        <div id=\"jp_info\" style=\"display:\">
            <p class=\"jp\">您抽中了iPad mini2</p>
            <p>请填写联系方式，以便我们及时将奖励发给您</p>
            <form action=\"/lottery/fillinfo\" method=\"post\" id=\"fill_info\">
                <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"250\">
                    <tr>
                        <td height=\"40\" width=\"50\" valign=\"top\" align=\"center\">姓名</td>
                        <td width=\"200\" valign=\"top\"><input type=\"text\" name=\"name\" id=\"_name\" class=\"ipt\" /></td>
                    </tr>
                    <tr>
                        <td height=\"50\" valign=\"top\" align=\"center\">电话</td>
                        <td valign=\"top\" class=\"error\"><input type=\"text\" name=\"mobile\" id=\"_mobile\" class=\"ipt\" />
                        </td>
                    </tr>
                    <tr id=\"fill_address\">
                        <td height=\"50\" valign=\"top\" align=\"center\">地址</td>
                        <td valign=\"top\" class=\"error\">
                            <textarea cols=\"25\" rows=\"7\" name=\"address\" id=\"_address\"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td valign=\"top\" class=\"error\">
                        <span id=\"tip_name\" style=\"display:none\">请填写您的姓名</span>
                        <span id=\"tip_mobile\" style=\"display:none\">请填写正确的电话号码</span>
                        <span id=\"tip_address\" style=\"display:none\">请填写正确的地址</span>
                        </td>
                    </tr>
                </table>
            </form>
            <div class=\"modify_head_btn\"><input type=\"button\" onclick=\"sendinfo()\" class=\"y_btn2\" id=\"fill_btn\"  value=\"确定\" id=\"\"><input type=\"button\" onclick=\"wb_shared()\" class=\"y_btn3\" value=\"分享微博\" id=\"\"><p class=\"note2\">每天首次分享微博可以获得3次抽奖机会</p></div>
        </div>
        <p style=\"display:none; padding:50px 0\" id=\"tishi\">信息已成功提交，请等待客服与您联系</p><!--信息提交成功后，隐藏上面的div，显示本行文字提示-->
    </div>
    <div class=\"tck_btm\"></div>
</div>

<div class=\"pop-up-box\" style=\"display:none\"></div>
<div id=\"m_content\">
    <div class=\"notice\" style=\"left:185px;width: 605px;\">
        <marquee onMouseOver=\"this.stop()\" onMouseOut=\"this.start()\" scrolldelay=\"100\" scrollamount=\"3\">
            ";
        // line 93
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sysmessage"]) ? $context["sysmessage"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 94
            echo "            <a style = \"margin-left : 150px;\" href = \"javascript:;\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
            echo "</a>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo "        </marquee>
    </div>
    <div class=\"map\" style=\"display:none\"></div>
    <div class=\"bg1\">
        <img src=\"";
        // line 100
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/cj/lfbg.png\" class=\"lf_bg\" />
        <div class=\"cj\">
            <div class=\"jp_list\">
                <table border=\"0\" cellspacing=\"4\" cellpadding=\"0\">
                    <tr>
                        <td width=\"154\"><div class=\"jp_1\">500金币</div></td>
                        <td width=\"242\"><div class=\"jp_2\">iPad mini 2</div></td>
                        <td width=\"154\"><div class=\"jp_3\">20元充值卡</div></td>
                    </tr>
                    <tr>
                        <td><div class=\"jp_8\">10钻石</div></td>
                        <td style=\"position:relative\"><a href=\"javascript:;\" id=\"lottery_btn\" class=\"btn_cj\" style=\"text-indent:0\"><p class=\"sycs\">剩余";
        // line 111
        echo twig_escape_filter($this->env, (isset($context["lottery_times"]) ? $context["lottery_times"] : null), "html", null, true);
        echo "次</p></a></td>
                        <td><div class=\"jp_4\">100钻石</div></td>
                    </tr>
                    <tr>
                        <td><div class=\"jp_7\">10元充值卡</div></td>
                        <td><div class=\"jp_6\">5kg 有机大米</div></td>
                        <td><div class=\"jp_5\">2000金币</div></td>
                    </tr>
                </table>
            </div>
            <div class=\"btmbox\">
                <div class=\"lf\"><p>立即<a href=\"/game\">进入游戏</a>打满5局即可再获得一次赢取 iPad mini 2 的机会</p></div>
                <div class=\"rt\">
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
        <img src=\"";
        // line 129
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/cj/rtbg.png\" class=\"rt_bg\" />
    </div>
    <div class=\"index_rt\">

        <!--未登录 begin-->
        ";
        // line 134
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 0)) {
            // line 135
            echo "        <form action=\"user/login\" method=\"post\" id=\"loginform\" >
            <input type=\"hidden\" name=\"csrf_token\" value=\"";
            // line 136
            echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
            echo "\" />
            <table width=\"100%\" border=\"0\" cellspacing=\"9\" cellpadding=\"0\" class=\"login_box\">
                <tr>
                    <td width=\"72\" class=\"bold\" align=\"right\">用户名</td>
                    <td width=\"183\"><input type=\"text\" name=\"username\" id=\"username\" class=\"input_box\" /></td>
                </tr>
                <tr>
                    <td class=\"bold\" align=\"right\">密码</td>
                    <td><input type=\"password\" name=\"valid_password\" id=\"valid_password\" class=\"input_box\" /></td>
                   <input type=\"hidden\" name=\"password\" id=\"password\" class=\"input_box\" />
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td class=\"f12\"><input name=\"auto_login\" type=\"checkbox\" value=\"1\" class=\"checkbox\" /> <a href=\"javascript:;\">自动登录</a> <a href=\"/user/password\">忘记密码</a></td>
                </tr>
                <tr>
                    <td colspan=\"2\"><div class=\"pd_lf_1\"><a href=\"/user/signup\" class=\"register_btn\" >立即注册</a><input name=\"\" type=\"button\" value=\"登录\" class=\"login_btn\" onclick=\"login()\"/></div></td>
                </tr>
            </table>
            <div id=\"errorAlert\">* 用户名或密码错误</div>
        </form>
        <div class=\"login_2\">使用合作网站帐号直接登录<a href=\"/weibo/sina/login\"><img src=\"";
            // line 157
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/img/weibo.png\" width=\"19\" height=\"16\" /></a></div>
        <a href=\"/game\" class=\"playgame\">进入试玩</a>
        <a href=\"http://wuhanmj-apk.qiniudn.com/MjMobile_newbee.apk\" class=\"download\">下载手机客户端</a>
        <!--未登录 end-->
        ";
        }
        // line 162
        echo "
        ";
        // line 163
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 1)) {
            // line 164
            echo "        <!--已登录 begin-->
        <div class=\"user_info_index\">
            <h4>您好，";
            // line 166
            echo twig_escape_filter($this->env, (isset($context["nickname"]) ? $context["nickname"] : null), "html", null, true);
            echo "！</h4>
            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                <tr>
                    <td width=\"19%\">金币：</td>
                    <td colspan=\"3\"><i>";
            // line 170
            echo twig_escape_filter($this->env, (isset($context["coins"]) ? $context["coins"] : null), "html", null, true);
            echo "</i><a href=\"/payment/entrance\" class=\"ljcz\">立即充值</a></td>
                </tr>
                <tr>
                    <td>钻石：</td>
                    <td width=\"32%\" id=\"my_diamond\">";
            // line 174
            echo twig_escape_filter($this->env, (isset($context["diamond"]) ? $context["diamond"] : null), "html", null, true);
            echo "</td>
                    <td width=\"19%\" align=\"center\">&nbsp;</td>
                    <td width=\"30%\">&nbsp;</td>
                </tr>
                <tr>
                    <td>门票：</td>
                    <td>";
            // line 180
            echo twig_escape_filter($this->env, (isset($context["ticket"]) ? $context["ticket"] : null), "html", null, true);
            echo "</td>
                    <td align=\"center\">奖券：</td>
                    <td>";
            // line 182
            echo twig_escape_filter($this->env, (isset($context["coupon"]) ? $context["coupon"] : null), "html", null, true);
            echo "</td>
                </tr>
                <tr>
                    <td>胜率：</td>
                    <td>";
            // line 186
            echo twig_escape_filter($this->env, (isset($context["ratio"]) ? $context["ratio"] : null), "html", null, true);
            echo "</td>
                    <td align=\"center\">等级：</td>
                    <td>普通用户</td>
                </tr>
            </table>
        <!--    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                <tr>
                    <td width=\"19%\">金币：</td>
                    <td cospan=\"3\"><i>";
            // line 194
            echo twig_escape_filter($this->env, (isset($context["coins"]) ? $context["coins"] : null), "html", null, true);
            echo "</i><a href=\"/payment/entrance\" class=\"ljcz\">立即充值</a></td>
                </tr>
                <tr>
                    <td>钻石：</td>
                    <td width=\"32%\">123</td>
                    <td width=\"19%\" align=\"center\">&nbsp;</td>
                    <td width=\"30%\">&nbsp;</td>
                </tr>
                <tr>
                    <td>门票：</td>
                    <td>123</td>
                    <td align=\"center\">奖券：</td>
                    <td>123</td>
                </tr>
                <tr>
                    <td>胜率：</td>
                    <td>";
            // line 210
            echo twig_escape_filter($this->env, (isset($context["ratio"]) ? $context["ratio"] : null), "html", null, true);
            echo "</td>
                    <td align=\"center\">等级：</td>
                    <td>普通用户</td>
                </tr>
            </table>-->
            <a href=\"/userinfo\" style=\"float:left\">个人中心</a><a href=\"/user/logout\" class=\"fl_rt\">退出登录</a>

                    ";
            // line 217
            if (((isset($context["unread_messages"]) ? $context["unread_messages"] : null) > 0)) {
                // line 218
                echo "                          <span class=\"message\"> <b>";
                echo twig_escape_filter($this->env, (isset($context["unread_messages"]) ? $context["unread_messages"] : null), "html", null, true);
                echo "</b> </span>
                    ";
            } else {
                // line 220
                echo "                         <span class=\"message empty\"> <b></b> </span>
                    ";
            }
            // line 222
            echo "
        </div>
        <div class=\"start_btn_box\" style=\"display:none\">
            <a href=\"#\" class=\"y_btn\">开始红中发财杠</a><a href=\"#\" class=\"y_btn2\">开始癞子皮杠</a><a href=\"#\" class=\"g_btn\">包房</a>
        </div>
        <a href=\"/game\" class=\"playgame\">进入试玩</a>
        <a href=\"http://wuhanmj-apk.qiniudn.com/MjMobile_newbee.apk\" target=\"_blank\" class=\"download\">下载手机客户端</a>
        <!--已登录 end-->
        ";
        }
        // line 231
        echo "
        <div class=\"news_box\">
            <h3>最新公告</h3><a href=\"/activity/lists\" class=\"more\">查看更多>></a>
            <table width=\"200\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                ";
        // line 235
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["activity"]) ? $context["activity"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 236
            echo "                <tr>
                    <td width=\"165\"><a href=\"/activity/detail/";
            // line 237
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "</a></td>
                    <td width=\"35\">";
            // line 238
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "publish_time", array()), "html", null, true);
            echo "</td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 241
        echo "            </table>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  409 => 241,  400 => 238,  394 => 237,  391 => 236,  387 => 235,  381 => 231,  370 => 222,  366 => 220,  360 => 218,  358 => 217,  348 => 210,  329 => 194,  318 => 186,  311 => 182,  306 => 180,  297 => 174,  290 => 170,  283 => 166,  279 => 164,  277 => 163,  274 => 162,  266 => 157,  242 => 136,  239 => 135,  237 => 134,  229 => 129,  208 => 111,  194 => 100,  188 => 96,  179 => 94,  175 => 93,  110 => 30,  107 => 29,  98 => 25,  95 => 24,  92 => 23,  86 => 20,  82 => 19,  78 => 18,  74 => 17,  70 => 16,  66 => 15,  62 => 14,  58 => 13,  47 => 11,  44 => 10,  41 => 9,  34 => 4,  31 => 3,);
    }
}
