<?php

/* user_info_unAuth.html */
class __TwigTemplate_e755749402e05d999a76294b69c661dd6b95ca6541ddf6fb26b9645696b506be extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("basePersonnal.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'content' => array($this, 'block_content'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "basePersonnal.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "武汉麻将-个人中心
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将-个人中心
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将-个人中心
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "
";
        // line 17
        if (((isset($context["action"]) ? $context["action"] : null) == "i")) {
            // line 18
            echo "<div class=\"col-xs-7\">
    <div class=\"panel p15 inner pb50\">
        <h4 class=\"mTitle\">账号信息<small class=\"text-blue\"><span class=\"pl5 pr5 text-grey\">|</span>防沉迷认证</small></h4>
        <div>
            <div class=\"alert alert-info\">
                <div class=\"p15 text-center\">
                    防沉迷已认证！
                </div>
            </div>
            <p>身份证号：";
            // line 27
            echo twig_escape_filter($this->env, (isset($context["idCard"]) ? $context["idCard"] : null), "html", null, true);
            echo "</p>
            <blockquote class=\"font14 bg-grey\">
                <div class=\"p15\">
                    <ol>
                        <li>身份证信息一旦绑定将无法修改。</li>
                        <li>身份证号码可以提高您账号的安全性。</li>
                        <li>身份证号码是作为防沉迷系统判定的唯一标准。</li>
                        <li>保护未成年人身心健康，未满18岁的用户将受到防沉迷系统的限制。</li>
                        <li>在进行游戏的过程中，系统会提示您的累计在线时间:<br>
                            <p>累计游戏时间超过 3 小时，游戏收益(经验，金钱)减半。<br>
                                累计游戏时间超过 5 小时，游戏收益(经验，金钱)为零。</p>
                        </li>
                    </ol>
                </div>
            </blockquote>
        </div>
    </div>
</div>
";
        }
        // line 46
        echo "
";
        // line 47
        if (((isset($context["action"]) ? $context["action"] : null) == "m")) {
            // line 48
            echo "<div class=\"col-xs-7\">
    <div class=\"panel p15 inner pb50\">
        <h4 class=\"mTitle\">账号信息
            <small class=\"text-blue\"><span class=\"pl5 pr5 text-grey\">|</span>手机认证</small>
        </h4>
        <div>
            <div class=\"alert alert-info\">
                <div class=\"p10\">
                    您已经认证手机：<span class=\"text-org\">";
            // line 56
            echo twig_escape_filter($this->env, (isset($context["mobile"]) ? $context["mobile"] : null), "html", null, true);
            echo "</span>,如需更改手机号则进行如下流程:
                    1:解绑手机号
                    2:重新认证手机号
                </div>
            </div>
            <form class=\"form-horizontal\" role=\"form\">
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-3 control-label\">原手机号：</label>

                    <div class=\"col-xs-6\">
                        <input type=\"text\" class=\"form-control\" id=\"mobile\" placeholder=\"请输入认证手机号\">

                        <p class=\"help-block\">（请输入11位有效手机号码）</p>
                    </div>
                </div>
                <div class=\"form-group\">
                    <div class=\"col-xs-offset-3 col-xs-6\">
                        <button type=\"button\" class=\"btn btn-info\" id=\"authBtn\" onclick=\"unAuthSms()\">更改手机</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
";
        }
        // line 81
        echo "
";
        // line 82
        if (((isset($context["action"]) ? $context["action"] : null) == "e")) {
            // line 83
            echo "<div class=\"col-xs-7\">
    <div class=\"panel p15 inner pb50\">
        <h4 class=\"mTitle\">账号信息<small class=\"text-blue\"><span class=\"pl5 pr5 text-grey\">|</span>邮箱认证</small></h4>
        <div>
            <div class=\"alert alert-info\">
                <div class=\"p10\">
                  您已成功认证邮箱<span class=\"text-org\">";
            // line 89
            echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true);
            echo "</span>，请牢记! 如需更改邮箱,请走如下流程:
                    1.解绑邮箱 2.重新认证邮箱
                </div>
            </div>
            <form class=\"form-horizontal\" role=\"form\">
                <div class=\"form-group\">
                    <div class=\"col-xs-6\">
                        <input type=\"text\" class=\"form-control\" id=\"email\" placeholder=\"请输入认证邮箱地址\">
                    </div>
                    <div class=\"col-xs-6\"><button type=\"button\" id=\"authBtn\" onclick=\"unAuthEmail()\" class=\"btn btn-info\">更改邮箱</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
";
        }
    }

    // line 107
    public function block_script($context, array $blocks = array())
    {
        // line 108
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/user.unAuth.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "user_info_unAuth.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 108,  174 => 107,  153 => 89,  145 => 83,  143 => 82,  140 => 81,  112 => 56,  102 => 48,  100 => 47,  97 => 46,  75 => 27,  64 => 18,  62 => 17,  59 => 16,  56 => 15,  51 => 12,  48 => 11,  43 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
