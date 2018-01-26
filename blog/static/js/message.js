$(document).ready(function () {
    $(".left_list>li").click(function () {
        $(this).css({background:"#f0f0f0"}).siblings("li").css({background:"#fff"});
        $(".right_box>li").eq($(this).index()).show().siblings("li").hide();
    })
})