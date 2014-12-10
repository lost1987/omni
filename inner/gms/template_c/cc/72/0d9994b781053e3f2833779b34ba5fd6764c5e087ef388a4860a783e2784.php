<?php

/* activity_add.html */
class __TwigTemplate_cc720d9994b781053e3f2833779b34ba5fd6764c5e087ef388a4860a783e2784 extends Twig_Template
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
        echo "活动
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
            最新活动
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
        echo "活动</i></div>
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
    <label class=\"control-label\"><b class=\"midnight\">名称</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
        <input type=\"text\" name=\"name\" data-required=\"1\" class=\"span3 m-wrap\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
        echo "\"/>
    </div>
</div>


<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">过期时间</b><span class=\"required\"></span></label>
    <div class=\"controls\">
        <div class=\"input-append date form_datetime\">
            <input size=\"16\" type=\"text\" value=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "expire_time", array()), "html", null, true);
        echo "\" name=\"expire_time\" readonly class=\"m-wrap\">
            <span class=\"add-on\"><i class=\"icon-calendar\"></i></span>
        </div>
    </div>
</div>

<div class=\"control-group\">
    <label class=\"control-label\"><b class=\"midnight\">游戏中是否显示</b><span class=\"required\">*</span></label>
    <div class=\"controls\">
       <select class=\"span1\" name=\"in_game_show\" >
           ";
        // line 81
        if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "in_game_show", array()) == 1)) {
            // line 82
            echo "            <option selected=\"selected\" value=\"1\">是</option> <option value=\"0\">否</option>
           ";
        } else {
            // line 84
            echo "           <option value=\"1\">是</option> <option selected=\"selected\" value=\"0\">否</option>
           ";
        }
        // line 86
        echo "       </select>
    </div>
</div>


<div class=\"row-fluid\">
    <div class=\"span6\">
        <div class=\"control-group\">
            <label class=\"control-label\"><b class=\"midnight\">web端图片</b><span class=\"required\">*</span></label>
            &nbsp;&nbsp;&nbsp; &nbsp;
            <b class=\"midnight\">(700px * 350px)并且文件大小小于500KB</b>
            <div class=\"controls\">
                <div class=\"fileupload fileupload-new\" data-provides=\"fileupload\">
                    <div class=\"fileupload-new thumbnail\" style=\"width: 200px;\">
                        <img src=\"http://";
        // line 100
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "web_image_url", array()), "html", null, true);
        echo "\" rel=\"web_image-upload\" />
                    </div>
                    <div class=\"fileupload-preview fileupload-exists thumbnail\" style=\"max-width: 200px;  line-height: 20px;\"></div>
                    <div>
                                                <span class=\"btn btn-file\"><span class=\"fileupload-new\">浏览</span>
                                                <span class=\"fileupload-exists\">重选</span>
                                                <input type=\"file\" class=\"default\" name=\"web_image\" id=\"web_image\" accept=\"image/gif,image/jpeg,image/png\"  />
                                                </span>
                        <a href=\"#\" class=\"btn fileupload-exists\" data-dismiss=\"fileupload\">删除</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class=\"row-fluid\">
    <div class=\"span6\">
        <div class=\"control-group\">
            <label class=\"control-label\"><b class=\"midnight\">游戏端图片</b><span class=\"required\">*</span></label>
            &nbsp;&nbsp;&nbsp; &nbsp;
            <b class=\"midnight\">(220px * 87px)并且文件大小小于200KB</b>
            <div class=\"controls\">
                <div class=\"fileupload fileupload-new\" data-provides=\"fileupload\">
                    <div class=\"fileupload-new thumbnail\" style=\"width: 200px;\">
                        <img src=\"http://";
        // line 126
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "in_game_image_url", array()), "html", null, true);
        echo "\" rel=\"game_image-upload\" />
                    </div>
                    <div class=\"fileupload-preview fileupload-exists thumbnail\" style=\"max-width: 200px;  line-height: 20px;\"></div>
                    <div>
                                                <span class=\"btn btn-file\"><span class=\"fileupload-new\">浏览</span>
                                                <span class=\"fileupload-exists\">重选</span>
                                                <input type=\"file\" class=\"default\" name=\"game_image\" id=\"game_image\" accept=\"image/gif,image/jpeg,image/png\" />
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
        <textarea class=\"ckeditor\" name=\"content\">";
        // line 144
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "content", array()), "html", null, true);
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
<script type=\"text/javascript\" src=\"/media/js/bootstrap-datetimepicker.js\"></script>
<script type=\"text/javascript\" src=\"/media/js/bootstrap-datetimepicker.zh-CN.js\"></script>
<script type=\"text/javascript\" src=\"/editor/ckeditor.js\"></script>
";
    }

    // line 174
    public function block_javascript_custom($context, array $blocks = array())
    {
        // line 175
        echo "<script src=\"/media/js/private/activity_add.js\"></script>
<script>
    var success = ";
        // line 177
        echo twig_escape_filter($this->env, (isset($context["success"]) ? $context["success"] : null), "html", null, true);
        echo ";
   \$(function(){
       FormValidation.init();
        if(success == 1)
            \$('.alert-success').show();

       ";
        // line 183
        if (((isset($context["action_name"]) ? $context["action_name"] : null) == "编辑")) {
            // line 184
            echo "           //编辑时 删除图片验证规则
           \$(\"#web_image\").rules('remove');
           \$(\"#game_image\").rules('remove');
       ";
        }
        // line 188
        echo "   })

</script>
";
    }

    public function getTemplateName()
    {
        return "activity_add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  274 => 188,  268 => 184,  266 => 183,  257 => 177,  253 => 175,  250 => 174,  238 => 164,  235 => 163,  213 => 144,  192 => 126,  163 => 100,  147 => 86,  143 => 84,  139 => 82,  137 => 81,  124 => 71,  112 => 62,  94 => 47,  90 => 46,  75 => 34,  56 => 17,  53 => 16,  44 => 8,  41 => 7,  35 => 4,  32 => 3,);
    }
}
