<?php

/* article_add.html */
class __TwigTemplate_cfb351a3d87101280b1396148bbb7c1db83ef2e8fba2f456d19a50406822f8fa extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["action_name"]) ? $context["action_name"] : null), "html", null, true);
        echo "文章
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/select2_metro.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/chosen.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/addtional.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/bootstrap-fileupload.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"/media/css/datetimepicker.css\" />
";
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "<div class=\"row-fluid\">
    <div class=\"span12\">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class=\"page-title\">
            文章管理
            <small></small>
        </h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>

<div class=\"row-fluid\">
<div class=\"span12\">
<!-- BEGIN VALIDATION STATES-->
<div class=\"portlet box\">

<div class=\"portlet-title\">
    <div class=\"caption\"><i class=\"icon-reorder\">";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["action_name"]) ? $context["action_name"] : null), "html", null, true);
        echo "文章</i></div>
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
        // line 46
        echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : null), "html", null, true);
        echo "\" id=\"form_sample_2\" class=\"form-horizontal\" method=\"post\" enctype=\"multipart/form-data\">
<input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\" />
<div class=\"alert alert-error hide\">
    <button class=\"close\" data-dismiss=\"alert\"></button>
    您提交的信息有错误请更正后再保存
</div>

<div class=\"alert alert-success hide\">
    <button class=\"close\" data-dismiss=\"alert\"></button>
    保存成功!
</div>


<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">标题</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input type=\"text\" name=\"title\" data-required=\"1\" class=\"span3 m-wrap\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "title", array()), "html", null, true);
        echo "\"/>
    </div>
</div>


<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">作者</b><span class=\"required\">&nbsp;&nbsp;</span></label>
    <div class=\"controls\">
        <input type=\"text\" name=\"author\" data-required=\"1\" class=\"span3 m-wrap\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "author", array()), "html", null, true);
        echo "\"/>
    </div>
</div>


<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">简述</b><span class=\"required\">&nbsp;&nbsp;</span></label>
    <div class=\"controls\">
        <textarea type=\"text\" rows=5 cols=20 name=\"description\" data-required=\"1\" class=\"span5 m-wrap\" value=\"\">";
        // line 78
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "description", array()), "html", null, true);
        echo "</textarea>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">栏目</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
       <select class=\"span2\" name=\"category_id\" >
           ";
        // line 86
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 87
            echo "               ";
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()) == $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "category_id", array()))) {
                // line 88
                echo "                    <option selected=\"selected\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "category_name", array()), "html", null, true);
                echo "</option>
               ";
            } else {
                // line 90
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "category_name", array()), "html", null, true);
                echo "</option>
               ";
            }
            // line 92
            echo "           ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "       </select>
    </div>
</div>

    <div class=\"control-group\">
        <label class=\"control-label\"><b class=\"midnight\">标记</b><span class=\"required\">&nbsp;&nbsp;</span></label>
        <div class=\"controls\">
            ";
        // line 100
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["flags"]) ? $context["flags"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 101
            echo "                ";
            $context["chk"] = "";
            // line 102
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "flag", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["fl"]) {
                // line 103
                echo "                    ";
                if (((isset($context["fl"]) ? $context["fl"] : null) == (isset($context["key"]) ? $context["key"] : null))) {
                    // line 104
                    echo "                       ";
                    $context["chk"] = "checked";
                    // line 105
                    echo "                    ";
                }
                // line 106
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fl'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 107
            echo "                ";
            if (((isset($context["chk"]) ? $context["chk"] : null) == "checked")) {
                // line 108
                echo "                    <input type=\"checkbox\" name=\"flag[]\" value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\" checked=\"checked\"/>";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "
                ";
            } else {
                // line 110
                echo "                    <input type=\"checkbox\" name=\"flag[]\" value=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\" />";
                echo twig_escape_filter($this->env, (isset($context["val"]) ? $context["val"] : null), "html", null, true);
                echo "
                ";
            }
            // line 112
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "        </div>
    </div>

<div class=\"row-fluid\">
    <div class=\"span6\">
        <div class=\"control-group\">
            <label class=\"control-label\"><b class=\"midnight\">图片</b><span class=\"required\">&nbsp;&nbsp;</span></label>
            &nbsp;&nbsp;&nbsp; &nbsp;
            <b class=\"midnight\">(99px * 86px)并且文件大小小于500KB</b>
            <div class=\"controls\">
                <div class=\"fileupload fileupload-new\" data-provides=\"fileupload\">
                    <div class=\"fileupload-new thumbnail\" style=\"width: 200px;\">
                        <img src=\"";
        // line 125
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "image", array()), "html", null, true);
        echo "\" rel=\"web_image-upload\" />
                    </div>
                    <div class=\"fileupload-preview fileupload-exists thumbnail\" style=\"max-width: 200px;  line-height: 20px;\"></div>
                    <div>
                                                <span class=\"btn btn-file\"><span class=\"fileupload-new\">浏览</span>
                                                <span class=\"fileupload-exists\">重选</span>
                                                <input type=\"file\" class=\"default\" name=\"image\" id=\"image\" accept=\"image/gif,image/jpeg,image/png\"  />
                                                </span>
                        <a href=\"#\" class=\"btn fileupload-exists\" data-dismiss=\"fileupload\">删除</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">内容</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <textarea class=\"ckeditor\"  name=\"content\" id=\"content\" height=\"1000\">";
        // line 144
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "content", array()), "html", null, true);
        echo "</textarea>
    </div>
</div>


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

    // line 163
    public function block_javascript_plugins($context, array $blocks = array())
    {
        // line 164
        echo "<script type=\"text/javascript\" src=\"/media/js/jquery.validate.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/additional-methods.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/select2.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/chosen.jquery.min.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/bootstrap-fileupload.js\"></script>
<script type=\"text/javascript\" src=\"/editor/ckeditor.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/common/ckeditor-upload.js\"></script>
";
    }

    // line 173
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 174
        echo "<script src=\"/media/js/private/article_add.js\"></script>
<script>
    var success = ";
        // line 176
        echo twig_escape_filter($this->env, (isset($context["success"]) ? $context["success"] : null), "html", null, true);
        echo ";
   \$(function(){
       FormValidation.init();
        if(success == 1)
            \$('.alert-success').show();

       ";
        // line 182
        if (((isset($context["action_name"]) ? $context["action_name"] : null) == "编辑")) {
            // line 183
            echo "           //编辑时 删除图片验证规则
           \$(\"#image\").rules('remove');
       ";
        }
        // line 186
        echo "   })

</script>
";
    }

    public function getTemplateName()
    {
        return "article_add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  330 => 186,  325 => 183,  323 => 182,  314 => 176,  310 => 174,  307 => 173,  296 => 164,  293 => 163,  271 => 144,  249 => 125,  235 => 113,  229 => 112,  221 => 110,  213 => 108,  210 => 107,  204 => 106,  201 => 105,  198 => 104,  195 => 103,  190 => 102,  187 => 101,  183 => 100,  174 => 93,  168 => 92,  160 => 90,  152 => 88,  149 => 87,  145 => 86,  134 => 78,  123 => 70,  112 => 62,  94 => 47,  90 => 46,  75 => 34,  56 => 17,  53 => 16,  44 => 8,  41 => 7,  35 => 4,  32 => 3,);
    }
}
