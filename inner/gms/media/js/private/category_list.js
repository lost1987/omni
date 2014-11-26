var current_del_id ;
function confirm_del(category_id) {
    $('#myModal').modal({
        keyboard: true
    });
    current_del_id = category_id;
}

function del(){
    $("#myModal").modal('hide');
    window.location.href = '/storeCategory/del/28/'+current_del_id;
}

function cancel_del(){
    $("#myModal").modal('hide');
    current_del_id = undefined;
}
