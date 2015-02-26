<?php

/* service_selfService_findPw2.html */
class __TwigTemplate_37c4597f2f0d610500692f50ff62a4178c46923dab544cddca3d5736fa6c5858 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("baseService.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'script' => array($this, 'block_script'),
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

    // line 15
    public function block_css($context, array $blocks = array())
    {
        // line 16
        echo "<link href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/css/formError.css\" rel=\"stylesheet\">
";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "<div class=\"col-xs-7\">
    <div class=\"panel p15 inner pb50\">
        <h4 class=\"mTitle\">自助服务
            <small class=\"text-blue\"><span class=\"pl5 pr5 text-grey\">|</span>找回密码</small>
        </h4>
        <div>
            <ul class=\"nav nav-tabs nav02\" role=\"tablist\">
                <li><a>账号密码相关</a></li>
            </ul>
            <div class=\"p15\">
                <div class=\"alert alert-info\">
                    <div class=\"p30\">
                        <span class=\"text-orgD\">一封确认邮件已发送到您的邮箱。点击邮件内的链接来完成密码取回操作。系统会在操作的最后一步提示您创建一个新的密码。</span>
                        <br/><br/>
                        <input type=\"button\" onclick=\"loginMail('";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true);
        echo "')\" id=\"\" class=\"submit_3 btn btn-info\" value=\"立即登录邮箱\" />
                        <a href=\"\" style=\"display:none\" target=\"_blank\" id=\"goMailLink\"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    // line 44
    public function block_script($context, array $blocks = array())
    {
        // line 45
        echo "<script>
    var token = '';
</script>
<script src=\"";
        // line 48
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.validate.min.js\"></script>
<script src=\"";
        // line 49
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/common.js\"></script>
<script src=\"";
        // line 50
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/user.findPwd.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "service_selfService_findPw2.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 50,  111 => 49,  107 => 48,  102 => 45,  99 => 44,  86 => 34,  70 => 20,  67 => 19,  60 => 16,  57 => 15,  52 => 12,  49 => 11,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
