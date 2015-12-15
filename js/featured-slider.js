jQuery(function ($) {


    setInterval(function () {
        moveRight();
    }, 4000);
var sliderLiWidth;
  var w = window.innerWidth;
    if ($("#slider").hasClass("layout1"))
        {
            if ($("#responsive_check").css("z-index") === "1" ){
            sliderLiWidth = w * 0.33;
            }
            else if ($("#responsive_check").css("z-index") === "2" ){
                sliderLiWidth = w * 0.5;
            }
            else if ($("#responsive_check").css("z-index") === "3" ){
                sliderLiWidth = w;
            }
            else {
                sliderLiWidth = w * 0.25;
            }
        }
    else if ($("#slider").hasClass("layout2"))
    {
        if ($("#responsive_check").css("z-index") === "3" ){
                sliderLiWidth = w;
            }
            else {
                sliderLiWidth = w * 0.5;
            }
    }
        
    var slideCount = $('#slider ul li').length;
    
    var sliderUlWidth = slideCount * sliderLiWidth;
    
    // $('#slider').css({ width: slideWidth, height: slideHeight });
    $('#slider ul li').css({ width: sliderLiWidth});
    if ($("#slider").hasClass("layout1")){
      $('#slider ul').css({ width: sliderUlWidth, marginLeft: - sliderLiWidth });  
    }
    else if ($("#slider").hasClass("layout2")){

        if ($("#responsive_check").css("z-index") === "3" ){
                $('#slider ul').css({ width: sliderUlWidth, marginLeft: - sliderLiWidth });
            }
            else {
                $('#slider ul').css({ width: sliderUlWidth, marginLeft: - (sliderLiWidth + (sliderLiWidth * 0.5)) });
            }
        

     $("#slider.layout2").css('visibility','visible');
    }
     
     
     $(window).resize(function() {
        w = window.innerWidth;
        if ($("#slider").hasClass("layout1"))
        {
            if ($("#responsive_check").css("z-index") === "1" ){
            sliderLiWidth = w * 0.33;
            }
            else if ($("#responsive_check").css("z-index") === "2" ){
                sliderLiWidth = w * 0.5;
            }
            else if ($("#responsive_check").css("z-index") === "3" ){
                $("a.control_prev").hide();
                $("a.control_next").hide();
                sliderLiWidth = w;
            }
            else {
                $("a.control_prev").show();
                $("a.control_next").show();
                sliderLiWidth = w * 0.25;
            }
        }
    else if ($("#slider").hasClass("layout2"))
    {
        if ($("#responsive_check").css("z-index") === "3" ){
            $("a.control_prev").hide();
            $("a.control_next").hide();
                sliderLiWidth = w;
            }
            else {
                $("a.control_prev").show();
                $("a.control_next").show();
                sliderLiWidth = w * 0.5;
            }
    }
        slideCount = $('#slider ul li').length;
        
        sliderUlWidth = slideCount * sliderLiWidth;
        $('#slider ul li').css({ width: sliderLiWidth});

        if ($("#slider").hasClass("layout1")){
      $('#slider ul').css({ width: sliderUlWidth, marginLeft: - sliderLiWidth });  
    }
    else if ($("#slider").hasClass("layout2")){

        if ($("#responsive_check").css("z-index") === "3" ){
                $('#slider ul').css({ width: sliderUlWidth, marginLeft: - sliderLiWidth });
            }
            else {
                $('#slider ul').css({ width: sliderUlWidth, marginLeft: - (sliderLiWidth + (sliderLiWidth * 0.5)) });
            }
        

     $("#slider.layout2").css('visibility','visible');
    }

    });
     $('#slider ul li:last-child').prependTo('#slider ul');
    function moveLeft() {
        $('a.control_prev').off("click");
        $('#slider ul li').off('swiperight');
        if ($("#responsive_check").css("z-index") === "3" ){
                $('#slider.layout2 ul li:nth-of-type(1)').transition({ height: "300px", marginTop: "0px", opacity: "1.0"});
        $('#slider.layout2 ul li:nth-of-type(2)').transition({ height: "200px", marginTop: "25px", opacity: "0.5"});
            }
            else {
                $('#slider.layout2 ul li:nth-of-type(2)').transition({ height: "450px", marginTop: "0px", opacity: "1.0"});
        $('#slider.layout2 ul li:nth-of-type(3)').transition({ height: "350px", marginTop: "50px", opacity: "0.5"});
            }
        
        $('#slider ul').transition({
            left: + sliderLiWidth
        }, 500, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '0');  
            $('a.control_prev').on("click", moveLeft);
            $('#slider ul li').on('swiperight', function(){ 
            moveLeft();
        });
            
        });

        
    }

    function moveRight() {
        $('a.control_next').off("click");
        $('#slider ul li').off('swipeleft');  
        if ($("#responsive_check").css("z-index") === "3" ){
                $('#slider.layout2 ul li:nth-of-type(3)').transition({ height: "300px", marginTop: "0px", opacity: "1.0"});
        $('#slider.layout2 ul li:nth-of-type(2)').transition({ height: "200px", marginTop: "25px", opacity: "0.5"});
            }
            else {
             $('#slider.layout2 ul li:nth-of-type(4)').transition({ height: "450px", marginTop: "0px", opacity: "1.0"});
        $('#slider.layout2 ul li:nth-of-type(3)').transition({ height: "350px", marginTop: "50px", opacity: "0.5"});
            }
        
        $('#slider ul').transition({
            left: - sliderLiWidth
        }, 500, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '0'); 
            $('a.control_next').on("click", moveRight);
            $('#slider ul li').on('swipeleft',  function(){ 
            moveRight();
        });  
        });
       
    }
    if ($("#responsive_check").css("z-index") === "3" ){
        $("a.control_prev").hide();
        $('#slider ul li').on('swiperight', function(){ 
            moveLeft();
        });
    }
    else{
        $("a.control_prev").show();
        $('a.control_prev').click(function () 
        {
            moveLeft();
        });  
    }    
    
    if ($("#responsive_check").css("z-index") === "3" ){
        $("a.control_next").hide();
        $('#slider ul li').on('swipeleft',  function(){ 
            moveRight();
        });           
     }
    else{
        $("a.control_next").show();
        $('a.control_next').click(function () {
            moveRight();
        });
    } 

});    
