$(function () {

	$('#hotel-carousel').carousel();

	$('nav.navbar .navbar-header .navbar-toggle').click(function(){
		$('#navbar').show();
		$('html').addClass('no-scroll');

		$('html').on('scroll touchmove mousewheel', function(e){
			  e.preventDefault();
			  e.stopPropagation();
			  return false;
			})
	});

	$('#navbar .navbar-close').click(function(){
		$('#navbar').hide();
		$('html').removeClass('no-scroll');

	    $('html').off('scroll touchmove mousewheel');
	});

}); 
