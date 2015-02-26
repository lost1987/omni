<?php

/* header.html */
class __TwigTemplate_7a76e050108c36149d7e4b074b822dcac2bf0db2eb71f0686b4f3021cfc574b6 extends Twig_Template
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
        echo "<nav class=\"navbar navbar-default topNav\" role=\"navigation\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"/\"><img src=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/images/logo.png\" alt=\"\"></a>
        </div>
        <div id=\"navbar\" class=\"navbar-collapse collapse\">
            ";
        // line 13
        if ((((isset($context["index"]) ? $context["index"] : null) == 0) && ((isset($context["is_login"]) ? $context["is_login"] : null) == 0))) {
            // line 14
            echo "            <a name=\"tops\"></a>
            <ul class=\"nav navbar-nav\">
                <li><a href=\"javascript:;\" id=\"login\">登陆</a>
                    <div class=\"loginPannel\" id=\"loginPannel\">
                        <form role=\"form\" action=\"/user/login\" method=\"post\" id=\"loginingForm\">
                            <div class=\"form-group mbn\">
                                <div class=\"input-group\">
                                    <span class=\"input-group-addon\"><span class=\"icon icon-user\"></span></span>
                                    <input type=\"text\" class=\"form-control\" id=\"login_name\" placeholder=\"请输入账号/邮箱/手机号\">
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <div class=\"input-group\">
                                    <span class=\"input-group-addon\"><span class=\"icon icon-lock\"></span></span>
                                    <input type=\"password\" class=\"form-control\" id=\"temp_password\" placeholder=\"请输入密码\">
                                </div>
                            </div>
                            <p class=\"text-right font12\">
                                没有账号？<a href=\"/user/signup\" class=\"text-blue\">立即注册></a>
                            </p>
                            <button style=\"width:160px;margin-left:50px;\" type=\"button\" class=\"btn btn-block btn-lg btn-warning\" onclick=\"loginAjax()\">登&nbsp;&nbsp;陆</button>
                        </form>
                    </div>
                </li>
                <li><a href=\"/user/signup\">注册</a></li>
            </ul>
            <script src=\"";
            // line 40
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/js/common/md5.min.js\"></script>
            <script>
                function loginAjax(){
                      var login_name =   \$(\"#login_name\").val();
                      var password = \$(\"#temp_password\").val();

                      if(login_name != '' || password != ''){
                          \$.post('/user/loginWithAjax','login_name='+login_name+'&password='+md5(password),function(data){
                              data = \$.parseJson(data);
                              if(data != 'error'){
                                    window.location.reload();
                              }
                          })
                          return;
                      }
                      \$.alert('请输入用户名和密码');
                }
            </script>
            ";
        }
        // line 59
        echo "            <ul class=\"nav navbar-nav\">
                ";
        // line 60
        if ((isset($context["is_login"]) ? $context["is_login"] : null)) {
            // line 61
            echo "                <li><a href=\"/userinfo\"><span class=\"text-org\">";
            echo twig_escape_filter($this->env, (isset($context["nickname"]) ? $context["nickname"] : null), "html", null, true);
            echo "</span> 您好！</a></li>
                <li><a href=\"/game/enter\"><span class=\"text-blue\">进入游戏</span></a></li>
                <li><a href=\"/user/logout\"><span class=\"text-blue\">退出</span></a></li>
                ";
        }
        // line 65
        echo "            </ul>
            <ul class=\"nav navbar-nav navbar-right\">
                <li class=\"active\"><a href=\"/\">首页</a></li>
                <li><a href=\"/service\">客服</a></li>
                <li><a href=\"/store\">商城</a></li>
                <li><a href=\"/payment/prepare/0\">充值</a></li>
                <li><a href=\"";
        // line 71
        echo twig_escape_filter($this->env, twig_constant("UAD_HOST"), "html", null, true);
        echo "\">去赚钱</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 71,  101 => 65,  93 => 61,  91 => 60,  88 => 59,  66 => 40,  38 => 14,  36 => 13,  30 => 10,  19 => 1,);
    }
}
