<?php

/* match.html */
class __TwigTemplate_3a21cc473f632114727005b6824ce5fbc616b56c1b212f8e89e8279fc8ffd125 extends Twig_Template
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

    // line 3
    public function block_seo($context, array $blocks = array())
    {
        // line 4
        echo "<title>武汉麻将-比赛</title>
<meta name=\"keywords\" content=\"武汉麻将-比赛规则\" />
<meta name=\"description\" content=\"武汉麻将-比赛规则\" />
";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "<link href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/common_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/index_Style.css\">
<link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/huodong/hd2Style.css\">
<script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/match.js\" ></script>
";
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        // line 18
        echo "<!--content-->
<div id=\"m_content_2\" style=\" padding:0; position:relative\">
    <a class=\"ShowLeft\"></a><a class=\"ShowRight\"></a>
    <div class=\"hd_box\">
        <div class=\"hd2_top\">
            <h2>名不见经传，一战震天下。麻将江湖 风起云涌，终极擂台 笑傲群雄，新蜂武汉麻将真人赛场版震撼来袭</h2>
        </div>
        <div class=\"hd2_content\">
            <div class=\"hd2_pages\"><a href=\"javascript:;\" class=\"on\">1</a><a href=\"javascript:;\" class=\"\">2</a><a href=\"javascript:;\" class=\"\">3</a><a href=\"javascript:;\" class=\"\">4</a></div>
            <div class=\"ShowBox\" style=\"display:\">
                <ul style=\"position:relative; height:400px; width:550px; overflow:hidden;\">
                    <li class=\"selected\" style=\" position:absolute; opacity:1; z-index:2; display:block\">
                        <h4 class=\"hd2_title1\">乐众积分赛</h4>
                        <h5 class=\"sub_title1\">比赛规则：</h5>
                        <p>1.&nbsp;比赛采取积分制，规定时间段内赢取积分最多的玩家获得冠军。</p>
                        <p>2.&nbsp;比赛不需要报名，凡是在比赛时间段内在线的玩家默认参加比赛。</p>
                        <p>3.&nbsp;每场比赛时间为<b>20</b>分钟，在这个时间内结算的游戏都会被计算积分。</p>
                        <p>4.&nbsp;每局游戏中赢取的单倍金币数量作为积分，输家不损失积分。</p>
                        <p>5.&nbsp;乐众积分赛每天早上<b>9</b>点开始，连续举办<b>24</b>场(与其他比赛时间冲突时中止)。</p>
                        <h5 class=\"sub_title2\">奖励机制：</h5>
                        <p>1.&nbsp;<b>第一名</b>获得5张门票</p>
                        <p>2.&nbsp;<b>第二名</b>获得4张门票</p>
                        <p>3.&nbsp;<b>第三名</b>获得3张门票</p>
                        <p>4.&nbsp;第四名获得2张门票</p>
                        <p>5.&nbsp;第五名获得1张门票</p>
                    </li>
                    <li class=\"\" style=\"position:absolute; opacity:1; z-index:0; display:none\">
                        <h4 class=\"hd2_title2\">新蜂精英赛（日赛）</h4>
                        <h5 class=\"sub_title1\">比赛规则：</h5>
                        <p>1.&nbsp;新蜂精英赛每天举办两场，一场在中午<b>13</b>点，一场在晚上<b>19</b>点。</p>
                        <p>2.&nbsp;比赛采取淘汰制，一场比赛<b>64</b>人，需要玩家在比赛开始前进行报名。</p>
                        <p>3.&nbsp;比赛开始前<b>2</b>小时可以进行报名，报名需要使用<b>5</b>张门票。</p>
                        <p>4.&nbsp;比赛进行三轮，第一轮和第二轮为一局定胜负，胜者晋级；第三轮为决赛，进行4局，如果出现平局则加赛一局，赢取积分最多的用户获得冠军。</p>
                        <p>5.&nbsp;决赛中出现选手弃权时，采取全服竞拍的方式寻找新的玩家直接进入决赛。</p>
                        <h5 class=\"sub_title2\">奖励机制：</h5>
                        <p>1.&nbsp;<b>第一名</b>获得<b>200</b>奖券</p>
                        <p>2.&nbsp;第二名获得20门票</p>
                        <p>3.&nbsp;第3~4名获得10门票</p>
                        <p>4.&nbsp;第5~16名获得2门票</p>
                    </li>
                    <li class=\"\" style=\"position:absolute; opacity:1; z-index:0; display:none\">
                        <h4 class=\"hd2_title3\">新蜂大师赛（周赛）</h4>
                        <h5 class=\"sub_title1\">比赛规则：</h5>
                        <p>1.&nbsp;新蜂大师赛每周六上午<b>10</b>点举行。</p>
                        <p>2.&nbsp;比赛采取淘汰制，一场比赛64人，需要玩家在比赛开始前进行报名。</p>
                        <p>3.&nbsp;比赛开始前<b>48</b>小时可以进行报名，报名需要使用<b>50</b>张门票。</p>
                        <p>4.&nbsp;比赛进行三轮，第一轮和第二轮为一局定胜负，胜者晋级；第三轮为决赛，进行4局，如果出现平局则加赛一局，赢取积分最多的用户获得冠军。</p>
                        <p>5.&nbsp;决赛中出现选手弃权时，采取全服竞拍的方式寻找新的玩家直接进入决赛。</p>
                        <h5 class=\"sub_title2\">奖励机制：</h5>
                        <p>1.&nbsp;<b>第一名</b>获得<b>2000</b>奖券</p>
                        <p>2.&nbsp;第二名获得50门票</p>
                        <p>3.&nbsp;第3~4名获得20门票</p>
                        <p>4.&nbsp;第5~16名获得5门票</p>
                    </li>
                    <li class=\"\" style=\"position:absolute; opacity:1; z-index:1; display:none\">
                        <h4 class=\"hd2_title4\">全城争霸赛（月赛）</h4>
                        <h5 class=\"sub_title1\">比赛规则：</h5>
                        <p>1.&nbsp;全城争霸赛每月最后一个周日晚上<b>19</b>点举行。</p>
                        <p>2.&nbsp;比赛采取淘汰制，一场比赛64人，需要玩家在比赛开始前进行报名。</p>
                        <p>3.&nbsp;比赛开始前<b>72</b>小时可以进行报名，报名需要使用<b>200</b>张门票。</p>
                        <p>4.&nbsp;比赛进行三轮，第一轮和第二轮为一局定胜负，胜者晋级；第三轮为决赛，进行4局，如果出现平局则加赛一局，赢取积分最多的用户获得冠军。</p>
                        <p>5.&nbsp;决赛中出现选手弃权时，采取全服竞拍的方式寻找新的玩家直接进入决赛。</p>
                        <h5 class=\"sub_title2\">奖励机制：</h5>
                        <p>1.&nbsp;<b>第一名</b>获得<b>12000</b>奖券</p>
                        <p>2.&nbsp;第二名获得250门票</p>
                        <p>3.&nbsp;第3~4名获得100门票</p>
                        <p>4.&nbsp;第5~16名获得25门票</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class=\"hd2_btm\"></div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "match.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 18,  66 => 17,  60 => 14,  56 => 13,  52 => 12,  48 => 11,  43 => 10,  40 => 9,  33 => 4,  30 => 3,);
    }
}
