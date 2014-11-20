<?php

/* base.html */
class __TwigTemplate_d6828883b126fb30ee97f66b74ca14213f407505abbc48bb207966a3763cd9d8 extends Twig_Template
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
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/common_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
    <script type=\"text/javascript\" src=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.min.js \" ></script>
    <script>
        var cur_navigator = \"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["navigator"]) ? $context["navigator"] : null), "html", null, true);
        echo "\";
    </script>
    <script type=\"text/javascript\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/navigator.js \"></script>
    ";
        // line 13
        $this->displayBlock('head', $context, $blocks);
        // line 15
        echo "</head>

<body>

";
        // line 19
        $this->displayBlock('two_dimension_code', $context, $blocks);
        // line 22
        echo "
<!--top-->
";
        // line 24
        $this->displayBlock('top', $context, $blocks);
        // line 38
        echo "<!--content-->
";
        // line 39
        $this->displayBlock('content', $context, $blocks);
        // line 41
        echo "<!--foot-->
<script type=\"text/javascript\">var cnzz_protocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");document.write(unescape(\"%3Cspan id='cnzz_stat_icon_1252989929'%3E%3C/span%3E%3Cscript src='\" + cnzz_protocol + \"s19.cnzz.com/z_stat.php%3Fid%3D1252989929' type='text/javascript'%3E%3C/script%3E\"));document.getElementById('cnzz_stat_icon_1252989929').style.display = 'none';</script>
<span id=\"cnzz_stat_icon_1252989929\" style=\"display: none;\"><a href=\"http://www.cnzz.com/stat/website.php?web_id=1252989929\" target=\"_blank\" title=\"站长统计\">站长统计</a></span>
<script src=\" http://s19.cnzz.com/z_stat.php?id=1252989929\" type=\"text/javascript\"></script>
<script src=\"http://c.cnzz.com/core.php?web_id=1252989929&amp;t=z\" charset=\"utf-8\" type=\"text/javascript\"></script>
<div id=\"foot\">
    <p>抵制不良游戏&nbsp;拒绝盗版游戏&nbsp;注意自我保护&nbsp;谨防受骗上当&nbsp;适度游戏益脑&nbsp;沉迷游戏伤身&nbsp;合理安排时间&nbsp;享受健康生活</p>
    <p>版权所有 武汉新蜂乐众网络技术有限公司<img align=\"absmiddle\" style=\"vertical-align: -1px; margin-left: 5px\" src=\"";
        // line 48
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/logo_small.png\"><a target=\"_blank\" href=\"http://www.miitbeian.gov.cn/\">ICP：鄂ICP备14001438号</a><img width=\"30\" style=\"vertical-align: -7px; margin-right:-5px\" src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/gameRFID.png\"><a target=\"_blank\" href=\"http://182.131.21.137/ccnt-apply/admin/business/preview/business-preview!lookUrlRFID.action?main_id=36415BBF7D7B4CBB9D6DEE27E3152CA5\">鄂网文【2014】1195-014</a></p>
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

    // line 13
    public function block_head($context, array $blocks = array())
    {
        // line 14
        echo "    ";
    }

    // line 19
    public function block_two_dimension_code($context, array $blocks = array())
    {
        // line 20
        echo "<!--二维码-->
";
    }

    // line 24
    public function block_top($context, array $blocks = array())
    {
        // line 25
        echo "<div id=\"top\">
    <h1 class=\"logo\">武汉麻将</h1>
    <div class=\"nav\">
        <a href=\"";
        // line 28
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "\">主页</a>|
        <a href=\"";
        // line 29
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/activity\">最新活动</a>|
        <a href=\"";
        // line 30
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/rank\">封神榜</a>|
        <a href=\"";
        // line 31
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/introduce\">游戏规则</a>|
        <a href=\"";
        // line 32
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/store\">道具商城</a>|
        <a href=\"";
        // line 33
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/service\">客户服务</a>|
        <a href=\"";
        // line 34
        echo twig_escape_filter($this->env, twig_constant("BASE_HOST"), "html", null, true);
        echo "/aboutus\">关于我们</a>
    </div>
</div>
";
    }

    // line 39
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
        return array (  155 => 39,  147 => 34,  143 => 33,  139 => 32,  135 => 31,  131 => 30,  127 => 29,  123 => 28,  118 => 25,  115 => 24,  103 => 14,  100 => 13,  96 => 6,  93 => 5,  81 => 48,  72 => 41,  67 => 38,  65 => 24,  61 => 22,  59 => 19,  53 => 15,  51 => 13,  42 => 10,  37 => 8,  32 => 7,  30 => 5,  24 => 1,  408 => 240,  399 => 237,  393 => 236,  390 => 235,  386 => 234,  380 => 230,  369 => 221,  365 => 219,  359 => 217,  357 => 216,  347 => 209,  328 => 193,  317 => 185,  310 => 181,  305 => 179,  296 => 173,  289 => 169,  282 => 165,  278 => 163,  276 => 162,  273 => 161,  265 => 156,  242 => 136,  239 => 135,  237 => 134,  229 => 129,  208 => 111,  194 => 100,  188 => 96,  179 => 94,  175 => 93,  110 => 20,  107 => 19,  98 => 25,  95 => 24,  92 => 23,  86 => 20,  82 => 19,  78 => 18,  74 => 17,  70 => 39,  66 => 15,  62 => 14,  58 => 13,  47 => 12,  44 => 10,  41 => 9,  34 => 4,  31 => 3,);
    }
}
