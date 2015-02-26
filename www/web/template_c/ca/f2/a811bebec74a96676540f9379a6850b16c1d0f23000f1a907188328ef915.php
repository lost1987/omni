<?php

/* service_selfService_findPayPw3.html */
class __TwigTemplate_caf2a811bebec74a96676540f9379a6850b16c1d0f23000f1a907188328ef915 extends Twig_Template
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
            <small class=\"text-blue\"><span class=\"pl5 pr5 text-grey\">|</span>找回消费密码</small>
        </h4>
        <div>
            <ul class=\"nav nav-tabs nav02\" role=\"tablist\">
                <li><a>账号密码相关</a></li>
            </ul>
            <div class=\"p15\">
                <form class=\"form-horizontal pt30\" role=\"form\" id=\"findPwdForm3\" action=\"/user/payPassword/4\"
                      method=\"post\">
                    <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" />
                    <input type=\"hidden\" name=\"n\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["n"]) ? $context["n"] : null), "html", null, true);
        echo "\" />
                    <input type=\"hidden\" name=\"t\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["t"]) ? $context["t"] : null), "html", null, true);
        echo "\" />
                    <input type=\"hidden\" name=\"hid_password\" id=\"hid_password\" value=\"\" />
                    <div class=\"form-group\">
                        <label for=\"\" class=\"col-xs-3 control-label\">消费密码：</label>
                        <div class=\"col-xs-6\">
                            <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\"  placeholder=\"6-16位字母、数字\" >
                        </div>
                        <div class=\"col-xs-4\">
                            <!-- <div class=\"alert alert-danger mbn font12\">两次密码输入不一致</div> -->
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"\" class=\"col-xs-3 control-label\">确认消费密码：</label>
                        <div class=\"col-xs-6\">
                            <input type=\"password\" class=\"form-control\" id=\"re_password\" name=\"re_password\" placeholder=\"6-16位字母、数字\" >
                        </div>
                        <div class=\"col-xs-4\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <div class=\"col-xs-offset-3 col-xs-6\">
                            <button type=\"submit\" class=\"btn btn-info\" id=\"sbBtn\">确认修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
";
    }

    // line 64
    public function block_script($context, array $blocks = array())
    {
        // line 65
        echo "<script>
    var token = '";
        // line 66
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "';
</script>
<script src=\"";
        // line 68
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/md5.min.js\"></script>
<script src=\"";
        // line 69
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.validate.min.js\"></script>
<script src=\"";
        // line 70
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/common.js\"></script>
<script src=\"";
        // line 71
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/user.findPayPwd.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "service_selfService_findPayPw3.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 71,  145 => 70,  141 => 69,  137 => 68,  132 => 66,  129 => 65,  126 => 64,  92 => 34,  88 => 33,  84 => 32,  70 => 20,  67 => 19,  60 => 16,  57 => 15,  52 => 12,  49 => 11,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
