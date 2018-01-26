$(document).ready(function () {
    $(".asides>li").eq(0).click(function () {
        $(document.documentElement).animate({scrollTop:0});
    })
    //访问量的ajax
    $.ajax({
        url:"index.php?m=index&f=content&a=hitNmu&cid="+$(".ibody").attr("cid"),
    })
    //实现关注
    $(".guanzhu").click(function () {
        let uid1 = $(".ibody").attr("uid1");
        let uid2 = $(".ibody").attr("uid2");
        let that = $(this);
        $.ajax({
            url:"index.php?m=index&f=content&a=guanzhu",
            data:{uid1,uid2},
            type:"post",
            success:function (e) {
                if (e == "ok"){
                    that.hide().next(".cancelguanzhu").show();
                }else if(e == "noLogin"){
                    location.href = "index.php?m=index&f=login";
                }
            }
        })
    })
    $(".cancelguanzhu").click(function () {
        let uid1 = $(".ibody").attr("uid1");
        let uid2 = $(".ibody").attr("uid2");
        let that = $(this);
        $.ajax({
            url:"index.php?m=index&f=content&a=cancelguanzhu",
            data:{uid1,uid2},
            type:"post",
            success:function (e) {
                console.log(e)
                if (e == "ok"){
                    that.hide().prev(".guanzhu").show();
                }
            }
        })
    })
    //点击添加收藏
    $(".collect-no").click(function () {
        let conid = $(".ibody").attr("cid");
        let uid = $(".ibody").attr("uid1");
        let that = $(this);
        $.ajax({
            url:"index.php?m=index&f=content&a=addCollect",
            data:{conid,uid},
            type:"post",
            success:function (e) {
                if (e == "ok"){
                    that.hide().next(".collect-success").show();
                }else if(e == "noLogin"){
                    location.href = "index.php?m=index&f=login";
                }
            }
        })
    })
    //点击取消收藏
    $(".collect-success").click(function () {
        let conid = $(".ibody").attr("cid");
        let uid = $(".ibody").attr("uid1");
        let that = $(this);
        $.ajax({
            url:"index.php?m=index&f=content&a=delCollect",
            data:{conid,uid},
            type:"post",
            success:function (e) {
                that.hide().prev(".collect-no").show();
            }
        })
    })
    //留言框的出现和消失
    $(".pinglun_content").on("click",".replay_btn",function () {
        if ($(this).parents(".pinglun_content>li").find(".replyForm").offset().top > $(window).height() + $(window).scrollTop()){
            $(document.documentElement).animate({scrollTop:$(window).scrollTop()+$(window).height()/2});
        }
        if($(this).attr("author")){
            let that = $(this);
            $(this).parents(".pinglun_content>li").find("textarea").val("@"+that.attr("author")+":");
        }else{
            $(this).parents(".pinglun_content>li").find("textarea").val("");
        }
        $(this).parents(".pinglun_content>li").children(".replyForm").animate({height:130});

    })
    $(".cancel").click(function () {
        $(this).parents(".replyForm").animate({height:0});
    })
    //给文章内容留言
    $(".article-cancel").click(function () {
        $(this).parent().prev(".liuyan_box").children("textarea").val("");
    })
    $(".article-send").click(function () {
        let that = $(this);
        let uid1 = $(".ibody").attr("uid1");
        let uid2 = $(".ibody").attr("uid2");
        let conid = $(".ibody").attr("cid");
        let mcon = $(this).parent().prev(".liuyan_box").children("textarea").val();
        if (mcon != ""){
            $.ajax({
                url:"index.php?m=index&f=content&a=addMessage",
                data:{uid1,uid2,conid,mcon,state:0},
                type:"post",
                success:function (e) {
                    that.parent().prev(".liuyan_box").children("textarea").val("");
                    $("<li></li>").html(e).prependTo(".pinglun_content");
                }
            })
        }
    })
    //给留言回复
    $(".pinglun_content").on("click",".message-canel",function () {
        $(this).parent().prev(".liuyan_box").children("textarea").val("");
    })
    $(".pinglun_content").on("click",".message-send",function () {
        let that = $(this);
        let uid1 = $(".ibody").attr("uid1");
        let uid2 = $(this).attr("uid");
        let conid = $(".ibody").attr("cid");
        let mcon = $(this).parent().prev(".liuyan_box").children("textarea").val();
        let state = that.attr("state");
        let nicheng = that.attr("nicheng");
        let nowTime = getNowFormatDate();
        var target = $(this).parent(".write-function-block").parent(".replyForm").prev(".sub-comment-list");
        //console.log(target);
        if(mcon != ""){
            $.ajax({
                url:"index.php?m=index&f=content&a=addMessage",
                data:{uid1,uid2,conid,mcon,state},
                type:"post",
                success:function (e) {
                    if (e == "noLogin"){
                        location.href = "index.php?m=index&f=login";
                    }else {
                        $("<div class='sub-comment'></div>").html(`
                            <p>
                                <a href="javascript:void(0);">${nicheng}</a>：
                                <span>${mcon}</span>
                            </p>
                            <div class="sub-tool-group">
                                <span>${nowTime}</span>
                                    <a href="javascript:void (0);" class="replay_btn" author="">
                                    <i class="iconfont icon-pinglunzhuanhuan"></i>
                                    <span>回复</span>
                                </a>
                            </div>
                        `).prependTo(target);
                        that.parent().prev(".liuyan_box").children("textarea").val("");
                    }
                }
            })
        }
    })
    function getNowFormatDate() {
        var date = new Date();
        var seperator1 = ".";
        var seperator2 = ":";
        var month = date.getMonth() + 1;
        var strDate = date.getDate();
        var hours = date.getHours();
        var minutes = date.getMinutes();
        if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
        if (strDate >= 0 && strDate <= 9) {
            strDate = "0" + strDate;
        }
        if (hours >=1 && hours <= 9){
            hours = "0" + hours;
        }
        if (minutes >= 1 && minutes <= 9){
            minutes = "0" + minutes;
        }
        var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
            + " " + hours + seperator2 + minutes + seperator2 + date.getSeconds();
        return currentdate;
    }
    //点击喜欢
    $(".noLike").click(function () {
        let uid = $(".ibody").attr("uid1");
        let conid = $(".ibody").attr("cid");
        let that = $(this);
        $.ajax({
            url:"index.php?m=index&f=content&a=addLike",
            data:{uid,conid},
            type:"post",
            success:function (e) {
                if (e == "ok"){
                    that.hide().next(".hasLike").show();
                }
            }
        })
    })
    //点击取消喜欢
    $(".hasLike").click(function () {
        let uid = $(".ibody").attr("uid1");
        let conid = $(".ibody").attr("cid");
        let that = $(this);
        $.ajax({
            url:"index.php?m=index&f=content&a=cancleLike",
            data:{uid,conid},
            type:"post",
            success:function (e) {
                if (e == "ok"){
                    that.hide().prev(".noLike").show();
                }
            }
        })
    })
})