/**
 * Created by shameless on 15/1/16.
 */
var action='/user/depositList',data='',args=new Object(),curOpId,curOpNode;
function doSearch(){
    var search_order_no = $("#search_order_no").val();
    var search_create_time_start = $("#search_create_time_start").val();//$("#search_create_time_start").val().replace(/\s+/g,'')=='' ? '' : new Date($("#search_create_time_start").val()).getTime()/1000;
    var search_create_time_end = $("#search_create_time_end").val();//$("#search_create_time_end").val().replace(/\s+/g,'')=='' ? '' : new Date($("#search_create_time_end").val()).getTime()/1000;
    var search_state = $("#search_state").val();
    var search_uid = $("#search_uid").val();

    var data = 'search_order_no='+search_order_no+'&search_create_time_start='+search_create_time_start+'&search_create_time_end='+search_create_time_end+'&search_state='+search_state+'&search_uid='+search_uid;
    args.url = action;
    args.data = data;
    return args;
}

$(function(){
    $(".select2").select2();

    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        pickerPosition: "bottom-left",
        language:'zh-CN',
        autoclose: true,
        todayBtn: true,
        todayHighlight:true
    });

    $("#giveForm").validate({
        rules:{
            real_cost:{
                required:true,
                number:true
            },
            handing_cost:{
                required:true,
                number:true
            }
        },
        messages:{
            real_cost:{
                required:"请输入实付金额",
                number:"只能输入数字"
            },
            handing_cost:{
                required:"请输入手续费",
                number:"只能输入数字"
            }
        },
        debug:true,
        success:function(label){
            label.append("<i class='am-icon-check' style='color:green'></i>");
        },
        submitHandler:function(form){
            var data = 'real_cost='+$("#real_cost").val()+'&handing_cost='+$("#handing_cost").val()+'&id='+curOpId;
            $.iAjax('/user/depositGive',data,function(response){
                var tr = $(curOpNode).parent().parent().parent().parent().parent();
                $.alert('提示','操作成功');
                tr.find('a[rel="ajax_money"]').removeClass('am-badge-danger').addClass('am-badge-success');
                tr.find('a[rel="ajax_platform"]').removeClass('am-badge-danger').addClass('am-badge-success');
                tr.find('a[rel="ajax_state"]').removeClass('am-badge-danger').addClass('am-badge-success').html(response.depositState);
                tr.find('td[rel="ajax_doneTime"]').html(response.doneTime);
                tr.find('td[rel="ajax_operation"]').html('/');
                tr.find('td[rel="ajax_real_cost"]').html('￥'+response.real_cost);
                tr.find('td[rel="ajax_handing_cost"]').html('￥'+response.handing_cost);
                $("#real_cost").val('');
                $("#handing_cost").val('');
                $("#give-alert").modal('close');
            },'POST');
        }
    })
})

function give(id,node){
    curOpId = id;
    curOpNode = node;
    $("#give-alert").modal();
    $("#give-btn-yes").unbind('click');
    $("#give-btn-yes").click(function(){
        $("#giveForm").submit();
    });
}


function unGive(id,node){
    $("#unGiveModal").modal();
    $("#unGiveModal-btn-yes").unbind('click');
    $("#unGiveModal-btn-yes").click(function(){
        var remark = $("#modal_remark").val();
        if(remark.replace(/\s+/g,'') != ''){
            $.iAjax('/user/depositUnGive','id='+id+'&remark='+remark,function(response){
                var tr = $(node).parent().parent().parent().parent().parent();
                $.alert('提示','操作成功');
                tr.find('a[rel="ajax_money"]').removeClass('am-badge-primary').addClass('am-badge-danger');
                tr.find('a[rel="ajax_platform"]').removeClass('am-badge-primary').addClass('am-badge-danger');
                tr.find('a[rel="ajax_state"]').removeClass('am-badge-primary').addClass('am-badge-danger').html(response.depositState);
                tr.find('td[rel="ajax_doneTime"]').html(response.doneTime);
                tr.next().find('td[rel="ajax_remark"]').html(response.remark);
                tr.find('td[rel="ajax_operation"]').html('/');
                $("#unGiveModal").modal('close');
            },'POST');
        }
    });
}