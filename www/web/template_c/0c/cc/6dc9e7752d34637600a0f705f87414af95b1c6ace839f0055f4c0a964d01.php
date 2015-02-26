<?php

/* user_info_verified.html */
class __TwigTemplate_0ccc6dc9e7752d34637600a0f705f87414af95b1c6ace839f0055f4c0a964d01 extends Twig_Template
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

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "<div class=\"col-xs-7\">
    <div class=\"panel p15 inner pb50\">
        <h4 class=\"mTitle\">账号信息<small class=\"text-blue\"><span class=\"pl5 pr5 text-grey\">|</span>防沉迷认证</small></h4>
        <div>
            <div class=\"alert alert-info\">
                <div class=\"p10\">
                    服务说明：根据文化部颁布的《网络游戏管理暂行办法》第二十一条规定，需要您提供真实姓名及身份证信息，本平台绝对保证您的资料安全，绝不会泄露和使用。
                </div>
            </div>
            <form class=\"form-horizontal\" role=\"form\">
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-2 control-label\">真实姓名：</label>
                    <div class=\"col-xs-6\">
                        <input type=\"text\" class=\"form-control\" id=\"realname\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-2 control-label\">身份证号：</label>
                    <div class=\"col-xs-6\">
                        <input type=\"text\" class=\"form-control\" id=\"idCard\">
                        <p class=\"help-block\">（请输入15或18位有效身份证号）</p>
                    </div>
                </div>
                <div class=\"form-group\">
                    <div class=\"col-xs-offset-2 col-xs-6\">
                        <button type=\"button\" class=\"btn btn-info\" id=\"authBtn\" onclick=\"auth()\">立即认证</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
";
    }

    // line 48
    public function block_script($context, array $blocks = array())
    {
        // line 49
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/common.js\"></script>
<script src=\"";
        // line 50
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/user.auth.id.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "user_info_verified.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 50,  98 => 49,  95 => 48,  59 => 15,  56 => 14,  51 => 12,  48 => 11,  43 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
