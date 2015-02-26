<?php

/* errors.html */
class __TwigTemplate_5d412f42ab559d0291fa8caa3680da8486b2a5a3e9005be3322ef391dc60ac9e extends Twig_Template
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
        echo "武汉麻将
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "        <div class=\"\">
          <div class=\"row\">
            <div class=\"col-xs-12\">
              <div class=\"panel p15 pb50\">
                <div class=\"pageError\">
                  <div class=\"alert alert-info\">
                    <div class=\"p10 text-center\">
                      <div class=\"text-error\">错误</div>
                      <p class=\"text-blue\" style=\"font-size: 24px;\">";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
        echo "</p>
                    </div>
                  </div>
                  <div class=\"row\">
                    <div class=\"col-xs-6\"><a href=\"/\" class=\"btn btn-lg btn-block btn-info\">首页</a></div>
                      <div class=\"col-xs-6\">
                      ";
        // line 30
        if (((isset($context["is_login"]) ? $context["is_login"] : null) == 0)) {
            // line 31
            echo "                          <a href=\"#tops\" class=\"btn btn-lg btn-block btn-org\" onclick=\"\$('#loginPannel').trigger('mouseover')\">反馈问题</a>
                          ";
        } else {
            // line 33
            echo "                          <a href=\"/service/fb\" class=\"btn btn-lg btn-block btn-org\">反馈问题</a>
                          ";
        }
        // line 35
        echo "                      </div>
                  </div>
                </div> <!-- /error -->
              </div>
            </div>
          </div>
        </div>
";
    }

    public function getTemplateName()
    {
        return "errors.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 35,  83 => 33,  79 => 31,  77 => 30,  68 => 24,  58 => 16,  55 => 15,  50 => 12,  47 => 11,  42 => 8,  39 => 7,  34 => 4,  31 => 3,);
    }
}
