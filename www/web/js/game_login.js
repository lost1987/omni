$(function(){$("#username").focusin(function(){if($(this).val()=="请输入账号"){$(this).val("")}});$("#password").focusin(function(){if($(this).val()=="请输入对应密码"){$(this).val("");$(this).attr("type","password")}});$("#username").blur(function(){if($(this).form_validate_trimVal()==""){$(this).val("请输入账号")}});$("#password").blur(function(){if($(this).val()==""){$(this).val("请输入对应密码");$(this).attr("type","text")}else{$(this).attr("type","password")}})});function dologin(){var c=$("#username");var b=$("#password");var d=c.form_validate_trimVal();if(d=="请输入账号"){return}if(!$.max_length(d,16)||!$.min_length(d,4)||!$.isValidAccount(d)){$(".note").html("账号不合法").show()}else{$(".note").hide()}var a=b.form_validate_trimVal();if(a=="请输入对应密码"){return}if(!$.max_length(a,16)||!$.min_length(a,6)||!$.isValidPassword(a)){$(".note").html("密码不合法").show()}else{$(".note").hide()}b.val(md5(a));$("#game_login_form").submit()};