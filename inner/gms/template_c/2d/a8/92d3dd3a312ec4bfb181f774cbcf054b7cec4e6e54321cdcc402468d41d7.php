<?php

/* admin_permission.html */
class __TwigTemplate_2da892d3dd3a312ec4bfb181f774cbcf054b7cec4e6e54321cdcc402468d41d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'javascript_plugins' => array($this, 'block_javascript_plugins'),
            'javascript_custom' => array($this, 'block_javascript_custom'),
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
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "权限分配
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/select2_metro.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/chosen.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/addtional.css\" />
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "<div class=\"row-fluid\">
    <div class=\"span12\">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class=\"page-title\">
            用户管理
            <small>权限分配</small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>

<div class=\"row-fluid\">
    <div class=\"span12\">
        <!-- BEGIN VALIDATION STATES-->
        <div class=\"portlet box\">

            <div class=\"portlet-title\">
                <div class=\"caption\"><i class=\"icon-reorder\">&nbsp;正在为用户[<b class=\"red\">";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "account", array()), "html", null, true);
        echo "</b>]分配权限<br/>&nbsp;&nbsp;&nbsp;&nbsp;<b class=\"red\">#不可见#</b>即不会出现在左侧的导航栏</i></div>
                <div class=\"tools\">
                    <a href=\"javascript:;\" class=\"collapse\"></a>
                    <a href=\"#portlet-config\" data-toggle=\"modal\" class=\"config\"></a>
                    <a href=\"javascript:;\" class=\"reload\"></a>
                    <a href=\"javascript:;\" class=\"remove\"></a>
                </div>
            </div>


            <div class=\"portlet-body form\">
                <!-- BEGIN FORM-->
                <form action=\"";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : null), "html", null, true);
        echo "\" id=\"form_sample_2\" class=\"form-horizontal\" method=\"post\">
                    <input type=\"hidden\" name=\"admin_id\"   value=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array()), "html", null, true);
        echo "\"/>
                    <input type=\"hidden\" name=\"account\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "account", array()), "html", null, true);
        echo "\" />
                    <input type=\"hidden\" name=\"permissions\" id=\"permissions\"  value=\"\"/>
                    <div class=\"alert alert-error hide\">
                        <button class=\"close\" data-dismiss=\"alert\"></button>
                        您提交的信息有错误请更正后再保存
                    </div>

                    <div class=\"alert alert-success hide\">
                        <button class=\"close\" data-dismiss=\"alert\"></button>
                        保存成功!
                    </div>

                    ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["root_modules"]) ? $context["root_modules"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["root"]) {
            // line 59
            echo "                        <div class=\"control-group\">
                            <label class=\"control-label\" rel=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "id", array()), "html", null, true);
            echo "\"><b class=\"midnight\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["root"]) ? $context["root"] : null), "module_name", array()), "html", null, true);
            echo "</b></label>
                            <div class=\"controls\">
                                <hr/>
                                ";
            // line 63
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["child_modules"]) ? $context["child_modules"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 64
                echo "                                ";
                if (($this->getAttribute((isset($context["root"]) ? $context["root"] : null), "id", array()) == $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "pid", array()))) {
                    // line 65
                    echo "                                                ";
                    if ($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "has_permission", array())) {
                        // line 66
                        echo "                                                              <input type=\"checkbox\" checked=\"checked\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "module_permission", array()), "html", null, true);
                        echo "\" >
                                                ";
                    } else {
                        // line 68
                        echo "                                                              <input type=\"checkbox\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "module_permission", array()), "html", null, true);
                        echo "\" >
                                                ";
                    }
                    // line 70
                    echo "                                        ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "module_name", array()), "html", null, true);
                    echo "
                                        ";
                    // line 71
                    if (($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "visible", array()) == 0)) {
                        // line 72
                        echo "                                            (不可见)
                                        ";
                    }
                    // line 74
                    echo "                                ";
                }
                // line 75
                echo "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "                            </div>
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['root'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "
                    <div class=\"form-actions\">
                        <button type=\"submit\" class=\"btn red\">保存</button>
                        <button type=\"reset\" class=\"btn\">重置</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>

";
    }

    // line 94
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 95
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/additional-methods.min.js\"></script>
";
    }

    // line 99
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 100
        echo "<script type=\"text/javascript\" src=\"/media/js/private/admin_permission.js\"></script>
<script>
    \$(function(){
        FormValidation.init();
        init_permissions();
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "admin_permission.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 100,  201 => 99,  195 => 95,  192 => 94,  175 => 79,  167 => 76,  161 => 75,  158 => 74,  154 => 72,  152 => 71,  147 => 70,  141 => 68,  135 => 66,  132 => 65,  129 => 64,  125 => 63,  117 => 60,  114 => 59,  110 => 58,  95 => 46,  91 => 45,  87 => 44,  72 => 32,  53 => 15,  50 => 14,  43 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
