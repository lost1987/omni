<?php

/* reward_setting.html */
class __TwigTemplate_9ee41ac8a71ecda8bb3685feb347e171cdc9d3f426b918309c57ae3806b26baa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "

    <!-- content start -->
    <div class=\"am-cf am-padding\">
        <div class=\"am-fl am-cf\"><strong class=\"am-text-primary am-text-lg\">用户</strong> / <small>奖励设置&nbsp;<a class=\"am-badge am-badge-success am-radius\">";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "login_name", array()), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nickname", array()), "html", null, true);
        echo "</a></small></div>
    </div>
            <form id=\"reward_form\" class=\"am-form-inline\">
            <div class=\"am-tabs am-margin\" id=\"doc-my-tabs\">
                <ul class=\"am-tabs-nav am-nav am-nav-tabs\">
                    <li class=\"am-active\"><a href=\"#tab1\">充值返利</a></li>
                    <li><a href=\"#tab2\">提现返利</a></li>
                    <li><a href=\"#tab3\">成长返利</a></li>
                    <li><a href=\"#tab4\">签到返利</a></li>
                </ul>

                <div class=\"am-tabs-bd\">
                    <div class=\"am-tab-panel am-fade am-in am-active\" id=\"tab1\">
                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">一级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                              <input type=\"text\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "recharge", array()), "ratio1", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"recharge_ratio1\" placeholder=\"返利比例\"/>
                            </div>
                        </div>

                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">二级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "recharge", array()), "ratio2", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"recharge_ratio2\" placeholder=\"返利比例\"/>
                            </div>
                        </div>

                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">三级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "recharge", array()), "ratio3", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"recharge_ratio3\" placeholder=\"返利比例\"/>
                            </div>
                        </div>

                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">四级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "recharge", array()), "ratio4", array()), "html", null, true);
        echo "\" class=\"am-form-field span3 am-margin-right-sm\" name=\"recharge_ratio4\" placeholder=\"返利比例\"/>
                            </div>
                        </div>
                    </div>

                    <div class=\"am-tab-panel am-fade\" id=\"tab2\">
                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">一级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio1", array()), 0, array(), "array"), "money", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio01\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio1", array()), 0, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio01\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio1", array()), 1, array(), "array"), "money", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio11\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio1", array()), 1, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio11\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio1", array()), 2, array(), "array"), "money", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio21\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio1", array()), 2, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio21\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio1", array()), 3, array(), "array"), "money", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio31\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio1", array()), 3, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio31\" placeholder=\"新蜂币\"/><br/><br/>
                            </div>
                        </div>

                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">二级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio2", array()), 0, array(), "array"), "money", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio02\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio2", array()), 0, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio02\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio2", array()), 1, array(), "array"), "money", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio12\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio2", array()), 1, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio12\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio2", array()), 2, array(), "array"), "money", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio22\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio2", array()), 2, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio22\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio2", array()), 3, array(), "array"), "money", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio32\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio2", array()), 3, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio32\" placeholder=\"新蜂币\"/><br/><br/>
                            </div>
                        </div>

                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">三级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio3", array()), 0, array(), "array"), "money", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio03\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio3", array()), 0, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio03\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio3", array()), 1, array(), "array"), "money", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio13\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio3", array()), 1, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio13\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio3", array()), 2, array(), "array"), "money", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio23\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio3", array()), 2, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio23\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio3", array()), 3, array(), "array"), "money", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio33\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio3", array()), 3, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio33\" placeholder=\"新蜂币\"/><br/><br/>
                            </div>
                        </div>

                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">四级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio4", array()), 0, array(), "array"), "money", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio04\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio4", array()), 0, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio04\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio4", array()), 1, array(), "array"), "money", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio14\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio4", array()), 1, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio14\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio4", array()), 2, array(), "array"), "money", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio24\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio4", array()), 2, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio24\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio4", array()), 3, array(), "array"), "money", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_money_ratio34\" placeholder=\"提现金额\"/>
                                <input type=\"text\" value=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "deposit", array()), "ratio4", array()), 3, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"deposit_coins_ratio34\" placeholder=\"新蜂币\"/><br/><br/>
                            </div>
                        </div>
                    </div>

                    <div class=\"am-tab-panel am-fade\" id=\"tab3\">
                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">一级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 109
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio1", array()), 0, array(), "array"), "lv", array()), "html", null, true);
        echo "\" class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_ratio01\" placeholder=\"奖励级别\"/>
                                <input type=\"text\" value=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio1", array()), 0, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_coins_ratio01\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 111
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio1", array()), 1, array(), "array"), "lv", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_ratio11\" placeholder=\"奖励级别\"/>
                                <input type=\"text\" value=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio1", array()), 1, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_coins_ratio11\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio1", array()), 2, array(), "array"), "lv", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_ratio21\" placeholder=\"奖励级别\"/>
                                <input type=\"text\" value=\"";
        // line 114
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio1", array()), 2, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_coins_ratio21\" placeholder=\"新蜂币\"/><br/><br/>
                            </div>
                        </div>

                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">二级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 121
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio2", array()), 0, array(), "array"), "lv", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_ratio02\" placeholder=\"奖励级别\"/>
                                <input type=\"text\" value=\"";
        // line 122
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio2", array()), 0, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_coins_ratio02\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 123
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio2", array()), 1, array(), "array"), "lv", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_ratio12\" placeholder=\"奖励级别\"/>
                                <input type=\"text\" value=\"";
        // line 124
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio2", array()), 1, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_coins_ratio12\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 125
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio2", array()), 2, array(), "array"), "lv", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_ratio22\" placeholder=\"奖励级别\"/>
                                <input type=\"text\" value=\"";
        // line 126
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio2", array()), 2, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_coins_ratio22\" placeholder=\"新蜂币\"/><br/><br/>
                            </div>
                        </div>

                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">三级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio3", array()), 0, array(), "array"), "lv", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_ratio03\" placeholder=\"奖励级别\"/>
                                <input type=\"text\" value=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio3", array()), 0, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_coins_ratio03\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio3", array()), 1, array(), "array"), "lv", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_ratio13\" placeholder=\"奖励级别\"/>
                                <input type=\"text\" value=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio3", array()), 1, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_coins_ratio13\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio3", array()), 2, array(), "array"), "lv", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_ratio23\" placeholder=\"奖励级别\"/>
                                <input type=\"text\" value=\"";
        // line 138
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio3", array()), 2, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_coins_ratio23\" placeholder=\"新蜂币\"/><br/><br/>
                            </div>
                        </div>

                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">四级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 145
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio4", array()), 0, array(), "array"), "lv", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_ratio04\" placeholder=\"奖励级别\"/>
                                <input type=\"text\" value=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio4", array()), 0, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_coins_ratio04\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 147
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio4", array()), 1, array(), "array"), "lv", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_ratio14\" placeholder=\"奖励级别\"/>
                                <input type=\"text\" value=\"";
        // line 148
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio4", array()), 1, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_coins_ratio14\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 149
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio4", array()), 2, array(), "array"), "lv", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_ratio24\" placeholder=\"奖励级别\"/>
                                <input type=\"text\" value=\"";
        // line 150
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "levelup", array()), "ratio4", array()), 2, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"levelup_coins_ratio24\" placeholder=\"新蜂币\"/><br/><br/>
                            </div>
                        </div>
                    </div>
                    <div class=\"am-tab-panel am-fade\" id=\"tab4\">
                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">一级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 158
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio1", array()), 0, array(), "array"), "days", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_ratio01\" placeholder=\"签到次数\"/>
                                <input type=\"text\" value=\"";
        // line 159
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio1", array()), 0, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_coins_ratio01\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 160
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio1", array()), 1, array(), "array"), "days", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_ratio11\" placeholder=\"签到次数\"/>
                                <input type=\"text\" value=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio1", array()), 1, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_coins_ratio11\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 162
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio1", array()), 2, array(), "array"), "days", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_ratio21\" placeholder=\"签到次数\"/>
                                <input type=\"text\" value=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio1", array()), 2, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_coins_ratio21\" placeholder=\"新蜂币\"/><br/><br/>
                            </div>
                        </div>

                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">二级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 170
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio2", array()), 0, array(), "array"), "days", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_ratio02\" placeholder=\"签到次数\"/>
                                <input type=\"text\" value=\"";
        // line 171
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio2", array()), 0, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_coins_ratio02\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 172
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio2", array()), 1, array(), "array"), "days", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_ratio12\" placeholder=\"签到次数\"/>
                                <input type=\"text\" value=\"";
        // line 173
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio2", array()), 1, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_coins_ratio12\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 174
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio2", array()), 2, array(), "array"), "days", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_ratio22\" placeholder=\"签到次数\"/>
                                <input type=\"text\" value=\"";
        // line 175
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio2", array()), 2, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_coins_ratio22\" placeholder=\"新蜂币\"/><br/><br/>
                            </div>
                        </div>

                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">三级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 182
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio3", array()), 0, array(), "array"), "days", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_ratio03\" placeholder=\"签到次数\"/>
                                <input type=\"text\" value=\"";
        // line 183
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio3", array()), 0, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_coins_ratio03\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 184
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio3", array()), 1, array(), "array"), "days", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_ratio13\" placeholder=\"签到次数\"/>
                                <input type=\"text\" value=\"";
        // line 185
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio3", array()), 1, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_coins_ratio13\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 186
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio3", array()), 2, array(), "array"), "days", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_ratio23\" placeholder=\"签到次数\"/>
                                <input type=\"text\" value=\"";
        // line 187
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio3", array()), 2, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_coins_ratio23\" placeholder=\"新蜂币\"/><br/><br/>
                            </div>
                        </div>

                        <div class=\"am-g am-margin-top\">
                            <div class=\"am-u-sm-2 am-text-right\"><label class=\"am-form-label fix-height\">四级下线</label></div>
                            <div class=\"am-u-sm-10 am-form-group\">
                                <input type=\"text\" value=\"";
        // line 194
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio4", array()), 0, array(), "array"), "days", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_ratio04\" placeholder=\"签到次数\"/>
                                <input type=\"text\" value=\"";
        // line 195
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio4", array()), 0, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_coins_ratio04\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 196
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio4", array()), 1, array(), "array"), "days", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_ratio14\" placeholder=\"签到次数\"/>
                                <input type=\"text\" value=\"";
        // line 197
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio4", array()), 1, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_coins_ratio14\" placeholder=\"新蜂币\"/><br/><br/>
                                <input type=\"text\" value=\"";
        // line 198
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio4", array()), 2, array(), "array"), "days", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_ratio24\" placeholder=\"签到次数\"/>
                                <input type=\"text\" value=\"";
        // line 199
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reward"]) ? $context["reward"] : null), "login", array()), "ratio4", array()), 2, array(), "array"), "newcoins", array()), "html", null, true);
        echo "\"class=\"am-form-field span4 am-margin-right-sm\" name=\"login_coins_ratio24\" placeholder=\"新蜂币\"/><br/><br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class=\"am-margin\">
                <button type=\"submit\" class=\"submit am-btn am-btn-primary am-btn-xs\">提交保存</button>
                <button type=\"button\" class=\"am-btn am-btn-primary am-btn-xs\">放弃保存</button>
            </div>
        </div>
        </form>

    <!-- content end -->

    ";
        // line 216
        $this->displayBlock('script', $context, $blocks);
    }

    public function block_script($context, array $blocks = array())
    {
        // line 217
        echo "    <script>
        var uid = ";
        // line 218
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "uid", array()), "html", null, true);
        echo ";
    </script>
    <script src=\"";
        // line 220
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/lib/jquery.validate.min.js\"></script>
    <script src=\"";
        // line 221
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/assets/standalone/reward_setting.js\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "reward_setting.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  512 => 221,  508 => 220,  503 => 218,  500 => 217,  494 => 216,  474 => 199,  470 => 198,  466 => 197,  462 => 196,  458 => 195,  454 => 194,  444 => 187,  440 => 186,  436 => 185,  432 => 184,  428 => 183,  424 => 182,  414 => 175,  410 => 174,  406 => 173,  402 => 172,  398 => 171,  394 => 170,  384 => 163,  380 => 162,  376 => 161,  372 => 160,  368 => 159,  364 => 158,  353 => 150,  349 => 149,  345 => 148,  341 => 147,  337 => 146,  333 => 145,  323 => 138,  319 => 137,  315 => 136,  311 => 135,  307 => 134,  303 => 133,  293 => 126,  289 => 125,  285 => 124,  281 => 123,  277 => 122,  273 => 121,  263 => 114,  259 => 113,  255 => 112,  251 => 111,  247 => 110,  243 => 109,  231 => 100,  227 => 99,  223 => 98,  219 => 97,  215 => 96,  211 => 95,  207 => 94,  203 => 93,  193 => 86,  189 => 85,  185 => 84,  181 => 83,  177 => 82,  173 => 81,  169 => 80,  165 => 79,  155 => 72,  151 => 71,  147 => 70,  143 => 69,  139 => 68,  135 => 67,  131 => 66,  127 => 65,  117 => 58,  113 => 57,  109 => 56,  105 => 55,  101 => 54,  97 => 53,  93 => 52,  89 => 51,  77 => 42,  67 => 35,  57 => 28,  47 => 21,  26 => 5,  20 => 1,);
    }
}
