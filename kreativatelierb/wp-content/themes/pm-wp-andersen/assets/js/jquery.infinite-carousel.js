/**
 * @author Stéphane Roucheray 
 * @extends jquery
 */


jQuery.fn.carousel = function(previous, next, options){
	var sliderList = jQuery(this).children()[0];
		viewport = $('#viewport'),
		window_h = $(window).height(),
		header_h = $('header').height();
		
	viewport.height((window_h-header_h)*0.8);
	viewport.width(viewport.height()*1.012);
	sliderList.children().height(viewport.height());
	sliderList.children().width(viewport.width());
	
	if (sliderList) {
		var increment = jQuery(sliderList).children().outerWidth("true"),
		elmnts = jQuery(sliderList).children(),
		numElmts = elmnts.length,
		sizeFirstElmnt = increment,
		shownInViewport = Math.round(jQuery(this).width() / sizeFirstElmnt),
		firstElementOnViewPort = 1,
		isAnimating = false;
		
		for (i = 0; i < shownInViewport; i++) {
			jQuery(sliderList).css('width',(numElmts+shownInViewport)*increment + increment + "px");
			jQuery(sliderList).append(jQuery(elmnts[i]).clone());
		}
		
		jQuery(previous).click(function(event){
			if (!isAnimating) {
				if (firstElementOnViewPort == 1) {
					jQuery(sliderList).css('left', "-" + numElmts * sizeFirstElmnt + "px");
					firstElementOnViewPort = numElmts;
				}
				else {
					firstElementOnViewPort--;
				}
				
				jQuery(sliderList).animate({
					left: "+=" + increment,
					y: 0,
					queue: true
				}, "swing", function(){isAnimating = false;});
				isAnimating = true;
			}
			
		});
		
		jQuery(next).click(function(event){
			if (!isAnimating) {
				if (firstElementOnViewPort > numElmts) {
					firstElementOnViewPort = 2;
					jQuery(sliderList).css('left', "0px");
				}
				else {
					firstElementOnViewPort++;
				}
				jQuery(sliderList).animate({
					left: "-=" + increment,
					y: 0,
					queue: true
				}, "swing", function(){isAnimating = false;});
				isAnimating = true;
			}
		});
	}
};
