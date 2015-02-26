<?php

/* store_product_result.html */
class __TwigTemplate_58389a80c903413f8e109784993fad504f4055c9ed35755e00daaf8f128edb28 extends Twig_Template
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
            echo "                        ";
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()) == (isset($context["category_id"]) ? $context["category_id"] : null))) {
                // line 34
                echo "                        <li class=\"active\"><a href=\"/store/category/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\"><span class=\"icon icon-arrowR-org\"></span>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
                echo "</a></li>
                        ";
            } else {
                // line 36
                echo "                        <li><a href=\"/store/category/";
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
                <ul class=\"nav nav-tabs nav02\" role=\"tablist\">
                    <li><a>商品兑换</a></li>
                </ul>
                <div class=\"alert alert-info\">
                    <div class=\"p10\">
                       <p><span class=\"text-orgD\">";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "name", array()), "html", null, true);
        echo "</span> &nbsp;兑换成功</p>
                    </div>
                </div>
            </div>
        </div>
        ";
        // line 56
        $this->env->loadTemplate("faq_right_bar.html")->display($context);
        // line 57
        echo "    </div>
</div>
<input type=\"hidden\" id=\"referer\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, (isset($context["referer"]) ? $context["referer"] : null), "html", null, true);
        echo "\" />
<script>
    window.onload=function(){
        var referer = document.getElementById('referer').value;
        setTimeout(function(){
            window.location.href = referer;
        },800);
    }
</script>
";
    }

    public function getTemplateName()
    {
        return "store_product_result.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 59,  129 => 57,  127 => 56,  119 => 51,  105 => 39,  99 => 38,  91 => 36,  83 => 34,  80 => 33,  76 => 32,  58 => 16,  55 => 15,  50 => 12,  47 => 11,  42 => 8,  39 => 7,  34 => 4,  31 => 3,);
    }
}
