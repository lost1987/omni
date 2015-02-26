<?php

/* login.html */
class __TwigTemplate_01cc460f0f5209d3e86fd51862954908050f9fe43ad0a99042e8e590ee5296eb extends Twig_Template
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
        echo "<!DOCTYPE html>

<!--[if IE 8]> <html lang=\"en\" class=\"ie8\"> <![endif]-->

<!--[if IE 9]> <html lang=\"en\" class=\"ie9\"> <![endif]-->

<!--[if !IE]><!--> <html lang=\"en\"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

\t<meta charset=\"utf-8\" />

\t<title>麻将游戏GMS管理系统</title>

\t<meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\" />

\t<meta content=\"\" name=\"description\" />

\t<meta content=\"\" name=\"author\" />

\t<!-- BEGIN GLOBAL MANDATORY STYLES -->

\t<link href=\"media/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\"/>

\t<link href=\"media/css/bootstrap-responsive.min.css\" rel=\"stylesheet\" type=\"text/css\"/>

\t<link href=\"media/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\"/>

\t<link href=\"media/css/style-metro.css\" rel=\"stylesheet\" type=\"text/css\"/>

\t<link href=\"media/css/style.css\" rel=\"stylesheet\" type=\"text/css\"/>

\t<link href=\"media/css/style-responsive.css\" rel=\"stylesheet\" type=\"text/css\"/>

\t<link href=\"media/css/default.css\" rel=\"stylesheet\" type=\"text/css\" id=\"style_color\"/>

\t<link href=\"media/css/uniform.default.css\" rel=\"stylesheet\" type=\"text/css\"/>

\t<!-- END GLOBAL MANDATORY STYLES -->

\t<!-- BEGIN PAGE LEVEL STYLES -->

\t<link href=\"media/css/login.css\" rel=\"stylesheet\" type=\"text/css\"/>

\t<!-- END PAGE LEVEL STYLES -->

\t<link rel=\"shortcut icon\" href=\"media/image/favicon.ico\" />

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class=\"login\">

\t<!-- BEGIN LOGO -->

\t<div class=\"logo\">

\t\t<img src=\"media/image/logo-big.png\" alt=\"\" /> 

\t</div>

\t<!-- END LOGO -->

\t<!-- BEGIN LOGIN -->

\t<div class=\"content\">

\t\t<!-- BEGIN LOGIN FORM -->

\t\t<form class=\"form-vertical login-form\" action=\"/login\" method=\"post\">

\t\t\t<h3 class=\"form-title\">新蜂麻将-GMS管理系统</h3>

\t\t\t<div class=\"alert alert-error hide\">

\t\t\t\t<button class=\"close\" data-dismiss=\"alert\"></button>

\t\t\t\t<span>请输入账号密码</span>

\t\t\t</div>

\t\t\t<div class=\"control-group\">

\t\t\t\t<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

\t\t\t\t<label class=\"control-label visible-ie8 visible-ie9\">账号</label>

\t\t\t\t<div class=\"controls\">

\t\t\t\t\t<div class=\"input-icon left\">

\t\t\t\t\t\t<i class=\"icon-user\"></i>

\t\t\t\t\t\t<input class=\"m-wrap placeholder-no-fix\" type=\"text\" placeholder=\"账号\" id=\"username\" name=\"username\"/>

\t\t\t\t\t</div>

\t\t\t\t</div>

\t\t\t</div>

\t\t\t<div class=\"control-group\">

\t\t\t\t<label class=\"control-label visible-ie8 visible-ie9\">密码</label>

\t\t\t\t<div class=\"controls\">

\t\t\t\t\t<div class=\"input-icon left\">

\t\t\t\t\t\t<i class=\"icon-lock\"></i>

\t\t\t\t\t\t<input class=\"m-wrap placeholder-no-fix\" type=\"password\" placeholder=\"密码\" id=\"password\" name=\"password\"/>

\t\t\t\t\t</div>

\t\t\t\t</div>

\t\t\t</div>

\t\t\t<div class=\"form-actions\">

\t\t\t\t<label class=\"checkbox\">

\t\t\t\t<input type=\"checkbox\" name=\"remember\" value=\"1\"/> 记住我

\t\t\t\t</label>

\t\t\t\t<button type=\"submit\" class=\"btn green pull-right\">

\t\t\t\t登录 <i class=\"m-icon-swapright m-icon-white\"></i>

\t\t\t\t</button>            

\t\t\t</div>

\t\t</form>

\t\t<!-- END LOGIN FORM -->        
\t</div>

\t<!-- END LOGIN -->

\t<!-- BEGIN COPYRIGHT -->

\t<div class=\"copyright\">

\t\t2014 &copy; 新蜂[newbee]

\t</div>

\t<!-- END COPYRIGHT -->

\t<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

\t<!-- BEGIN CORE PLUGINS -->

\t<script src=\"media/js/jquery-1.10.1.min.js\" type=\"text/javascript\"></script>

\t<script src=\"media/js/jquery-migrate-1.2.1.min.js\" type=\"text/javascript\"></script>

\t<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

\t<script src=\"media/js/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>      

\t<script src=\"media/js/bootstrap.min.js\" type=\"text/javascript\"></script>

\t<!--[if lt IE 9]>

\t<script src=\"media/js/excanvas.min.js\"></script>

\t<script src=\"media/js/respond.min.js\"></script>  

\t<![endif]-->   

\t<script src=\"media/js/jquery.slimscroll.min.js\" type=\"text/javascript\"></script>

\t<script src=\"media/js/jquery.blockui.min.js\" type=\"text/javascript\"></script>  

\t<script src=\"media/js/jquery.cookie.min.js\" type=\"text/javascript\"></script>

\t<script src=\"media/js/jquery.uniform.min.js\" type=\"text/javascript\" ></script>

    <script src=\"media/js/md5.min.js\" type=\"text/javascript\" ></script>

\t<!-- END CORE PLUGINS -->

\t<!-- BEGIN PAGE LEVEL PLUGINS -->

\t<script src=\"media/js/jquery.validate.min.js\" type=\"text/javascript\"></script>

\t<!-- END PAGE LEVEL PLUGINS -->

\t<!-- BEGIN PAGE LEVEL SCRIPTS -->

\t<script src=\"media/js/app.js\" type=\"text/javascript\"></script>

\t<script src=\"media/js/private/login.js\" type=\"text/javascript\"></script>

\t<!-- END PAGE LEVEL SCRIPTS --> 

\t<script>
        var error_msg = \"";
        // line 207
        echo twig_escape_filter($this->env, (isset($context["msg"]) ? $context["msg"] : null), "html", null, true);
        echo "\";

\t\tjQuery(document).ready(function() {     

\t\t  App.init();

\t\t  Login.init();

          if(error_msg != ''){
              \$('.alert-error').find('span').html('密码错误!');
              \$(\".alert-error\").show();
          }
\t\t});

\t</script>

</html>";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 207,  19 => 1,);
    }
}
