/**
 * Created by shameless on 14/11/6.
 */
var TableAdvanced = function () {

    var initTable1 = function() {
        /* Formating function for row details */
        function fnFormatDetails ( oTable, nTr ,uid)
        {
            var sOut ;
            $.ajax({
                url: '/player/detail/' + uid,
                method:'post',
                async : false,
                success: function (data) {
                    var response = eval('(' + data + ')');
                    if (response.error == 0) {
                        response = response.data;
                        response.last_refresh_time = response.last_refresh_time==undefined ? '/' : response.last_refresh_time;
                        response.wins = response.wins==undefined ? '/' : response.wins;
                        response.fengs = response.fengs==undefined ? '/' : response.fengs;
                        response.total = response.total==undefined ? '/' : response.total;
                        response.littlewin = response.littlewin==undefined ? '/' : response.littlewin;
                        response.allwind = response.allwind==undefined ? '/' : response.allwind;
                        response.all258 = response.all258==undefined ? '/' : response.all258;
                        response.allonesuite = response.allonesuite==undefined ? '/' : response.allonesuite;
                        response.alltriples = response.alltriples==undefined ? '/' : response.alltriples;
                        response.allothers = response.allothers==undefined ? '/' : response.allothers;
                        response.allothers = response.allothers==undefined ? '/' : response.allothers;
                        response.quadruplerobbery = response.quadruplerobbery==undefined ? '/' : response.quadruplerobbery;
                        response.winquadruplecard = response.winquadruplecard==undefined ? '/' : response.winquadruplecard;
                        response.topgold = response.topgold==undefined ? '/' : response.topgold;
                        response.topdiamond = response.topdiamond==undefined ? '/' : response.topdiamond;
                        response.fangchong = response.fangchong==undefined ? '/' : response.fangchong;
                        response.zimo = response.zimo==undefined ? '/' : response.zimo;
                        response.baohu = response.baohu==undefined ? '/' : response.baohu;

                        sOut = '<table style="width:100%">';
                        sOut += '<tr><th>真实姓名:</th><td>' + response.real_name + '</td><th>区域:</th><td>' + response.area + '</td><th>金币:</th><td>' + response.coins + '</td></tr>';
                        sOut += '<tr><th>身份证:</th><td>' + response.id_card + '</td><th>钻石:</th><td>' + response.diamond + '</td><th>门票:</th><td>' + response.ticket + '</td></tr>';
                        sOut += '<tr><th>性别:</th><td>' + response.gender + '</td><th>奖券:</th><td>' + response.coupon + '</td><th>更新时间:</th><td>' + response.last_refresh_time + '</td></tr>';
                        sOut += '<tr><th>头像:</th><td>' + response.avatar + '</td><th>赢局数:</th><td>' + response.wins + '</td><th>封顶局数:</th><td>' + response.fengs + '</td></tr>';
                        sOut += '<tr><th>总局数:</th><td>' + response.total + '</td><th>小胡:</th><td>' + response.littlewin + '</td><th>风一色:</th><td>' + response.allwind + '</td></tr>';
                        sOut += '<tr><th>将一色:</th><td>' + response.all258 + '</td><th>清一色:</th><td>' + response.allonesuite + '</td><th>碰碰胡:</th><td>' + response.alltriples + '</td></tr>';
                        sOut += '<tr><th>全求人:</th><td>' + response.allothers + '</td><th>海底捞:</th><td>' + response.allothers + '</td><th>杠上开花:</th><td>' + response.quadruplerobbery + '</td></tr>';
                        sOut += '<tr><th>抢杠:</th><td>' + response.winquadruplecard + '</td><th>金顶:</th><td>' + response.topgold + '</td><th>钻石顶:</th><td>' + response.topdiamond + '</td></tr>';
                        sOut += '<tr><th>放冲:</th><td>' + response.fangchong + '</td><th>自摸:</th><td>' + response.zimo + '</td><th>包胡:</th><td>' + response.baohu + '</td></tr>';
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

        jQuery('#sample_1_wrapper .dataTables_filter input').addClass("m-wrap small"); // modify table search input
        jQuery('#sample_1_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
        jQuery('#sample_1_wrapper .dataTables_length select').select2(); // initialzie select2 dropdown

        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        $('#sample_1').on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            var uid = $(this).parent().parent().attr('rel');
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
                oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr,uid), 'details' );
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
            })
        }
    };
}();

