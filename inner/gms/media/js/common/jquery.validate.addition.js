/**
 * Created by shameless on 14/11/25.
 */
(function($){
    /**
     * 增加扩展方法 两值对比不相等
     */
    $.validator.addMethod('unequalTo',function(value,element,unequalNode){
               var unequal_value =  $(unequalNode).val();
                if(unequal_value == value)
                        return false;
                return true;
    },'');
})(jQuery);