<?php

/* user_info.html */
class __TwigTemplate_d054af5b6a5815002a844f5fbc7fc7acacd5d291d19e93eee01129ae4cf09f7b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("basePersonnal.html");

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
    public function block_css($context, array $blocks = array())
    {
        // line 16
        echo "<link href=\"";
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/css/formError.css\" rel=\"stylesheet\">
";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "                <div class=\"col-xs-7\">
                    <div class=\"panel p15 inner pb50\">
                        <h4 class=\"mTitle\">账号信息</h4>
                        <div>
                            <ul class=\"nav nav-tabs nav02\" role=\"tablist\">
                                <li><a>我的资料</a></li>
                            </ul>
                            <div class=\"p15\">
                                <div class=\"media\">
                                    <a class=\"pull-left pr20\" href=\"javascript:showAvatarModal()\">
                                        <img id=\"avatar\" class=\"media-object\" src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar_path", array()), "html", null, true);
        echo "\" alt=\"Image\">
                                    </a>
                                    <div class=\"media-body\">
                                        <div class=\"row\">
                                            <div class=\"col-xs-8\">
                                                <p>账号：";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "login_name", array()), "html", null, true);
        echo "</p>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-xs-8\">
                                                <p>昵称：";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nickname", array()), "html", null, true);
        echo "</p>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-xs-8\">
                                                <p>性别：";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "gender", array()), "html", null, true);
        echo "</p>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-xs-8\">
                                                <p>所在地：<span id=\"area\">";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "area_name", array()), "html", null, true);
        echo "</span> <a href=\"javascript:;\" onclick=\"showChangeArea()\" title=\"修改地区\" class=\"icon icon-edit pull-right\"></a></p>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-xs-8\">
                                                <p>登录密码：******* <a href=\"javascript:;\" onclick=\"showChangePwd()\" title=\"修改登录密码\" class=\"icon icon-edit pull-right\"></a></p>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-xs-8\">
                                                ";
        // line 60
        if (((isset($context["is_set_purchase"]) ? $context["is_set_purchase"] : null) == 0)) {
            // line 61
            echo "                                                <p>消费密码： <a href=\"javascript:;\" class=\"text-blueD\" onclick=\"showSetPayPwd()\">设置</a></p>
                                                ";
        } else {
            // line 63
            echo "                                                <p>消费密码：******* <a href=\"javascript:;\" onclick=\"showChangePayPwd()\" title=\"修改消费密码\" class=\"icon icon-edit pull-right\"></a></p>
                                                ";
        }
        // line 65
        echo "                                            </div>
                                            ";
        // line 66
        if (((isset($context["is_set_purchase"]) ? $context["is_set_purchase"] : null) == 1)) {
            // line 67
            echo "                                            <div class=\"col-xs-4\"><a href=\"/user/payPassword\" class=\"text-blueD\">找回消费密码</a></div>
                                            ";
        }
        // line 69
        echo "                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class=\"nav nav-tabs nav02\" role=\"tablist\">
                                <li><a>我的财富</a></li>
                            </ul>
                            <div class=\"p15\">
                                <table class=\"table\">
                                    <tbody>
                                    <tr>
                                        <td width=\"140\"><span class=\"icon icon-fortune01\"></span> ";
        // line 80
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "coins", array()), "html", null, true);
        echo "</td>
                                        <td width=\"140\"><a href=\"/store\" class=\"btn btn-sm btn-danger\">购买</a></td>
                                        <td width=\"140\"><span class=\"icon icon-fortune02\"></span> ";
        // line 82
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "diamond", array()), "html", null, true);
        echo "</td>
                                        <td width=\"140\"><a href=\"/store\" class=\"btn btn-sm btn-danger\">购买</a></td>
                                    </tr>
                                    <tr>
                                        <td width=\"140\"><span class=\"icon icon-fortune03\"></span> ";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "ticket", array()), "html", null, true);
        echo "</td>
                                        <td width=\"140\"><a href=\"/store\" class=\"btn btn-sm btn-danger\">购买</a></td>
                                        <td width=\"140\"><span class=\"icon icon-fortune04\"></span> ";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "coupon", array()), "html", null, true);
        echo "</td>
                                        <td width=\"140\"><a href=\"/store\" class=\"btn btn-sm btn-danger\">购买</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <ul class=\"nav nav-tabs nav02\" role=\"tablist\">
                                <li><a>认证信息</a></li>
                            </ul>
                            <div class=\"p15\">
                                <table class=\"table\">
                                    <tbody>
                                    <tr>
                                        <td><a href=\"/userAuth/mobile\">
                                            ";
        // line 102
        if (($this->getAttribute((isset($context["userAuth"]) ? $context["userAuth"] : null), 3, array(), "array") != 1)) {
            // line 103
            echo "                                            <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/phone-unauth.png\" />
                                                手机未认证
                                            ";
        } else {
            // line 106
            echo "                                            <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/phone-auth.png\" />
                                                手机已认证
                                            ";
        }
        // line 109
        echo "                                        </a></td>
                                        <td><a href=\"/userAuth/email\">
                                            ";
        // line 111
        if (($this->getAttribute((isset($context["userAuth"]) ? $context["userAuth"] : null), 2, array(), "array") != 1)) {
            // line 112
            echo "                                            <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/email-unauth.png\" />
                                            邮箱未认证
                                            ";
        } else {
            // line 115
            echo "                                            <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/email-auth.png\" />
                                            邮箱已认证
                                            ";
        }
        // line 118
        echo "                                        </a></td>
                                        <td><a href=\"/userAuth/idCard\">
                                            ";
        // line 120
        if (($this->getAttribute((isset($context["userAuth"]) ? $context["userAuth"] : null), 1, array(), "array") != 1)) {
            // line 121
            echo "                                            <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/id-unauth.png\" />
                                            防沉迷未认证
                                            ";
        } else {
            // line 124
            echo "                                            <img src=\"";
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/icons/id-auth.png\" />
                                            防沉迷已认证
                                            ";
        }
        // line 127
        echo "                                        </a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

<!-- 修改地区 -->
<div class=\"modal fade\" id=\"changeAreaModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-md\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"\">修改地区</h4>
            </div>
            <div class=\"modal-body\">
                <div class=\"p30\">
                    <form class=\"form-horizontal\" role=\"form\">
                        <div class=\"form-group\">
                            <div class=\"col-xs-9\">
                                <select name=\"area\" id='area_chg' class=\"form-control\">
                                    ";
        // line 150
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
            // line 151
            echo "                                    ";
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0", array()) == $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "area", array()))) {
                // line 152
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0", array()), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, (isset($context["item"]) ? $context["item"] : null), "html", null, true);
                echo "</option>
                                    ";
            } else {
                // line 154
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0", array()), "html", null, true);
                echo "\" >";
                echo twig_escape_filter($this->env, (isset($context["item"]) ? $context["item"] : null), "html", null, true);
                echo "</option>
                                    ";
            }
            // line 156
            echo "                                    ";
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
        // line 157
        echo "                                </select>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <div class=\"text-center\">
                                <button type=\"button\" class=\"btn btn-info mr15\" onclick=\"changeArea()\">确认</button><button type=\"button\" class=\"btn btn-info\" data-dismiss=\"modal\" onclick=\"\$('#changeAreaModal').modal('hide');\">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /modal -->

<!-- 修改登录密码 -->
<div class=\"modal fade\" id=\"changePwdModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-md\">
        <div class=\"modal-content\" style=\"width:600px;display: inline-block\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"\">修改登录密码</h4>
            </div>
            <div class=\"modal-body\">
                <div class=\"p30\">
                    <form class=\"form-horizontal\" role=\"form\" id=\"changePwdForm\">
                        <div class=\"form-group\" style=\"height:80px;\">
                            <div class=\"col-xs-6\">
                                <label>原密码</label>
                                <input type=\"password\" id=\"oldPass\" name=\"oldPass\" class=\"form-control\" placeholder=\"6-16位字母、数字\"/>
                            </div>
                        </div>
                        <div class=\"form-group\" style=\"height:80px;\">
                            <div class=\"col-xs-6\">
                                <label>新密码</label>
                                <input type=\"password\" id=\"newPass\" name=\"newPass\" class=\"form-control\" placeholder=\"6-16位字母、数字\"/>
                            </div>
                        </div>
                        <div class=\"form-group\" style=\"height:80px;\">
                            <div class=\"col-xs-6\">
                                <label>确认新密码</label>
                                <input type=\"password\" id=\"newPass1\" name=\"newPass1\" class=\"form-control\" placeholder=\"6-16位字母、数字\"/>
                            </div>
                        </div>
                        </br>
                        <div class=\"form-group\">
                            <div class=\"text-center\">
                                <button type=\"submit\" class=\"btn btn-info mr15\" >确认</button><button type=\"button\" class=\"btn btn-info\" data-dismiss=\"modal\" onclick=\"\$('#changePwdModal').modal('hide');\">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /modal -->


<!-- 修改消费密码 -->
<div class=\"modal fade\" id=\"changePayPwdModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-md\">
        <div class=\"modal-content\" style=\"width:600px;display: inline-block\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"\">修改消费密码</h4>
            </div>
            <div class=\"modal-body\">
                <div class=\"p30\">
                    <form class=\"form-horizontal\" role=\"form\" id=\"changePayPwdForm\">
                        <div class=\"form-group\" style=\"height:80px;\">
                            <div class=\"col-xs-6\">
                                <label>原密码</label>
                                <input type=\"password\" id=\"oldPayPass\" name=\"oldPayPass\" class=\"form-control\" placeholder=\"6-16位字母、数字\"/>
                            </div>
                        </div>
                        <div class=\"form-group\" style=\"height:80px;\">
                            <div class=\"col-xs-6\">
                                <label>新密码</label>
                                <input type=\"password\" id=\"newPayPass\" name=\"newPayPass\" class=\"form-control\" placeholder=\"6-16位字母、数字\"/>
                            </div>
                        </div>
                        <div class=\"form-group\" style=\"height:80px;\">
                            <div class=\"col-xs-6\">
                                <label>确认新密码</label>
                                <input type=\"password\" id=\"newPayPass1\" name=\"newPayPass1\" class=\"form-control\" placeholder=\"6-16位字母、数字\"/>
                            </div>
                        </div>
                        </br>
                        <div class=\"form-group\">
                            <div class=\"text-center\">
                                <button type=\"submit\" class=\"btn btn-info mr15\" >确认</button><button type=\"button\" class=\"btn btn-info\" data-dismiss=\"modal\" onclick=\"\$('#changePayPwdModal').modal('hide');\">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /modal -->


<!-- 设置消费密码 -->
<div class=\"modal fade\" id=\"setPayPwdModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-md\">
        <div class=\"modal-content\" style=\"width:600px;display: inline-block\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"\">设置消费密码</h4>
            </div>
            <div class=\"modal-body\">
                <div class=\"p30\">
                    <form class=\"form-horizontal\" role=\"form\" id=\"setPayPwdForm\">
                        <div class=\"form-group\" style=\"height:80px;\">
                            <div class=\"col-xs-6\">
                                <label>消费密码</label>
                                <input type=\"password\" id=\"setPayPass\" name=\"setPayPass\" class=\"form-control\" placeholder=\"6-16位字母、数字\"/>
                            </div>
                        </div>
                        <div class=\"form-group\" style=\"height:80px;\">
                            <div class=\"col-xs-6\">
                                <label>确认消费密码</label>
                                <input type=\"password\" id=\"setPayPass1\" name=\"setPayPass1\" class=\"form-control\" placeholder=\"6-16位字母、数字\"/>
                            </div>
                        </div>
                        </br>
                        <div class=\"form-group\">
                            <div class=\"text-center\">
                                <button type=\"submit\" class=\"btn btn-info mr15\" >确认</button><button type=\"button\" class=\"btn btn-info\" data-dismiss=\"modal\" onclick=\"\$('#setPayPwdModal').modal('hide');\">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /modal -->


<!-- 选择头像 -->
<div class=\"modal fade\" id=\"avatarModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-md\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"\">选择头像</h4>
            </div>
            <div class=\"modal-body\">
                <div class=\"p30\">
                    <div class=\"row\">
                        <div class=\"col-xs-4 text-center\">
                            <a href=\"javascript:changeAvatar(0)\" style=\"pointer:hand\"><img src=\"";
        // line 307
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/images/tx/";
        echo twig_escape_filter($this->env, (isset($context["avatar_name"]) ? $context["avatar_name"] : null), "html", null, true);
        echo "1.jpg\" width=\"87\" height=\"85\" alt=\"\" class=\"center-block img-responsive\" ";
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar", array()) == 0)) {
            echo "style=\"border:2px orange solid\"";
        }
        echo "></a>
                        </div>
                        <div class=\"col-xs-4 text-center\">
                            <a href=\"javascript:changeAvatar(1)\"  style=\"pointer:hand\"><img src=\"";
        // line 310
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/images/tx/";
        echo twig_escape_filter($this->env, (isset($context["avatar_name"]) ? $context["avatar_name"] : null), "html", null, true);
        echo "2.jpg\" width=\"87\" height=\"85\" alt=\"\" class=\"center-block img-responsive\" ";
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar", array()) == 1)) {
            echo "style=\"border:2px orange solid\"";
        }
        echo "></a>
                        </div>
                        <div class=\"col-xs-4 text-center\">
                            <a href=\"javascript:changeAvatar(2)\"  style=\"pointer:hand\"><img src=\"";
        // line 313
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/images/tx/";
        echo twig_escape_filter($this->env, (isset($context["avatar_name"]) ? $context["avatar_name"] : null), "html", null, true);
        echo "3.jpg\" width=\"87\" height=\"85\" alt=\"\" class=\"center-block img-responsive\" ";
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar", array()) == 2)) {
            echo "style=\"border:2px orange solid\"";
        }
        echo "></a>
                        </div>
                        ";
        // line 315
        if (((isset($context["vip"]) ? $context["vip"] : null) == 1)) {
            // line 316
            echo "                        <div class=\"col-xs-4 text-center mt20\">
                            <a href=\"javascript:changeAvatar(3)\"  style=\"pointer:hand\"><img src=\"";
            // line 317
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/tx/";
            echo twig_escape_filter($this->env, (isset($context["avatar_name"]) ? $context["avatar_name"] : null), "html", null, true);
            echo "4.jpg\" width=\"87\" height=\"85\" alt=\"\" class=\"center-block img-responsive\" ";
            if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar", array()) == 3)) {
                echo "style=\"border:2px orange solid\"";
            }
            echo "></a>
                        </div>
                        <div class=\"col-xs-4 text-center mt20\">
                            <a href=\"javascript:changeAvatar(4)\"  style=\"pointer:hand\"><img src=\"";
            // line 320
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/tx/";
            echo twig_escape_filter($this->env, (isset($context["avatar_name"]) ? $context["avatar_name"] : null), "html", null, true);
            echo "5.jpg\" width=\"87\" height=\"85\" alt=\"\" class=\"center-block img-responsive\" ";
            if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar", array()) == 4)) {
                echo "style=\"border:2px orange solid\"";
            }
            echo "></a>
                        </div>
                        <div class=\"col-xs-4 text-center mt20\">
                            <a href=\"javascript:changeAvatar(5)\"  style=\"pointer:hand\"><img src=\"";
            // line 323
            echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
            echo "/images/tx/";
            echo twig_escape_filter($this->env, (isset($context["avatar_name"]) ? $context["avatar_name"] : null), "html", null, true);
            echo "6.jpg\" width=\"87\" height=\"85\" alt=\"\" class=\"center-block img-responsive\" ";
            if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar", array()) == 5)) {
                echo "style=\"border:2px orange solid\"";
            }
            echo "></a>
                        </div>
                        ";
        }
        // line 326
        echo "                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /modal -->
";
    }

    // line 333
    public function block_script($context, array $blocks = array())
    {
        // line 334
        echo "<script>
    var token = '";
        // line 335
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "';
</script>
<script src=\"";
        // line 337
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/jquery.validate.min.js\"></script>
<script src=\"";
        // line 338
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/common/md5.min.js\"></script>
<script src=\"";
        // line 339
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/js/userinfo.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "user_info.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  581 => 339,  577 => 338,  573 => 337,  568 => 335,  565 => 334,  562 => 333,  552 => 326,  540 => 323,  528 => 320,  516 => 317,  513 => 316,  511 => 315,  500 => 313,  488 => 310,  476 => 307,  324 => 157,  310 => 156,  302 => 154,  294 => 152,  291 => 151,  274 => 150,  249 => 127,  242 => 124,  235 => 121,  233 => 120,  229 => 118,  222 => 115,  215 => 112,  213 => 111,  209 => 109,  202 => 106,  195 => 103,  193 => 102,  176 => 88,  171 => 86,  164 => 82,  159 => 80,  146 => 69,  142 => 67,  140 => 66,  137 => 65,  133 => 63,  129 => 61,  127 => 60,  114 => 50,  106 => 45,  98 => 40,  90 => 35,  82 => 30,  70 => 20,  67 => 19,  60 => 16,  57 => 15,  52 => 12,  49 => 11,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
