<?php

/* service_selfService_comments.html */
class __TwigTemplate_22ed62eb1d3358ecb79edb8b82ad09a4d5941a0854f2d4992d5299cdc65dacb8 extends Twig_Template
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

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "<div class=\"col-xs-7\">
    <div class=\"panel p15 inner pb50\">
        <h4 class=\"mTitle\">自助服务
            <small class=\"text-blue\"><span class=\"pl5 pr5 text-grey\">|</span>意见反馈</small>
        </h4>
        <form id=\"feedbackForm\" action=\"/service/feedback\" method=\"post\">
        <input type=\"hidden\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" name=\"csrf_token\" />
        <div class=\"pl20 pr20\">
            <table class=\"table mb30\">
                <tbody>
                <tr>
                    <td>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"feedtype\" id=\"\" value=\"0\" checked> 游戏bug
                        </label>
                    </td>
                    <td>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"feedtype\" id=\"\" value=\"1\"> 商城兑换错误
                        </label>
                    </td>
                    <td>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"feedtype\" id=\"\" value=\"2\"> 充值失败
                        </label>
                    </td>
                    <td>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"feedtype\" id=\"\" value=\"3\"> 游戏记录错误
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"feedtype\" id=\"\" value=\"4\"> 处罚申述
                        </label>
                    </td>
                    <td>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"feedtype\" id=\"\" value=\"5\"> 其他问题
                        </label>
                    </td>
                </tr>
                </tbody>
            </table>
            <label>请详细描述您遇到的问题(您还能输入<span id=\"fonts\" class=\"text-org\">500</span>字,最少输入5个字)：</label>
            <textarea name=\"content\" id=\"content\" class=\"form-control mb10\" rows=\"5\"></textarea>
            <a href=\"javascript:fs()\" class=\"btn btn-info\">提交</a>
        </div>
        </form>
    </div>

</div>
";
    }

    // line 74
    public function block_script($context, array $blocks = array())
    {
        // line 75
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/user.feedback.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "service_selfService_comments.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 75,  131 => 74,  78 => 25,  70 => 19,  67 => 18,  60 => 16,  57 => 15,  52 => 12,  49 => 11,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
