/**
 * Created by shameless on 14/11/6.
 */
var  cur_handle_btn_node;
var TableAdvanced = function () {

    var initTable1 = function() {
        /* Formating function for row details */
        function fnFormatDetails ( oTable, nTr ,id)
        {
            var sOut ;
            $.ajax({
                url: '/storeProduct/product_info/' + id,
                method:'post',
                async : false,
                success: function (data) {
                    var response = eval('(' + data + ')');
                    if (response.error == 0) {
                        response = response.data;
                        console.log(response);
                        sOut = '<table style="width:80%">';
                        sOut += '<tr><th>名称:</th><td>' + response.name + '</td><th>产品ID:</th><td>' + response.id + '</td></tr>';
                        sOut += '<tr><th>消耗:</th><td>' + response.price+response.price_name + '</td><th>获得:</th><td>' + response.tool + response.tool_name+ '</td></tr>';
                        sOut += '<tr><th>产品图片:</th><td><img src="' + response.image + '" width="200" /></tr>';
                        sOut += '</table>';
                    } else
                        sOut = 'error_code:' + response.error;
                }
            });
            return sOut;
        }

        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement( 'th' );
        var nCloneTd = document.createElement( 'td' );
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

        $('#sample_1 thead tr').each( function () {
            this.insertBefore( nCloneTh, this.childNodes[0] );
        } );

        $('#sample_1 tbody tr').each( function () {
            this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
        } );

        /*
         * Initialse DataTables, with no sorting on the 'details' column
         */
        var oTable = $('#sample_1').dataTable( {
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [ 0 ] }
            ],
            "aaSorting": [[1, 'asc']],
            "aLengthMenu": false,
            "bLengthChange":false,
            // set the initial value
            "iDisplayLength": 10,
            "bPaginate":false,
            'bInfo':false,
            'bFilter':false,
            'bSort':false,
            "oLanguage": {
                 "sEmptyTable": "未找到任何数据"
            }
        });

        jQuery('#sample_1 .group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        jQuery('#sample_1_wrapper .dataTables_filter input').addClass("m-wrap small"); // modify table search input
        jQuery('#sample_1_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
        jQuery('#sample_1_wrapper .dataTables_length select').select2(); // initialzie select2 dropdown

        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        $('#sample_1').on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            var id = $(this).parent().parent().attr('rel_c');
            if ( oTable.fnIsOpen(nTr) )
            {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose( nTr );
            }
            else
            {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr,id), 'details' );
            }
        });
    }

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

    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }
            initTable1();
            $("div.span6").each(function(){
                var __this =  $(this);
                if(__this.html() == '')
                    __this.remove();
            });

            handleDatetimePicker();
            init_consignment_validate();
            init_mobile_validate();
        }
    };
}();

/**
 * 初始化发货表单
 */
function init_consignment_validate(){
    var consignment_form = $("#consignmentForm");
    consignment_form.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-inline', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            express_name: {
                required: true
            },
            express_no:{
                required:true
            },
            address: {
                required: true
            }
        },

        messages: { // custom messages for radio buttons and checkboxes
            express_name:{
                required:"这是必填项"
            },
            express_no:{
                required:"这是必填项"
            },
            address: {
                required:"这是必填项"
            }
        },

        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.attr("name") == "education") { // for chosen elements, need to insert the error after the chosen container
                error.insertAfter("#form_2_education_chzn");
            } else if (element.attr("name") == "membership") { // for uniform radio buttons, insert the after the given container
                error.addClass("no-left-padding").insertAfter("#form_2_membership_error");
            } else if (element.attr("name") == "service") { // for uniform checkboxes, insert the after the given container
                error.addClass("no-left-padding").insertAfter("#form_2_service_error");
            } else {
                error.insertAfter(element); // for other inputs, just perform default behavoir
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.help-inline').removeClass('ok'); // display OK icon
            $(element)
                .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change dony by hightlight
            $(element)
                .closest('.control-group').removeClass('error'); // set error class to the control group
        },

        success: function (label) {
            if (label.attr("for") == "service" || label.attr("for") == "membership") { // for checkboxes and radip buttons, no need to show OK icon
                label
                    .closest('.control-group').removeClass('error').addClass('success');
                label.remove(); // remove error label here
            } else { // display success icon for other inputs
                label
                    .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                    .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
            }
        },

        submitHandler: function (form) {
            if(!confirm('确定要这么做吗?'))
                return;

            var params  =  cur_handle_btn_node.next().val().split('#');
            var user_id = params[1];
            var login_name = params[2];
            var express_name = $(form).find('input[name="express_name"]').eq(0).val();
            var express_no  = $(form).find('input[name="express_no"]').eq(0).val();
            var address = $(form).find('textarea[name="address"]').eq(0).val();
            var desp = $(form).find('textarea[name="desp"]').eq(0).val();
            var handler_id = params[3];
            var product_id = params[4];
            var handler_type = 4;
            var module_id = 27;

            var data = "user_id="+user_id+'&login_name='+login_name+'&express_name='+express_name+'&express_no='+express_no+'&address=' +address+'&desp='+desp+'&handler_type='+handler_type+'&handler_id='+handler_id+'&product_id='+product_id+'&module_id='+module_id;
            $.ajax({
                url:'/services/handle_consignment',
                method:"post",
                dataType:"html",
                async : false,
                data:data,
                success:function(data){
                    var response = eval('('+data+')');
                    if(response.error == 0){
                        alert('提交成功');
                        window.location.reload();
                    }else{
                        alert('error_code:'+response.error);
                    }
                }
            });
            $("#sendModal").modal('hide');
        }
    });
}
/**
 * 发货按钮
 * @param node
 */
function consignment(node){
    cur_handle_btn_node =  $(node);
    var params  =  cur_handle_btn_node.next().val().split('#');
    $("#sendModal").modal().on('shown',function(){
        var _form = $("#consignmentForm");
        _form.find('.control-group').removeClass('error').removeClass('ok').removeClass('success');
        _form.find('.help-inline').empty();
        _form.find("input:text").val('');
        _form.find("textarea").val('');
        _form.find('textarea[name="address"]').val(params[0]);
    });
}

/**
 * 充值卡订单 初始化
 */
function init_mobile_validate(){
    var mobile_form = $("#mobileForm");
    mobile_form.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-inline', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            mobile: {
                required: true
            },
            order_num:{
                required:true
            },
            money: {
                required: true,
                number:true
            }
        },

        messages: { // custom messages for radio buttons and checkboxes
            mobile:{
                required:"这是必填项"
            },
            order_num:{
                required:"这是必填项"
            },
            money: {
                required:"这是必填项",
                number:"请输入数字"
            }
        },

        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.attr("name") == "education") { // for chosen elements, need to insert the error after the chosen container
                error.insertAfter("#form_2_education_chzn");
            } else if (element.attr("name") == "membership") { // for uniform radio buttons, insert the after the given container
                error.addClass("no-left-padding").insertAfter("#form_2_membership_error");
            } else if (element.attr("name") == "service") { // for uniform checkboxes, insert the after the given container
                error.addClass("no-left-padding").insertAfter("#form_2_service_error");
            } else {
                error.insertAfter(element); // for other inputs, just perform default behavoir
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.help-inline').removeClass('ok'); // display OK icon
            $(element)
                .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change dony by hightlight
            $(element)
                .closest('.control-group').removeClass('error'); // set error class to the control group
        },

        success: function (label) {
            if (label.attr("for") == "service" || label.attr("for") == "membership") { // for checkboxes and radip buttons, no need to show OK icon
                label
                    .closest('.control-group').removeClass('error').addClass('success');
                label.remove(); // remove error label here
            } else { // display success icon for other inputs
                label
                    .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                    .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
            }
        },

        submitHandler: function (form) {
            if(!confirm('确定要这么做吗?'))
                return;

            var params  =  cur_handle_btn_node.next().val().split('#');
            var user_id = params[1];
            var login_name = params[2];
            var mobile = $(form).find('input[name="mobile"]').eq(0).val();
            var order_num = $(form).find('input[name="order_num"]').eq(0).val();
            var money = $(form).find('input[name="money"]').eq(0).val();
            var desp = $(form).find('textarea[name="desp"]').eq(0).val();
            var handler_id = params[3];
            var product_id = params[4];
            var handler_type = 4;
            var module_id = 27;

            var data = "user_id="+user_id+'&login_name='+login_name+'&mobile='+mobile+'&order_num='+order_num+'&money=' +money+'&desp='+desp+'&handler_type='+handler_type+'&handler_id='+handler_id+'&product_id='+product_id+'&module_id='+module_id;

            $.ajax({
                url:'/services/handle_mobile',
                method:"post",
                dataType:"html",
                async : false,
                data:data,
                success:function(data){
                    var response = eval('('+data+')');
                    if(response.error == 0){
                        alert('提交成功');
                        window.location.reload();
                    }else{
                        alert('error_code:'+response.error);
                    }
                }
            });
            $("#sendModal").modal('hide');
        }
    });
}

function mobilement(node){
    cur_handle_btn_node =  $(node);
    var params  =  cur_handle_btn_node.next().val().split('#');
    $("#mobileModal").modal().on('shown',function(){
        var _form = $("#mobileForm");
        _form.find('.control-group').removeClass('error').removeClass('ok').removeClass('success');
        _form.find('.help-inline').empty();
        _form.find("input:text").val('');
        _form.find("textarea").val('');
        _form.find('input[name="mobile"]').val(params[0]);
    });
}

function handle(node){
        cur_handle_btn_node = $(node);
       $("#myModal").modal();
}

function confirm_done(){
    var params = cur_handle_btn_node.next().val().split("#");
    var handler_id = params[0];
    var product_id = params[1];
    var module_id = 27;

    var data = 'handler_id='+handler_id+'&product_id='+product_id+'&module_id='+module_id;

    $.ajax({
        url:'/services/handle_done',
        method:"post",
        dataType:"html",
        async : false,
        data:data,
        success:function(data){
            var response = eval('('+data+')');
            if(response.error == 0){
                alert('操作成功');
                window.location.reload();
            }else{
                alert('error_code:'+response.error);
            }
        }
    });
    $("#MyModal").modal('hide');
}

function cancel_done(){
    $("#myModal").modal('hide');
}