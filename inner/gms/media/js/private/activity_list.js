/**
 * Created by shameless on 14/11/21.
 */
var current_del_id ;
function confirm_del(activity_id) {
    $('#myModal').modal({
        keyboard: true
    });
    current_del_id = activity_id;
}

function del(){
    $("#myModal").modal('hide');
    window.location.href = '/activity/del/37/'+current_del_id;
}

function cancel_del(){
    $("#myModal").modal('hide');
    current_del_id = undefined;
}