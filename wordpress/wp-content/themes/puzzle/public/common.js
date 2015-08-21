
//waterfall
$(function(){
	var oUrl = './data/data.json';
	var container = $('.main-content');
	var flag = true;
	var ipage = 0;
	console.log(1);
	getData();
	function getData(){
		if (!flag||ipage>6) {
			return;
		};
		$.getJSON(oUrl, {page:ipage}, function(data){
			$.each(data, function(index, val) {
				var els = '<div class="detail-wrapper"><img src="'+val.image+'" width="100%" /></div>';
				container.append(els);
			});
			oHeight = container.height();
			console.log('oHeight:'+oHeight);
			initHeight = window.document.body.clientHeight;
			window.document.body.clientHeight
			if (oHeight < initHeight) {
				getData();
			};
		});
		ipage++;
	}

	$(window).on('scroll', function(event) {
		console.log(window.document.body.clientHeight);
		console.log($(window).height());
		console.log(document.body.scrollHeight);
		var totalHeight = $(window).scrollTop() + window.document.body.clientHeight + 300;
		var contentHeight = document.body.scrollHeight;
		console.log(totalHeight);
		if (totalHeight >= contentHeight) {
			getData();
		};
	});
})


//scroll top
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
