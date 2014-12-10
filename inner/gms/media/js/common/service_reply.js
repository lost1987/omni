(function($){
        $("input[name='reply_radio']").on('click',function(){
                    if($(this).val() == '自定义'){
                        $("#custom_reply").attr('disabled',false);
                    }else{
                        $("#custom_reply").attr('disabled',true);
                    }
        });
})(jQuery)