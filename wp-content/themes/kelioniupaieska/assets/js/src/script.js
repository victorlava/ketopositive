jQuery(document).ready(function( $ ) {

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

	$('.carousel-selectors li').each(function(){
		$(this).click(function(e){
			alert('clicked');
			var category = $(this).data('category');
			$('.carousel-selectors li').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();

			$('#hotel-carousel .data-block--hotels').hide();
			$('#hotel-carousel .data-block--hotels.js-data-' + category).show();

		})
	});

}); 
