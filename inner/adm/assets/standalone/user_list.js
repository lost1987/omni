/**
 * Created by shameless on 15/1/14.
 */
var action='/user/lists',data='',args=new Object();
function doSearch(){
    var search_user = $("#search_user").val();
    data = 'search_user='+search_user;
    args.url = action;
    args.data = data;
    return args;
}

$(function(){
    //触发下啦按钮 并且解决挡住按钮的bug
    var dropdowns = $('.common-btn-drop').dropdown({justify: '.common-btn-drop'});
    dropdowns.each(function(){
        var windowHeight = $(window).height();
        $(this).on('open.dropdown.amui', function (e) {
            if(windowHeight - $(this).offset().top < windowHeight/2.5){
                $(this).addClass('am-dropdown-up');
            }else{
                $(this).removeClass('am-dropdown-up');
            }
        });
    })
})

function setReward(uid){
    $.iAjax('/user/readReward','uid='+uid,function(data){
            $('.admin-content').html(data);
    });
}

function depositApply(uid){
    $.iAjax('/user/depositList','search_uid='+uid,function(data){
        $('.admin-content').html(data);
    });
}

function findChildren(uid){
    $.iAjax('/user/children','uid='+uid,function(data){
        $('.admin-content').html(data);
    });
}

function forbidden(uid,node){
    $.confirm("提示","确定要这么做吗?",function(){
        $.iAjax('/user/forbidden','uid='+uid,function(response){
            $(node).parent().parent().parent().parent().parent().find('td[rel="ajax_state"]').html('禁止提现');
        },'POST');
    });
}

function unForbidden(uid,node){
    $.confirm("提示","确定要这么做吗?",function(){
        $.iAjax('/user/unForbidden','uid='+uid,function(response){
            $(node).parent().parent().parent().parent().parent().find('td[rel="ajax_state"]').html('正常');
        },'POST');
    });
}

function detail(uid){
    $.iAjax('/user/newCoinsDetail','uid='+uid,function(data){
        $('.admin-content').html(data);
    });
}