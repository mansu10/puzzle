$(function(){
	//waterfall 2th edition
	// $(function(){
	// 	var configMap = {
	// 		icols : 0,
	// 		ipage : 2,
	// 		iwidth : 220,
	// 		sUrl : 'http://www.wookmark.com/api/json/popular?callback=?',
	// 		loaded : true
	// 	};
	// 	var container = $('#waterfall');
	// 	var arrTop = [];
	// 	var arrLeft = [];
	// 	var outerWidth = configMap.iwidth + 10;
	// 	init();
	// 	function setCols() {
	// 		configMap.icols = Math.floor(container.width()/outerWidth);
	// 		if (configMap.icols < 3) {
	// 			configMap.icols = 3;
	// 		} else if (configMap.icols > 6) {
	// 			configMap.icols = 6;
	// 		};
	// 		// alert('setcols');
	// 	};

	// 	function getData() {
	// 		if (!configMap.loaded) {
	// 			return;
	// 		};
	// 		// alert('getdata1');
	// 		configMap.loaded = false;
	// 		configMap.ipage++;
	// 		console.log(configMap.ipage);
	// 		$.getJSON(configMap.sUrl, {page:configMap.ipage}, function(data){
	// 			$.each(data, function(index, val) {
	// 				var itemBox = $('<div class="item-box"><ul class="item-caption">\
	// 									<li><span class="fa fa-heart"></span></li>\
	// 									<li><span class="fa fa-share"></span></li>\
	// 									<li><span class="fa fa-star"></span></li>\
	// 								</ul></div>');
	// 				var oImg = $('<img />');
	// 				var iHeight = val.height * (configMap.iwidth/val.width) + 10 + 30;
	// 				itemBox.css({
	// 					width: configMap.iwidth,
	// 					height: iHeight
	// 				});
	// 				oImg.css({
	// 					width: configMap.iwidth - 20
	// 				});
	// 				var index = getMin();
	// 				itemBox.css({
	// 					top: arrTop[index],
	// 					left: arrLeft[index]
	// 				});
	// 				arrTop[index] += iHeight + 10;
	// 				itemBox.prepend(oImg);
	// 				container.append(itemBox);
	// 				var objImg = new Image();
	// 				objImg.onload = function() {
	// 					oImg.attr('src', this.src);
	// 				}
	// 				objImg.src = val.preview;
	// 				resizeContainer();
	// 				configMap.loaded = true;
	// 			});
	// 		});
	// 	};

	// 	function getMin() {
	// 		var t = arrTop[0];
	// 		var index = 0;
	// 		for (var i = 1; i < arrTop.length; i++) {
	// 			if (arrTop[i] < t) {
	// 				t = arrTop[i];
	// 				index = i;
	// 			}
	// 		};
	// 		return index;
	// 	};

	// 	function init() {
	// 		setCols();
	// 		for (var i = 0; i < configMap.icols; i++) {
	// 			arrTop[i] = 5;
	// 			arrLeft[i] = outerWidth * i + 5;
	// 		};
	// 		console.log('init');
	// 		getData();
	// 	};

	// 	function resizeContainer() {
	// 		var index = getMin();
	// 		var height = arrTop[index] + 455;
	// 		$('#waterfall').css('height', height);

	// 	}

	// 	$(window).on('scroll', function(event) {
	// 		var index = getMin();
	// 		var totalHeight = $(window).scrollTop() + $(window).innerHeight();
	// 		if (arrTop[index] + 500 < totalHeight) {
	// 			getData();
	// 		};
	// 	});
	// });
	$(function(){
		var $container = $('#waterfall');
		var items = $container.find('.item-box');
		var itemsHeight = [];

		var arrTop = [],
			arrLeft = [];
		var configMap = {
			icols : 0,
			iWidth : 225,
			inums : 15,
			ipage : 0,
			loaded : true

		};
		init();
		function init() {
			setCols();
			for(var i = 0; i < configMap.icols; i ++) {
				arrTop[i] = 5;
				arrLeft[i] = (configMap.iWidth + 10) * i + 5;
			}
			loadData();
		}

		function loadData() {
			if (!configMap.loaded) {
				return;
			};
			configMap.loaded = false;
			items.each(function(index, el) {
				var index = getMin();
				$(this).css({
					'top': arrTop[index],
					'left': arrLeft[index],
					'position': "absolute"
				});
				arrTop[index] += $(this).height() + 30;
			});
			resizeContainer();
			configMap.loaded = true;
		}

		function setCols() {
			configMap.icols = Math.floor($container.width()/configMap.iWidth);
			// console.log(configMap.icols);
			if (configMap.icols < 2) {
				configMap.icols = 2;
			} else if (configMap.icols > 5) {
				configMap.icols = 5;
			};
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
		function resizeContainer() {
			var t = arrTop[0];
			var index = 0;
			for(var i = 0; i < arrTop.length; i++) {
				if (arrTop[i] > t) {
					t = arrTop[i];
					index = i;
				};
			}
			var height = arrTop[index] + 150;
			$('#waterfall').css('height', height);

		}

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

	$(function(){
		$(document).on('click', '.nav-tabs li', function(event) {
			var childId = '#' + $(this).attr('data-url');
			console.log(childId);
			$(this).addClass('active').siblings('li').removeClass('active');
			$('#loadContent .tabs').css('display', 'none');
			$('#loadContent').find(childId).css('display', 'block');
		});
		$('.tabs-heading li:first').addClass('active');
		$('#loadContent .tabs:first').css('display', 'block');
	})

})