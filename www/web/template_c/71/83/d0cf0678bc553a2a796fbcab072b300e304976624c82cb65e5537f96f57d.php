<?php

/* user_info_email.html */
class __TwigTemplate_7183d0cf0678bc553a2a796fbcab072b300e304976624c82cb65e5537f96f57d extends Twig_Template
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
        <h4 class=\"mTitle\">账号信息
            <small class=\"text-blue\"><span class=\"pl5 pr5 text-grey\">|</span>邮箱认证</small>
        </h4>
        <div>
            <form class=\"form-horizontal\" role=\"form\">
                <div class=\"form-group\" id=\"inputArea\">
                    <div class=\"alert alert-info\">
                        <div class=\"p10\">
                            服务说明：绑定邮箱可用于找回密码，请您认证填写自己的常用邮箱，以防遗忘。
                        </div>
                    </div>
                    <div class=\"col-xs-6\">
                        <input type=\"text\" class=\"form-control\" id=\"email\">

                        <p class=\"help-block\"></p>
                    </div>
                    <div class=\"col-xs-6\">
                        <button type=\"button\" class=\"btn btn-info\" onclick=\"auth()\" id=\"authBtn\">立即认证</button>
                    </div>
                </div>
                <div class=\"alert alert-info\" id=\"showArea\" style=\"display:none\">
                    <div class=\"p10\">
                        我们已向您的邮箱发送了认证邮件看，请登陆邮箱并点击邮件中的链接来完成认证。<button type=\"button\" id=\"loginBtn\" class=\"btn btn-info\">登录邮箱</button>
                    </div>
                    <a href=\"\" id=\"gotoEmailLink\" target=\"_blank\" style=\"display: none\"></a>
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
        echo "/js/user.auth.email.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "user_info_email.html";
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
