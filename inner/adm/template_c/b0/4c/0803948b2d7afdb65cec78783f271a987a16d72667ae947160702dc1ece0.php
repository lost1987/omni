<?php

/* gift.html */
class __TwigTemplate_b04c0803948b2d7afdb65cec78783f271a987a16d72667ae947160702dc1ece0 extends Twig_Template
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
        echo "<div class=\"am-cf am-padding\">
    <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\">礼包</strong> / <small>设置</small></div>
</div>

<form class=\"am-form-inline\" id=\"Form1\">
    <input type=\"hidden\" id=\"giftID1\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 1, array(), "array"), "id", array()), "html", null, true);
        echo "\"/>
    <fieldset>
        <legend>新手礼包</legend>
        <div class=\"am-g am-margin-top\">
            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">金币</label></div>
            <div class=\"am-u-sm-10 am-form-group\">
                <input type=\"text\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 1, array(), "array"), "items", array()), "c", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"c\" placeholder=\"输入数量\"/>
            </div>
        </div>
        <div class=\"am-g am-margin-top\">
            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">钻石</label></div>
            <div class=\"am-u-sm-10 am-form-group\">
                <input type=\"text\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 1, array(), "array"), "items", array()), "d", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"d\" placeholder=\"输入数量\"/>
            </div>
        </div>
        <div class=\"am-g am-margin-top\">
            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">门票</label></div>
            <div class=\"am-u-sm-10 am-form-group\">
                <input type=\"text\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 1, array(), "array"), "items", array()), "t", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"t\" placeholder=\"输入数量\"/>
            </div>
        </div>
        <div class=\"am-g am-margin-top\">
            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">奖券</label></div>
            <div class=\"am-u-sm-10 am-form-group\">
                <input type=\"text\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 1, array(), "array"), "items", array()), "cp", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"cp\" placeholder=\"输入数量\"/>
            </div>
        </div>
    </fieldset>
    <div class=\"am-g am-margin-top  am-margin-bottom\">
        <button type=\"submit\" class=\"submit am-btn am-btn-primary am-btn-xs\" style=\"margin-left:200px;\" >提交保存</button>
    </div>
</form>

    <form class=\"am-form-inline\" id=\"Form2\">
        <input type=\"hidden\" id=\"giftID2\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 2, array(), "array"), "id", array()), "html", null, true);
        echo "\"/>
    <fieldset>
        <legend>普通礼包</legend>
        <div class=\"am-g am-margin-top\">
            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">金币</label></div>
            <div class=\"am-u-sm-10 am-form-group\">
                <input type=\"text\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 2, array(), "array"), "items", array()), "c", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"c\" placeholder=\"输入数量\"/>
            </div>
        </div>
        <div class=\"am-g am-margin-top\">
            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">钻石</label></div>
            <div class=\"am-u-sm-10 am-form-group\">
                <input type=\"text\" value=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 2, array(), "array"), "items", array()), "d", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"d\" placeholder=\"输入数量\"/>
            </div>
        </div>
        <div class=\"am-g am-margin-top\">
            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">门票</label></div>
            <div class=\"am-u-sm-10 am-form-group\">
                <input type=\"text\" value=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 2, array(), "array"), "items", array()), "t", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"t\" placeholder=\"输入数量\"/>
            </div>
        </div>
        <div class=\"am-g am-margin-top\">
            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">奖券</label></div>
            <div class=\"am-u-sm-10 am-form-group\">
                <input type=\"text\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 2, array(), "array"), "items", array()), "cp", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"cp\" placeholder=\"输入数量\"/>
            </div>
        </div>
    </fieldset>
        <div class=\"am-g am-margin-top  am-margin-bottom\">
            <button type=\"submit\" class=\"submit am-btn am-btn-primary am-btn-xs\" style=\"margin-left:200px;\">提交保存</button>
        </div>
</form>

<form class=\"am-form-inline\" id=\"Form3\">
    <input type=\"hidden\" id=\"giftID3\" value=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 3, array(), "array"), "id", array()), "html", null, true);
        echo "\"/>
    <fieldset>
        <legend>累计邀请礼包</legend>
        <div class=\"am-g am-margin-top\">
            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">金币</label></div>
            <div class=\"am-u-sm-10 am-form-group\">
                <input type=\"text\" value=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 3, array(), "array"), "items", array()), "c", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"c\" placeholder=\"输入数量\"/>
            </div>
        </div>
        <div class=\"am-g am-margin-top\">
            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">钻石</label></div>
            <div class=\"am-u-sm-10 am-form-group\">
                <input type=\"text\" value=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 3, array(), "array"), "items", array()), "d", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"d\" placeholder=\"输入数量\"/>
            </div>
        </div>
        <div class=\"am-g am-margin-top\">
            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">门票</label></div>
            <div class=\"am-u-sm-10 am-form-group\">
                <input type=\"text\" value=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 3, array(), "array"), "items", array()), "t", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"t\" placeholder=\"输入数量\"/>
            </div>
        </div>
        <div class=\"am-g am-margin-top\">
            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">奖券</label></div>
            <div class=\"am-u-sm-10 am-form-group\">
                <input type=\"text\" value=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gifts"]) ? $context["gifts"] : null), 1, array(), "array"), "items", array()), "cp", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"cp\" placeholder=\"输入数量\"/>
            </div>
        </div>
    </fieldset>
    <div class=\"am-g am-margin-top  am-margin-bottom\">
        <button type=\"submit\" class=\"submit am-btn am-btn-primary am-btn-xs\" style=\"margin-left:200px;\">提交保存</button>
    </div>
</form>

<script src=\"";
        // line 107
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/jquery.validate.min.js\"></script>
<script src=\"";
        // line 108
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/standalone/gift.js\"></script>";
    }

    public function getTemplateName()
    {
        return "gift.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 108,  172 => 107,  160 => 98,  151 => 92,  142 => 86,  133 => 80,  124 => 74,  111 => 64,  102 => 58,  93 => 52,  84 => 46,  75 => 40,  62 => 30,  53 => 24,  44 => 18,  35 => 12,  26 => 6,  19 => 1,);
    }
}
