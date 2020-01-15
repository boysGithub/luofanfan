var tim1 = setInterval(function() {
	if($('.wxname').html()) {
		window.wxname = ($('.wxname').html());
		window.weixin = ($('.weixin').html())
		clearInterval(tim1);
	}
}, 100)

function jumpj(e) {
	if(e == 'top') {
		$(window).unbind();
		$("html,body").animate({
			scrollTop: 0
		}, 500);
	} else if(e == 'bot') {
		$(window).unbind();
		$("html,body").animate({
			scrollTop: $(document).height()
		}, 500);
	} else {
		$(window).unbind();
		$("html,body").animate({
			scrollTop: $(e).offset().top - 60
		}, 500);
	};
};

function botwarnning(e) {
	$.fn.barrager.removeAll();
	$(document).bind('mousewheel', function(event, delta) {
		return false;
	});
	$('.thiswarnning').html($(e).find("div").html());
	$('.botwarnning').css('display', 'flex');
	var conss = setInterval(function() {
		$('.botcounts').html($('.botcounts').html() - 1)
	}, 1000);
	setTimeout(function() {
		$('.botwarnning').css('display', 'none');
		$('.botcounts').html(3);
		$(document).unbind('mousewheel');
		clearInterval(conss)
	}, 3000)
};
$(function() {
	$('.body-bot-info-item').click(
		function() {
			botwarnning(this);
		}
	);
	$('.searchbtn').click(
		function() {
			$(document).bind('mousewheel', function(event, delta) {
				return false;
			});
			$('.thiswarnning').html('搜索');
			$('.botwarnning').css('display', 'flex');
			var conss = setInterval(function() {
				$('.botcounts').html($('.botcounts').html() - 1)
			}, 1000);
			setTimeout(function() {
				$('.botwarnning').css('display', 'none');
				$('.botcounts').html(3);
				$(document).unbind('mousewheel');
				clearInterval(conss)
			}, 3000)
		}
	);
	if(localStorage.getItem('ww01')) {
		var bb = JSON.parse(localStorage.getItem('ww01'));

		var DateT = new Date();
		var MonthT = DateT.getMonth() + 1;
		var dayT = DateT.getDate();
		var yearT = DateT.getFullYear();

		for(var i = 0; i < bb.length; i++) {
			$('#ask').append("<div class='chat-item-box'><div class='chat-item-head'><div class='chat-avatar'><img src='img/im/nor.png' /><span>游客1597634</span><span>LV.1</span></div><span>" + yearT + "-" + MonthT + "-" + dayT + "</span></div><div class='chat-item-body'><p><xmp>" + bb[i].talk + "</xmp></p></div></div>")
		}

	}

})
var DateT = new Date();
var MonthT = DateT.getMonth();
var dayT = DateT.getDate();
var yearT = DateT.getFullYear();
$('.thisYear').html(yearT);
MonthT<9?$('.thisMonth').html('0'+(MonthT + 1)):$('.thisMonth').html(MonthT + 1);
$('.Today').html(dayT);
switch(dayT) {
	case 1:
		$('.thisDay').html(dayT);
		$('.thisDay1').html(dayT);
		$('.thisDay2').html(dayT);
		break;
	case 2:
		$('.thisDay').html(dayT - 1);
		$('.thisDay1').html(dayT - 1);
		$('.thisDay2').html(dayT - 1);
		break;
	case 3:
		$('.thisDay').html(dayT - 2);
		$('.thisDay1').html(dayT - 1);
		$('.thisDay2').html(dayT - 1);
		break;
	default:
		$('.thisDay').html(dayT - 3);
		$('.thisDay1').html(dayT - 1);
		$('.thisDay2').html(dayT - 2);
}

function showthing(e) {
	$(e).animate({
		top: '0px',
		opacity: '0.8'
	}, 1000);
	$(e).animate({
		top: '-100px',
		opacity: '0'
	}, 5000, function() {
		$(e).hide()
	});

}

$('.showoff').mouseenter(function() {
	$(this).stop(true);

});
$('.showoff').mouseleave(function() {
	showthing(this);

});

$('.body-head-m-menu').click(function() {
	if($('.body-head-m-ul').css('opacity') == 1) {
		$('.body-head-m-ul').animate({
			'right': '-100px',
			'opacity': '0',
		}, 500);
	} else {
		$('.body-head-m-ul').animate({
			'right': '0px',
			'opacity': '1',
		}, 500);
	}

})

$('.m-contactbtn').click(function() {
	// $.fn.barrager.removeAll();
	// $('.m-contact').addClass('m-mv');
	$('.m-contact-cover').animate({
		'top': '0px',
	});
	$("#side").fadeIn(1000);
})

$('.m-contact-cover').click(function() {
	// $('.input-box').hide();
	// $('.m-contact').removeClass('m-mv');
	$("#side").fadeOut(1000);
	$('.m-contact-cover').animate({
		'top': '100%',
	}, function() {
		$('.m-contact-cover').css('top', '-100%')
	})
})
$('#chaton').click(function() {

	if($('#chatarea').val()) {
		if(localStorage.getItem('ww01')) {
			var cc = JSON.parse(localStorage.getItem('ww01'));
			var aa = cc.length;
		} else {
			var aa = 0;
			var cc = [];
		};
		var bb = $('#chatarea').val();
		var data = {
			name: aa,
			talk: bb
		};
		cc.push(data)

		$('#chatarea').val('');

		localStorage.setItem('ww01', JSON.stringify(cc));

		var DateT = new Date();
		var MonthT = DateT.getMonth() + 1;
		var dayT = DateT.getDate();
		var yearT = DateT.getFullYear();

		$('#ask').append("<div class='chat-item-box'><div class='chat-item-head'><div class='chat-avatar'><img src='img/im/nor.png' /><span>游客1597634</span><span>LV.1</span></div><span>" + yearT + "-" + MonthT + "-" + dayT + "</span></div><div class='chat-item-body'><p>" + bb + "</p></div></div>")
	} else {
		alert("内容不能为空")
	}

});

$('.close-btn').click(function() {
	$('.m-contact-cover').animate({
		'top': '100%',
	}, function() {
		$('.m-contact-cover').css('top', '-100%')
	})
	$('.input-box').hide();
})


$(function() {
	$('.about_us_close').click(function() {
		$(this).parent().parent().hide()
	})
	$('.about_us_btn').click(function() {
		$('.about_us').css('display', 'flex')
	})
	$('.history_close').click(function() {
		$(this).parent().parent().hide()
	})
	$('.history_btn').click(function() {
		$('.history').css('display', 'flex')
	})
})
