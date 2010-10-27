$(document).ready(function() {

    $("div.section-wrap").lazyload({
	effect : "fadeIn"
    });
    
    $.localScroll({ offset: {top:-20}, hash: true}); //scrollto
    
    $('div.meta-wrapper').click(function() { // artists accordion
	$(this).next().slideDown().toggle();
	return true;
    }).next().hide();
    
    $('.meta-wrapper img').hover(function() {  // hover stuff for artists accordion
	$(this).next().fadeIn('slow').css('color', '#f00');	
    }, function() {
 	$(this).next().fadeIn('slow').css('color', '#454545');  	
    }); 
    
    $('.essay-meta').hover(function() { // essays hover
	$('h3', this).fadeIn('slow').css('color', '#f00');
    }, function() {
 	$('h3', this).fadeIn('slow').css('color', '#454545');  	
    });
    
    $('.essay-meta').click(function() { // essays accordion
	$(this).next().slideDown().toggle();
	return false;
    }).next().show(); // this allows for the essay to close, although will initially show it open
    
    $('div.essays img.closer').click(function() { // closer link, specific to the essays. note that the difference betweeen this function and the one below it is the offset
	$(this).parent().slideUp(1000);
	$.scrollTo($(this).parent(), 500, {offset:-300});
    });
    
    $('div.artists-content img.closer').click(function() { // closer link for artists section
	$(this).parent().slideUp(1000);
	$.scrollTo($(this).parent(), 500, {offset:-100});
    });    

$(function() {
    $("p.clipboard").each(function() {
        //Create a new clipboard client
        var clip = new ZeroClipboard.Client();
	
        //Cache the last td and the parent row    
	var p = $(this);
	// var parentRow = lastTd.parent("tr");
	
        //Glue the clipboard client to the last td in each row
        clip.glue(p[0]);
	
        //Grab the text from the parent row of the icon
        var txt = $(this).attr('title');
        clip.setText(txt);
	
        //Add a complete event to let the user know the text was copied
        clip.addEventListener('complete', function(client, text) {
            alert("Copied text to clipboard:\n" + text);
                });
    });

});
    
});

