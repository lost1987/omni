/**
 * Created by shameless on 14/11/21.
 */
var current_del_id ;
function confirm_del(article_id) {
    $('#myModal').modal({
        keyboard: true
    });
    current_del_id = article_id;
}

function del(){
    $("#myModal").modal('hide');
    window.location.href = '/article/del/49/'+current_del_id;
}

function cancel_del(){
    $("#myModal").modal('hide');
    current_del_id = undefined;
}