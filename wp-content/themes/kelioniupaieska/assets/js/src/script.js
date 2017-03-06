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



	/* carousel selectors logic */
	$('.carousel-selectors li').each(function(){
		$(this).click(function(e){
			var category = $(this).data('category');
			$('.carousel-selectors li').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();

 //pabandyti loopsa ne rowsuose
			$('section.favourite-hotels .row.js-show-hide .carousel').hide();
			var category = $(this).data('category');

			$('section.favourite-hotels .row.js-show-hide.'+category+' > .carousel').show();

		})
	});

	$('section.favourite-hotels .row.js-show-hide .carousel').hide();
	var category = $('.carousel-selectors li:first-child').data('category');

	$('section.favourite-hotels .row.js-show-hide.'+category+' > .carousel').show();
	/* end of carousel selectors logic */

}); 
