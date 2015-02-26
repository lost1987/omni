<?php

/* news_detail.html */
class __TwigTemplate_08c35212d1eb239a2ab7713b3b29d3c9d3ce66c887b46b7c3c74dbc7ff6f68b8 extends Twig_Template
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
        echo "武汉麻将-";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()))) : ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()))), "html", null, true);
        echo "
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将-";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()))) : ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()))), "html", null, true);
        echo "
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将-";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()))) : ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()))), "html", null, true);
        echo "
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "        ";
        $this->env->loadTemplate("floatCode.html")->display($context);
        // line 17
        echo "        <div class=\"\">
          <div class=\"panel p30\">
            <div class=\"row\">
              <div class=\"col-xs-8\">
                <div class=\"inner\">
                  <div class=\"textTitle mb30\">
                    <h2>";
        // line 23
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()))) : ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()))), "html", null, true);
        echo "</h2>
                    <div class=\"spes\"><span class=\"pr20\">作者：";
        // line 24
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "author", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "author", array()), "/")) : ("/")), "html", null, true);
        echo "</span><span class=\"pr20\">日期：";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "publish_time", array()), "html", null, true);
        echo "</span>
                        <div class=\"pull-right\" style=\"width: 200px;\">分享到：
                          <div class=\"bdsharebuttonbox pull-right\"><a href=\"#\" class=\"bds_more\" data-cmd=\"more\"></a><a href=\"#\" class=\"bds_qzone\" data-cmd=\"qzone\" title=\"分享到QQ空间\"></a><a href=\"#\" class=\"bds_tsina\" data-cmd=\"tsina\" title=\"分享到新浪微博\"></a><a href=\"#\" class=\"bds_tqq\" data-cmd=\"tqq\" title=\"分享到腾讯微博\"></a><a href=\"#\" class=\"bds_renren\" data-cmd=\"renren\" title=\"分享到人人网\"></a><a href=\"#\" class=\"bds_weixin\" data-cmd=\"weixin\" title=\"分享到微信\"></a></div>
  <script>window._bd_share_config={\"common\":{\"bdSnsKey\":{},\"bdText\":\"\",\"bdMini\":\"2\",\"bdPic\":\"\",\"bdStyle\":\"0\",\"bdSize\":\"16\"},\"share\":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                        </div>
                    </div>
                  </div>
                  <div class=\"textCon\">
                      ";
        // line 32
        echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "content", array());
        echo "
                  </div>
                </div>
              </div>
                ";
        // line 36
        $this->env->loadTemplate("news_right_bar.html")->display($context);
        // line 37
        echo "            </div>
          </div>
        </div>
";
    }

    public function getTemplateName()
    {
        return "news_detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 37,  99 => 36,  92 => 32,  79 => 24,  75 => 23,  67 => 17,  64 => 16,  61 => 15,  54 => 12,  51 => 11,  44 => 8,  41 => 7,  34 => 4,  31 => 3,);
    }
}
