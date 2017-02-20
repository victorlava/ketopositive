$(function () {

	$('#hotel-carousel').carousel();

	$('nav.navbar .navbar-header .navbar-toggle').click(function(){
		$('#navbar').show();
	});

	$('#navbar .navbar-close').click(function(){
		$('#navbar').hide();
	});

}); 
