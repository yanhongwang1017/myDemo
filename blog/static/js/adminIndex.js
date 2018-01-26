$(document).ready(function () {
    let flag = true;
    $(".listt>li").on("click",function () {
        if(flag){
            $(this).find("dl>dt").height(30).parents("li").siblings("li").find("dl>dt").height(0);
            $(this).find(".glyphicon").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up").parents("li").siblings("li").find(".glyphicon").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
            flag = false;
        }else {
            $(this).find("dl>dt").height(0);
            $(this).find(".glyphicon").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
            flag = true;
        }
        $(this).children(".list_title").css({background:"#e02222"}).parent("li").siblings("li").children(".list_title").css({background:"#3d3d3d"});
        $(this).siblings("li").find("dl>dt").height(0);
    })
})