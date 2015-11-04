jQuery(document).ready(function ($) {


    setInterval(function () {
        moveRight();
    }, 5000);

  
	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
    var slider = $('#slider').width();
	var sliderUlWidth = slideCount * slideWidth;
    var sliderLiWidth = slider * 0.25;
	
	// $('#slider').css({ width: slideWidth, height: slideHeight });
	
	 $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
     $('#slider ul li').css({ width: sliderLiWidth});
     $(window).resize(function() {
        slideCount = $('#slider ul li').length;
        slideWidth = $('#slider ul li').width();
        slider = $('#slider').width();
        sliderUlWidth = slideCount * slideWidth;
        sliderLiWidth = slider * 0.25;
        $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
     $('#slider ul li').css({ width: sliderLiWidth});


	});
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 400, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    }

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 400, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    }

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});    
