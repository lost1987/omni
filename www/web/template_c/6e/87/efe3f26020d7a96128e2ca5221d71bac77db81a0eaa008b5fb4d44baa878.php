<?php

/* base.html */
class __TwigTemplate_6e87efe3f26020d7a96128e2ca5221d71bac77db81a0eaa008b5fb4d44baa878 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'seo' => array($this, 'block_seo'),
            'head' => array($this, 'block_head'),
            'two_dimension_code' => array($this, 'block_two_dimension_code'),
            'top' => array($this, 'block_top'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    ";
        // line 5
        $this->displayBlock('seo', $context, $blocks);
        // line 7
        echo "    <link rel=\"shortcut icon\" href=\"/img/logo.ico\" id=\"mj_ico\" />
    <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/common_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
    <script type=\"text/javascript\" src=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.min.js \" ></script>
    <script>
        var cur_navigator = \"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["navigator"]) ? $context["navigator"] : null), "html", null, true);
        echo "\";
    </script>
    <script type=\"text/javascript\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/navigator.js \"></script>
    ";
        // line 14
        $this->displayBlock('head', $context, $blocks);
        // line 16
        echo "</head>

<body>

";
        // line 20
        $this->displayBlock('two_dimension_code', $context, $blocks);
        // line 23
        echo "
<!--top-->
";
        // line 25
        $this->displayBlock('top', $context, $blocks);
        // line 40
        echo "<!--content-->
";
        // line 41
        $this->displayBlock('content', $context, $blocks);
        // line 43
        echo "<!--foot-->
<script type=\"text/javascript\">var cnzz_protocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");document.write(unescape(\"%3Cspan id='cnzz_stat_icon_1252989929'%3E%3C/span%3E%3Cscript src='\" + cnzz_protocol + \"s19.cnzz.com/z_stat.php%3Fid%3D1252989929' type='text/javascript'%3E%3C/script%3E\"));document.getElementById('cnzz_stat_icon_1252989929').style.display = 'none';</script>
<span id=\"cnzz_stat_icon_1252989929\" style=\"display: none;\"><a href=\"http://www.cnzz.com/stat/website.php?web_id=1252989929\" target=\"_blank\" title=\"站长统计\">站长统计</a></span>
<script src=\" http://s19.cnzz.com/z_stat.php?id=1252989929\" type=\"text/javascript\"></script>
<script src=\"http://c.cnzz.com/core.php?web_id=1252989929&amp;t=z\" charset=\"utf-8\" type=\"text/javascript\"></script>
<div id=\"foot\">
    <p>抵制不良游戏&nbsp;拒绝盗版游戏&nbsp;注意自我保护&nbsp;谨防受骗上当&nbsp;适度游戏益脑&nbsp;沉迷游戏伤身&nbsp;合理安排时间&nbsp;享受健康生活</p>
    <p>版权所有 武汉新蜂乐众网络技术有限公司<img align=\"absmiddle\" style=\"vertical-align: -1px; margin-left: 5px\" src=\"";
        // line 50
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/newbee.png\"><a target=\"_blank\" href=\"http://www.miitbeian.gov.cn/\">ICP：鄂ICP备14001438号</a><img width=\"30\" style=\"vertical-align: -7px; margin-right:-5px\" src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/gameRFID.png\"><a target=\"_blank\" href=\"http://182.131.21.137/ccnt-apply/admin/business/preview/business-preview!lookUrlRFID.action?main_id=36415BBF7D7B4CBB9D6DEE27E3152CA5\">鄂网文【2014】1195-014</a><a href=\"http://webscan.360.cn/index/checkwebsite/url/16youxi.com\"><img border=\"0\" src=\"http://img.webscan.360.cn/status/pai/hash/1449514117216e332f1037572ba7e2e4\" width=\"70\"/></a></p>
    <!--<p><a href=\"#\">首页</a><a href=\"#\">关于我们</a><a href=\"#\">微信XXXXX</a><a href=\"#\">新浪微博XXX</a><a href=\"#\">腾讯微博XXX</a></p>-->
</div>
</body>
</html>
";
    }

    // line 5
    public function block_seo($context, array $blocks = array())
    {
        // line 6
        echo "    ";
    }

    // line 14
    public function block_head($context, array $blocks = array())
    {
        // line 15
        echo "    ";
    }

    // line 20
    public function block_two_dimension_code($context, array $blocks = array())
    {
        // line 21
        echo "<!--二维码-->
";
    }

    // line 25
    public function block_top($context, array $blocks = array())
    {
        // line 26
        echo "<div id=\"top\">
    <h1 class=\"logo\">武汉麻将</h1>
    <div class=\"nav\">
        <a href=\"";
        // line 29
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "\">主页</a>|
        <a href=\"";
        // line 30
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/match\"><span class=\"hot2\"><b>1</b></span>比赛</a>|
        <a href=\"";
        // line 31
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/activity\">最新活动</a>|
        <a href=\"";
        // line 32
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/rank\">封神榜</a>|
        <a href=\"";
        // line 33
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/introduce\">游戏规则</a>|
        <a href=\"";
        // line 34
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/store\">道具商城</a>|
        <a href=\"";
        // line 35
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/service\">客户服务</a>|
        <a href=\"";
        // line 36
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/aboutus\">关于我们</a>
    </div>
</div>
";
    }

    // line 41
    public function block_content($context, array $blocks = array())
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
        return array (  161 => 41,  153 => 36,  149 => 35,  145 => 34,  141 => 33,  137 => 32,  133 => 31,  129 => 30,  125 => 29,  120 => 26,  117 => 25,  112 => 21,  109 => 20,  105 => 15,  102 => 14,  98 => 6,  95 => 5,  83 => 50,  74 => 43,  72 => 41,  69 => 40,  67 => 25,  63 => 23,  61 => 20,  55 => 16,  53 => 14,  49 => 13,  44 => 11,  39 => 9,  35 => 8,  32 => 7,  30 => 5,  24 => 1,);
    }
}
