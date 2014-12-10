/**
 * Created by shameless on 14/11/25.
 */
/**
 * Created by shameless on 14/11/6.
 */
var TableAdvanced = function () {

    var initTable1 = function() {
        /* Formating function for row details */
        function fnFormatDetails ( oTable, nTr ,id)
        {
            var sOut ;
            var product_id = id.split("#")[0];
            var handler_id = id.split("#")[1];

            $.ajax({
                url: '/storeProduct/product_info/' + product_id +'/'+handler_id,
                method:'post',
                async : false,
                success: function (data) {
                    var response = eval('(' + data + ')');
                    if (response.error == 0) {
                        response = response.data;
                        sOut = '<table style="width:80%">';
                        sOut += '<tr><th>名称:</th><td>' + response.name + '</td><th>产品ID:</th><td>' + response.id + '</td></tr>';
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
            format: "yyyy-mm-dd hh:ii",
            pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left"),
            language:'zh-CN',
            autoclose: true,
            todayBtn: true,
            todayHighlight:true
        });

        $(".form_advance_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            autoclose: true,
            todayBtn: true,
            startDate: "2013-02-14 10:00",
            pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left"),
            minuteStep: 10
        });

        $(".form_meridian_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            showMeridian: true,
            autoclose: true,
            pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left"),
            todayBtn: true
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            //if (!jQuery().dataTable) {
            //    return;
            //}
            //initTable1();
            //$("div.span6").each(function(){
            //    var __this =  $(this);
            //    if(__this.html() == '')
            //        __this.remove();
            //});

            handleDatetimePicker();
        }
    };
}();
