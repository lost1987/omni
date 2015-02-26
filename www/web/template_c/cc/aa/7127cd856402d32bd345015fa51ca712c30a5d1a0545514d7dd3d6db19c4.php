<?php

/* service.html */
class __TwigTemplate_ccaa7127cd856402d32bd345015fa51ca712c30a5d1a0545514d7dd3d6db19c4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("baseService.html");

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
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "    <div class=\"col-xs-7\">
      <div class=\"panel p15 inner pb50\">
        <h4 class=\"mTitle\">服务指南</h4>
        <div class=\"\">
          <div class=\"row\">
            <div class=\"col-xs-4 text-center\">
              <span class=\"block\">
                <span class=\"icon iconL-phone\"></span>
              </span>
              <h4>客服热线</h4>
              <p class=\"text-blue\">027-59817413</p>
            </div>
            <div class=\"col-xs-4 text-center\">
              <a href=\"http://shang.qq.com/wpa/qunwpa?idkey=cccb0ff5e146f7ad2f26d700d1b1fa3a24bc82bdb115c6833bcb47bba52de14f\" target=\"_blank\">
              <span class=\"block\">
                <span class=\"icon iconL-qq\"></span>
              </span>
              <h4>玩家群</h4>
              <p class=\"text-blue\">129166897</p>
              </a>
            </div>
            <div class=\"col-xs-4 text-center\">
              <span class=\"block\">
                <img src=\"images/code.png\" alt=\"\" class=\"img-responsive\">
              </span>
              <h4>微信</h4>
              <p class=\"text-blue\">Wuhan-mahjong</p>
            </div>
          </div>
        </div>
        <h4 class=\"mTitle\">自助服务</h4>
        <div class=\"\">
          <div class=\"row mb50\">
            <div class=\"col-xs-3 text-center\">
              <a href=\"/service/sus\" class=\"block b-sm\">
                <span class=\"icon iconL-man\"></span>
              </a>
              <h4>账号申诉</h4>
            </div>
            <div class=\"col-xs-3 text-center\">
              ";
        // line 56
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 0)) {
            // line 57
            echo "                    <a href=\"#tops\"  class=\"block b-sm pt5\" onclick=\"\$('#loginPannel').trigger('mouseover')\">
               ";
        } else {
            // line 59
            echo "                    <a href=\"/userAuth/mobile\" class=\"block b-sm\">
              ";
        }
        // line 61
        echo "                <span class=\"icon iconL-cellphone\"></span>
              </a>
              <h4>手机认证</h4>
            </div>
            <div class=\"col-xs-3 text-center\">
                ";
        // line 66
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 0)) {
            // line 67
            echo "                    <a href=\"#tops\"  class=\"block b-sm pt5\" onclick=\"\$('#loginPannel').trigger('mouseover')\">
                ";
        } else {
            // line 69
            echo "                    <a href=\"/userAuth/email\" class=\"block b-sm pt5\">
                ";
        }
        // line 71
        echo "                <span class=\"icon iconL-email\"></span>
              </a>
              <h4>邮箱认证</h4>
            </div>
            <div class=\"col-xs-3 text-center\">
                ";
        // line 76
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 0)) {
            // line 77
            echo "                    <a href=\"#tops\"  class=\"block b-sm pt5\" onclick=\"\$('#loginPannel').trigger('mouseover')\">
                ";
        } else {
            // line 79
            echo "                    <a href=\"/userAuth/idCard\" class=\"block b-sm pt5\">
                ";
        }
        // line 81
        echo "                <span class=\"icon iconL-chat\"></span>
              </a>
              <h4>防沉迷认证</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
";
    }

    // line 91
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "service.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 91,  145 => 81,  141 => 79,  137 => 77,  135 => 76,  128 => 71,  124 => 69,  120 => 67,  118 => 66,  111 => 61,  107 => 59,  103 => 57,  101 => 56,  59 => 16,  56 => 15,  51 => 12,  48 => 11,  43 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
