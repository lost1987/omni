/**
 * Created by shameless on 15/1/19.
 */
var action='/index/index',data='',args=new Object();

function doSearch(){
    var search_change_time_start = $("#search_change_time_start").val();
    var search_change_time_end = $("#search_change_time_end").val();
    data = 'search_change_time_start='+search_change_time_start+'&search_change_time_end='+search_change_time_end;
    args.url = action;
    args.data = data;
    return args;
}


$(function(){
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        pickerPosition: "bottom-left",
        language:'zh-CN',
        autoclose: true,
        todayBtn: true,
        todayHighlight:true
    });
});
