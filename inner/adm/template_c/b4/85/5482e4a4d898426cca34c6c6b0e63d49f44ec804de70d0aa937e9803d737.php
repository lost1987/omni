<?php

/* sample_form.html */
class __TwigTemplate_b4855482e4a4d898426cca34c6c6b0e63d49f44ec804de70d0aa937e9803d737 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"outer\" style=\"min-height: 358px;\">
<script>themeRoot = \"\\/theme\\/\"
</script>
<link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/asset/js/kindeditor/themes/default/default.css\">
<script src=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/asset/js/kindeditor/kindeditor-min.js\" type=\"text/javascript\"></script>
<script src=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_constant("STATIC_HOST"), "html", null, true);
        echo "/asset/js/kindeditor/lang/zh_CN.js\" type=\"text/javascript\"></script>
<script language=\"javascript\">
var editor = {\"id\":[\"desc\"],\"tools\":\"simpleTools\"};

var bugTools =
        [ 'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic','underline', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',
            'emoticons', 'image', 'code', 'link', '|', 'removeformat','undo', 'redo', 'fullscreen', 'source', 'savetemplate', 'about'];

var simpleTools =
        [ 'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic','underline', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',
            'emoticons', 'image', 'code', 'link', '|', 'removeformat','undo', 'redo', 'fullscreen', 'source', 'about'];

var fullTools =
        [ 'formatblock', 'fontname', 'fontsize', 'lineheight', '|', 'forecolor', 'hilitecolor', '|', 'bold', 'italic','underline', 'strikethrough', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', '|',
            'insertorderedlist', 'insertunorderedlist', '|',
            'emoticons', 'image', 'insertfile', 'hr', '|', 'link', 'unlink', '/',
            'undo', 'redo', '|', 'selectall', 'cut', 'copy', 'paste', '|', 'plainpaste', 'wordpaste', '|', 'removeformat', 'clearhtml','quickformat', '|',
            'indent', 'outdent', 'subscript', 'superscript', '|',
            'table', 'code', '|', 'pagebreak', 'anchor', '|',
            'fullscreen', 'source', 'preview', 'about'];

\$(document).ready(initKindeditor);
function initKindeditor(afterInit)
{
    var nextFormControl = 'input:not([type=\"hidden\"]), textarea:not(.ke-edit-textarea), button[type=\"submit\"], select';
    \$.each(editor.id, function(key, editorID)
    {
        editorTool = simpleTools;
        if(editor.tools == 'bugTools')  editorTool = bugTools;
        if(editor.tools == 'fullTools') editorTool = fullTools;

        var K = KindEditor, \$editor = \$('#' + editorID);
        var options =
        {
            cssPath:[themeRoot + 'zui/css/min.css'],
            width:'100%',
            items:editorTool,
            filterMode: true,
            bodyClass:'article-content',
            urlType:'relative',
            uploadJson: createLink('file', 'ajaxUpload'),
            allowFileManager:true,
            langType:'zh_CN',
            afterBlur: function(){this.sync();\$editor.prev('.ke-container').removeClass('focus');},
            afterFocus: function(){\$editor.prev('.ke-container').addClass('focus');},
            afterChange: function(){\$editor.change().hide();},
            afterCreate : function()
            {
                var doc = this.edit.doc;
                var cmd = this.edit.cmd;
                /* Paste in chrome.*/
                /* Code reference from http://www.foliotek.com/devblog/copy-images-from-clipboard-in-javascript/. */
                if(K.WEBKIT)
                {
                    \$(doc.body).bind('paste', function(ev)
                    {
                        var \$this = \$(this);
                        var original =  ev.originalEvent;
                        var file =  original.clipboardData.items[0].getAsFile();
                        var reader = new FileReader();
                        reader.onload = function (evt)
                        {
                            var result = evt.target.result;
                            var result = evt.target.result;
                            var arr = result.split(\",\");
                            var data = arr[1]; // raw base64
                            var contentType = arr[0].split(\";\")[0].split(\":\")[1];

                            html = '<img src=\"' + result + '\" alt=\"\" />';
                            \$.post(createLink('file', 'ajaxPasteImage'), {editor: html}, function(data){cmd.inserthtml(data);});
                        };

                        reader.readAsDataURL(file);
                    });
                }

                /* Paste in firfox.*/
                if(K.GECKO)
                {
                    K(doc.body).bind('paste', function(ev)
                    {
                        setTimeout(function()
                        {
                            var html = K(doc.body).html();
                            if(html.search(/<img src=\"data:.+;base64,/) > -1)
                            {
                                \$.post(createLink('file', 'ajaxPasteImage'), {editor: html}, function(data){K(doc.body).html(data);});
                            }
                        }, 80);
                    });
                }
                /* End */
            },
            afterTab: function(id)
            {
                var \$next = \$editor.next(nextFormControl);
                if(!\$next.length) \$next = \$editor.parent().next().find(nextFormControl);
                if(!\$next.length) \$next = \$editor.parent().parent().next().find(nextFormControl);
                \$next = \$next.first().focus();
                var keditor = \$next.data('keditor');
                if(keditor) keditor.focus();
            }
        };
        try
        {
            var keditor = K.create('#' + editorID, options);
            window.editor['#'] = window.editor[editorID] = keditor;
            \$editor.data('keditor', keditor);
        }
        catch(e){}
    });

    if(\$.isFunction(afterInit)) afterInit();
}
</script>
<div class=\"container mw-1400px\">
<div id=\"titlebar\">
<div class=\"heading\">
<span class=\"prefix\"><i class=\"icon-cube\"></i></span>
<strong><small class=\"text-muted\"><i class=\"icon icon-plus\"></i></small> 新增产品</strong>
</div>
</div>
<form class=\"form-condensed\" method=\"post\" target=\"hiddenwin\" id=\"dataform\">
<table class=\"table table-form\">
<tbody><tr>
<th class=\"w-90px\">产品名称</th>
<td class=\"w-p25-f\"><div class=\"required required-wrapper\"></div><input type=\"text\" name=\"name\" id=\"name\" value=\"\" class=\"form-control\">
</td><td></td>
</tr>
<tr>
<th>产品代号</th>
<td><div class=\"required required-wrapper\"></div><input type=\"text\" name=\"code\" id=\"code\" value=\"\" class=\"form-control\">
</td><td></td>
</tr>
<tr>
<th>产品负责人</th>
<td><select name=\"PO\" id=\"PO\" class=\"form-control chosen\" style=\"display: none;\">
<option value=\"\"></option>
<option value=\"productManager\">P:产品经理</option>
<option value=\"admin\" selected=\"selected\">A:admin</option>
<option value=\"dev1\">D:开发甲</option>
<option value=\"dev2\">D:开发乙</option>
<option value=\"dev3\">D:开发丙</option>
<option value=\"projectManager\">P:项目经理</option>
<option value=\"tester1\">T:测试甲</option>
<option value=\"tester2\">T:测试乙</option>
<option value=\"tester3\">T:测试丙</option>
<option value=\"testManager\">T:测试经理</option>
</select><div class=\"chosen-container chosen-container-single\" style=\"width: 100%;\" title=\"\" id=\"PO_chosen\"><a class=\"chosen-single chosen-single-with-deselect\" tabindex=\"-1\"><span>A:admin</span><abbr class=\"search-choice-close\"></abbr><div><b></b></div></a><div class=\"chosen-drop\"><div class=\"chosen-search\"><input type=\"text\" autocomplete=\"off\"></div><ul class=\"chosen-results\"></ul></div></div>
</td><td></td>
</tr>
<tr>
<th>测试负责人</th>
<td><select name=\"QD\" id=\"QD\" class=\"form-control chosen\" style=\"display: none;\">
<option value=\"\" selected=\"selected\"></option>
<option value=\"testManager\">T:测试经理</option>
</select><div class=\"chosen-container chosen-container-single\" style=\"width: 100%;\" title=\"\" id=\"QD_chosen\"><a class=\"chosen-single chosen-default\" tabindex=\"-1\"><span> </span><div><b></b></div></a><div class=\"chosen-drop\"><div class=\"chosen-search\"><input type=\"text\" autocomplete=\"off\"></div><ul class=\"chosen-results\"></ul></div></div>
</td><td></td>
</tr>
<tr>
<th>发布负责人</th>
<td><select name=\"RD\" id=\"RD\" class=\"form-control chosen\" style=\"display: none;\">
<option value=\"\" selected=\"selected\"></option>
<option value=\"dev1\">D:开发甲</option>
</select><div class=\"chosen-container chosen-container-single\" style=\"width: 100%;\" title=\"\" id=\"RD_chosen\"><a class=\"chosen-single chosen-default\" tabindex=\"-1\"><span> </span><div><b></b></div></a><div class=\"chosen-drop\"><div class=\"chosen-search\"><input type=\"text\" autocomplete=\"off\"></div><ul class=\"chosen-results\"></ul></div></div>
</td><td></td>
</tr>
<tr>
<th>产品描述</th>
<td colspan=\"2\"><div class=\"ke-container ke-container-default\" style=\"width: 100%;\"><div style=\"display:block;\" class=\"ke-toolbar\" unselectable=\"on\"><span class=\"ke-outline\" data-name=\"formatblock\" title=\"段落\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-formatblock\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"fontname\" title=\"字体\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-fontname\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"fontsize\" title=\"文字大小\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-fontsize\" unselectable=\"on\"></span></span><span class=\"ke-inline-block ke-separator\"></span><span class=\"ke-outline\" data-name=\"forecolor\" title=\"文字颜色\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-forecolor\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"hilitecolor\" title=\"文字背景\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-hilitecolor\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"bold\" title=\"粗体(Ctrl+B)\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-bold\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"italic\" title=\"斜体(Ctrl+I)\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-italic\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"underline\" title=\"下划线(Ctrl+U)\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-underline\" unselectable=\"on\"></span></span><span class=\"ke-inline-block ke-separator\"></span><span class=\"ke-outline\" data-name=\"justifyleft\" title=\"左对齐\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-justifyleft\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"justifycenter\" title=\"居中\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-justifycenter\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"justifyright\" title=\"右对齐\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-justifyright\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"insertorderedlist\" title=\"编号\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-insertorderedlist\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"insertunorderedlist\" title=\"项目符号\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-insertunorderedlist\" unselectable=\"on\"></span></span><span class=\"ke-inline-block ke-separator\"></span><span class=\"ke-outline\" data-name=\"emoticons\" title=\"插入表情\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-emoticons\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"image\" title=\"图片\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-image\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"code\" title=\"插入程序代码\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-code\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"link\" title=\"超级链接\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-link\" unselectable=\"on\"></span></span><span class=\"ke-inline-block ke-separator\"></span><span class=\"ke-outline\" data-name=\"removeformat\" title=\"删除格式\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-removeformat\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"undo\" title=\"后退(Ctrl+Z)\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-undo\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"redo\" title=\"前进(Ctrl+Y)\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-redo\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"fullscreen\" title=\"全屏显示\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-fullscreen\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"source\" title=\"HTML代码\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-source\" unselectable=\"on\"></span></span><span class=\"ke-outline\" data-name=\"about\" title=\"关于\" unselectable=\"on\"><span class=\"ke-toolbar-icon ke-toolbar-icon-url ke-icon-about\" unselectable=\"on\"></span></span></div><div style=\"display: block; height: 112px;\" class=\"ke-edit\"><iframe class=\"ke-edit-iframe\" hidefocus=\"true\" frameborder=\"0\" tabindex=\"\" style=\"width: 100%; height: 112px;\"></iframe><textarea class=\"ke-edit-textarea\" hidefocus=\"true\" tabindex=\"\" style=\"width: 100%; height: 112px; display: none;\"></textarea></div><div class=\"ke-statusbar\"><span class=\"ke-inline-block ke-statusbar-center-icon\"></span><span class=\"ke-inline-block ke-statusbar-right-icon\"></span></div></div><textarea name=\"desc\" id=\"desc\" rows=\"8\" class=\"form-control\" style=\"display: none;\"></textarea>
</td>
</tr>
<tr>
<th>访问控制</th>
<td colspan=\"2\"><div class=\"radio\"><label><input type=\"radio\" name=\"acl\" value=\"open\" checked=\"checked\" onclick=\"setWhite(this.value);\" id=\"aclopen\"> 默认设置(有产品视图权限，即可访问)</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"acl\" value=\"private\" onclick=\"setWhite(this.value);\" id=\"aclprivate\"> 私有产品(只有项目团队成员才能访问)</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"acl\" value=\"custom\" onclick=\"setWhite(this.value);\" id=\"aclcustom\"> 自定义白名单(团队成员和白名单的成员可以访问)</label></div></td>
</tr>
<tr><td></td><td colspan=\"2\"> <button type=\"submit\" id=\"submit\" class=\"btn btn-submit btn-primary\">保存</button></td></tr>
</tbody></table>
</form>
</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "sample_form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 9,  40 => 8,  36 => 7,  31 => 4,  28 => 3,);
    }
}
