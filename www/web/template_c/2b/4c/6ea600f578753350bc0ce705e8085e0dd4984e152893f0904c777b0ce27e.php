<?php

/* pay_entrance.html */
class __TwigTemplate_2b4c6ea600f578753350bc0ce705e8085e0dd4984e152893f0904c777b0ce27e extends Twig_Template
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
        echo "<link href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/common_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
        // line 13
        echo "<!--content-->
<div id=\"m_content_2\">
    <h3><a href=\"/\"><em></em></a><b class=\"tgxx\">充值</b><i>充值流程： 1-选择充值方式  -->  2-根据要求填写信息  -->  3-充值成功，进入</i></h3>
    <div class=\"cz_box\">
        <ul>
            <li>
                <img src=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/yinlian.png\" class=\"yinlian\" /><p>如果您开通了网上银行支付业务，使用银行卡支付，快捷方便。</p><a href=\"/payment/prepare/0\">立即充值</a>
            </li>
            <li>
                <img src=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/zhifubao.png\" class=\"zhifubao\" /><p>您可以使用您的支付宝账户余额或网上银行进行支付，快捷方便。</p><a href=\"/payment/prepare/1\">立即充值</a>
            </li>
            <li style=\"margin:0\">
                <img src=\"";
        // line 25
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/shoujizhifu.png\" class=\"shoujizhifu\" /><p>支持移动、联通、电信充值卡充值。大众话的充值方式，快捷方便。</p><a href=\"/payment/prepare/2\">立即充值</a>
            </li>
        </ul>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "pay_entrance.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 25,  71 => 22,  65 => 19,  57 => 13,  54 => 12,  48 => 9,  43 => 8,  40 => 7,  33 => 3,  30 => 2,);
    }
}
