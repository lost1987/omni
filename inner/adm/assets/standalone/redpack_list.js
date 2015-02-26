/**
 * Created by shameless on 15/2/13.
 */
var action='/redPack/lists',data='',args=new Object();
function doSearch(){
    var search_state = $("#search_state").val();
    data = 'search_state='+search_state;
    args.url = action;
    args.data = data;
    return args;
}

$(function(){
    $(".select2").select2();
})