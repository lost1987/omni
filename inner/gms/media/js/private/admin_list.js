var current_del_id ;
function confirm_del(admin_id) {
    $('#myModal').modal({
        keyboard: true
    });
    current_del_id = admin_id;
}

function del(){
    $("#myModal").modal('hide');
    window.location.href = '/admin/del/2/'+current_del_id;
}

function cancel_del(){
    $("#myModal").modal('hide');
    current_del_id = undefined;
}
