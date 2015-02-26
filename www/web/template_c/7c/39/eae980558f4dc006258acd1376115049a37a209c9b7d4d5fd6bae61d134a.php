<?php

/* download-mobile.html */
class __TwigTemplate_7c39eae980558f4dc006258acd1376115049a37a209c9b7d4d5fd6bae61d134a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head lang=\"en\">
    <!-- html document -->

    <meta name=\"viewport\"
          content=\"height = device-height ,width = device-width ,initial-scale = 1 ,minimum-scale = 1.0 ,maximum-scale = 1.0 ,user-scalable = yes ,target-densitydpi = device-dpi\"/>

    <title></title>
    <style>
        .main {
            height: 1280px;
            background-image: url('../images/mobile/bg.jpg');
            background-repeat:no-repeat;
            padding-top:800px;
            padding-left: 200px;
        }

        .dbutton {
            width: 316px;
            height: 179px;
            background-image: url('../images/mobile/button.png');
        }


    </style>
</head>
<body>
<div class=\"main\">
    <div class=\"dbutton\" onclick=\"download()\"></div>
    <script>
        function download(){
            window.location.href=\"/download\";
        }
    </script>
</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "download-mobile.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
