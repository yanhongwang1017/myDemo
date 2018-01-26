$(function () {
    $(".sendbtn").click(function () {
        let phone = $("input[name=aphone]").val();
        let phoneerror = $("#aphone-error");
        let reg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(14[0-9]{1})|(17[0-9]{1}))+\d{8})$/;
        let oreg = eval(reg);
        if(!oreg.test(phone)){
            phoneerror.html("*手机号码格式不正确").show();
            return false;
        }
        let time = 60;
        let that = this;
        $.ajax({
            url:"index.php?m=admin&f=login&a=sendCode",
            type:"post",
            async:true,
            data:{phonenum:phone},
            success:function (e) {
                if (e){
                    let t = setInterval(function () {
                        time--;
                        $(that).html("重新发送("+time+")").attr({disabled:"disabled"});
                        if (time == 0){
                            time = 60;
                            $(that).html("获取短信验证码").removeAttr("disabled");
                            clearInterval(t);
                        }
                    },1000)
                }
            }
        })
    })
    $(".code>img").click(function () {
        this.src = "index.php?m=admin&f=login&a=imagecode";
    })

    $("form").validate({
        rules:{
            username:{
                required:true,
                minlength:4
            },
            password:{
                required:true,
                minlength:6
            },
            captcha:{
                required:true
            },
            aphone:{
                required:true,
            },
            phonecode:{
                required:true
            }
        },
        messages:{
            username:{
                required:"*请输入用户名",
                minlength:"用户名不能低于4位"
            },
            password:{
                required:"*请输入密码",
                minlength:"密码不能低于6位"
            },
            captcha:{
                required:"*请输入验证码"
            },
            aphone:{
                required:"*请输入手机号",
            },
            phonecode:{
                required:"*请输入收到的验证码"
            }
        }
    })
})