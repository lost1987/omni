<?php

/* pay_prepare.html */
class __TwigTemplate_9dc575a806987c8d88317318592ba89aaa174f2e2f493e4181e80b0eeeb8725d extends Twig_Template
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

    // line 2
    public function block_seo($context, array $blocks = array())
    {
        // line 3
        echo "<title>武汉麻将-游戏充值</title>
<meta name=\"keywords\" content=\"武汉麻将-游戏充值\" />
<meta name=\"description\" content=\"武汉麻将-游戏充值\" />
";
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
        // line 8
        echo "<script>
    var pay_type = ";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["pay_type"]) ? $context["pay_type"] : null), "html", null, true);
        echo ";
</script>
<link href=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/common_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/index_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.ext.js\" ></script>
<script type=\"text/javascript\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/mydialog.js\" ></script>
<script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/prepare_pay.js\" ></script>
";
    }

    // line 20
    public function block_content($context, array $blocks = array())
    {
        // line 21
        echo "<!--pop-up note-->
<div class=\"pop-up-box\" style=\"display:none; height:1240px\"></div>
<form id=\"\">
    <div class=\"note\" style=\"display:none\" id=\"show_confirm\">
        <div class=\"note_top\">
            <span class=\"note_ico_2\"></span><span>确认充值</span><span class=\"close\" onclick=\"closeDialog('note')\"></span>
        </div>
        <div class=\"note_content\">
            <div class=\"note_content_mlf\">
                <p>您充值的用户名为：<span id=\"confirm_login_name\">";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["login_name"]) ? $context["login_name"] : null), "html", null, true);
        echo "</span></p>
                <p>您充值的金额为：<span id=\"confirm_rmb\">50元</span></p>
            </div>
            <input type=\"button\" onclick=\"go()\"  id=\"\" value=\"确认\" class=\"y_btn3\" />
        </div>
        <div class=\"note_btm\"></div>
    </div>
</form>
<div class=\"note\" id=\"show_complete\" style=\"display:none;\">
        <div class=\"note_top\">
            <span class=\"note_ico_1\"></span><span>等待用户确认</span><a href=\"/userinfo/\"><span class=\"close\"></span></a>
        </div>
        <div class=\"note_content\">
            <!--<p><br /><em>（用户名是登录游戏时使用的帐号）</em></p>-->
            <a href=\"/userinfo/\"><input type=\"button\" id=\"success\" class=\"y_btn3\" value=\"支付成功\"/></a>
            <a href=\"/service?pay_failed=1\"><input type=\"button\" id=\"faq\" value=\"支付遇到问题\" class=\"y_btn3\" /></a>
        </div>
        <div class=\"note_btm\"></div>
</div>

<!--content-->
<div id=\"m_content_2\">
    <h3><a href=\"/\"><em></em></a><b class=\"tgxx\">充值</b><i>充值流程： 1-选择充值方式  -->  2-根据要求填写信息  -->  3-充值成功，进入</i></h3>
    <div class=\"fsb_box\">
        <div class=\"fsb_top\"></div>
        <div class=\"fsb_m_lf\">
            <ul>
                <li class=\"on\">银行卡支付</li>
                <li>支付宝支付</li>
                <li>手机卡支付</li>
            </ul>
        </div>
        <div class=\"cz_m_rt\">
            <div class=\"cz_detail_box\">
                <form id=\"go_form\" action=\"/payment/go\" method=\"post\">
                <input type=\"hidden\" name=\"csrf_token\" id='token' value=\"";
        // line 65
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" />
                <input type=\"hidden\" name=\"pay_type\" id=\"pay_type\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, (isset($context["pay_type"]) ? $context["pay_type"] : null), "html", null, true);
        echo "\" />
                <h4>请填写需要充值的用户名</h4>
                <table width=\"90%\" border=\"0\" cellspacing=\"10\" cellpadding=\"0\">
                    <tr>
                        <td width=\"26%\" align=\"right\">用户名</td>
                        <td width=\"38%\"><input type=\"text\"  class=\"input\" name=\"login_name\" id=\"login_name\" value=\"";
        // line 71
        echo twig_escape_filter($this->env, (isset($context["login_name"]) ? $context["login_name"] : null), "html", null, true);
        echo "\" /></td>
                        <td width=\"36%\">用户名即游戏登录帐号</td>
                    </tr>
                    <tr>
                        <td align=\"right\">再次输入用户名</td>
                        <td colspan=\"2\"><input type=\"text\"  class=\"input\" id=\"tw_login_name\" value=\"";
        // line 76
        echo twig_escape_filter($this->env, (isset($context["login_name"]) ? $context["login_name"] : null), "html", null, true);
        echo "\" /></td>
                    </tr>
                </table>
                <h4>请选择您需要的金钻数量</h4>
                <div class=\"choose_jz\">
                    <ul>
                        ";
        // line 82
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["amount_types"]) ? $context["amount_types"] : null));
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
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 83
            echo "                             ";
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index", array()) == 1)) {
                // line 84
                echo "                                <li><input type=\"radio\" checked=\"checked\" class=\"radio\" name='amount_type' value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\" /><img src=\"";
                echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
                echo "/img/diamond/";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo ".jpg\" align=\"absmiddle\" /></li>
                             ";
            } else {
                // line 86
                echo "                                <li><input type=\"radio\" class=\"radio\" name='amount_type' value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\" /><img src=\"";
                echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
                echo "/img/diamond/";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo ".jpg\" align=\"absmiddle\" /></li>
                             ";
            }
            // line 88
            echo "                        ";
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        echo "                    </ul>
                </div>
                <a class=\"ljcz_btn\" href=\"javascript:;\" onclick=\"confirmPay()\">立即充值</a>
                </form>
            </div>
        </div>
        <div class=\"fsb_btm\"></div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "pay_prepare.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 89,  198 => 88,  188 => 86,  178 => 84,  175 => 83,  158 => 82,  149 => 76,  141 => 71,  133 => 66,  129 => 65,  91 => 30,  80 => 21,  77 => 20,  71 => 16,  67 => 15,  63 => 14,  59 => 13,  55 => 12,  51 => 11,  46 => 9,  43 => 8,  40 => 7,  33 => 3,  30 => 2,);
    }
}
