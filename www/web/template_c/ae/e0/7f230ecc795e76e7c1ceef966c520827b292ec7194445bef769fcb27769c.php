<?php

/* download.html */
class __TwigTemplate_aee07f230ecc795e76e7c1ceef966c520827b292ec7194445bef769fcb27769c extends Twig_Template
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
        echo "<!DOCTYPE html><!--[if IE 8]><html lang=\"zh-CN\" class=\"ie8\"><![endif]--><!--[if IE 9]><html lang=\"zh-CN\" class=\"ie9\"><![endif]--><!--[if !IE]><!--><html lang=\"zh-CN\"><!--<![endif]--><!-- BEGIN HEAD --><head><meta charset=\"utf-8\" /><title>游戏下载</title><meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\" /><meta name=\"Keywords\" content=\"游戏下载\" /><meta name=\"Description\" content=\"游戏下载\" /><meta name=\"CopyRight\" content=\"\" /><meta name=\"Author\" content=\"\" /><meta name=\"Build\" content=\"2014-07-25 16:16:07\" />
<link rel=\"start\" href=\"http://16youxi.com\" title=\"Home\" />
</head>
<body>
<!--<p id=\"WeiXin\" style=\"display:;\">亲，使用微信的用户，请点击右上角在浏览器中打开，就能下载了...</p>-->
";
        // line 6
        if ((isset($context["is_ios"]) ? $context["is_ios"] : null)) {
            // line 7
            echo "<p id=\"ios\" style=\"display:;\">IOS客户端我们正在加紧开发中，请您不要着急，先玩玩网页版吧!&nbsp;<a href=\"http://www.16youxi.com\" title=\"武汉麻将\">http://www.16youxi.com</a></p>
";
        }
        // line 9
        echo "<script>
";
        // line 10
        if ((isset($context["is_wx"]) ? $context["is_wx"] : null)) {
            // line 11
            echo "window.location = \"http://a.app.qq.com/o/simple.jsp?pkgname=com.youxi16.MjMobile\";
";
        } elseif ((isset($context["is_android"]) ? $context["is_android"] : null)) {
            // line 13
            echo "window.location = 'http://wuhanmj-apk.qiniudn.com/MjMobile_newbee.apk';
";
        }
        // line 15
        echo "</script>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "download.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 15,  41 => 13,  37 => 11,  35 => 10,  32 => 9,  28 => 7,  26 => 6,  19 => 1,);
    }
}
