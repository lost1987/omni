<?php

/* user_order.html */
class __TwigTemplate_38e9284314d9324e2120c2990bfdbc1246b79867c50e83feeb2ef2f03d37c467 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("basePersonnal.html");

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
        return "basePersonnal.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "武汉麻将-个人中心
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将-个人中心
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将-个人中心
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "            <div class=\"col-xs-10\">
              <div class=\"panel p15 inner pb50\">
                <h4 class=\"mTitle\">我的订单<span style=\"float:right;font-size:12px;\"><a href=\"/service/fb\">意见反馈</a></span></h4>
                <div class=\"\">
                  <table class=\"table table-border table-hover\">
                    <thead>
                      <tr>
                        <th width=\"10%\">订单号</th>
                        <th>商品信息</th>
                        <th width=\"14%\">时间</th>
                        <th width=\"12%\">订单状态</th>
                        <th width=\"15%\">操作</th>
                      </tr>
                    </thead>
                    <tbody>
                    ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orderlist"]) ? $context["orderlist"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 32
            echo "                    <tr>
                        <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "product_name", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "create_at", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "status", array()), "html", null, true);
            echo "</td>
                        <td class=\"text-center\"><a href=\"javascript:showDetail(";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
            echo ")\" class=\"btn btn-sm btn-danger\" id=\"detailsBtn\">详情</a></td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "                    </tbody>
                  </table>
                  <div class=\"text-right\">
                      <ul class=\"pagination\">
                        ";
        // line 44
        echo (isset($context["pagiation"]) ? $context["pagiation"] : null);
        echo "
                      </ul>
                  </div>
                </div>
              </div>
            </div>

<!-- 详情 -->
<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-md\" style=\"width:600px;\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"\">订单详情</h4>
            </div>
            <div class=\"modal-body\">
                <div class=\"p10\">
                    <table class=\"table table-border table-hover\">
                        <tbody>
                        <tr>
                            <td>收件人姓名：</td>
                            <td id=\"name\">/</td>
                            <td>联系方式：</td>
                            <td id=\"mobile\">/</td>
                        </tr>
                        <tr>
                            <td>快递单号：</td>
                            <td colspan=\"3\" id=\"express\">/</td>
                        </tr>
                        <tr>
                            <td>地址：</td>
                            <td colspan=\"3\" id=\"address\">/</td>
                        </tr>
                        <tr>
                            <td>订单号：</td>
                            <td id=\"order_id\">/</td>
                            <td>获取方式：</td>
                            <td>兑换</td>
                        </tr>
                        <tr>
                            <td>商品名称：</td>
                            <td id=\"product_name\">/</td>
                            <td>订单消耗：</td>
                            <td id=\"cost_name\">/</td>
                        </tr>
                        <tr>
                            <td>订单奖励：</td>
                            <td id=\"add_name\">/</td>
                            <td>订单状态：</td>
                            <td><span id=\"status\">/</span></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class=\"text-center mt20\">
                        <a href=\"#\" class=\"btn btn-info\" data-dismiss=\"modal\" id=\"okBtn\">确定</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /modal -->
";
    }

    // line 106
    public function block_script($context, array $blocks = array())
    {
        // line 107
        echo "<script src=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/user_order.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "user_order.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 107,  180 => 106,  114 => 44,  108 => 40,  99 => 37,  95 => 36,  91 => 35,  87 => 34,  83 => 33,  80 => 32,  76 => 31,  59 => 16,  56 => 15,  51 => 12,  48 => 11,  43 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
