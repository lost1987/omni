/**
 * Created by shameless on 15/2/6.
 */
$(function(){
    $("#Form1").validate({
        rules:{
            c:{
                required:true,
                digits:true
            },
            d:{
                required:true,
                digits:true
            },
            t:{
                required:true,
                digits:true
            },
            cp:{
                required:true,
                digits:true
            }
        },
        debug:true,
        submitHandler:function(form){
            var c = $(form).find("input[name='c']").val();
            var d = $(form).find("input[name='d']").val();
            var t = $(form).find("input[name='t']").val();
            var cp = $(form).find("input[name='cp']").val();
            var id = $("#giftID1").val();
            $.iAjax('/giftBag/update','c='+c+'&d='+d+'&t='+t+'&cp='+cp+'&id='+id,function(response){
                $.alert('提示','设置成功');
            },'POST');
        }
    });


    $("#Form2").validate({
        rules:{
            c:{
                required:true,
                digits:true
            },
            d:{
                required:true,
                digits:true
            },
            t:{
                required:true,
                digits:true
            },
            cp:{
                required:true,
                digits:true
            }
        },
        debug:true,
        submitHandler:function(form){
            var c = $(form).find("input[name='c']").val();
            var d = $(form).find("input[name='d']").val();
            var t = $(form).find("input[name='t']").val();
            var cp = $(form).find("input[name='cp']").val();
            var id = $("#giftID2").val();
            $.iAjax('/giftBag/update','c='+c+'&d='+d+'&t='+t+'&cp='+cp+'&id='+id,function(response){
                $.alert('提示','设置成功');
            },'POST');
        }
    });


    $("#Form3").validate({
        rules:{
            c:{
                required:true,
                digits:true
            },
            d:{
                required:true,
                digits:true
            },
            t:{
                required:true,
                digits:true
            },
            cp:{
                required:true,
                digits:true
            }
        },
        debug:true,
        submitHandler:function(form){
            var c = $(form).find("input[name='c']").val();
            var d = $(form).find("input[name='d']").val();
            var t = $(form).find("input[name='t']").val();
            var cp = $(form).find("input[name='cp']").val();
            var id = $("#giftID3").val();
            $.iAjax('/giftBag/update','c='+c+'&d='+d+'&t='+t+'&cp='+cp+'&id='+id,function(response){
                $.alert('提示','设置成功');
            },'POST');
        }
    });
});
