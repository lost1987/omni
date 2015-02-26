/**
 * Created by lost on 14-10-16.
 */
$(function(){
    $("#username").focusin(function(){
        if($(this).val() == '请输入账号') {
            $(this).val('');
        }
    })


    $("#password").focusin(function(){
        if($(this).val() == '请输入对应密码') {
            $(this).val('');
            $(this).attr('type', 'password');
        }
    })


    $("#username").blur(function(){
        if($(this).val() == '') {
            $(this).val('请输入账号');
        }
    })

    $("#password").blur(function(){
        if($(this).val() == '') {
            $(this).val('请输入对应密码');
            $(this).attr('type','text');
        }else{
            $(this).attr('type','password');
        }
    })

    $("#game_login_form").keydown(function(e){
        var evt = e || window.event;
        if(evt.keyCode == 13)dologin();
    })
})

function dologin(){
    var login_name_node = $("#username");
    var password_node = $("#password");
    var login_name = login_name_node.val();
    if(login_name == '请输入账号')return;
    if ( login_name > 16
        || login_name < 4
    ) {
        $(".note").html('账号不合法').show();
    }else{
        $(".note").hide();
    }

    var password = password_node.val();
    if(password == '请输入对应密码')return;
    if (password > 16
        || password < 6
    ) {
        $(".note").html('密码不合法').show();
    }else{
        $(".note").hide();
    }

    password_node.val(md5(password));
    $("#game_login_form").submit();
}