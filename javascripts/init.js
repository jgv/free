$(document).ready(function() {

    $("div.section-wrap").lazyload({
	effect : "fadeIn"
    });
    
    $.localScroll({ offset: {top:-20}, hash: true}); //scrollto
    
    $('div.meta-wrapper').click(function() { // artists accordion
	$(this).next().slideDown().toggle();
//	$.scrollTo($(this).next(), 1500, {offset:-50});
	return true;
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
	$(this).next().slideDown().toggle();
       // $.scrollTo($(this).next(), 1500, {offset:-50});
	return false;
    }).next().show(); // this allows for the essay to close, although will initially show it open

    
    
    $('div.essays img.closer').click(function() { // close link. slides up to essays TOC
	$(this).parent().slideUp(1000);
	//console.log($(this).parent());
	$.scrollTo($(this).parent(), 500, {offset:-300});
    });

    $('div.artists-content img.closer').click(function() { // close link. slides up to essays TOC
	$(this).parent().slideUp(1000);
	console.log($(this).parent());
	$.scrollTo($(this).parent(), 500, {offset:-100});
    });

 
    // infinitescroll() is called on the element that surrounds 
    // the items you will be loading more of
   $('#container').infinitescroll({
        debug : 'true',
        navSelector  : "div.navigation",            
        // selector for the paged navigation (it will be hidden)
        nextSelector : "div.navigation a:first",    
        // selector for the NEXT link (to page 2)
        itemSelector : ".blog-wrap"          
        // selector for all items you'll retrieve
    });
/*

    var offset = 5;

    $("#container").load("/?page_id=151&offset="+offset);
    $("#another").click(function(){
        
        offset = offset+5;
    
        $("#containerr")
            .slideUp()
            .load("/?page_id=151&offset="+offset, function() {
                $(this).slideDown();
            });
            
        return false;
    });
*/
});