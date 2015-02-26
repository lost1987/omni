<?php

/* store.html */
class __TwigTemplate_ef94458b4a17cf38ec8034565669ed25b4c46399bbbf4238de16a4bb958d1881 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("baseBlank.html");

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
    public function block_content($context, array $blocks = array())
    {
        // line 16
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
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 33
            echo "                            ";
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()) == (isset($context["category_id"]) ? $context["category_id"] : null))) {
                // line 34
                echo "                                <li class=\"active\"><a href=\"/store/category/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\"><span class=\"icon icon-arrowR-org\"></span>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
                echo "</a></li>
                            ";
            } else {
                // line 36
                echo "                                <li><a href=\"/store/category/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\"><span class=\"icon icon-arrowR-org\"></span>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
                echo "</a></li>
                            ";
            }
            // line 38
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                    </ul>
                </div>
            </div>
        </div>

        <div class=\"col-xs-7\">
            <div class=\"panel p15 pb50 inner\">
                <div class=\"row\">
                    ";
        // line 47
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 48
            echo "                    <div class=\"col-xs-4\">
                        <li style=\"width: 170px;height: 113px;list-style:none;background:url('/images/loading.gif') no-repeat scroll 55px 35px\"></li>
                        <!--<img src=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "\" class=\"center-block img-responsive\" style=\"width:170px;height:113px;\">-->
                        <div class=\"mt5 mb10 clearfix\">
                            <div class=\"nowrap text-orgD\">";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "</div>
                            <p>价格：";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "price_name", array()), "html", null, true);
            echo " <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/icon-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "price_type_column", array()), "html", null, true);
            echo ".png\" />
                                ";
            // line 54
            if (((isset($context["is_login"]) ? $context["is_login"] : null) == 1)) {
                // line 55
                echo "                                <a  class=\"btn btn-xs btn-org pull-right\" href=\"javascript:exchangeValidate(";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, (isset($context["category_id"]) ? $context["category_id"] : null), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "price", array()), "html", null, true);
                echo ",'";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "price_type_name", array()), "html", null, true);
                echo "',";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "user_resource", array()), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, (isset($context["is_set_purchase"]) ? $context["is_set_purchase"] : null), "html", null, true);
                echo ")\">兑换</a></p>
                                ";
            } else {
                // line 57
                echo "                                <a  class=\"btn btn-xs pull-right\" href=\"javascript:;\"  disabled=\"true\" style=\"background-color:lightgrey\">兑换</a></p>
                                ";
            }
            // line 59
            echo "                        </div>
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "                </div>
                <div class=\"text-right\">
                    <ul class=\"pagination\">
                        ";
        // line 65
        echo (isset($context["pagiation"]) ? $context["pagiation"] : null);
        echo "
                    </ul>
                </div>
            </div>
        </div>
        ";
        // line 70
        $this->env->loadTemplate("faq_right_bar.html")->display($context);
        // line 71
        echo "    </div>
</div>
<input type=\"hidden\" id=\"loadingImages\" value=\"";
        // line 73
        echo twig_escape_filter($this->env, (isset($context["images"]) ? $context["images"] : null), "html", null, true);
        echo "\" />
";
    }

    // line 75
    public function block_script($context, array $blocks = array())
    {
        // line 76
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/imageLoaded.js\"></script>
<script src=\"";
        // line 77
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.validate.min.js\"></script>
<script src=\"";
        // line 78
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/store.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "store.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 78,  208 => 77,  203 => 76,  200 => 75,  194 => 73,  190 => 71,  188 => 70,  180 => 65,  175 => 62,  167 => 59,  163 => 57,  147 => 55,  145 => 54,  137 => 53,  133 => 52,  124 => 50,  120 => 48,  116 => 47,  106 => 39,  100 => 38,  92 => 36,  84 => 34,  81 => 33,  77 => 32,  59 => 16,  56 => 15,  51 => 12,  48 => 11,  43 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
