$(function(){if(errCode!=0){$("#errorAlert").addClass("errorAlert-show")}else{$("#errorAlert").removeClass("errorAlert-show")}$("#loginform").keyup(function(b){var a=b||window.event;if(a.keyCode==13){login()}if($("#errorAlert").hasClass("errorAlert-show")){$("#errorAlert").removeClass("errorAlert-show")}})});function login(){var b=$("#username").form_validate_trimVal();var a=$("#password").form_validate_trimVal();if(!$.min_length(b,4)||!$.max_length(b,16)){show_login_error();return}if(!$.min_length(a,6)||!$.max_length(a,16)){show_login_error();return}a=md5(a);$("#password").val(a);$("#loginform").submit()}function show_login_error(){if(!$("#errorAlert").hasClass("errorAlert-show")){$("#errorAlert").addClass("errorAlert-show")}};