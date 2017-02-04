
$(function () {


	$('#main .order.js-input-click .input-group-return.checkbox').each(function(){
		$(this).click(function(){
			$(this).find('input').click();
		})
	});

	$('.navbar-header .navbar-toggle').click(function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$('.background--overlay').hide();

			  $('html').removeClass('no-scroll');

  			  $('#main, .mobile-nav ul li a').off('scroll touchmove mousewheel');
		}
		else{
			$(this).addClass('active');
			$('.background--overlay').show();
			$('html').addClass('no-scroll');

		  $('#main, .mobile-nav ul li a').on('scroll touchmove mousewheel', function(e){
			  e.preventDefault();
			  e.stopPropagation();
			  return false;
			})	

		  
		}
		$('#navbar').removeClass('hidden-xs hidden-sm'); 
	})

	$('#sign').on('shown.bs.dropdown', function () {
	  $(this).addClass('active');
	  $(this).find('a.dropdown-toggle').html('Cancel    <i class="fa fa-times"></i>');
	  $('.background--overlay').show();
	  $('html').addClass('no-scroll');

	  $('html').on('scroll touchmove mousewheel', function(e){
		  e.preventDefault();
		  e.stopPropagation();
		  return false;
		})
	});


	$('#sign').on('hide.bs.dropdown', function () {
	  $(this).removeClass('active'); 
	  $(this).find('a.dropdown-toggle').html('<i class="icon icon-helmet"></i> Sign In');
	  $('.background--overlay').hide();
	  $('html').removeClass('no-scroll');

	  $('html').off('scroll touchmove mousewheel');
	});


	$('.collapse').collapse();

	$('.order .motorcycles-block--accomodation .checkbox label').click(function(){
		
		$(this).parent().parent().parent().parent().find('.motorcycles-input').toggle();
	});

	$('.search-component .button--default').on("click", function(){
		if($(this).hasClass('js-first')){
			$('.search-component #first-toggle').removeClass('hidden');
			$('.search-component #second-toggle').addClass('hidden')
		}
		else{
			$('.search-component #first-toggle').addClass('hidden');
			$('.search-component #second-toggle').removeClass('hidden');
		}
	});

	$('.filter #js-more-motorcycles').click(function(){ 
		$('.filter .filter-results-wrapper').find('.result.hidden').removeClass('hidden');
	});

	$('section.motorcycles #js-more-motorcycles').click(function(){ 
		$(this).parent().parent().find('.motorcycles-block.hidden').removeClass('hidden');
	});

	$('section.motorcycles--tours #js-more-tours').click(function(){ 
		$(this).parent().parent().find('.motorcycles-block.hidden').removeClass('hidden');
	});

	$('#sandbox-container .js-date-input').datepicker({
		weekStart: 1,
    	orientation: "bottom auto"
	});

	$('.js--prevent-default').click(function(e){
		e.preventDefault();
	});

	// shadow for select tour date inputs
	$('.order-inside.btn-group .input-group label').click(function(){
		$(this).parent().toggleClass('box-shadow'); 
	});

	// shadow for select tour date inputs
	$('.order-inside .motorcycles .input-group label').click(function(){
		$(this).parent().parent().parent().parent().toggleClass('box-shadow'); 
	});

	$('.navbar-header .navbar-toggle').click(function(){

		$('.mobile-nav').toggleClass('animated');
	})



}); 
