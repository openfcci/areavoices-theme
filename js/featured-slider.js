jQuery(function ($) {


    setInterval(function () {
        moveRight();
    }, 4000);
var sliderLiWidth;
  var w = window.innerWidth;
    
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
    var slideCount = $('#slider ul li').length;
    
    var sliderUlWidth = slideCount * sliderLiWidth;
    
    // $('#slider').css({ width: slideWidth, height: slideHeight });
    $('#slider ul li').css({ width: sliderLiWidth});
     $('#slider ul').css({ width: sliderUlWidth, marginLeft: - sliderLiWidth });
     
     $(window).resize(function() {
        w = window.innerWidth;
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
        slideCount = $('#slider ul li').length;
        
        sliderUlWidth = slideCount * sliderLiWidth;
        $('#slider ul li').css({ width: sliderLiWidth});
        $('#slider ul').css({ width: sliderUlWidth, marginLeft: - sliderLiWidth });
     


    });
     $('#slider ul li:last-child').prependTo('#slider ul');
    function moveLeft() {
        $('#slider ul').transition({
            left: + sliderLiWidth
        }, 500, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '0'); 
            
            
        });
    }

    function moveRight() {
        $('#slider ul').transition({
            left: - sliderLiWidth
        }, 500, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '0'); 
            
            
            
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
