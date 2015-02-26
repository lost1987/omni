<?php

/* introduce.html */
class __TwigTemplate_42369042bac5bd925fb6e5d555ea36125f334a3e4d6324aeb211285a00420c64 extends Twig_Template
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
        echo "<title>武汉麻将-游戏规则</title>
<meta name=\"keywords\" content=\"武汉麻将-游戏规则\" />
<meta name=\"description\" content=\"武汉麻将-游戏规则\" />
";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "<link href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/introduce.js\"></script>
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "<div id=\"m_content_2\">
    <h3><em></em><b class=\"tgxx\">游戏规则</b></h3>
    <div class=\"fsb_box\">
        <div class=\"fsb_top\"></div>
        <div class=\"fsb_m_lf\">
            <ul>
                <li ref=\"1\" class=\"on\">麻将介绍</li>
                <li ref=\"2\">普通规则</li>
                <li ref=\"3\">杠牌</li>
                <li ref=\"4\">胡牌</li>
                <li ref=\"5\">大胡</li>
                <li ref=\"6\">包胡</li>
                <li ref=\"7\">算番</li>
                <li ref=\"8\">封顶</li>
            </ul>
        </div>
        <div class=\"fsb_m_rt\">
            <div class=\"mj_intro\" id=\"show_1\">
                <img src=\"";
        // line 34
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/pic_1.jpg\" style=\"border:2px solid #e0a750;\" />
                <p>麻将是一种汉族发明的益智游戏，麻将类娱乐用具，用竹子、骨头或塑料制成的小长方块，上面刻有花纹或字样，不同地区的游戏规则稍有不同。麻将的玩法复杂有趣，它的基本打法简单，容易上手，但其中变化又极多，搭配组合因人而异，因此成为中国历史上一种最能吸引人的博戏形式之一。
                </p>
                <p>武汉麻将游戏使用筒、条、万三种花色，每种花色分别按数字排列从1－9（如：一万、二万……九万），东、南、西、北风、中、发、白，每种完全相同的牌各四张，一共是136张牌。</p>
                <p>赖子可以当作其他张牌（万能牌）来胡（属于软胡，×1），也可以用本身花数胡（硬胡，×2）。
                    只要同时准备的玩家达到4人，游戏即可开始。
                </p>
            </div>

            <div id=\"show_6\" class=\"mj_intro\" style=\"height:400px\">
                <p>承包者承担所有输点，以下情况承包：</p>
                <p>1） A放冲给B作全求人，A没听牌，A承包。</p>
                <p>2） B胡清一色，B的第三次开口对象是A，A承包。</p>
                <p>3） B抢杠胡，被抢的A承包。</p>
            </div>

            <div id=\"show_5\" class=\"mj_intro\">
                <p><strong>碰碰胡</strong>，即所有牌型为AAA，而且至少有一次开口，对牌可以不是将。</p>
                <img src=\"";
        // line 52
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/pph.png\" />
                <p><strong>清一色</strong>，即所有的牌都是同一种花色，例如条、筒、万，牌型需要是小胡的牌型或者碰碰胡的牌型，对牌可以不是将。
                </p>
                <img src=\"";
        // line 55
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/qys1.png\" />
                <img src=\"";
        // line 56
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/qys3.png\" />
                <img src=\"";
        // line 57
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/qys2.png\" />
                <p><strong>风一色</strong>，即所有的牌都是东南西北白，这种情况下并不需要碰或者对，但是仍然需要至少碰一次。</p>
                <img src=\"";
        // line 59
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/fys.png\" />
                <p><strong>将一色</strong>，即所有的牌都是2、5、8的条、筒、万，这种情况下并不需要碰或者对，但是仍然需要至少碰一次。</p>
                <img src=\"";
        // line 61
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/jys.png\" />
                <p><strong>全求人</strong>，所有的牌都是吃、碰、杠牌(不含暗杠)，如果是小胡牌型则最后一对牌必须是2、5、8的条、筒、万。</p>
                <img src=\"";
        // line 63
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/qqr.png\" />
                <p><strong>杠上开花</strong>，即在杠牌以后(包括明杠、暗杠、中发赖子杠)起了牌墙的最后一张以后胡牌。</p>
                <img src=\"";
        // line 65
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/gsk.png\" />
                <p><strong>海底捞</strong>，即起最后一张牌的时候(除了整个牌墙的最后10张牌以外的最后一张)胡牌，但是此牌不能用来杠、也不能打出，只能自摸胡。</p>
                <p><strong>抢杠</strong>，X已经碰了一张牌，又起到了一张同样的牌可以杠(明杠)的时候，如果其他玩家可以胡这张牌，则称其为抢杠。</p>
            </div>


            <div class=\"mj_intro\" id=\"show_8\">
                <p>每个输家输点最高不超过400，超过400则为400。</p>
                <p>但是有下列特殊情况则需要调整封顶(在下面开口的定义不仅包括吃、碰、明杠，也包括红中发财赖子杠)：</p>
                <p>如果输家的最低点数不超过400，则每家输的点数最多是400，如果低于400按照实际点数算。</p>
                <p>如果每家输的点数都超过400，而且都开口了，则每家都付600(金顶)。</p>
                <p>如果每家输的点数都超过400，而且有一个或者两个输家没有开口，则没有开口的输家要加付给赢家200，即800(阳光顶)。</p>
                <p>如果每家输的点数都超过400，而且三家都没有开口，则所有人都付1000(钻石顶)。</p>
                <p>如果胡的是风一色，则每家不算实际番数，均按照每家输点超过400来算，即只与各输家的开口有关。</p>
            </div>


            <div class=\"mj_intro\" id=\"show_2\">
                <h4>出牌</h4>
                <p>凡是抓进或吃、碰、开杠、补牌后，不胡牌便要打出一张牌。<strong>在游戏中不能出（红中、发财、赖子）或（红中、赖子、赖子皮）。</strong></p>
                <img src=\"";
        // line 85
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/gp.png\" style=\"margin-left:20px\" /><img src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/gp2.png\" style=\"margin-left:20px\" />
                <h4>吃牌</h4>
                <p>只能吃上家打出的牌，与自己手中的牌可以组成一副顺子，便可以报吃，把组成的顺子摆亮在立牌前。允许吃进（或碰或扛）打出的牌。
                </p>
                <img src=\"";
        // line 89
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/cp.png\" style=\"margin-left:150px\" />
                <h4>碰牌</h4>
                <p>有人打出的牌与自己手中的对子相同，便可报碰，组成一副刻子并摆亮在立牌前。\"碰\"比\"吃\"优先。
                </p>\t\t\t<img src=\"";
        // line 92
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/pp.png\" style=\"margin-left:150px\" />
            </div>


            <div class=\"mj_intro\" id=\"show_3\">
                <p>只要有符合条件而且轮到自己出牌的时候即可随时杠。</p>
                <img src=\"";
        // line 98
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/kg.png\" />
                <p>如果这张牌是红中，发财，赖子（或赖子皮），可以直接杠这张牌（将这张牌翻出但是不打出），然后再到整个牌墙的最后开始摸牌。</p>
                <img src=\"";
        // line 100
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/gp.png\" style=\"margin-left:20px\" /><img src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/gp2.png\" style=\"margin-left:20px\" />
                <p>如果这张牌不是红中、发财、赖子（或赖子皮），而且起牌者已经碰了三张同样的牌了，则可以蓄杠，即将这张牌与已经碰的三张牌放到一起。在此期间，可以发生抢杠，然后再到整个牌墙的最后开始摸牌。</p>
                <p>如果这张牌不是红中，发财，赖子（或赖子皮），而且起牌者已经有三张同样的牌了(但是不是碰的)，则可以暗杠，即将四张牌背面朝上，然后再到整个牌墙的最后开始摸牌。</p>
            </div>


            <div class=\"mj_intro\" id=\"show_7\">
                <p>小胡又称屁胡，基数为1，大胡基数是10。</p>
                <p>大胡可以叠加，例如同时胡风一色与全求人，即可将基数变为10+10=20，同时胡全求人，风一色与碰碰胡，即为30。</p>
                <p>红中发财杠1番，赖子杠2番，明杠2番，暗杠2番，吃1番，碰1番，自摸1番，放冲1番，庄家1番，硬胡1番。其中硬胡表示没有癞子或者没有使用赖子混牌，而是用赖子的本来点数胡。</p>
                <p>如果是蓄杠被抢杠了，蓄杠因为是明杠，仍然算两番。输家输去的点数=基数x2^(番数)（自己与赢家番数之和）。</p>
                <p>对于风一色、将一色、清一色与碰碰胡，如果是自摸，此时番数比较特殊，为其他番数算完以后得到的2的次方的结果再乘以1.5。</p>
                <p>海底捞与杠上开花的自摸不算番数。对于大胡来说，庄家不算番。</p>
            </div>


            <div class=\"mj_intro\" id=\"show_4\">
                <p>胡牌分为小胡与大胡，小胡牌型如下：</p>
                <img src=\"";
        // line 118
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/hp3.png\" />
                <img src=\"";
        // line 119
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/hp1.png\" />
                <img src=\"";
        // line 120
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/hp2.png\" />
                <p>小胡里必须有一对将，即筒、条、万的二、五、八。</p>
                <img src=\"";
        // line 122
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/jp.png\" />
                <p>此外，在武汉麻将中，胡牌时手牌不能有红中与发财，也不能有四张同样的牌，必须暗杠。在胡牌之前至少有一次开口，如果是在胡牌的那一张牌才开口则不算。</p>
                <p>硬胡，是指胡牌后没有赖子、赖子被杠、用本身花数胡的情况。
                    软胡，如果有赖子并且充当万能牌使用的情况。
                    一炮单响，只能有一个胡牌者，以庄家逆时针为序。</p>
            </div>
        </div>

        <div class=\"fsb_btm\"></div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "introduce.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 122,  215 => 120,  211 => 119,  207 => 118,  184 => 100,  179 => 98,  170 => 92,  164 => 89,  155 => 85,  132 => 65,  127 => 63,  122 => 61,  117 => 59,  112 => 57,  108 => 56,  104 => 55,  98 => 52,  77 => 34,  57 => 16,  54 => 15,  48 => 11,  43 => 10,  40 => 9,  33 => 4,  30 => 3,);
    }
}
