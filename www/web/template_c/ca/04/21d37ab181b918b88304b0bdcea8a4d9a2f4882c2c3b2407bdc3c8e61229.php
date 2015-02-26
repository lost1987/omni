<?php

/* index.html */
class __TwigTemplate_ca0421d37ab181b918b88304b0bdcea8a4d9a2f4882c2c3b2407bdc3c8e61229 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("baseMain.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'banner' => array($this, 'block_banner'),
            'content' => array($this, 'block_content'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "baseMain.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "武汉麻将
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将
";
    }

    // line 15
    public function block_banner($context, array $blocks = array())
    {
        // line 16
        echo "<div class=\"banner01\">
    <div class=\"container\">
        <div class=\"loginPanel\">
            <div class=\"panel-heading\">
                武汉麻将
            </div>
            <div class=\"panel-body\">
                ";
        // line 23
        if (((isset($context["is_login"]) ? $context["is_login"] : null) != 1)) {
            // line 24
            echo "                <form role=\"form\" id=\"loginForm\" class=\"p35 in\" method=\"post\" action=\"/user/login\">
                    <fieldset>
                        <div class=\"form-group\">
                            <div class=\"input-group\">
                                <span class=\"input-group-addon\"><span class=\"icon icon-userW\"></span></span>
                                <input type=\"text\" class=\"form-control\" id=\"login_name\" name=\"login_name\" placeholder=\"用户名/邮箱/手机号\">
                                <input type=\"hidden\" value=\"";
            // line 30
            echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
            echo "\" name=\"csrf_token\" />
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <div class=\"input-group\">
                                <span class=\"input-group-addon\"><span class=\"icon icon-lockW\"></span></span>
                                <input type=\"password\" class=\"form-control\" name=\"source_password\" id=\"source_password\">
                                <input type=\"hidden\" class=\"form-control\" name=\"password\" id=\"password\">
                            </div>
                        </div>
                        <p class=\"text-right font12\">
                            <span style=\"float:left;color:RGB(255,183,60)\" id=\"errorAlert\">用户名或密码错误</span>
                            <a href=\"/user/password/1\">忘记密码？</a>
                        </p>
                        <button type=\"button\" onclick=\"login()\" class=\"btn btn-warning btn-block mb10\" >登陆</button>
                        <div>更多登陆方式<a href=\"/weibo/sina/login\"> <span class=\"icon icon-sina\"></span></a><a href=\"/user/signup\" class=\"pull-right text-org\">立即注册</a></div>
                    </fieldset>
                </form>
                ";
        } else {
            // line 49
            echo "                <form>
                    <div class=\"form-group\" style=\"display:none\">
                        <div class=\"input-group\">
                            <span class=\"input-group-addon\"><span class=\"icon icon-lockW\"></span></span>
                            <input type=\"password\" class=\"form-control\" name=\"\" id=\"\">
                        </div>
                    </div>
                </form>
                <div id=\"afterLogin\" class=\"afterLogin\">
                    <div class=\"p35 clearfix\">
                        <span class=\"info\"><span class=\"uName\">";
            // line 59
            echo twig_escape_filter($this->env, (isset($context["nickname"]) ? $context["nickname"] : null), "html", null, true);
            echo "</span> 您好！<a href=\"/user/logout\" class=\"text-blue\" id=\"exitBtn\">退出</a></span><a href=\"/game/enter\" class=\"btn btn-sm btn-success pull-right\">进入游戏</a>
                    </div>
                    <div class=\"p35 bg-black\">
                        <div class=\"row\">
                            <div class=\"col-xs-6\">
                                <p>金币：";
            // line 64
            echo twig_escape_filter($this->env, (isset($context["coins"]) ? $context["coins"] : null), "html", null, true);
            echo "</p>
                                <p>胜率：";
            // line 65
            echo twig_escape_filter($this->env, (isset($context["ratio"]) ? $context["ratio"] : null), "html", null, true);
            echo "</p>
                            </div>
                            <div class=\"col-xs-6\">
                                <p>钻石：";
            // line 68
            echo twig_escape_filter($this->env, (isset($context["diamond"]) ? $context["diamond"] : null), "html", null, true);
            echo "</p>
                                <p>等级：<span class=\"text-blue\" >";
            // line 69
            echo twig_escape_filter($this->env, (isset($context["vip_level"]) ? $context["vip_level"] : null), "html", null, true);
            echo "</span></p>
                            </div>
                        </div>
                    </div>
                    <div class=\"p10 mt5\">
                        <ul class=\"nav nav-tabs nav-justified\">
                            <li><a href=\"/userinfo\"><span class=\"icon icon-user-org\"></span>账号中心</a></li>
                            <li><a href=\"/payment/prepare/0\"><span class=\"icon icon-charge-org\"></span>立即充值</a></li>
                            <li><a href=\"/service\"><span class=\"icon icon-chat-org\"></span>客服中心</a></li>
                        </ul>
                    </div>
                </div>
                ";
        }
        // line 82
        echo "            </div>
        </div>
    </div>
</div>
";
    }

    // line 89
    public function block_content($context, array $blocks = array())
    {
        // line 90
        echo "<div class=\"col-xs-8\">
    ";
        // line 91
        $this->env->loadTemplate("article_tablist.html")->display($context);
        // line 92
        echo "    <div class=\"mt10\">
        <div class=\"panel nobd inner\">
            <div id=\"demo1\" class=\"picBtnTop\">
                <div class=\"hd\">
                    <ul class=\"list-unstyled\">
                        ";
        // line 97
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["activity"]) ? $context["activity"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 98
            echo "                        ";
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0", array()) == 0)) {
                // line 99
                echo "                        <li class=\"on\"><a href=\"/activity/detail/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
                echo "</a></li>
                        ";
            } else {
                // line 101
                echo "                        <li><a href=\"/activity/detail/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
                echo "</a></li>
                        ";
            }
            // line 103
            echo "
                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 105
        echo "                    </ul>
                </div>
                <div class=\"bd\">
                    <ul class=\"list-unstyled\" id=\"centerActivityPicList\">
                        <input type=\"hidden\" id=\"activityImages\" value=\"";
        // line 109
        echo twig_escape_filter($this->env, (isset($context["activityImages"]) ? $context["activityImages"] : null), "html", null, true);
        echo "\" />
                        ";
        // line 110
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["activity"]) ? $context["activity"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 111
            echo "                        <li style=\"width:450px;height:199px;\">
                            <div class=\"pic\"><a href=\"/activity/detail/";
            // line 112
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\"></a></div>
                        </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 115
        echo "                    </ul>
                </div>
            </div>
            <div class=\"p15\">
                <div class=\"row\" id=\"newsImageDiv\">
                    <input type=\"hidden\" id=\"newsImages\" value=\"";
        // line 120
        echo twig_escape_filter($this->env, (isset($context["newsImages"]) ? $context["newsImages"] : null), "html", null, true);
        echo "\" />
                    ";
        // line 121
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["news_with_image"]) ? $context["news_with_image"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 122
            echo "                    <div class=\"col-xs-6\" >
                        <div class=\"media\">
                            <a href=\"/articles/detail/";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" class=\"pull-left\" rel=\"image\" style=\"width:99px;height:86px; \">
                            </a>
                            <div class=\"media-body\">
                                <p class=\"media-heading nowrap\"><a href=\"/articles/detail/";
            // line 127
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" class=\"pull-left\"><strong>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
            echo "</strong></a></p>
                                <div class=\"font14\">";
            // line 128
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "description", array()), "html", null, true);
            echo "</div>
                                <span class=\"time\">";
            // line 129
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "publish_time", array()), "html", null, true);
            echo "</span>
                            </div>
                        </div>
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 134
        echo "                </div>
                <div class=\"row nopd\">
                    ";
        // line 136
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["news_withOut_image"]) ? $context["news_withOut_image"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 137
            echo "                            ";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first", array())) {
                // line 138
                echo "                            <div class=\"col-xs-6\">
                                <ul class=\"mt30 list nowrap list01 pl mbn\">
                            ";
            }
            // line 141
            echo "                            ";
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index", array()) % 5) == 0)) {
                // line 142
                echo "                                </ul>
                            </div>
                            <div class=\"col-xs-6\">
                                <ul class=\"mt30 list nowrap list01 pl mbn\">
                            ";
            }
            // line 147
            echo "                                    <li><span class=\"time\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "publish_time", array()), "html", null, true);
            echo "</span><a href=\"/articles/detail/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
            echo "\"><span class=\"text-grey\">[";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "category_name", array()), "html", null, true);
            echo "]</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
            echo "</a></li>
                            ";
            // line 148
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last", array())) {
                // line 149
                echo "                                </ul>
                            </div>
                            ";
            }
            // line 152
            echo "                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 153
        echo "                </div>
            </div>
        </div>
    </div>
</div>
<div class=\"col-xs-12\">
    <h4 class=\"mTitle\">活动专区</h4>
    <div class=\"picScroll-left mb20\" id=\"activity-list\">
        <div class=\"bd\">
            <input type=\"hidden\" id=\"activityFooterImages\" value=\"";
        // line 162
        echo twig_escape_filter($this->env, (isset($context["activityFooterImages"]) ? $context["activityFooterImages"] : null), "html", null, true);
        echo "\" />
            <ul class=\"picList\">
                ";
        // line 164
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["footer_activity"]) ? $context["footer_activity"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 165
            echo "                <li style=\"width: 188px;height:113px;\">
                    <div class=\"pic\"><a href=\"/activity/detail/";
            // line 166
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" target=\"_blank\">
                        </a></div>
                </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 170
        echo "            </ul>
        </div>
    </div>
</div>
";
    }

    // line 175
    public function block_script($context, array $blocks = array())
    {
        // line 176
        echo "<script>
    var errCode = ";
        // line 177
        echo twig_escape_filter($this->env, (isset($context["code"]) ? $context["code"] : null), "html", null, true);
        echo ";
</script>
<script src=\"";
        // line 179
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/md5.min.js\"></script>
<script src=\"";
        // line 180
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/imageLoaded.js\"></script>
<script src=\"";
        // line 181
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/index.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  430 => 181,  426 => 180,  422 => 179,  417 => 177,  414 => 176,  411 => 175,  403 => 170,  393 => 166,  390 => 165,  386 => 164,  381 => 162,  370 => 153,  356 => 152,  351 => 149,  349 => 148,  336 => 147,  329 => 142,  326 => 141,  321 => 138,  318 => 137,  301 => 136,  297 => 134,  286 => 129,  282 => 128,  276 => 127,  270 => 124,  266 => 122,  262 => 121,  258 => 120,  251 => 115,  242 => 112,  239 => 111,  235 => 110,  231 => 109,  225 => 105,  210 => 103,  202 => 101,  194 => 99,  191 => 98,  174 => 97,  167 => 92,  165 => 91,  162 => 90,  159 => 89,  151 => 82,  135 => 69,  131 => 68,  125 => 65,  121 => 64,  113 => 59,  101 => 49,  79 => 30,  71 => 24,  69 => 23,  60 => 16,  57 => 15,  52 => 12,  49 => 11,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
