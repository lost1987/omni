<?php

/* game_login.html */
class __TwigTemplate_44e6da6c5c2cf1b70c8ff80040423f72260d38d22ed7fc0f850c55a48ee8757c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<title>武汉麻将-进入游戏</title>
    <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/game_login.css\" rel=\"stylesheet\" type=\"text/css\" />
    <script type=\"text/javascript\" src=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.min.js\" ></script>
    <script type=\"text/javascript\" src=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.ext.js\" ></script>
    <script type=\"text/javascript\" src=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/md5.min.js\" ></script>
    <script type=\"text/javascript\">
        var errcode = ";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["errcode"]) ? $context["errcode"] : null), "html", null, true);
        echo ";
    </script>
    <script type=\"text/javascript\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/game_login.js\" ></script>
</head>

<body>
<div class=\"loginBox\">
\t<div class=\"loginIptBox\">
        <form action = '/user/login' method=\"post\" id=\"game_login_form\">
        <input type=\"hidden\" name=\"game_login\" value=\"1\" />
        <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" />
        <input id=\"username\" name=\"username\" class=\"loginIpt\" type=\"text\" value=\"请输入账号\" />
        <input id=\"password\" name=\"password\" class=\"loginIpt\" type=\"text\" value=\"请输入对应密码\" />
        </form>
    </div>
    <div class=\"note\" style=\"display:none\">账号或密码错误</div>
    <label class=\"loginSelt\"><input type=\"checkbox\" class=\"s\" value=\"1\" name=\"auto_login\" /> 自动登录</label>
    <div class=\"loginBtnBox\">
    \t<a href=\"/weibo/sina/login/game\" class=\"loginSina\">新浪微博登录</a>
        <input id=\"\" class=\"loginGame\" type=\"button\" value=\"\" onclick=\"dologin()\"/>
    </div>
    <a href=\"/user/password\" class=\"a1\">忘记密码？</a><a href=\"/user/signup\" class=\"a2\">新用户注册>></a>
</div>
<div id=\"gamepage_foot\" style=\"display:\">
\t<p><span>武汉麻将QQ群：129166897<a target=\"_blank\" href=\"http://shang.qq.com/wpa/qunwpa?idkey=cccb0ff5e146f7ad2f26d700d1b1fa3a24bc82bdb115c6833bcb47bba52de14f\" class=\"addqq\"><img src=\"img/addqq.png\" border=\"0\" alt=\"武汉麻将班子\" title=\"武汉麻将班子\" /></a></span>|<a href=\"/payment/entrance\" target=\"_blank\">充值</a>|<a href=\"/introduce\" target=\"_blank\">游戏规则</a>|<a href=\"/introduce\">比赛规则</a>|<a href=\"/userinfo\" target=\"_blank\">帐户信息</a>|<a href=\"http://weibo.com/u/5076807387\" target=\"_blank\">微博</a></p><p>版权所有&nbsp;&nbsp;新蜂乐众网络技术有限公司&nbsp;<img src=\"img/logo_small.png\" style=\"vertical-align:-1px\" />&nbsp;&nbsp;ICP:鄂ICP备14001438号</p>
</div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "game_login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  48 => 13,  43 => 11,  38 => 9,  34 => 8,  30 => 7,  26 => 6,  19 => 1,);
    }
}
