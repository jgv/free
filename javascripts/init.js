$(document).ready(function() {

	$("div.section-wrap").lazyload({
		effect : "fadeIn"
	});

	$.localScroll({ offset: {top:-20}}); //scrollto

	$(' div.meta-wrapper').click(function() { // artists accordion
		$(this).next().toggle('slow');
		$.scrollTo('div.artists-content', 1500, {offset:-50});
		return false;
	}).next().hide();
	
	$('.meta-wrapper img').hover(function() {  // begin hover stuff for artists accordion
	  $(this).next().fadeIn('slow').css('color', '#f00');
	
	},
	  function() {
 	  $(this).next().fadeIn('slow').css('color', '#454545');  	
	}); // end hover stuff for artists accordion

	$('.essay-meta').hover(function() { // essays hover
		$('h3', this).fadeIn('slow').css('color', '#f00');
	},
	  function() {
 	  	$('h3', this).fadeIn('slow').css('color', '#454545');  	
	}); // end essays hover


	$('.essay-meta').click(function() { // essays accordion
		$(this).next().toggle('fast');
		$.scrollTo('div.essay-content', 1500, {offset:-50});
		return false;
	}).next().hide();


	$('a.closer').click(function() { // close link. slides up to essays TOC
		$(this).parent().slideUp(1000);
		$.scrollTo('#essays', 1500);
	});

});