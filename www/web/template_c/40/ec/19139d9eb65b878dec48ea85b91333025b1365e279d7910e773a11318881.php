<?php

/* forget_password_1.html */
class __TwigTemplate_40ec19139d9eb65b878dec48ea85b91333025b1365e279d7910e773a11318881 extends Twig_Template
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
        echo "<title>武汉麻将-密码找回-第一步</title>
<meta name=\"keywords\" content=\"武汉麻将-密码找回-第一步\" />
<meta name=\"description\" content=\"武汉麻将-密码找回-第一步\" />
";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "<script>
    var token = \"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\";
</script>
<link href=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.ext.js\" ></script>
<script type=\"text/javascript\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/forget_pwd_1.js\" ></script>
";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "<!--content-->
<div id=\"m_content_2\">
    <h3><a href=\"/\"><em></em></a><b class=\"tgxx\">找回密码</b></h3>
    <div class=\"zhmm_mid\">
        <form action=\"/user/password/2\" method=\"post\" id=\"_form\">
            <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" />
        <table width=\"420\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            <tr>
                <td width=\"90\" align=\"right\" class=\"bold\">* 账号：</td>
                <td width=\"330\"><input type=\"text\" name=\"login_name\" id=\"login_name\" class=\"input\" /><label
                        >账号错误</label></td>
            </tr>
            <tr>
                <td class=\"bold\" align=\"right\">* 注册邮箱：</td>
                <td><input type=\"text\" name=\"email\" id=\"email\" class=\"input\" /><label>用户名与邮箱不符</label></td>
            </tr>
            <tr>
                <td></td>
                <td><input type=\"button\" onclick=\"form_submit()\" id=\"\" class=\"submit_3\" value=\"下一步\" /></td>
            </tr>
        </table>
        </form>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "forget_password_1.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 24,  68 => 19,  65 => 18,  59 => 15,  55 => 14,  51 => 13,  46 => 11,  43 => 10,  40 => 9,  33 => 4,  30 => 3,);
    }
}
