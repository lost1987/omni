<?php

/* charging.html */
class __TwigTemplate_f70a6948b531216596a61276a96128ddc8b57cdf34a73cc57552091a48c9f7bc extends Twig_Template
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
        echo "武汉麻将-充值中心
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将-充值中心
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将-充值中心
";
    }

    // line 15
    public function block_css($context, array $blocks = array())
    {
        // line 16
        echo "<link href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/css/formError.css\" rel=\"stylesheet\">
<style>
    .btn-org.active{
        background-color:  #24cdb8;
        border-color:  #24cdb8;
    }
</style>
";
    }

    // line 25
    public function block_content($context, array $blocks = array())
    {
        // line 26
        echo "<div class=\"col-xs-9\">
    <div class=\"row\">
        <div class=\"col-xs-12\">
            <div class=\"panel p15\">
                <ul class=\"steps\">
                    <div class=\"line\" style=\"left: 16.6667%; right: 16.6667%;\"></div>
                    <li class=\"active\">
                        <span class=\"spec\">选择充值方式</span>
                        <span class=\"circle\"></span>
                    </li>
                    <li>
                        <span class=\"spec\">确认信息</span>
                        <span class=\"circle\"></span>
                    </li>
                    <li>
                        <span class=\"spec\">充值完成</span>
                        <span class=\"circle\"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-xs-3\" style=\"width:22.2%;\">
            <div class=\"bg-blueD inner\">
                <div class=\"leftSide pt30 pb30 pl10\">
                    <ul class=\"nav nav-pills nav-stacked\" role=\"tablist\">
                        <li class=\"";
        // line 53
        if (((isset($context["pay_type"]) ? $context["pay_type"] : null) == 0)) {
            echo "active";
        }
        echo "\"><a href=\"/payment/prepare/0\"><span class=\"icon icon-arrowR-org\"></span>网银充值</a></li>
                        <li class=\"";
        // line 54
        if (((isset($context["pay_type"]) ? $context["pay_type"] : null) == 1)) {
            echo "active";
        }
        echo "\"><a href=\"/payment/prepare/1\" ><span class=\"icon icon-arrowR-org\"></span>支付宝</a></li>
                        <li class=\"";
        // line 55
        if (((isset($context["pay_type"]) ? $context["pay_type"] : null) == 2)) {
            echo "active";
        }
        echo "\"><a href=\"/payment/prepare/2\" ><span class=\"icon icon-arrowR-org\"></span>电话卡</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class=\"col-xs-9\" style=\"width:77.8%;\">
            <form action=\"/payment/go\" method=\"get\" id=\"payForm\">
                <input type=\"hidden\" name=\"token\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" id=\"token\" />
                <input type=\"hidden\" name=\"pay_type\" value=\"";
        // line 63
        echo twig_escape_filter($this->env, (isset($context["pay_type"]) ? $context["pay_type"] : null), "html", null, true);
        echo "\" id=\"pay_type\" />
            <div class=\"panel p15 inner pb50\">
                <h4 class=\"mTitle\">网银充值</h4>
                <div class=\"pl20 pr20 mb30\" style=\"height:80px\">
                    <div class=\"row\">
                        <div class=\"col-xs-6\">
                            <label>充入账号（即游戏登陆账号）：</label>
                            <div class=\"wrap\"><input type=\"text\" id=\"login_name\"  name=\"login_name\" class=\"form-control\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, (isset($context["login_name"]) ? $context["login_name"] : null), "html", null, true);
        echo "\"><span class=\"btn-close\" style=\"top:7px;color:darkred;cursor:pointer\" onclick=\"\$('#login_name').val('')\">X</span></div>
                        </div>
                        <div class=\"col-xs-6\">
                            <label>请再次确认充值账号：</label>
                            <div class=\"wrap\"><input type=\"text\" id=\"re_login_name\" name=\"re_login_name\" class=\"form-control\" value=\"";
        // line 74
        echo twig_escape_filter($this->env, (isset($context["login_name"]) ? $context["login_name"] : null), "html", null, true);
        echo "\"><span class=\"btn-close\" style=\"top:7px;color:darkred;cursor:pointer\" onclick=\"\$('#re_login_name').val('')\">X</span></div>
                        </div>
                    </div>
                </div>
                <h5 class=\"mTitle\"><span class=\"icon icon-house-b\"></span> 需要充值的金额：</h5>
                <div class=\"pl20 pr20\">
                    <div class=\"row chargingBtns\" data-toggle=\"buttons\">
                        ";
        // line 81
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["amount_types"]) ? $context["amount_types"] : null));
        foreach ($context['_seq'] as $context["money"] => $context["diamond"]) {
            // line 82
            echo "                        <div class=\"col-xs-4 mb15\" >
                            <label class=\"btn btn-block btn-org\">
                                <input type=\"radio\" name=\"amount_type\" id=\"\" autocomplete=\"off\" value=\"";
            // line 84
            echo twig_escape_filter($this->env, (isset($context["money"]) ? $context["money"] : null), "html", null, true);
            echo "\" ><span class=\"icon icon-diamond-w\"></span>";
            echo twig_escape_filter($this->env, (isset($context["diamond"]) ? $context["diamond"] : null), "html", null, true);
            echo " <span class=\"pull-right numb\">￥";
            echo twig_escape_filter($this->env, (isset($context["money"]) ? $context["money"] : null), "html", null, true);
            echo "元</span>
                            </label>
                        </div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['money'], $context['diamond'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "                    </div>
                    <div class=\"row\">
                        <div class=\"col-xs-12 mt50\">
                            <a class=\"btn btn-info\" id=\"okBtn\" onclick=\"doSubmit()\">提交充值</a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
";
        // line 100
        $this->env->loadTemplate("faq_right_bar.html")->display($context);
        // line 101
        echo "</div>
</div>
<!-- 确认充值 -->
<div class=\"modal fade\" id=\"toPay\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-md\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"\">确认充值</h4>
            </div>
            <div class=\"modal-body\">
                <div class=\"p10\">
                    <table class=\"table table-border table-hover\">
                        <tbody>
                        <tr width=\"30%\">
                            <td>您的充值用户名为：</td>
                            <td id=\"confirm_login_name\">2434ere</td>
                        </tr>
                        <tr>
                            <td>您充值的金额为：</td>
                            <td><span class=\"text-org\" id=\"confirm_amount\">3242.00</span>&nbsp;元</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class=\"text-center mt20\">
                        <a class=\"btn btn-info\" onclick=\"pay()\">确定</a>
                        <a class=\"btn btn-info\" data-dismiss=\"modal\">取消</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /modal -->
";
    }

    // line 136
    public function block_script($context, array $blocks = array())
    {
        // line 137
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/user.charging.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "charging.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 137,  235 => 136,  198 => 101,  196 => 100,  182 => 88,  168 => 84,  164 => 82,  160 => 81,  150 => 74,  143 => 70,  133 => 63,  129 => 62,  117 => 55,  111 => 54,  105 => 53,  76 => 26,  73 => 25,  60 => 16,  57 => 15,  52 => 12,  49 => 11,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
