$(function(){$("a[class='title']").click(function(){var _this=$(this);var _div=_this.parent();var _span=_this.parent().find("span.message");if(_span.css("display")=="none"){_div.removeClass("hid_more");_span.show()}else{_div.addClass("hid_more");_span.hide()}var has_read=_this.attr("rel").split("|")[0];var msg_id=_this.attr("rel").split("|")[1];if(has_read==0){$.post("/user/readMessage/"+msg_id,"",function(data){var response=eval("("+data+")");if(response.error==0){_div.removeClass("unread")}})}})});