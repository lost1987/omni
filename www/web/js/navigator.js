$(function(){$(".nav a").each(function(){var a=$(this).attr("href");if(a!=""||a!=undefined){var c=a.split("/");var b=c[c.length-1];if(b==cur_navigator){$(this).addClass("on")}}});if(cur_navigator=="index"){$(".nav a").eq(0).addClass("on")}});