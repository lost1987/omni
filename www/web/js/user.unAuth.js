function unAuthSms(){var a=$("#mobile").val().replace(/\s+/g,"");if($.is_mobile(a)){$.alert("请输入原认证的手机号");return}$("#authBtn").attr("disabled",true);$.post("/userAuth/unAuthMobile","mobile="+a,function(b){var b=$.parseJson(b);if(b!="error"){window.location.href="/userAuth/mobile"}$("#authBtn").attr("disabled",false)})}function unAuthEmail(){var a=$("#email").val().replace(/\s+/g,"");if(!$.is_email(a)){$.alert("请输入原认证的邮箱");return}$("#authBtn").attr("disabled",true);$.post("/userAuth/unAuthEmail","email="+a,function(b){var b=$.parseJson(b);if(b!="error"){window.location.href="/userAuth/email"}$("#authBtn").attr("disabled",false)})};