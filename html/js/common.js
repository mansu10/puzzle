


$(function(){
	var els = '<div class="scroll"><span class="fa fa-chevron-up"></span><p>Top</p></div>';
	$('body').append(els);
	var self = $('.scroll');
	$(window).scroll(function(event) {
		var scrollT = $(this).scrollTop();
		scrollT > 150 ? self.fadeIn('fast') : self.fadeOut('fast');
	});
	$(document).on('click', '.scroll', function(event) {
		$('html, body').animate({scrollTop: 0}, 200);
	});
})