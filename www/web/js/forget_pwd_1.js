$(function(){$("label").hide()});function form_submit(){var c=$("#login_name");var a=$("#email");var d=c.form_validate_trimVal();var b=a.form_validate_trimVal();if(d==""){return}if(b==""){return}$.post("/user/checkForgetPassword","login_name="+d+"&email="+b+"&csrf_token="+token,function(f){if(f){var e=$.jsonDecode(f);switch(e.error){case 7:alert("未知错误");break;case 8:c.next().show();break;case 14:a.next().show();break;case 0:$("#_form").submit()}return}})};