<?php

/* signin.html */
class __TwigTemplate_acd094e20dad0f60b7a690bff0c2e65e646b4a12af053d1ab96c8bae3c1f55bd extends Twig_Template
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
        echo "武汉麻将-用户注册
";
    }

    // line 7
    public function block_keywords($context, array $blocks = array())
    {
        // line 8
        echo "武汉麻将-用户注册
";
    }

    // line 11
    public function block_description($context, array $blocks = array())
    {
        // line 12
        echo "武汉麻将-用户注册
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
    .form-group{
        height:36px;
    }
</style>
";
    }

    // line 24
    public function block_content($context, array $blocks = array())
    {
        // line 25
        echo "<div class=\"panel signinPanel\" style=\"height:600px;\">
    <div class=\"row\">
        <div class=\"col-xs-8\">
            <h3>注册账号</h3>
            <form class=\"form-horizontal mt50\" role=\"form\" id=\"signForm\" action=\"/user/register\" method=\"post\">
                <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\"/>
                <input type=\"hidden\" name=\"hid_password\" id=\"hid_password\" value=\"\" />
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-2 control-label\">用户名<font color=\"red\">&nbsp;*</font>：</label>
                    <div class=\"col-xs-6\">
                        <input type=\"text\" class=\"form-control\" id=\"rlogin_name\" name=\"login_name\" value=\"\" placeholder=\"4-16位字母、下划线或数字\" />
                    </div>
                    <div class=\"col-xs-4\">
                        <!-- <div class=\"alert alert-danger mbn font12\">两次密码输入不一致</div> -->
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-2 control-label\">昵称<font color=\"red\">&nbsp;*</font>：</label>
                    <div class=\"col-xs-4\">
                        <input type=\"text\" class=\"form-control\" id=\"nickname\" name=\"nickname\" value=\"\" placeholder=\"3-6位字母、下划线、数字、中文\" >
                    </div>
                    <div class=\"col-xs-2\">
                        <a href=\"javascript:;\" id=\"rdname\" class=\"btn btn-block btn-org\">随机</a>
                    </div>
                    <div class=\"col-xs-4\">
                        <!-- <div class=\"alert alert-danger mbn font12\">两次密码输入不一致</div> -->
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-2 control-label\">密码<font color=\"red\">&nbsp;*</font>：</label>
                    <div class=\"col-xs-6\">
                        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\"  placeholder=\"6-16位字母、数字\" >
                    </div>
                    <div class=\"col-xs-4\">
                        <!-- <div class=\"alert alert-danger mbn font12\">两次密码输入不一致</div> -->
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-2 control-label\">确认密码<font color=\"red\">&nbsp;*</font>：</label>
                    <div class=\"col-xs-6\">
                        <input type=\"password\" class=\"form-control\" id=\"re_password\" name=\"re_password\" placeholder=\"6-16位字母、数字\" >
                    </div>
                    <div class=\"col-xs-4\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-2 control-label\">性别<font color=\"red\">&nbsp;*</font>：</label>
                    <div class=\"col-xs-6\">
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"gender\"  value=\"0\" checked=\"checked\"> 男
                        </label>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"gender\"  value=\"1\"> 女
                        </label>
                    </div>
                    <div class=\"col-xs-4\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"\" class=\"col-xs-2 control-label\">我在<font color=\"red\">&nbsp;*</font>：</label>
                    <div class=\"col-xs-6\">
                        <select name=\"area\" id=\"area\" class=\"form-control\">
                            ";
        // line 87
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["areas"]) ? $context["areas"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 88
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["item"]) ? $context["item"] : null), "html", null, true);
            echo "</option>
                            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 90
        echo "                        </select>
                    </div>
                    <div class=\"col-xs-4\">
                        <!-- <div class=\"alert alert-danger mbn font12\">两次密码输入不一致</div> -->
                    </div>
                </div>
                <div class=\"form-group\">
                    <div class=\"col-xs-offset-2 col-xs-6\">
                        <div class=\"checkbox\">
                            <label>
                                <input type=\"checkbox\" name=\"agree\" id=\"agree\"> 我已看过并同意<a href=\"/user/agreement\" target=\"_blank\">《用户服务协议》</a>
                            </label>
                        </div>
                    </div>
                </div>
                <div class=\"form-group\">
                    <div class=\"col-xs-offset-2 col-xs-6\">
                        <button type=\"submit\" class=\"btn btn-block btn-info\">立即注册</button>
                    </div>
                </div>
            </form>
        </div>
        <div class=\"col-xs-4\">
            <ul class=\"list list02 mt30\">
                <li>已经拥有武汉麻将账号？<a href=\"/\" class=\"text-blue\">直接登录</a></li>
                <li>用其它账号登录 <a href=\"/weibo/sina/login\"><span class=\"icon icon-sina\"></span><strong>新浪微博登录</strong></a></li>
                <li>点击下载武汉麻将移动应用
                    <div class=\"row mt30\">
                        <div class=\"col-xs-7\">
                            <a href=\"http://wuhanmj-apk.qiniudn.com/MjMobile_newbee.apk\" target=\"_blank\" class=\"btn btn-sm btn-block btn-success mb10\"><span class=\"icon android\"></span></a>
                            <a href=\"javascript:alert('敬请期待')\" class=\"btn btn-sm btn-block btn-info\"><span class=\"icon apple\"></span></a>
                        </div>
                        <div class=\"col-xs-5\">
                            <img src=\"";
        // line 123
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/images/code.png\" alt=\"\" style=\"width:95px;\">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
";
    }

    // line 133
    public function block_script($context, array $blocks = array())
    {
        // line 134
        echo "<script> var token = '";
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "';</script>
<script src=\"";
        // line 135
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/md5.min.js\"></script>
<script src=\"";
        // line 136
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.validate.min.js\"></script>
<script src=\"";
        // line 137
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/signIn.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "signin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 137,  238 => 136,  234 => 135,  229 => 134,  226 => 133,  213 => 123,  178 => 90,  159 => 88,  142 => 87,  82 => 30,  75 => 25,  72 => 24,  60 => 16,  57 => 15,  52 => 12,  49 => 11,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
