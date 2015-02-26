<?php

/* user_info_phone.html */
class __TwigTemplate_458df70165cf81ab6b2bcb1d4773beb0c9b73c85625ad5db2b0c34b680afd64f extends Twig_Template
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
        echo "    <div class=\"col-xs-7\">
      <div class=\"panel p15 inner pb50\">
        <h4 class=\"mTitle\">账号信息<small class=\"text-blue\"><span class=\"pl5 pr5 text-grey\">|</span>手机认证</small></h4>
        <div>
          <div class=\"alert alert-info\">
            <div class=\"p10\">
            服务说明：绑定手机是保证账号安全最重要的途径，请您认真填写自己的手机号码，杜绝安全隐患。
            </div>
          </div>
          <form class=\"form-horizontal\" role=\"form\">
            <div class=\"form-group\">
              <label for=\"\" class=\"col-xs-3 control-label\">手机号：</label>
              <div class=\"col-xs-6\">
                <input type=\"text\" class=\"form-control\" id=\"mobile\">
                <p class=\"help-block\">（请输入11位有效手机号码）</p>
              </div>
            </div>
            <div class=\"form-group\">
              <label for=\"\" class=\"col-xs-3 control-label\">短信验证码：</label>
              <div class=\"col-xs-4\">
                <input type=\"text\" class=\"form-control\" id=\"smsCode\" >
              </div>
              <div class=\"col-xs-3\"><a href=\"javascript:getSms()\" class=\"btn btn-org\" id=\"smsBtn\">发送短信验证码</a></div>
            </div>
            <div class=\"form-group\">
              <div class=\"col-xs-offset-3 col-xs-6\">
                <button type=\"button\" class=\"btn btn-info\" id=\"authBtn\" onclick=\"auth()\">立即认证</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
";
    }

    // line 51
    public function block_script($context, array $blocks = array())
    {
        // line 52
        echo "<script>
    var secondsRemain = ";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["secondsRemain"]) ? $context["secondsRemain"] : null), "html", null, true);
        echo ";
</script>
<script src=\"";
        // line 55
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/user.auth.phone.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "user_info_phone.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 55,  102 => 53,  99 => 52,  96 => 51,  59 => 16,  56 => 15,  51 => 12,  48 => 11,  43 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
