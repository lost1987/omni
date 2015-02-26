<?php

/* store_product_item.html */
class __TwigTemplate_7ecb7134653786d4e8cabbdb96c817626b74d506d4f5598b545449aea27fe01f extends Twig_Template
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
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "id", array()), "html", null, true);
        echo "\" />
                    <input type=\"hidden\" id=\"category_id\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, (isset($context["category_id"]) ? $context["category_id"] : null), "html", null, true);
        echo "\" />
                    <input type=\"hidden\" id=\"token\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" />
                    <div class=\"form-group\">
                        <code style=\"margin-left:53px;\">为了保证能正确为您充值，请您仔细填写以下信息</code><br/></br>
                        <label for=\"\" class=\"col-xs-3 control-label\">消费密码：</label>
                        <div class=\"col-xs-4\">
                            <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" >
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <div class=\"col-xs-offset-3 col-xs-2\">
                            <button type=\"submit\"  id=\"exBtn\" class=\"btn btn-block btn-info\">兑换</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        ";
        // line 81
        $this->env->loadTemplate("faq_right_bar.html")->display($context);
        // line 82
        echo "    </div>
</div>


";
    }

    // line 87
    public function block_script($context, array $blocks = array())
    {
        // line 88
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/md5.min.js\"></script>
<script src=\"";
        // line 89
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.validate.min.js\"></script>
<script src=\"";
        // line 90
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/store.product.item.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "store_product_item.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 90,  190 => 89,  185 => 88,  182 => 87,  174 => 82,  172 => 81,  153 => 65,  149 => 64,  145 => 63,  137 => 58,  132 => 56,  117 => 43,  111 => 42,  103 => 40,  95 => 38,  92 => 37,  88 => 36,  70 => 20,  67 => 19,  60 => 16,  57 => 15,  52 => 12,  49 => 11,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
