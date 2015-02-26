<?php

/* base.html */
class __TwigTemplate_c20c73875196b4138f9f6a693d32017d04a509327c1b363f7350da9aa51923a5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html class=\"no-js\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>武汉新蜂乐众推广系统</title>
    <meta name=\"description\" content=\"\">
    <meta name=\"keywords\" content=\"index\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\">
    <meta name=\"renderer\" content=\"webkit\">
    <meta http-equiv=\"Cache-Control\" content=\"no-siteapp\" />
    <!--<link rel=\"icon\" type=\"image/png\" href=\"\">-->
    <!--<link rel=\"apple-touch-icon-precomposed\" href=\"\">-->
    <meta name=\"apple-mobile-web-app-title\" content=\"Amaze UI\" />
    <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/css/amazeui.min.css\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/css/admin.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/css/app.css\">
    ";
        // line 18
        $this->displayBlock('css', $context, $blocks);
        // line 19
        echo "</head>
<body>
<!--[if lte IE 9]>
<p class=\"browsehappy\">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href=\"http://browsehappy.com/\" target=\"_blank\">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class=\"am-topbar admin-header\" data-am-sticky>
    <div class=\"am-topbar-brand\">
        <strong>武汉新蜂乐众</strong> <small>推广系统</small>
    </div>

    <button class=\"am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only\" data-am-collapse=\"{target: '#topbar-collapse'}\"><span class=\"am-sr-only\">导航切换</span> <span class=\"am-icon-bars\"></span></button>

    <div class=\"am-collapse am-topbar-collapse\" id=\"topbar-collapse\">

        <ul class=\"am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list\">
            <!--<li><a href=\"javascript:;\"><span class=\"am-icon-envelope-o\"></span> 收件箱 <span class=\"am-badge am-badge-warning\">5</span></a></li>-->
            <li class=\"am-dropdown\" data-am-dropdown>
                <a class=\"am-dropdown-toggle\" data-am-dropdown-toggle href=\"javascript:;\">
                    <span class=\"am-icon-users\"></span> ";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "email", array()), "html", null, true);
        echo " <span class=\"am-icon-caret-down\"></span>
                </a>
                <ul class=\"am-dropdown-content\">
                    <li><a href=\"#\"><span class=\"am-icon-user\"></span> 资料</a></li>
                    <li><a href=\"#\"><span class=\"am-icon-cog\"></span> 设置</a></li>
                    <li><a href=\"#\"><span class=\"am-icon-power-off\"></span> 退出</a></li>
                </ul>
            </li>
            <li><a href=\"javascript:;\" id=\"admin-fullscreen\"><span class=\"am-icon-arrows-alt\"></span> <span class=\"admin-fullText\">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class=\"am-cf admin-main\">
<!-- sidebar start -->
    <div class=\"admin-sidebar\">
        <ul class=\"am-list admin-sidebar-list\">
           ";
        // line 56
        echo (isset($context["navigator"]) ? $context["navigator"] : null);
        echo "
        </ul>

        <div class=\"am-panel am-panel-default admin-sidebar-panel\">
            <div class=\"am-panel-bd\">
                <p><span class=\"am-icon-bookmark\"></span> 公告</p>
                <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
            </div>
        </div>

        <div class=\"am-panel am-panel-default admin-sidebar-panel\">
            <div class=\"am-panel-bd\">
                <p><span class=\"am-icon-tag\"></span> wiki</p>
                <p>Welcome to the Amaze UI wiki!</p>
            </div>
        </div>
    </div>
<!-- sidebar end -->
    <div class=\"admin-content\">
        ";
        // line 75
        $this->displayBlock('content', $context, $blocks);
        // line 77
        echo "    </div>

</div>

<div data-am-widget=\"gotop\" class=\"am-gotop am-gotop-fixed\">
    <a href=\"#top\" title=\"回到顶部\" class=\"\">
        <i class=\"am-gotop-icon am-icon-hand-o-up\"></i>
    </a>
</div>

<!--alert window-->
<div class=\"am-modal am-modal-alert\" tabindex=\"-1\" id=\"error-alert\">
    <div class=\"am-modal-dialog\">
        <div class=\"am-modal-hd\" id=\"alert-title\"></div>
        <div class=\"am-modal-bd\" id=\"alert-msg\">
        </div>
        <div class=\"am-modal-footer\">
            <span class=\"am-modal-btn\">确定</span>
        </div>
    </div>
</div>

<!--confirm window-->
<div class=\"am-modal am-modal-confirm\" tabindex=\"-1\" id=\"confirm-alert\">
    <div class=\"am-modal-dialog\">
        <div class=\"am-modal-hd\" id=\"confirm-title\"></div>
        <div class=\"am-modal-bd\" id=\"confirm-content\">
        </div>
        <div class=\"am-modal-footer\">
            <span class=\"am-modal-btn\" id=\"confirm-btn-no\">取消</span>
            <span class=\"am-modal-btn\" id=\"confirm-btn-yes\">确定</span>
        </div>
    </div>
</div>

<footer>
    <hr>
    <p class=\"am-padding-left\">© 2014 武汉新蜂乐众网络技术有限公司</p>
</footer>

<!--[if lt IE 9]>
<script src=\"";
        // line 118
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/js/jquery.min.js\"></script>
<script src=\"http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js\"></script>
<script src=\"";
        // line 120
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/js/polyfill/rem.min.js\"></script>
<script src=\"";
        // line 121
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/js/polyfill/respond.min.js\"></script>
<script src=\"";
        // line 122
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/js/amazeui.legacy.js\"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src=\"";
        // line 126
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/js/jquery.min.js\"></script>
<script src=\"";
        // line 127
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/js/amazeui.min.js\"></script>
<script src=\"";
        // line 128
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/amazeui.extend.js\" type=\"text/javascript\"></script>
<!--<![endif]-->
<script src=\"";
        // line 130
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/js/app.js\"></script>
<script>
    \$(function(){
        \$(window).on('resize',function(){
            \$.fill_screen();
        });

        \$(window).trigger('resize');

        //初始化导航事件
        \$(\".usable\").click(function(){
            var __this = \$(this);
            var url = __this.attr('rel');

            \$.iAjax(url,'',function(data){
                \$(\".admin-content\").html(data);
            });
        });
    });
</script>
<!--在Amazeui加载后加载的脚本放在这里-->
";
        // line 151
        $this->displayBlock('script', $context, $blocks);
        // line 153
        echo "</body>
</html>
";
    }

    // line 18
    public function block_css($context, array $blocks = array())
    {
    }

    // line 75
    public function block_content($context, array $blocks = array())
    {
        // line 76
        echo "        ";
    }

    // line 151
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 151,  234 => 76,  231 => 75,  226 => 18,  220 => 153,  218 => 151,  194 => 130,  189 => 128,  185 => 127,  181 => 126,  174 => 122,  170 => 121,  166 => 120,  161 => 118,  118 => 77,  116 => 75,  94 => 56,  74 => 39,  52 => 19,  22 => 1,  50 => 18,  46 => 17,  42 => 16,  38 => 15,  31 => 4,  28 => 3,);
    }
}
