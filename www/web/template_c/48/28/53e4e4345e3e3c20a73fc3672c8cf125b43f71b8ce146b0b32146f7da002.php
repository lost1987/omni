<?php

/* signup.html */
class __TwigTemplate_482853e4e4345e3e3c20a73fc3672c8cf125b43f71b8ce146b0b32146f7da002 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'seo' => array($this, 'block_seo'),
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_seo($context, array $blocks = array())
    {
        // line 4
        echo "<title>武汉麻将-用户注册</title>
<meta name=\"keywords\" content=\"武汉麻将-用户注册\" />
<meta name=\"description\" content=\"武汉麻将-用户注册\" />
";
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "<script>
var token = '";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "';
</script>
<link href=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/img/secondary_Style.css\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.ext.js\" ></script>
<script type=\"text/javascript\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/md5.min.js\" ></script>
<script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/signup.js\" ></script>
";
    }

    // line 20
    public function block_content($context, array $blocks = array())
    {
        // line 21
        echo "<div id=\"m_content_2\">
    <h3><a href=\"/\"><em></em></a><b class=\"zhzc\">帐号注册</b></h3>
    <form action=\"/user/register\" method=\"post\" id=\"register_form\">
    <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\" />
    <table width=\"790\" border=\"0\" cellspacing=\"10\" cellpadding=\"0\" class=\"table\">
        <tr>
            <td width=\"220\" align=\"right\">* 用户名：</td>
            <td width=\"570\">
                <input type=\"text\" name=\"login_name\" id=\"login_name\" class=\"input\" />
                <label class=\"exsit\">账号包含敏感词或已存在，请直接<a href=\"/\" style=\"font-weight:bold;float:none\">登录</a>或更换</label>
                <label class=\"tip\">用于游戏登陆时使用，请务必牢记（4-16位字母、下划线或数字）</label>
                <label class=\"error\">请输入4-16位的英文字母、英文符号、数字</label>
                <label class=\"valid\" style=\"display:none\">可以注册</label>
            </td>
        </tr>
        <tr>
            <td align=\"right\">* 昵称：</td>
            <td><input type=\"text\" name=\"nickname\" id=\"nickname\" class=\"input\" />
                <a href=\"javascript:;\" id=\"rdname\" class=\"brown_btn\">随机</a>
                <label class=\"exsit\">昵称包含敏感词或已存在，请更换</label>
                <label class=\"tip\">用于游戏中显示， 好友找到你时也需要哦</label>
                <label class=\"error\">请输入3-6位的英文字母、下划线、数字、中文</label>
                <label class=\"valid\" style=\"display:none\">有效</label></td>
        </tr>
        <tr>
            <td align=\"right\">* 密码：</td>
            <td>
                <input type=\"password\" name=\"password\" id=\"password\" class=\"input\" />
                <label class=\"tip\">上点心吧， 你的身家就靠这个了（6-16位字母、符号或数字）</label>
                <label class=\"error\">请输入6-16位的英文字母、英文符号、数字</label>
                <label class=\"valid\" style=\"display:none\">有效</label></td>
            </td>
        </tr>
        <tr>
            <td align=\"right\">* 确认密码：</td>
            <td>
                <input type=\"password\" name=\"re_password\" id=\"re_password\" class=\"input\" />
                <label class=\"tip\">请重复输入密码</label>
                <label class=\"error\">确认密码错误</label>
                <label class=\"valid\" style=\"display:none\">有效</label></td>
            </td>
        </tr>
        <tr>
            <td align=\"right\">* 邮箱：</td>
            <td style=\"position:relative\">
                <input type=\"text\" name=\"email\" id=\"email\" class=\"input\" />
                <label class=\"tip\">用于找回密码</label>
                <label class=\"error\">请输入正确的邮件格式</label>
                <label class=\"valid\" style=\"display:none\">有效</label>
                <label class=\"exsit\">邮箱地址已被注册</label>
                <table id=\"autoShow\" style=\"display: none;\">
                    <tbody>
                    <tr style=\"background-image: none; background-repeat: repeat; background-attachment: scroll; background-position: 0% 0%; background-clip: border-box; background-origin: padding-box; background-size: auto auto;\">
                        <td rel=\"0\">www@qq.com</td>
                    </tr>
                    <tr style=\"\">
                        <td rel=\"1\">www@163.com</td>
                    </tr>
                    <tr style=\"\">
                        <td rel=\"2\">www@sina.com</td>
                    </tr>
                    <tr style=\"\">
                        <td rel=\"3\">ww@126.com</td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td align=\"right\">手机号：</td>
            <td><input type=\"text\" name=\"mobile\" id=\"mobile\" class=\"input\" /></td>
        </tr>
        <tr>
            <td align=\"right\">性别：</td>
            <td>
                <select name=\"gender\" id=\"gender\" class=\"select\">
                    <option value=\"0\">男</option>
                    <option value=\"1\">女</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align=\"right\">我在：</td>
            <td>
                <select name=\"area\" id=\"area\" class=\"select\">
                    ";
        // line 106
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
            // line 107
            echo "                        <option value=\"";
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
        // line 109
        echo "                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type=\"checkbox\" name=\"checkbox\" id=\"checkbox\" style=\"float:left; margin-top:4px; _margin-top:0\" checked=\"checked\"/><em><a href=\"/user/agreement\" target=\"_blank\">我已阅读《用户服务协议》</a></em></td>
        </tr>
        <tr>
            <td></td>
            <td><input type=\"button\" id=\"\" class=\"submit_2\" value=\"立即注册\"  onclick=\"doSubmit()\"/></td>
        </tr>
    </table>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "signup.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 109,  179 => 107,  162 => 106,  77 => 24,  72 => 21,  69 => 20,  63 => 16,  59 => 15,  55 => 14,  51 => 13,  46 => 11,  43 => 10,  40 => 9,  33 => 4,  30 => 3,);
    }
}
