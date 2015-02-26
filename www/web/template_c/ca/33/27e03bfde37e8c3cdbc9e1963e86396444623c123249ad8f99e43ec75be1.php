<?php

/* service_selfService.html */
class __TwigTemplate_ca3327e03bfde37e8c3cdbc9e1963e86396444623c123249ad8f99e43ec75be1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("baseService.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "baseService.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "武汉麻将-客户服务
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将-客户服务
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将-客户服务
";
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "<div class=\"col-xs-7\">
    <div class=\"panel p15 inner pb50\">
        <h4 class=\"mTitle\">自助服务</h4>

        <div class=\"\">
            <ul class=\"nav nav-tabs nav02\" role=\"tablist\">
                <li><a>账号密码相关</a></li>
            </ul>
            <div class=\"p15\">
                <div class=\"row\">
                    <div class=\"col-xs-4\"> <p class=\"p10\">
                        ";
        // line 28
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 0)) {
            // line 29
            echo "                            <a href=\"#tops\" onclick=\"\$('#loginPannel').trigger('mouseover')\">
                        ";
        } else {
            // line 31
            echo "                            <a href=\"/userAuth/idCard\">
                        ";
        }
        // line 33
        echo "
                        ";
        // line 34
        if (($this->getAttribute((isset($context["userAuth"]) ? $context["userAuth"] : null), 1, array(), "array") != 1)) {
            // line 35
            echo "                        <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/id-unauth.png\" />
                        ";
        } else {
            // line 37
            echo "                        <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/id-auth.png\" />
                        ";
        }
        // line 39
        echo "                        防沉迷认证
                            </a></p></div>

                    <div class=\"col-xs-4\">
                        <p class=\"p10\">
                            ";
        // line 44
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 0)) {
            // line 45
            echo "                            <a href=\"#tops\" onclick=\"\$('#loginPannel').trigger('mouseover')\">
                                ";
        } else {
            // line 47
            echo "                                <a href=\"/userAuth/mobile\">
                            ";
        }
        // line 49
        echo "
                            ";
        // line 50
        if (($this->getAttribute((isset($context["userAuth"]) ? $context["userAuth"] : null), 3, array(), "array") != 1)) {
            // line 51
            echo "                            <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/phone-unauth.png\" />
                            ";
        } else {
            // line 53
            echo "                            <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/phone-auth.png\" />
                            ";
        }
        // line 55
        echo "                            手机认证</a></p>
                    </div>

                    <div class=\"col-xs-4\">
                        <p class=\"p10\">
                            ";
        // line 60
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 0)) {
            // line 61
            echo "                            <a href=\"#tops\" onclick=\"\$('#loginPannel').trigger('mouseover')\">
                                ";
        } else {
            // line 63
            echo "                                <a href=\"/userAuth/email\">
                            ";
        }
        // line 65
        echo "
                            ";
        // line 66
        if (($this->getAttribute((isset($context["userAuth"]) ? $context["userAuth"] : null), 2, array(), "array") != 1)) {
            // line 67
            echo "                            <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/email-unauth.png\" />
                            ";
        } else {
            // line 69
            echo "                            <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/email-auth.png\" />
                            ";
        }
        // line 71
        echo "                            邮箱认证</a></p>
                    </div>

                    ";
        // line 74
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 0)) {
            // line 75
            echo "                    <div class=\"col-xs-4\">
                        <p class=\"p10\"><a href=\"/user/password/1\"><span class=\"icon circle-lock\"></span>找回密码</a> </p>
                    </div>
                    ";
        }
        // line 79
        echo "
                    <div class=\"col-xs-4\">
                        <p class=\"p10\"><a href=\"/service/sus\"><span class=\"icon circle-note\"></span>账号申诉</a></p>
                    </div>
                </div>
            </div>
            <ul class=\"nav nav-tabs nav02\" role=\"tablist\">
                <li><a>充值相关</a></li>
            </ul>
            <div class=\"p15\">
                <div class=\"row\">
                    <div class=\"col-xs-4\">
                        <p class=\"p10\"><a href=\"/payment/prepare/0\"><span class=\"icon circle-dollar\"></span>充值</a></p>

                    </div>
                    <div class=\"col-xs-4\">
                        ";
        // line 95
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 0)) {
            // line 96
            echo "                        <p class=\"p10\"><a href=\"#tops\" onclick=\"\$('#loginPannel').trigger('mouseover')\"><span class=\"icon circle-card\"></span>我的充值记录</a></p>
                        ";
        } else {
            // line 98
            echo "                        <p class=\"p10\"><a href=\"/service/rl\"><span class=\"icon circle-card\"></span>我的充值记录</a></p>
                        ";
        }
        // line 100
        echo "                    </div>
                </div>
            </div>
            <ul class=\"nav nav-tabs nav02\" role=\"tablist\">
                <li><a>游戏相关</a></li>
            </ul>
            <div class=\"p15\">
                <div class=\"row\">
                    <div class=\"col-xs-4\">
                        ";
        // line 109
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 0)) {
            // line 110
            echo "                        <p class=\"p10\"><a href=\"#tops\" onclick=\"\$('#loginPannel').trigger('mouseover')\"><span class=\"icon circle-lock\"></span>意见反馈</a></p>
                        ";
        } else {
            // line 112
            echo "                        <p class=\"p10\"><a href=\"/service/fb\"><span class=\"icon circle-lock\"></span>意见反馈</a></p>
                        ";
        }
        // line 114
        echo "                    </div>
                    <div class=\"col-xs-4\">
                        ";
        // line 116
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 0)) {
            // line 117
            echo "                        <p class=\"p10\"><a href=\"#tops\" onclick=\"\$('#loginPannel').trigger('mouseover')\"><span class=\"icon circle-phone\"></span>作弊举报</a></p>
                        ";
        } else {
            // line 119
            echo "                        <p class=\"p10\"><a href=\"/service/tf\"><span class=\"icon circle-phone\"></span>作弊举报</a></p>
                        ";
        }
        // line 121
        echo "                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "service_selfService.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 121,  238 => 119,  234 => 117,  232 => 116,  228 => 114,  224 => 112,  220 => 110,  218 => 109,  207 => 100,  203 => 98,  199 => 96,  197 => 95,  179 => 79,  173 => 75,  171 => 74,  166 => 71,  160 => 69,  154 => 67,  152 => 66,  149 => 65,  145 => 63,  141 => 61,  139 => 60,  132 => 55,  126 => 53,  120 => 51,  118 => 50,  115 => 49,  111 => 47,  107 => 45,  105 => 44,  98 => 39,  92 => 37,  86 => 35,  84 => 34,  81 => 33,  77 => 31,  73 => 29,  71 => 28,  58 => 17,  55 => 16,  50 => 12,  47 => 11,  42 => 8,  39 => 7,  34 => 4,  31 => 3,);
    }
}
