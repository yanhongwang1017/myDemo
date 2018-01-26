$(document).ready(function () {
    $(".search>form>input").focus(function () {
        $(this).parents("li").animate({width:320});
    })
    $(".search>form>input").blur(function () {
        $(this).parents("li").animate({width:255});
    })
    $(".navi>li:eq(2)").hover(
        function () {
            $(this).children(".hid_box").show();
        },function () {
            $(this).children(".hid_box").hide();
        }
    )
    $(".logins").hover(
        function () {
            $(this).children(".hid_box").show();
        },function () {
            $(this).children(".hid_box").hide();
        }
    )
})