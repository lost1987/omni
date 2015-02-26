/**
 * Created by shameless on 15/1/13.
 */
(function($){
    var globalConfirmFunc,globalCancelFunc;
    $.extend({
        'iAjax': function (url,data,callback,method,dataType,aSync) {
            if(aSync == undefined)
                aSync = true;

            if($("div.datetimepicker"))
                $("div.datetimepicker").remove();

            if(undefined == dataType)
                dataType = 'text';

            if(undefined == method)
                method = 'GET';

            $.ajax({
                'url':url,
                'method':method,
                'data' : data,
                'dataType':dataType,
                'async':aSync,
                'beforeSend':function(xhr){
                    $.AMUI.progress.inc();
                },
                'complete':function(xhr,ts){
                    $.AMUI.progress.done();
                },
                'success' :function(response){
                    response = $.parseJson(response);
                    if(response.error != 0){//统一 错误处理
                        if(undefined != errMsg[response.error])
                            $.alert('错误',errMsg[response.error]);
                        else
                            $.alert('错误','errorCode:'+response.error);
                    }
                    else{
                        callback.call(null,response.data);
                    }
                }
            });
        },

        'parseJson':function(jsonString){
            if(jsonString == 'loginTimeExpired'){
                $.alert('提示','登录已失效 请重新登录!');
                setTimeout(function(){
                    window.location.href='/login';
                },2000);
                return;
            }

            if(this.isJsonString(jsonString)){
                var json = eval('('+jsonString+')');
                return json;
            }else{
                $.alert('错误','json parse error:invalid json string')
                return;
            }

        },

        'isJsonString' : function(jstring){
            var regexp = /^({|[)(.*)(}|])/g;
            if(regexp.test(jstring))
                return true;
            return false;
        },

        'redirect':function(url){
            window.location.href = url;
        },

        'alert':function(title,message){
            $("#alert-title").html(title);
            $("#alert-msg").html(message);
            $("#error-alert").modal();
        },

        'fill_screen':function(){
            var screen_height = $(window).height()-110;
            var screen_width = $(window).width()-260;
            $(".admin-content").css('min-height',screen_height+'px');

            $(".admin-content").css('width',screen_width*0.8+'px');
            $(".admin-right").css('width',screen_width*0.2+'px');
        },

        'confirm':function(title,content,confirmFunc,cancelFunc){
            $("#confirm-title").html(title);
            $("#confirm-content").html(content);
            $("#confirm-alert").modal();

            globalConfirmFunc = confirmFunc;
            globalCancelFunc = cancelFunc;
        }
    });

    $("#confirm-btn-yes").click(function(){
        globalConfirmFunc.call();
        globalCancelFunc = undefined;
        globalConfirmFunc = undefined;
    });

    $("#confirm-btn-no").click(function(){
        if(undefined != globalCancelFunc)
            globalCancelFunc.call();

        globalCancelFunc = undefined;
        globalConfirmFunc = undefined;
    });

})(jQuery);