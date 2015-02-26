<?php

/* service_selfService_account.html */
class __TwigTemplate_a0c7f665a93995b85d4f8badf7dc60a2f9e6a63826a2a39c9559ef9d592a4ba8 extends Twig_Template
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

    // line 20
    public function block_content($context, array $blocks = array())
    {
        // line 21
        echo "<div class=\"col-xs-7\">
    <div class=\"panel p15 inner pb50\">
        <h4 class=\"mTitle\">自助服务
            <small class=\"text-blue\"><span class=\"pl5 pr5 text-grey\">|</span>账号申诉</small>
        </h4>
        <div class=\"pl10 pr30 pt30\">
            <form class=\"form-horizontal\" role=\"form\" id=\"suspendForm\" action=\"/service/usersuspend\" method=\"post\">
                <input type=\"hidden\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" name=\"csrf_token\" />
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-2 control-label\">用户名：</label>

                    <div class=\"col-xs-6\">
                        <input type=\"text\" class=\"form-control\" id=\"suspend_name\" name=\"suspend_name\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-2 control-label\">封停时间：</label>

                    <div class=\"col-xs-6\">
                        <input type=\"text\" class=\"form-control\" id=\"suspend_time\" name=\"suspend_time\" onfocus=\"WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})\" readonly=\"true\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-2 control-label\">手机号：</label>

                    <div class=\"col-xs-6\">
                        <input type=\"text\" class=\"form-control\" id=\"suspend_mobile\" name=\"suspend_mobile\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-2 control-label\">详细描述：</label>

                    <div class=\"col-xs-6\">
                        <textarea name=\"suspend_content\" id=\"suspend_content\" rows=\"3\" class=\"form-control\"
                                  value=\"请尽可能恩地提供详细明确的信息，以便我们查证处理。最多500字\"></textarea>
                    </div>
                </div>
                <div class=\"form-group\">
                    <div class=\"col-xs-offset-2 col-xs-6\">
                        <button type=\"submit\" class=\"btn btn-info\">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
";
    }

    // line 69
    public function block_script($context, array $blocks = array())
    {
        // line 70
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.validate.min.js\"></script>
<script src=\"";
        // line 71
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/My97DatePicker/WdatePicker.js\" ></script>
<script src=\"";
        // line 72
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/user.suspend.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "service_selfService_account.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 72,  131 => 71,  126 => 70,  123 => 69,  79 => 28,  70 => 21,  67 => 20,  60 => 16,  57 => 15,  52 => 12,  49 => 11,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
