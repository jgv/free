$(document).ready(function() {
	$.localScroll({ offset: {top:-20}}); //scrollto
	$('.meta-wrapper').click(function() { // artists accordion
		$(this).next().toggle('slow');
		return false;
	}).next().hide();
	
	$('.meta-wrapper img').hover(function() {  // hover stuff for artists accordion
	  $(this).next().fadeIn('slow').css('color', '#f00');
	
	},
	  function() {
 	  $(this).next().fadeIn('slow').css('color', '#454545');  	
	});

	$('.essay-meta').click(function() { // essays accordion
		$(this).next().toggle('fast');
		return false;
	}).next().hide();


});