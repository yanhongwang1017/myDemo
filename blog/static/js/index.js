$(function () {
    let num = 0;
    let t;
    t = setInterval(move,5000);
    function move(dir = "left") {
        if (dir == "left"){
            num++;
            if(num == $(".left_banner>li").length){
                num = 0;
            }
        }else if(dir == "right"){
            num--;
            if(num == -1){
                num = $(".left_banner>li").length - 1;
            }
        }
        $(".left_banner>li:eq("+num+")").css({opacity:1,zIndex:1}).siblings("li").css({opacity:0,zIndex:0});
    }
    $(".right_btn").click(function  () {
        move();
    })
    $(".left_btn").click(function  () {
        move("right");
    })
    $(".banner").hover(
        function () {
            clearInterval(t);
        },function () {
            t = setInterval(move,5000);
        }
    )
    $.fn.extend({
        Scroll: function(opt) {
            let that = this;
            let lineH = this.find("li:first").height(),
                line = opt.line ? parseInt(opt.line, 10) : parseInt(this.height() / lineH, 10),
                speed = opt.speed ? parseInt(opt.speed, 10) : 500,
                timer = opt.timer ? parseInt(opt.timer, 10) : 3000;
            if (line == 0){
                line = 1;
            }
            let upHeight = 0 - line * lineH;
            let downHeight = line * lineH;

            //滚动函数
            function scrollUp() {
                that.animate({
                    marginTop: upHeight
                }, speed, function() {
                    for (i = 1; i <= line; i++) {
                        that.find("li:first").appendTo(that);
                    }
                    that.css({
                        marginTop: 0
                    });
                });
            }
            function scrollDown() {
                that.animate({
                    marginTop: downHeight
                }, speed, function() {
                    for (i = 1; i <= line; i++) {
                        that.prepend(that.find("li:last"));
                    }
                    that.css({
                        marginTop: 0
                    });
                });
            }
            //鼠标事件绑定
            $(".right_banner").hover(
                function() {
                    clearInterval(timerID);
                },function() {
                    timerID = setInterval(scrollUp, timer);
            }).mouseout();
            $(".right_btn").click(function  () {
                scrollUp();
            })
            $(".left_btn").click(function  () {
                scrollDown();
            })
        }
    })
    $(function() {
        $('.right_banner').Scroll({
            line: 1,
            speed: 800,
            timer: 5000
        });
    });


})