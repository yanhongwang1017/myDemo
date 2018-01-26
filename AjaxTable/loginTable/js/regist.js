$(document).ready(function () {
    let user = $("input[name = username]");
    let error = $(".error_box");
    user.keyup(function () {
        let reg = /^[a-zA-Z]\w{3,16}$/;
        let oreg = eval(reg);
        let uservalue = user.val();
        let that = $(this);
        if (oreg.test(uservalue)){
            $.ajax({
                url:"../php/rege_yanzhen.php",
                type:"post",
                data:{uservalue},
                success:function (data) {
                    if (data == "ok"){
                        error.eq(0).show().html("该用户名已被注册").css({color:"red"});
                        that.data("flag",false);
                    }else {
                        error.eq(0).show().html("用户名可用").css({color:"#61ff00"});
                        that.data("flag",true);
                    }
                }
            })
            check();
        }else{
            error.eq(0).show().html("*用户名不符合规范").css({color:"red"});
            that.data("flag",false);
            check();
        }
    })

    let pass1 = $("input[name = pass1]");
    let pass2 = $("input[name = pass2]");
    pass1.keyup(function () {
        let reg = /^[a-z0-9_-]{6,18}$/;
        let oreg = eval(reg);
        let pass1val = pass1.val();
        let pass2val;
        if (oreg.test(pass1val)){
            error.eq(1).show().html("密码符合要求").css({color:"#00ff05"});
            if (pass1val == pass2val){
                error.eq(1).show().html("两次密码输入一致").css({color:"#00ff05"});
                error.eq(2).show().html("两次密码输入一致").css({color:"#00ff05"});
                pass1.data("flag",true);
                pass2.data("flag",true);
                check();
            }else{
                error.eq(1).show().html("*两次密码输入不一致").css({color:"red"});
                error.eq(2).show().html("*两次密码输入不一致").css({color:"red"});
                pass1.data("flag",false);
                pass2.data("flag",false);
                check();
            }
        }else {
            error.eq(1).show().html("*密码安全级别过低").css({color:"red"});
            pass1.data("flag",false);
            pass2.data("flag",false);
            check();
        }
        pass2.keyup(function () {
            pass2val = pass2.val();
            if (pass1val == pass2val){
                error.eq(1).show().html("两次密码输入一致").css({color:"#00ff05"});
                error.eq(2).show().html("两次密码输入一致").css({color:"#00ff05"});
                pass1.data("flag",true);
                pass2.data("flag",true);
                check();
            }else{
                error.eq(1).show().html("*两次密码输入不一致").css({color:"red"});
                error.eq(2).show().html("*两次密码输入不一致").css({color:"red"});
                pass1.data("flag",false);
                pass2.data("flag",false);
                check();
            }
        })
    })
    function check() {
        let flag = true;
        $("input").each(function (index,obj) {
            if (!$(obj).data("flag")){
                flag = false;
            }
        })
        if (flag){
            $('.btn').removeAttr("disabled");
        }else {
            $('.btn').attr("disabled","disabled");
        }
    }

})