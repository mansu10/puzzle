$(function(){
	//loadpage
	$.fn.loadpage = function(){
		var pageUrl = $(this).attr('data-url');
		console.log(pageUrl);
		$('#loadhtml').load(pageUrl+'.html',function(){
			/* Stuff to do after the page is loaded */
			// alert(2);
		});
	}

	//waterfall
	// $(function(){
	// 	var oUrl = './data/data.json';
	// 	var container = $('#waterfall');
	// 	var flag = true;
	// 	var ipage = 0;
	// 	console.log(1);
	// 	getData();
	// 	function getData(){
	// 		if (!flag||ipage>6) {
	// 			return;
	// 		};
	// 		$.getJSON(oUrl, {page:ipage}, function(data){
	// 			$.each(data, function(index, val) {
	// 				var els = '<div class="detail-wrapper"><img src="'+val.image+'" width="100%" /></div>';
	// 				container.append(els);
	// 			});
	// 			oHeight = container.height();
	// 			// console.log('oHeight:'+oHeight);
	// 			initHeight = window.document.body.clientHeight;
	// 			window.document.body.clientHeight
	// 			if (oHeight < initHeight) {
	// 				getData();
	// 			};
	// 		});
	// 		ipage++;
	// 	}

	// 	$(window).on('scroll', function(event) {
	// 		console.log(window.document.body.clientHeight);
	// 		console.log($(window).height());
	// 		console.log(document.body.scrollHeight);
	// 		var totalHeight = $(window).scrollTop() + window.document.body.clientHeight + 300;
	// 		var contentHeight = document.body.scrollHeight;
	// 		// console.log(totalHeight);
	// 		if (totalHeight >= contentHeight) {
	// 			getData();
	// 		};
	// 	});
	// })
	
	//waterfall 2th edition
	$(function(){
		var configMap = {
			icols : 0,
			ipage : 2,
			iwidth : 220,
			sUrl : 'http://www.wookmark.com/api/json/popular?callback=?',
			loaded : true
		};
		var container = $('#waterfall');
		var arrTop = [];
		var arrLeft = [];
		var outerWidth = configMap.iwidth + 10;
		init();
		function setCols() {
			configMap.icols = Math.floor(container.width()/outerWidth);
			if (configMap.icols < 3) {
				configMap.icols = 3;
			} else if (configMap.icols > 6) {
				configMap.icols = 6;
			};
			// alert('setcols');
		};

		function getData() {
			if (!configMap.loaded) {
				return;
			};
			// alert('getdata1');
			configMap.loaded = false;
			configMap.ipage++;
			console.log(configMap.ipage);
			$.getJSON(configMap.sUrl, {page:configMap.ipage}, function(data){
				$.each(data, function(index, val) {
					var itemBox = $('<div class="item-box"><ul class="item-caption">\
										<li><span class="fa fa-heart"></span></li>\
										<li><span class="fa fa-share"></span></li>\
										<li><span class="fa fa-star"></span></li>\
									</ul></div>');
					var oImg = $('<img />');
					var iHeight = val.height * (configMap.iwidth/val.width) + 10 + 30;
					itemBox.css({
						width: configMap.iwidth,
						height: iHeight
					});
					oImg.css({
						width: configMap.iwidth - 20
					});
					var index = getMin();
					itemBox.css({
						top: arrTop[index],
						left: arrLeft[index]
					});
					arrTop[index] += iHeight + 10;
					itemBox.prepend(oImg);
					container.append(itemBox);
					var objImg = new Image();
					objImg.onload = function() {
						oImg.attr('src', this.src);
					}
					objImg.src = val.preview;
					resizeContainer();
					configMap.loaded = true;
				});
			});
		};

		function getMin() {
			var t = arrTop[0];
			var index = 0;
			for (var i = 1; i < arrTop.length; i++) {
				if (arrTop[i] < t) {
					t = arrTop[i];
					index = i;
				}
			};
			return index;
		};

		function init() {
			setCols();
			for (var i = 0; i < configMap.icols; i++) {
				arrTop[i] = 5;
				arrLeft[i] = outerWidth * i + 5;
			};
			console.log('init');
			getData();
		};

		function resizeContainer() {
			var index = getMin();
			var height = arrTop[index] + 455;
			$('#waterfall').css('height', height);

		}

		$(window).on('scroll', function(event) {
			var index = getMin();
			var totalHeight = $(window).scrollTop() + $(window).innerHeight();
			if (arrTop[index] + 500 < totalHeight) {
				getData();
			};
		});
	});

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

	$(function(){
		$(document).on('click', '.nav-tabs li', function(event) {
			$(this).loadpage();
			$(this).addClass('active').siblings('li').removeClass('active');
		});
		var init = function(){
			$('.nav-tabs li:nth(0)').addClass('active').loadpage();
		}
		init();
	})

})