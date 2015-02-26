<?php

/* service_selfService_report.html */
class __TwigTemplate_088c3f27a00c2d8d6e340ced08149fa104bd23514e42c887c5cfc8cedc57e074 extends Twig_Template
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
            <small class=\"text-blue\"><span class=\"pl5 pr5 text-grey\">|</span>作弊举报</small>
        </h4>
        <div class=\"pl10 pr30 pt30\">
            <form class=\"form-horizontal\" role=\"form\" id=\"tipOffForm\" action=\"/service/tipoff\" method=\"post\" enctype=\"multipart/form-data\">
                <input type=\"hidden\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" name=\"csrf_token\" />
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-3 control-label\">被举报人昵称：</label>

                    <div class=\"col-xs-6\">
                        <input type=\"text\" class=\"form-control\" id=\"tipoff_name\" name=\"tipoff_name\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-3 control-label\">详细描述：</label>

                    <div class=\"col-xs-6\">
                        <textarea id=\"\" rows=\"3\" class=\"form-control\" name=\"tipoff_content\"
                                  value=\"请尽可能恩地提供详细明确的信息，以便我们查证处理。最多500字\"></textarea>
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-3 control-label\">上传截图：</label>

                    <div class=\"col-xs-6\">
                        <input type=\"text\" class=\"form-control\" id=\"fileName\"  disabled>
                    </div>
                    <div class=\"col-xs-3\">
                        <span class=\"btn btn-org btn-upload\"><span>点击上传</span><input type=\"file\" name=\"file\" accept=\"image/jpg, image/png\" onchange=\"showChange()\"></span>

                    </div>
                    <div class=\"col-xs-offset-3 col-xs-6\">
                        <p class=\"help-block\">请尽可能的提供详细明确的信息，以便我们查证处理，最多500字。</p>
                    </div>
                </div>
                <div class=\"form-group\">
                    <div class=\"col-xs-offset-3 col-xs-6\">
                        <button type=\"submit\"  class=\"btn btn-info\">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
";
    }

    // line 68
    public function block_script($context, array $blocks = array())
    {
        // line 69
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.validate.min.js\"></script>
<script src=\"";
        // line 70
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/My97DatePicker/WdatePicker.js\"></script>
<script src=\"";
        // line 71
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/user.tipoff.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "service_selfService_report.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 71,  131 => 70,  126 => 69,  123 => 68,  79 => 28,  70 => 21,  67 => 20,  60 => 16,  57 => 15,  52 => 12,  49 => 11,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
