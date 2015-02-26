/**
 * Created by shameless on 15/1/21.
 */
var action='/children/index',data='',args=new Object();
function doSearch(){
    var search_nickname = $("#search_nickname").val();
    data = 'search_nickname='+search_nickname;
    args.url = action;
    args.data = data;
    return args;
}