jQuery(function($){function i(){"3"===$("#responsive_check").css("z-index")?($("#slider.layout2 ul li:nth-of-type(1)").transition({height:"300px",marginTop:"0px",opacity:"1.0"}),$("#slider.layout2 ul li:nth-of-type(2)").transition({height:"200px",marginTop:"25px",opacity:"0.5"})):($("#slider.layout2 ul li:nth-of-type(2)").transition({height:"450px",marginTop:"0px",opacity:"1.0"}),$("#slider.layout2 ul li:nth-of-type(3)").transition({height:"350px",marginTop:"50px",opacity:"0.5"})),$("#slider ul").transition({left:+l},500,function(){$("#slider ul li:last-child").prependTo("#slider ul"),$("#slider ul").css("left","0"),e=!1})}function s(){"3"===$("#responsive_check").css("z-index")?($("#slider.layout2 ul li:nth-of-type(3)").transition({height:"300px",marginTop:"0px",opacity:"1.0"}),$("#slider.layout2 ul li:nth-of-type(2)").transition({height:"200px",marginTop:"25px",opacity:"0.5"})):($("#slider.layout2 ul li:nth-of-type(4)").transition({height:"450px",marginTop:"0px",opacity:"1.0"}),$("#slider.layout2 ul li:nth-of-type(3)").transition({height:"350px",marginTop:"50px",opacity:"0.5"})),$("#slider ul").transition({left:-l},500,function(){$("#slider ul li:first-child").appendTo("#slider ul"),$("#slider ul").css("left","0"),e=!1})}var e=!1;setInterval(function(){e||(e=!0,s())},4e3);var l,t=window.innerWidth;$("#slider").hasClass("layout1")?l="1"===$("#responsive_check").css("z-index")?.33*t:"2"===$("#responsive_check").css("z-index")?.5*t:"3"===$("#responsive_check").css("z-index")?t:.25*t:$("#slider").hasClass("layout2")&&(l="3"===$("#responsive_check").css("z-index")?t:.5*t);var n=$("#slider ul li").length,o=n*l;$("#slider ul li").css({width:l}),$("#slider").hasClass("layout1")?$("#slider ul").css({width:o,marginLeft:-l}):$("#slider").hasClass("layout2")&&("3"===$("#responsive_check").css("z-index")?$("#slider ul").css({width:o,marginLeft:-l}):$("#slider ul").css({width:o,marginLeft:-(l+.5*l)}),$("#slider.layout2").css("visibility","visible")),$(window).resize(function(){t=window.innerWidth,$("#slider").hasClass("layout1")?"1"===$("#responsive_check").css("z-index")?l=.33*t:"2"===$("#responsive_check").css("z-index")?l=.5*t:"3"===$("#responsive_check").css("z-index")?($("a.control_prev").hide(),$("a.control_next").hide(),l=t):($("a.control_prev").show(),$("a.control_next").show(),l=.25*t):$("#slider").hasClass("layout2")&&("3"===$("#responsive_check").css("z-index")?($("a.control_prev").hide(),$("a.control_next").hide(),l=t):($("a.control_prev").show(),$("a.control_next").show(),l=.5*t)),n=$("#slider ul li").length,o=n*l,$("#slider ul li").css({width:l}),$("#slider").hasClass("layout1")?$("#slider ul").css({width:o,marginLeft:-l}):$("#slider").hasClass("layout2")&&("3"===$("#responsive_check").css("z-index")?$("#slider ul").css({width:o,marginLeft:-l}):$("#slider ul").css({width:o,marginLeft:-(l+.5*l)}),$("#slider.layout2").css("visibility","visible"))}),$("#slider ul li:last-child").prependTo("#slider ul"),"3"===$("#responsive_check").css("z-index")?($("a.control_prev").hide(),$("#slider ul li").on("swiperight",function(){e||(e=!0,i())})):($("a.control_prev").show(),$("a.control_prev").click(function(){e||(e=!0,i())})),"3"===$("#responsive_check").css("z-index")?($("a.control_next").hide(),$("#slider ul li").on("swipeleft",function(){e||(e=!0,s())})):($("a.control_next").show(),$("a.control_next").click(function(){e||(e=!0,s())}))});