<?php

/* faq_right_bar.html */
class __TwigTemplate_24cb15aaa501db19b4d6b25b5a22ece492efa035b0f4bde42007b840fe8f0fc1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"col-xs-3\">
    <div class=\"panel panel-primary\">
        <div class=\"panel-heading\">
            <h2 class=\"panel-title\">常见问题</h2>
        </div>
        <div class=\"panel-body\">
            <div class=\"p15\">
                <ul class=\"list list05\">
                    ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["faq"]) ? $context["faq"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 10
            echo "                    <li><a href=\"/articles/detail/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
            echo "</a></li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "                </ul>
            </div>
        </div>
    </div>
    <div class=\"panel panel-primary\">
        <div class=\"panel-heading\">
            <h2 class=\"panel-title\">客服专区</h2>
        </div>
        <div class=\"panel-body\">
            <div class=\"p15 pb50\">
                <h4 class=\"phoneNumb text-blue\" style=\"text-align: center\">027-59817413</h4>
                <h4 class=\"phoneNumb text-blue\" style=\"text-align: center\"><a href=\"/service/fb\" >我要提意见</a></h4>
                <div class=\"text-center\"><span class=\"icon icon-qq-org\"></span>
                    <h4 class=\"bubble\"><span class=\"arrowL-b\"></span><a href=\"http://shang.qq.com/wpa/qunwpa?idkey=cccb0ff5e146f7ad2f26d700d1b1fa3a24bc82bdb115c6833bcb47bba52de14f\" target=\"_blank\">点击加入</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "faq_right_bar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 12,  33 => 10,  29 => 9,  19 => 1,);
    }
}
