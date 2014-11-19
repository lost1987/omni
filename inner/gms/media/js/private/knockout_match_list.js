/**
 * Created by shameless on 14/11/6.
 */
var  cur_handle_btn_node;
var  colors = []
colors[1] = 'label-info';
colors[2] = 'label-default';
colors[3] = 'label-warning';
colors[4] = 'label-important';
colors[5] = 'label-inverse';
var TableAdvanced = function () {

    var initTable1 = function() {
        /* Formating function for row details */
        function fnFormatDetails ( oTable, nTr ,id)
        {
            var ids = id.split('#');
            var sOut ;
            $.ajax({
                url: '/knockoutMatch/match_info/' + ids[0]+'/'+ids[1],
                method:'post',
                async : false,
                success: function (data) {
                    var response = eval('(' + data + ')');
                    if (response.error == 0) {
                        response = response.data
                        if(response == false)return;
                        sOut = '<table style="width:80%">';
                        sOut += '<tr><th>报名费用:</th><td><span class="label '+colors[response.signup_price.price_type]+'">'+response.signup_price.price_amount+response.signup_price.price_type_name+'</span></td></tr/>';
                        $.each(response.match_prize,function(i,match){
                            sOut += '<tr><th>排名:</th><td>' + match.rank +'</td><th>奖励:</th><td>';
                            var temp = [];
                            $.each(match.prizes,function(j,prize){
                                temp.push( '<span class="label '+colors[prize.prize_type]+'">'+prize.prize_amount+prize.prize_type_name+'</span>');
                            });
                            sOut += temp.join(' , ') +  '</td></tr>';
                        });
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
            var id = $(this).parent().parent().attr('rel');
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
        }
    };
}();
