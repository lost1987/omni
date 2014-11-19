<?php

/* base.html */
class __TwigTemplate_0eeee73dfb51cadf3aa84fb279edf988da96c82d44e7348141b6664f985c3451 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'description' => array($this, 'block_description'),
            'author' => array($this, 'block_author'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'javascript_plugins' => array($this, 'block_javascript_plugins'),
            'javascript_custom' => array($this, 'block_javascript_custom'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>

<!-- 

Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 2.3.1

Version: 1.3

Author: KeenThemes

Website: http://www.keenthemes.com/preview/?theme=metronic

Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469

-->

<!--[if IE 8]> <html lang=\"en\" class=\"ie8 no-js\"> <![endif]-->

<!--[if IE 9]> <html lang=\"en\" class=\"ie9 no-js\"> <![endif]-->

<!--[if !IE]><!--> <html lang=\"en\" class=\"no-js\"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

    <meta charset=\"utf-8\" />

    <title>";
        // line 29
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\" />

    <meta content=\"";
        // line 33
        $this->displayBlock('description', $context, $blocks);
        echo "\" name=\"description\" />

    <meta content=\"";
        // line 35
        $this->displayBlock('author', $context, $blocks);
        echo "\" name=\"author\" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <link href=\"/media/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\"/>

    <link href=\"/media/css/bootstrap-responsive.min.css\" rel=\"stylesheet\" type=\"text/css\"/>

    <link href=\"/media/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\"/>

    <link href=\"/media/css/style-metro.css\" rel=\"stylesheet\" type=\"text/css\"/>

    <link href=\"/media/css/style.css\" rel=\"stylesheet\" type=\"text/css\"/>

    <link href=\"/media/css/style-responsive.css\" rel=\"stylesheet\" type=\"text/css\"/>

    <link href=\"/media/css/default.css\" rel=\"stylesheet\" type=\"text/css\" id=\"style_color\"/>

    <link href=\"/media/css/uniform.default.css\" rel=\"stylesheet\" type=\"text/css\"/>

    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    ";
        // line 58
        $this->displayBlock('css', $context, $blocks);
        // line 60
        echo "    <!-- END PAGE LEVEL STYLES -->

    <link rel=\"shortcut icon\" href=\"/media/image/favicon.ico\" />
</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class=\"page-header-fixed\">

<!-- BEGIN HEADER -->

<div class=\"header navbar navbar-inverse navbar-fixed-top\">

<!-- BEGIN TOP NAVIGATION BAR -->

<div class=\"navbar-inner\">

<div class=\"container-fluid\">

<!-- BEGIN LOGO -->

<a class=\"brand\" href=\"index.html\">

    <img src=\"/media/image/logo.png\" alt=\"logo\"/>

</a>

<!-- END LOGO -->

<!-- BEGIN RESPONSIVE MENU TOGGLER -->

<a href=\"javascript:;\" class=\"btn-navbar collapsed\" data-toggle=\"collapse\" data-target=\".nav-collapse\">

    <img src=\"/media/image/menu-toggler.png\" alt=\"\" />

</a>

<!-- END RESPONSIVE MENU TOGGLER -->

<!-- BEGIN TOP NAVIGATION MENU -->

<ul class=\"nav pull-right\">

<!-- BEGIN NOTIFICATION DROPDOWN -->

<li class=\"dropdown\" id=\"header_notification_bar\">

    <a href=\"#\" title=\"系统功能\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

        <i class=\"icon-warning-sign\"></i>

        <span class=\"badge\"><!--6--></span>

    </a>

    <ul class=\"dropdown-menu extended notification\">

        <li>

            <p>系统功能</p>

        </li>

        <li>

            <a href=\"/system/ajax_clear_cache\">
                清理缓存
            </a>

        </li>
    </ul>

</li>

<!-- END NOTIFICATION DROPDOWN -->

<!-- BEGIN INBOX DROPDOWN -->

<li class=\"dropdown\" id=\"header_inbox_bar\">

    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

        <i class=\"icon-envelope\"></i>

        <span class=\"badge\"><!--5--></span>

    </a>

    <ul class=\"dropdown-menu extended inbox\">

                <li>

                    <p>敬请期待</p>

                </li>
<!--
                <li>

                    <a href=\"inbox.html?a=view\">

                        <span class=\"photo\"><img src=\"/media/image/avatar2.jpg\" alt=\"\" /></span>

                                        <span class=\"subject\">

                                        <span class=\"from\">Lisa Wong</span>

                                        <span class=\"time\">Just Now</span>

                                        </span>

                                        <span class=\"message\">

                                        Vivamus sed auctor nibh congue nibh. auctor nibh

                                        auctor nibh...

                                        </span>

                    </a>

                </li>

                <li>

                    <a href=\"inbox.html?a=view\">

                        <span class=\"photo\"><img src=\".//media/image/avatar3.jpg\" alt=\"\" /></span>

                                        <span class=\"subject\">

                                        <span class=\"from\">Richard Doe</span>

                                        <span class=\"time\">16 mins</span>

                                        </span>

                                        <span class=\"message\">

                                        Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh

                                        auctor nibh...

                                        </span>

                    </a>

                </li>

                <li>

                    <a href=\"inbox.html?a=view\">

                        <span class=\"photo\"><img src=\".//media/image/avatar1.jpg\" alt=\"\" /></span>

                                        <span class=\"subject\">

                                        <span class=\"from\">Bob Nilson</span>

                                        <span class=\"time\">2 hrs</span>

                                        </span>

                                        <span class=\"message\">

                                        Vivamus sed nibh auctor nibh congue nibh. auctor nibh

                                        auctor nibh...

                                        </span>

                    </a>

                </li>

                <li class=\"external\">

                    <a href=\"inbox.html\">See all messages <i class=\"m-icon-swapright\"></i></a>

                </li>
                -->
            </ul>

</li>

<!-- END INBOX DROPDOWN -->

<!-- BEGIN TODO DROPDOWN -->

<li class=\"dropdown\" id=\"header_task_bar\">

    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

        <i class=\"icon-tasks\"></i>

        <span class=\"badge\"><!--5--></span>

    </a>

    <ul class=\"dropdown-menu extended tasks\">

        <li>

            <p>敬请期待</p>

        </li>
        <!--
            <li>

                <a href=\"#\">

                                    <span class=\"task\">

                                    <span class=\"desc\">New release v1.2</span>

                                    <span class=\"percent\">30%</span>

                                    </span>

                                    <span class=\"progress progress-success \">

                                    <span style=\"width: 30%;\" class=\"bar\"></span>

                                    </span>

                </a>

            </li>

            <li>

                <a href=\"#\">

                                    <span class=\"task\">

                                    <span class=\"desc\">Application deployment</span>

                                    <span class=\"percent\">65%</span>

                                    </span>

                                    <span class=\"progress progress-danger progress-striped active\">

                                    <span style=\"width: 65%;\" class=\"bar\"></span>

                                    </span>

                </a>

            </li>

            <li>

                <a href=\"#\">

                                    <span class=\"task\">

                                    <span class=\"desc\">Mobile app release</span>

                                    <span class=\"percent\">98%</span>

                                    </span>

                                    <span class=\"progress progress-success\">

                                    <span style=\"width: 98%;\" class=\"bar\"></span>

                                    </span>

                </a>

            </li>

            <li>

                <a href=\"#\">

                                    <span class=\"task\">

                                    <span class=\"desc\">Database migration</span>

                                    <span class=\"percent\">10%</span>

                                    </span>

                                    <span class=\"progress progress-warning progress-striped\">

                                    <span style=\"width: 10%;\" class=\"bar\"></span>

                                    </span>

                </a>

            </li>

            <li>

                <a href=\"#\">

                                    <span class=\"task\">

                                    <span class=\"desc\">Web server upgrade</span>

                                    <span class=\"percent\">58%</span>

                                    </span>

                                    <span class=\"progress progress-info\">

                                    <span style=\"width: 58%;\" class=\"bar\"></span>

                                    </span>

                </a>

            </li>

            <li>

                <a href=\"#\">

                                    <span class=\"task\">

                                    <span class=\"desc\">Mobile development</span>

                                    <span class=\"percent\">85%</span>

                                    </span>

                                    <span class=\"progress progress-success\">

                                    <span style=\"width: 85%;\" class=\"bar\"></span>

                                    </span>

                </a>

            </li>

            <li class=\"external\">

                <a href=\"#\">See all tasks <i class=\"m-icon-swapright\"></i></a>

            </li>
        -->
        </ul>

</li>

<!-- END TODO DROPDOWN -->

<!-- BEGIN USER LOGIN DROPDOWN -->

<li class=\"dropdown user\">

    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

        <img alt=\"\" src=\"/media/image/avatar1_small.jpg\" />

        <span class=\"username\">";
        // line 420
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["session"]) ? $context["session"] : null), "nickname", array()), "html", null, true);
        echo "</span>

        <i class=\"icon-angle-down\"></i>

    </a>

    <ul class=\"dropdown-menu\">

        <li><a href=\"javascript:;\"><i class=\"icon-user\"></i>我的资料</a></li>

        <li><a href=\"javascript:;\"><i class=\"icon-calendar\"></i> 我的历程</a></li>

        <li><a href=\"javascript:;\"><i class=\"icon-envelope\"></i> 我的消息</a></li>

        <li><a href=\"javascript:;\"><i class=\"icon-tasks\"></i> 我的任务</a></li>

        <li class=\"divider\"></li>

        <li><a href=\"javascript:;\"><i class=\"icon-lock\"></i> 锁屏</a></li>

        <li><a href=\"/login/logout\"><i class=\"icon-key\"></i>注销</a></li>

    </ul>

</li>

<!-- END USER LOGIN DROPDOWN -->

</ul>

<!-- END TOP NAVIGATION MENU -->

</div>

</div>

<!-- END TOP NAVIGATION BAR -->

</div>

<!-- END HEADER -->

<!-- BEGIN CONTAINER -->

<div class=\"page-container\">

<!-- BEGIN SIDEBAR -->

<div class=\"page-sidebar nav-collapse collapse\">

<!-- BEGIN SIDEBAR MENU -->

<ul class=\"page-sidebar-menu\">

<li>

    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

    <div class=\"sidebar-toggler hidden-phone\"></div>

    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

</li>

<li>

    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

    <form class=\"sidebar-search\">

        <div class=\"input-box\">

            <a href=\"javascript:;\" class=\"remove\"></a>

            <input type=\"text\" placeholder=\"Search...\" />

            <input type=\"button\" class=\"submit\" value=\" \" />

        </div>

    </form>
</li>
    <!-- END RESPONSIVE QUICK SEARCH FORM -->

    <!--BEGIN NAVIGATOR-->
    ";
        // line 505
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["modules_root"]) ? $context["modules_root"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["root"]) {
            // line 506
            echo "    ";
            if (($this->getAttribute((isset($context["root"]) ? $context["root"] : null), "visible", array()) == 1)) {
                // line 507
                echo "                ";
                if (((isset($context["module_root_sel_id"]) ? $context["module_root_sel_id"] : null) == $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "id", array()))) {
                    // line 508
                    echo "                         <li class=\"active\">
                ";
                } else {
                    // line 510
                    echo "                        <li class=\"\">
                ";
                }
                // line 512
                echo "
                    <a href=\"javascript:;\">

                        <i class=\"";
                // line 515
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "icon", array()), "html", null, true);
                echo "\"></i>

                        <span class=\"title\">";
                // line 517
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "module_name", array()), "html", null, true);
                echo "</span>

                        <span class=\"arrow\"></span>

                    </a>
                    <ul class=\"sub-menu\">
                        ";
                // line 523
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["modules_child"]) ? $context["modules_child"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 524
                    echo "                            ";
                    if ((($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "pid", array()) == $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "id", array())) && ($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "visible", array()) == 1))) {
                        // line 525
                        echo "                                    <li >

                                        <a href=\"";
                        // line 527
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "module_url", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "id", array()), "html", null, true);
                        echo "\">

                                            ";
                        // line 529
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "module_name", array()), "html", null, true);
                        echo "</a>

                                    </li>
                            ";
                    }
                    // line 533
                    echo "                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 534
                echo "                    </ul>
                </li>
            </li>
    ";
            }
            // line 538
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['root'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 539
        echo "</ul>

<!-- END SIDEBAR MENU -->

</div>

<!-- END SIDEBAR -->

<!-- BEGIN PAGE -->

<div class=\"page-content\">

    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

    <div id=\"portlet-config\" class=\"modal hide\">

        <div class=\"modal-header\">

            <button data-dismiss=\"modal\" class=\"close\" type=\"button\"></button>

            <h3>Widget Settings</h3>

        </div>

        <div class=\"modal-body\">

            Widget settings form goes here

        </div>

    </div>

    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

    <!-- BEGIN PAGE CONTAINER-->

    <div class=\"container-fluid\">
        ";
        // line 576
        $this->displayBlock('content', $context, $blocks);
        // line 578
        echo "    </div>

    <!-- END PAGE CONTAINER-->

</div>

<!-- END PAGE -->

</div>

<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->

<div class=\"footer\">

    <div class=\"footer-inner\">

        2013 &copy; Metronic by keenthemes.

    </div>

    <div class=\"footer-tools\">

\t\t\t<span class=\"go-top\">

\t\t\t<i class=\"icon-angle-up\"></i>

\t\t\t</span>

    </div>

</div>

<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

<!-- BEGIN CORE PLUGINS -->

<script src=\"/media/js/jquery-1.10.1.min.js\" type=\"text/javascript\"></script>

<script src=\"/media/js/jquery-migrate-1.2.1.min.js\" type=\"text/javascript\"></script>

<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

<script src=\"/media/js/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>

<script src=\"/media/js/bootstrap.min.js\" type=\"text/javascript\"></script>

<!--[if lt IE 9]>

<script src=\"/media/js/excanvas.min.js\"></script>

<script src=\"/media/js/respond.min.js\"></script>

<![endif]-->

<script src=\"/media/js/jquery.slimscroll.min.js\" type=\"text/javascript\"></script>

<script src=\"/media/js/jquery.blockui.min.js\" type=\"text/javascript\"></script>

<script src=\"/media/js/jquery.cookie.min.js\" type=\"text/javascript\"></script>

<script src=\"/media/js/jquery.uniform.min.js\" type=\"text/javascript\" ></script>

<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src=\"/media/js/date.js\" type=\"text/javascript\"></script>
<script src=\"/media/js/daterangepicker.js\" type=\"text/javascript\"></script>
";
        // line 649
        $this->displayBlock('javascript_plugins', $context, $blocks);
        // line 651
        echo "<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src=\"/media/js/app.js\" type=\"text/javascript\"></script>
";
        // line 655
        $this->displayBlock('javascript_custom', $context, $blocks);
        // line 657
        echo "<!-- END PAGE LEVEL SCRIPTS -->

<script>

    jQuery(document).ready(function() {

        App.init(); // initlayout and core plugins

    });

</script>
<!-- END JAVASCRIPTS -->
</html>";
    }

    // line 29
    public function block_title($context, array $blocks = array())
    {
    }

    // line 33
    public function block_description($context, array $blocks = array())
    {
    }

    // line 35
    public function block_author($context, array $blocks = array())
    {
    }

    // line 58
    public function block_css($context, array $blocks = array())
    {
        // line 59
        echo "    ";
    }

    // line 576
    public function block_content($context, array $blocks = array())
    {
        // line 577
        echo "        ";
    }

    // line 649
    public function block_javascript_plugins($context, array $blocks = array())
    {
    }

    // line 655
    public function block_javascript_custom($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  800 => 655,  795 => 649,  791 => 577,  788 => 576,  784 => 59,  781 => 58,  776 => 35,  771 => 33,  766 => 29,  750 => 657,  748 => 655,  742 => 651,  740 => 649,  667 => 578,  665 => 576,  626 => 539,  620 => 538,  614 => 534,  608 => 533,  601 => 529,  594 => 527,  590 => 525,  587 => 524,  583 => 523,  574 => 517,  569 => 515,  564 => 512,  560 => 510,  556 => 508,  553 => 507,  550 => 506,  546 => 505,  458 => 420,  96 => 60,  94 => 58,  68 => 35,  63 => 33,  56 => 29,  26 => 1,  255 => 136,  252 => 135,  244 => 129,  241 => 128,  226 => 114,  218 => 111,  210 => 109,  207 => 108,  201 => 106,  198 => 105,  191 => 103,  186 => 102,  184 => 101,  178 => 98,  172 => 95,  166 => 92,  160 => 89,  154 => 86,  148 => 83,  142 => 80,  136 => 77,  132 => 75,  128 => 73,  124 => 71,  122 => 70,  116 => 67,  108 => 65,  104 => 64,  54 => 16,  51 => 15,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
