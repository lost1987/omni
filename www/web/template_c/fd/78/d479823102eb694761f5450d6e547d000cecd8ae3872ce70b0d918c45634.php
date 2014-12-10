<?php

/* game.html */
class __TwigTemplate_fd78d479823102eb694761f5450d6e547d000cecd8ae3872ce70b0d918c45634 extends Twig_Template
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
        echo "<!doctype html>
<html lang=\"zh\">
<head>
\t<meta charset=\"UTF-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" >
\t<meta name=\"description\" content=\"\" />
\t<title>武汉麻将</title>
    <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.min.js?";
        echo twig_escape_filter($this->env, (isset($context["version"]) ? $context["version"] : null), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/swfobject.js?";
        echo twig_escape_filter($this->env, (isset($context["version"]) ? $context["version"] : null), "html", null, true);
        echo "\"></script>
\t<!--<script src=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["STATIC_URL"]) ? $context["STATIC_URL"] : null), "html", null, true);
        echo "js/check_browser_close.js\"></script>-->
    <style type=\"text/css\" media=\"screen\">
                        body { margin:0; text-align:center; background-color:black;}
                        div#altContent { text-align:left; }
                        object#altContent { display:block; margin:0 auto;}
    </style>
\t<style>
\t\t#gamepage_foot { minwidth:1024px; height:60px; padding-top:15px; border-top:5px solid #000000; background:#000000}
\t\t#gamepage_foot p { margin:0; padding-bottom:5px}
\t\t#gamepage_foot p,#gamepage_foot p a { text-align:center; color:#999; font-size:13px; text-decoration:none; font-family:\"微软雅黑\",\"宋体\",\"arial\"}
\t\t#gamepage_foot p a,#gamepage_foot p span { display:inline-block;color:#ccc; padding:0 15px}
\t\t#gamepage_foot p a:hover { text-decoration:underline; color:#fff}
\t\t#gamepage_foot p span { padding-left:10px}
\t\t#gamepage_foot p a.addqq { vertical-align:-3px; padding:0 5px 0 15px; outline:none}
\t\t.rt_ad { position:absolute; top:12px; right:12px; width:230px; height:638px; }
\t</style>
\t<script>
       // force = false;
       // \$( window ).on('beforeunload', function(e) {
       //     if (!!force){
       //         return;
       //     }
       //     return '豪礼送不停！加入武汉麻将，每天赢取豪华大奖\\n\\n天赛——每天报名，时时开赛，赢取充值卡\\n\\n周赛——每周一次，激动人心，赢取豪华礼包\\n\\n月赛——众星闪耀，全城瞩目，争夺武汉牌王';
       // });
\t\tvar flashvars = {
            //loginstyle:  loginstyle|default:'0' ,
            //gamestyle:  gamestyle|default:'0' ,
            //roomid:  roomid|default:'0' ,
            //roompassword: ' roompassword '
\t\t};
\t\tvar params = {
\t\t\tmenu: \"false\",
\t\t\tallowFullscreen: \"true\",
\t\t\tallowScriptAccess: \"always\",
\t\t\tbgcolor: '#000000',
            wmode: 'direct'
\t\t};
\t\tvar attributes = {
\t\t\tid:\"game\",
            align:\"middle\"
\t\t};
\t\tswfobject.embedSWF(
        \"/media/bin/Portal.swf?version=";
        // line 52
        echo twig_escape_filter($this->env, (isset($context["version"]) ? $context["version"] : null), "html", null, true);
        echo "\",
\t\t\t\"altContent\", \"1280\", \"650\", \"10.0.0\", 
\t\t\t\"expressInstall.swf\", 
\t\t\tflashvars, params, attributes);
        function resize() {
            if (window.innerHeight > 650) {
                \$('#wrapper').css('padding-top', (window.innerHeight - 650)/2)
                }
            }
        change = function() {
            swfobject.embedSWF(
            \"/media/bin/Portal.swf?version=";
        // line 63
        echo twig_escape_filter($this->env, (isset($context["version"]) ? $context["version"] : null), "html", null, true);
        echo "\",
                \"altContent\", \"1280\", \"650\", \"10.0.0\", 
                \"expressInstall.swf\", 
                flashvars, params, attributes);
            }
\t</script>
    <script>
        window.location.hash=\"no-back-button\";
        window.location.hash=\"Again-no-back-button\";//for google chrome
        window.onhashchange=function(){window.location.hash=\"no-back-button\";}
    </script> 
<style>@-moz-keyframes nodeInserted{from{opacity:0.99;}to{opacity:1;}}@-webkit-keyframes nodeInserted{from{opacity:0.99;}to{opacity:1;}}@-o-keyframes nodeInserted{from{opacity:0.99;}to{opacity:1;}}@keyframes nodeInserted{from{opacity:0.99;}to{opacity:1;}}embed,object{animation-duration:.001s;-ms-animation-duration:.001s;-moz-animation-duration:.001s;-webkit-animation-duration:.001s;-o-animation-duration:.001s;animation-name:nodeInserted;-ms-animation-name:nodeInserted;-moz-animation-name:nodeInserted;-webkit-animation-name:nodeInserted;-o-animation-name:nodeInserted;}</style>
</head>
<body onload=\"resize();\" onresize=\"resize();\">
    <div id=\"wrapper\">
\t<div id=\"altContent\">
\t\t<h1>武汉麻将</h1>
\t\t<p><a href=\"http://www.adobe.com/go/getflashplayer\">Get Adobe Flash player</a></p>
\t</div>
\t</div>
    <!--<div class=\"rt_ad\"><img src=\"/static/img/mj_ad.jpg\" /></div>-->
    <div id=\"gamepage_foot\">
        <p><span>武汉麻将班子群：129166897</span><a target=\"_blank\" href=\"http://shang.qq.com/wpa/qunwpa?idkey=cccb0ff5e146f7ad2f26d700d1b1fa3a24bc82bdb115c6833bcb47bba52de14f\" class=\"addqq\"><img src=\"";
        // line 85
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/addqq.png\" border=\"0\" alt=\"武汉麻将班子\" title=\"武汉麻将班子\" /></a>|<a href=\"/payment/entrance/\" target=\"_blank\">充值</a>|<a href=\"/introduce/\" target=\"_blank\">游戏规则</a>|<a href=\"/match\" target=\"_blank\">比赛规则</a>|<a href=\"/userinfo/\" target=\"_blank\">帐户信息</a>|<a href=\"http://weibo.com/u/5076807387\" target=\"_blank\">微博</a></p>
        <p>版权所有 武汉新蜂乐众网络技术有限公司<img align=\"absmiddle\" style=\"vertical-align: -1px; margin-left: 5px\" src=\"";
        // line 86
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/newbee.png\"><a target=\"_blank\" href=\"http://www.miitbeian.gov.cn/\">ICP：鄂ICP备14001438号</a><img width=\"30\" style=\"vertical-align: -7px; margin-right:-5px\" src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/gameRFID.png\"><a target=\"_blank\" href=\"http://182.131.21.137/ccnt-apply/admin/business/preview/business-preview!lookUrlRFID.action?main_id=36415BBF7D7B4CBB9D6DEE27E3152CA5\">鄂网文【2014】1195-014</a></p>
    </div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "game.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 86,  124 => 85,  99 => 63,  85 => 52,  40 => 10,  34 => 9,  28 => 8,  19 => 1,);
    }
}
