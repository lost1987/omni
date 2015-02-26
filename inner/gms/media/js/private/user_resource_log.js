var handleDatetimePicker = function () {

    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left"),
        language:'zh-CN',
        autoclose: true,
        todayBtn: true,
        todayHighlight:true
    });

    $(".form_advance_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        autoclose: true,
        todayBtn: true,
        startDate: "2013-02-14 10:00",
        pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left"),
        minuteStep: 10
    });

    $(".form_meridian_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        showMeridian: true,
        autoclose: true,
        pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left"),
        todayBtn: true
    });
}