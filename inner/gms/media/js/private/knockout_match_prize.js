     var match_form = {
         options: {
             prize_types : [],
             forms: [
                 {
                     rank: '1',
                     type: 0,
                     prizes: [{prize_type: 1, prize_amount: 1000}, {prize_type:2, prize_amount: 2000}]
                 },
                 {
                     rank: '2-10',
                     type: 1,
                     prizes: [{prize_type: 1, prize_amount: 1000}, {prize_type:2, prize_amount: 2000}]
                 }
             ]
         },

         init: function (_options) {
             var _this = this;
             this.options = $.extend(this.options, _options);
             if (this.options.forms.length > 0) {
                 $.each(this.options.forms, function (i, form) {
                            _this.create_form(form);
                 });
             }
         },

         create_form: function (form) {
             var _this =  this;
             var rank = form == undefined ? '' : form.rank;

             var form_div = '<div class="row-fluid"> ' +
                 '<div class="span12">' +
                 '<div class="portlet box grey"> ' +
                 '<div class="portlet-title">' +
                 ' <div class="caption"><i class="icon-reorder"></i></div> ' +
                 '<div class="tools"> <a href="javascript:;" class="remove"></a> </div> ' +
                 '</div> <div class="portlet-body form"> ' +
                 ' <form action="{{action}}" id="form_sample_2" rel="match" class="form-horizontal" method="post"> ' +
                 '<div class="control-group">' +
                 ' <label class="control-label"><b class="midnight">排名</b> </label> ' +
                 '<div class="controls">' +
                 ' <input type="text" rel="rank" name="rank" class="span1" value="'+rank+'" /> ' +
                  '&nbsp;&nbsp;<a href="javascript:;" class="popovers midnight" data-trigger="hover" data-content="点我添加一个奖励" data-original-title="说明" onclick="match_form.add_prize(this)"><i class="icon-plus" ></i></a>'+
                 '</div> ' +
                 '</div>' ;

                 if(form != undefined)
                     $.each(form.prizes,function(k,prize){
                                form_div +=         '<div class="control-group">' +
                         '<label class="control-label">' +
                             '<b class="midnight">奖励</b>' +
                             ' </label> <div class="controls">' +
                             ' <input type="text" rel="amount" name="amount" class="span1" value="'+prize.prize_amount+'" />' +
                             ' <select name="prize_type" class="span2">';

                                $.each(_this.options.prize_types,function(j,prize_type){
                                            if(prize_type.type == prize.prize_type)
                                                form_div+= '<option value="'+prize_type.type+'" selected="selected">'+prize_type.name+'</option>';
                                            else
                                                form_div+= '<option value="'+prize_type.type+'">'+prize_type.name+'</option>';
                                })
                                form_div+= '</select>' +
                                '&nbsp;<a href="javascript:;" class="btn mini white" onclick="removePrize(this)"><i class="icon-remove"></i></a>' +
                                '&nbsp;</div></div>';
                     })

                form_div += '</form> </div> </div> </div> </div>';
                $(".row-fluid").last().after(form_div);
                if(form == undefined)//直接滚动到添加的这个DIV
                    App.scrollTo($(".row-fluid").last(), -200);
         },

         add_prize: function (node) {
                var prize_div =   '<div class="control-group">' +
                    '<label class="control-label">' +
                    '<b class="midnight">奖励</b>' +
                    ' </label> <div class="controls">' +
                    ' <input type="text" rel="amount" name="amount" class="span1" value="" />' +
                    ' <select name="prize_type" class="span2">';

                     $.each(this.options.prize_types,function(j,prize_type){
                         prize_div+= '<option value="'+prize_type.type+'">'+prize_type.name+'</option>';
                     })
                       prize_div+= '</select>' +
                     '&nbsp;<a href="javascript:;" class="btn mini white" onclick="removePrize(this)"><i class="icon-remove"></i></a>' +
                     '&nbsp;</div></div>';

                    $(node).parent().parent().parent().append(prize_div);
         }
     }

     function removePrize(btn){
            $(btn).parent().parent().remove();
     }

     function save(){
         var forms = $("form[rel='match']");
         var form_correct = true;
         var datas = [];
         forms.each(function(i){
             var _form = $(this);
             var _rank = _form.find('input[name="rank"]').val();
             var data = {}
             if(_rank == '' || _rank == undefined)form_correct = false;

             data.rank = _rank;
             data.prizes = [];
             var _prize_amount =   _form.find('input[name="amount"]');
             if(_prize_amount.length == 0) form_correct = false;
             $(_prize_amount).each(function(){
                 var prize = {};
                 prize.prize_amount  = $(this).val();
                 if(prize.prize_amount == '' || prize.prize_amount == undefined) form_correct = false;
                 prize.prize_type = $(this).next().val();
                 if(prize.prize_type == '' || prize.prize_type == undefined)form_correct = false;
                 data.prizes.push(prize);
             });
             datas.push(data);
         });
         var match_data = JSON.stringify(datas);
         if(match_data.length == 2 || match_data == undefined || !form_correct){
             alert('请填写数据后再保存');
             return;
         }
         $("#match_prize_info").val(match_data);
         $("#prize_form").submit();
     }
