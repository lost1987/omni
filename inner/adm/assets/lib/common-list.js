/**
 * Created by shameless on 15/1/14.
 */
$(function(){
        if(undefined != $(".common-btn-drop"))
            $('.common-btn-drop').dropdown({justify: '.common-btn-drop'});

        if(undefined != $("#search_btn"))
            $('#search_btn').click(function(){
                var args = doSearch();
                $.iAjax(args.url,args.data,function(data){
                    $(".admin-content").html(data);
                });
            });

        $(".am-pagination").find('a').each(function(){
            var __this = $(this);
            var href = __this.attr('href');
            if(undefined != href){
                var page = href.replace(/(.*)\/(.*)/g,"$2");
                __this.attr('href','javascript:;');
                __this.on('click',function(){
                    var args = doSearch();
                    $.iAjax(args.url+'/'+page,args.data,function(data){
                        $(".admin-content").html(data);
                    });
                })
            }
        })

})