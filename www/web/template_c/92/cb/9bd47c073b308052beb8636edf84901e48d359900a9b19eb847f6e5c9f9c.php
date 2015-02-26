<?php

/* floatCode.html */
class __TwigTemplate_92cb9bd47c073b308052beb8636edf84901e48d359900a9b19eb847f6e5c9f9c extends Twig_Template
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
        echo "<div class=\"floatCode\" data-spy=\"affix\" data-offset-top=\"445\">
    <div class=\"p5\">
        <img src=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/images/code.png\" alt=\"\">
    </div>
    <a href=\"http://wuhanmj-apk.qiniudn.com/MjMobile_newbee.apk\" class=\"btn btn-block btn-info\">客户端下载</a>
</div>";
    }

    public function getTemplateName()
    {
        return "floatCode.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
