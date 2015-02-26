<?php

/* store_product_real.html */
class __TwigTemplate_e466aca4b7d34cf4eb4e4eed81247527b136ff4dfe472183c88488393618a98b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("baseBlank.html");

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
        return "baseBlank.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "武汉麻将-商城
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将-商城
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将-商城
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
        echo "<div class=\"\">
    <div class=\"row\">
        <div class=\"col-xs-2\">
            <div class=\"bg-blueD inner\">
                <div class=\"mainTitle\">
                    <h3 class=\"sTitle\">
                        <a href=\"/store\">
                        <span class=\"icon icon-house\"></span>
                    <span class=\"bl1\">
                      <span class=\"uppercase\">SHOP</span><br>商城
                    </span>
                            </a>
                    </h3>
                </div>
                <div class=\"leftSide pt30 pb30 pl10\">
                    <ul class=\"nav nav-pills nav-stacked\" role=\"tablist\">
                        ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 37
            echo "                            ";
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()) == (isset($context["category_id"]) ? $context["category_id"] : null))) {
                // line 38
                echo "                                <li class=\"active\"><a href=\"/store/category/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\"><span class=\"icon icon-arrowR-org\"></span>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
                echo "</a></li>
                            ";
            } else {
                // line 40
                echo "                                <li><a href=\"/store/category/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\"><span class=\"icon icon-arrowR-org\"></span>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
                echo "</a></li>
                            ";
            }
            // line 42
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "                    </ul>
                </div>
            </div>
        </div>

        <div class=\"col-xs-7\">
            <div class=\"panel p15 pb50 inner\">
                <ul class=\"nav nav-tabs nav02\" role=\"tablist\">
                    <li><a>商品兑换</a></li>
                </ul>
                <div class=\"p15\">
                    <table class=\"table table-border\">
                        <thead>
                       <tr><th style=\"text-align: left\">您正在兑换&nbsp;&nbsp;";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "name", array()), "html", null, true);
        echo "</th></tr>
                        </thead>
                        <tr><td>兑换将扣除<span class=\"text-orgD\">";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "price_name", array()), "html", null, true);
        echo "</span></td></tr>
                    </table>
                </div>
                <form class=\"form-horizontal\" role=\"form\" id=\"exchangeForm\">
                    <input type=\"hidden\" id=\"product_id\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "id", array()), "html", null, true);
        echo "\" />
                    <input type=\"hidden\" id=\"category_id\" value=\"";
        // line 63
        echo twig_escape_filter($this->env, (isset($context["category_id"]) ? $context["category_id"] : null), "html", null, true);
        echo "\" />
                    <input type=\"hidden\" id=\"token\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" />
                    <div class=\"form-group\">
                        <code style=\"margin-left:53px;\">为了保证能正确为您充值，请您仔细填写以下信息</code><br/></br>
                        <label for=\"\" class=\"col-xs-3 control-label\">姓名：</label>
                        <div class=\"col-xs-4\">
                            <input type=\"text\" class=\"form-control\" name=\"realName\" id=\"realName\" >
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"\" class=\"col-xs-3 control-label\">手机号：</label>
                        <div class=\"col-xs-4\">
                            <input type=\"text\" class=\"form-control\" id=\"mobile\" name=\"mobile\" >
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"\" class=\"col-xs-3 control-label\">确认手机号：</label>
                        <div class=\"col-xs-4\">
                            <input type=\"text\" class=\"form-control\" id=\"reMobile\" name=\"reMobile\" >
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"\" class=\"col-xs-3 control-label\">消费密码：</label>
                        <div class=\"col-xs-4\">
                            <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" >
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"\" class=\"col-xs-3 control-label\">地址：</label>
                        <div class=\"col-xs-6\">
                            <textarea type=\"text\" class=\"form-control\" id=\"address\" rows=\"5\" cols=\"10\" name=\"address\"></textarea>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <div class=\"col-xs-offset-3 col-xs-2\">
                            <button type=\"submit\" class=\"btn btn-block btn-info\">兑换</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        ";
        // line 104
        $this->env->loadTemplate("faq_right_bar.html")->display($context);
        // line 105
        echo "    </div>
</div>
<div class=\"modal fade\" id=\"confirmModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-md\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"\">您正在兑换&nbsp;&nbsp;";
        // line 112
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "name", array()), "html", null, true);
        echo "</h4>
            </div>
            <div class=\"modal-body\">
                <div class=\"p10\">
                    <p class=\"text-blue\">请确认您的收货信息</p>
                    <table class=\"table table-border table-hover\">
                        <tbody>
                        <tr width=\"30%\">
                            <td>姓名：<span id=\"confirm-name\"></span></td>
                        </tr>
                        <tr>
                            <td>电话：<span id=\"confirm-mobile\"></span></td>
                        </tr>
                        <tr>
                            <td>地址：<span id=\"confirm-address\"></span></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class=\"text-center mt20\">
                        <a class=\"btn btn-info\" onclick=\"exchange()\" id=\"exBtn\">确认兑换</a>
                        <a class=\"btn btn-info\" data-dismiss=\"modal\">取消</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /modal -->

";
    }

    // line 141
    public function block_script($context, array $blocks = array())
    {
        // line 142
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/md5.min.js\"></script>
<script src=\"";
        // line 143
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.validate.min.js\"></script>
<script src=\"";
        // line 144
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/store.product.real.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "store_product_real.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 144,  247 => 143,  242 => 142,  239 => 141,  206 => 112,  197 => 105,  195 => 104,  152 => 64,  148 => 63,  144 => 62,  137 => 58,  132 => 56,  117 => 43,  111 => 42,  103 => 40,  95 => 38,  92 => 37,  88 => 36,  70 => 20,  67 => 19,  60 => 16,  57 => 15,  52 => 12,  49 => 11,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
