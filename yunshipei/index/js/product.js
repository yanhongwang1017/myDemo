$(document).ready(function () {
    $('.right_nav>li:eq(4)').hover(
        function  () {
            $(this).children('.hideBox').stop().slideDown({height:171});
        },function(){
            $(this).children('.hideBox').stop().slideUp({height:0});
        }
    );
    let imgli = $(".img_box>li");
    let btnli = $(".btn>li");
    let t;
    t = setInterval(slide,8000);
    let now = next = 0;
    function slide() {
        next++;
        if(next == imgli.length){
            next = 0;
        }
        imgli.eq(next).css({left:"100%"});
        imgli.eq(now).animate({left:"-100%"},1500,"swing");
        imgli.eq(next).animate({left:0},1500,"swing");
        btnli.eq(next).css({background:"#7c6aa6"}).siblings("li").css({background:"#fff"});
        now = next;
    }
    btnli.mouseenter(function () {
       if(now == $(this).index()){
           return;
       }
       $(this).css({background:"#7c6aa6"}).siblings("li").css({background:"#fff"});
       imgli.eq($(this).index()).css({left:'100%'});
       imgli.eq(now).finish().animate({left:"-100%"},300,"swing");
       imgli.eq($(this).finish().index()).animate({left:0},300,"swing");
       now = $(this).index();
    });
    $('.banner1').hover(
        function () {
            clearInterval(t);
        },function () {
            t = setInterval(slide,8000);
        }
    );
    $(window).blur(function () {
        clearInterval(t);
    });
    $(window).focus(function () {
        t = setInterval(slide,8000);
    })
    $(".product_show>li").hover(
        function () {
            $(this).children(".mask").hide();
        },function () {
            $(this).children(".mask").show();
        }
    )
    $(".gongneng_box>li").hover(
        function () {
            $(this).addClass("pulse");
        },function () {
            $(this).removeClass("pulse");
        }
    )
})