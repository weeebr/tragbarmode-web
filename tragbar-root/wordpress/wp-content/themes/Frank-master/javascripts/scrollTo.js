$(document).ready(function(){
	window.scrollTo(0, 0);

	var anchor = window.location.hash.slice(0);
	var item = $(anchor);
	if (item.length == 1) {
		$('.sections').hide(); 
		$(anchor).show(); 
		
		//set new current anchor
		$("a[href*='" + anchor + "']").each(function() {
			$('a').removeClass();
			$(this).addClass('current');
		});
	} else {
		if(anchor.length > 1) {
			window.location.replace('http://weber-designs.ch'); //forwarding
		}
		$('.sections').hide();
		$('#home').show();
	}
	
	$('a').click(function() {
		$('a').removeClass();
		$(this).addClass('current');
	});
	
	//show section of clicked nav
	$(window).bind('hashchange', function () { 
		var anchor = window.location.hash.slice(0);
		$('.sections').hide();
		$(anchor).show();
	});
	
	//back to top 
	$(".footer-logo").click(function(){$("html, body").animate({scrollTop:0},300)})
});