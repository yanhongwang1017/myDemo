$(document).ready(function  () {
	//头部左边语言选择
	let flag = true;
	$('.rightLang').click(function  () {
		if(flag){
			$('.two_lang').show();
			flag = false;
		}else if(!flag){
			$('.two_lang').hide();
			flag = true;
		}
	})
	//导航栏事件)
	$('.navi>li:eq(3)').hover(
		function  () {
			$(this).children('.hideBox').stop().slideDown({height:171});
		},function(){
			$(this).children('.hideBox').stop().slideUp({height:0});
		}
	)
	let bannerli = $('.banner>li');
	$('.bannerbtn>li').click(function  () {
		bannerli.eq($(this).index()).css({opacity:1,zIndex:1}).siblings('li').css({opacity:0,zIndex:0});
		$(this).css({borderBottom:'4px solid #59bcdb'}).siblings('li').css({borderBottom:'none'});
	})
	let t;
	t = setInterval(move,8000);
	let index = 0;
	function move () {
		index++;
		if (index >= 4) {
			index = 0;
		}
		bannerli.eq(index).css({opacity:1,zIndex:1}).siblings('li').css({opacity:0,zIndex:0});
		$('.bannerbtn>li').eq(index).css({borderBottom:'4px solid #59bcdb'}).siblings('li').css({borderBottom:'none'});
	}
	bannerli.hover(
		function(){
			clearInterval(t);
		},function  () {
			t = setInterval(move,8000);
		}
	);
	$('.bannerbtn>li').hover(
		function(){
			clearInterval(t);
		},function  () {
			t = setInterval(move,8000);
		}
	);
	//核心优势
	let conli = $('.advan_content>li');
	$(window).scroll(function  () {
		let scrollH = $(window).scrollTop();
		if(scrollH >= 630){
			conli.eq(0).show().addClass("slideInLeft");
			conli.eq(1).show().addClass("slideInLeft");
			conli.eq(2).show().addClass("slideInRight");
			conli.eq(3).show().addClass("slideInRight");
		}
		if(scrollH >= 1800){
			$('.menu_list').show().addClass("slideInLeft");
			$('.rightpic').show().addClass("slideInRight");
		}
	})
	//合作伙伴
	$('.pater_box>li').hover(
		function  () {
			$(this).children('img').attr({empty:$(this).children('img').attr("src"),src:$(this).children('img').attr("path")});
		},function  () {
			$(this).children('img').attr({src:$(this).children("img").attr('empty')});
		}
	)
	//功能特点
	for (let i = 0; i < 2; i++) {
		$('.fun_box:eq('+i+')>li').hover(
			function  () {
				$(this).children(".fun_img_box").stop().animate({left:270, top:-240},500);
			},
			function  () {
				$(this).children(".fun_img_box").stop().animate({left:0, top:0},500);
			}
		);
	}
})
