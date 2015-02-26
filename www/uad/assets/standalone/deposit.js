/**
 * Created by shameless on 15/1/20.
 */
var userBank,userAlipay;
$(function(){
    $("#rdBank").trigger('click');
    $("#bind-tabs").tabs();

    //自定义校验规则
    $.validator.addMethod('validateCardNo',function(value,element,param){
            if(param){
                var result = false;
                $.iAjax('/bank/getBankName','card_no='+value,function(data){
                    if(data != 'error')
                    {
                        if(parseInt(data) == 1)
                           result = true;
                    }
                },'POST','text',false);
                return result;
            }else{
                return false;
            }
    },'无效的银行卡');


    $("#depositForm").validate({
       rules:{
            money:{
                required:true,
                digits:true,
                range:[2,9999999]
            },
            purchasePasswd:{
                required:true
            }
       },
       messages:{
           money:{
                required:"请输入要提现的金额",
                digits:"只能输入整数",
                range:"提现金额必须大于2元"
           },
           purchasePasswd:{
               required:"请输入消费密码"
           }
       },
        success:function(label){
            label.css('position','absolute').css('margin-top','5px');
            label.append("<i class='am-icon-check' style='color:green'></i>");
        },
        debug:true,
        submitHandler:function(form){
            var data = 'type='+$("input:checked").val()+'&money='+$("#money").val()+'&purchasePasswd='+md5($("#purchasePasswd").val());
            $.iAjax('/deposit/doDeposit',data,function(response){
                $.alert('提示','提现已提交,请等待工作人员处理!');
                $("#money").val('');
                $("#purchasePasswd").val('');
                if(response > 2)
                    $("#availDeposit").html('￥'+response);
                else
                    $("#availDeposit").html('￥'+'0.00');
            },'POST');
        }
    });

    $("#bankForm").validate({
        rules:{
            card_no:{
                required:true,
                rangelength:[16,30],
                validateCardNo:true
            },
            bank_owner_name:{
                required:true,
                rangelength:[2,5]
            }
        },
        messages:{
            card_no:{
                required:"请输入银行卡号",
                rangelength:"请输入正确的卡号"
            },
            bank_owner_name:{
                required:"请输入收款人姓名",
                rangelength:"请输入正确的姓名"
            }
        },
        success:function(label){
            label.css('position','absolute').css('margin-top','5px');
            label.append("<i class='am-icon-check' style='color:green'></i>");
        },
        debug:true,
        submitHandler:function(form){
            var data = 'card_no='+$("#card_no").val()+'&bank_name='+$("#bank_name").val()+'&name='+$("#bank_owner_name").val();
            $.iAjax('/user/bindBank',data,function(response){
                $("#bank-bind-alert").modal('close');
                $.alert('绑定银行卡成功!');
                showAccount('<a href="javascript:;" id="rebinding" onclick="rebindBank()" >修改绑定</a>');
                $("#account").val(response);
            },'POST');
        }
    });

    $("#alipayForm").validate({
        rules:{
            alipay_account:{
                required:true,
                rangelength:[6,30]
            },
            alipay_owner_name:{
                required:true,
                rangelength:[2,5]
            }
        },
        messages:{
            alipay_account:{
                required:"请输入支付宝账号",
                rangelength:"请输入正确的支付宝账号"
            },
            alipay_owner_name:{
                required:"请输入收款人姓名",
                rangelength:"请输入正确的姓名"
            }
        },
        success:function(label){
            label.css('position','absolute').css('margin-top','5px');
            label.append("<i class='am-icon-check' style='color:green'></i>");
        },
        debug:true,
        submitHandler:function(form){
            var data = 'account='+$("#alipay_account").val()+'&name='+$("#alipay_owner_name").val();
            $.iAjax('/user/bindAlipay',data,function(response){
                $("#alipay-bind-alert").modal('close');
                $.alert('绑定支付宝成功!');
                showAccount('<a href="javascript:;" id="rebinding" onclick="rebindAlipay()" >修改绑定</a>');
                $("#account").val(response);
            },'POST');
        }

    });


    $("#card_no").keyup(function(e){
        var evt = e || window.event;
        if(evt.keyCode != 8) {
            var cardNo = $(this).val().replace(/\s+/g,'');
            var cardNoFormatted = $(this).val();
            if (cardNo.length % 4 == 0)
                cardNoFormatted += ' ';
            $(this).val(cardNoFormatted);
        }
    });
});


function checkBank(uid){
    $("#rebinding").remove();
    $.iAjax('/deposit/checkBank','uid='+uid,function(response){
        if(response == null){
            $("#account").hide();
            $("#binding").html('<a href="javascript:;" id="binding" onclick="bindBank()">立即绑定</a>');
        }else{
            userBank = response;
            $("#account").val(response.card_no);
            showAccount('<a href="javascript:;" id="rebinding" onclick="rebindBank()" >修改绑定</a>');
        }
    },'POST');
}

function checkAlipay(uid){
    $("#rebinding").remove();
    $.iAjax('/deposit/checkAlipay','uid='+uid,function(response){
        if(response == null){
            $("#account").hide();
            $("#binding").html('<a href="javascript:;" id="binding" onclick="bindAlipay()">立即绑定</a>');
        }else{
            userAlipay = response;
            $("#account").val(response.account);
            showAccount('<a href="javascript:;" id="rebinding"  onclick="rebindAlipay()" >修改绑定</a>');
        }
    },'POST');
}

function bindBank(){
    $("#bank-bind-alert").modal();
    $("#bank-bind-btn-yes").off('click');
    $("#bank-bind-btn-yes").click(function(){
        $("#bankFormSubmit").trigger('click');
    });
}

function rebindBank(){
    bindBank();
    $("#card_no").val(userBank.card_no);
    $('#bank_name').find('option').each(function(){
           $(this).removeAttr('selected');
           if($(this).val() == userBank.bank_name)
                $(this).attr('selected',true);
    });
    $("#bank_owner_name").val(userBank.name);
}

function bindAlipay(){
    $("#alipay-bind-alert").modal();
    $("#alipay-bind-btn-yes").off('click');
    $("#alipay-bind-btn-yes").click(function(){
        $("#alipayFormSubmit").trigger('click');
    });
}

function rebindAlipay(){
    bindAlipay();
    $("#alipay_account").val(userAlipay.account);
    $("#alipay_owner_name").val(userAlipay.name);
}

function showAccount(modifyLink){
    $("#binding").html('');
    $("#account").show();
    if($("#rebinding").length == 0)
        $("#account").parent().append(modifyLink);
}

