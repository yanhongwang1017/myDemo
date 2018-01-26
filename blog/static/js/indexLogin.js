$(document).ready(function() {
    $.validator.addMethod("isUname",function (value,element) {
        let unameReg = /^[a-zA-Z0-9_-]{4,16}$/;
        return this.optional(element) || unameReg.test(value);
    },"用户名不符合规范");
    $.validator.addMethod("isPassWord",function (value,element) {
        let passwordReg = /^[a-zA-Z0-9_-]{6,18}$/;
        return this.optional(element) || passwordReg.test(value);
    },"密码不符合规范")
	$(".logins").validate({
		rules:{
			username:{
				required:true,
                rangelength:[4,16]
			},
			password:{
				required:true,
                rangelength:[6,16]
			}
		},
		messages:{
			username:{
				required:"用户名必填",
                rangelength:"用户名在4到16位之间"
			},
			password:{
				required:"密码必填",
                rangelength:"密码在6到16位之间"
			}
		}
	})
	$(".regist").validate({
		rules:{
			username:{
				required:true,
                isUname:true
			},
			password:{
				required:true,
                passwordReg:true
			},
			password1:{
				equalTo:"#password"
			},
            phoneNum:{
			    required:true
            },
            phoneCode:{
			    required:true
            },
            code:{
			    required:true
            }
		},
		messages:{
			username:{
				required:"用户名必填",
                isUname:"用户名不符合规范"
			},
			password:{
				required:"密码必填",
                passwordReg:"密码不符合规范"
			},
			password1:{
				equalTo:"两次密码输入不一致"
			},
            phoneNum:{
			    required:"请填入手机号"
			},
            phoneCode:{
			    required:"请填写手机验证码"
            },
            code:{
			    required:"请填写图形验证码"
            }
		}
	})
    $(".code_box>img").click(function () {
        this.src = "index.php?m=index&f=login&a=imagecode";
    })
    $(".regitInput").blur(function () {
        let value = $(this).val();
        $.ajax({
            url:"index.php?m=index&f=login&a=registCheck",
            type:"post",
            data:{value},
            success:function (e) {
                if (e == "no"){
                    $(".reg_error").show().html("该用户名已被注册");
                }
            }
        })
    })
    $(".sendCode").click(function () {
        let phoneNum = $("#phoneNum").val().trim();
        let phoneNumError = $("#phoneNum-error");
        let reg = /^1([3578]\d|4[57])\d{8}$/;
        let oreg = eval(reg);
        if(!oreg.test(phoneNum)){
            phoneNumError.html("*手机号码格式不正确").show();
            return false;
        }
        let time = 60;
        let that = $(this);
        $.ajax({
            url:"index.php?m=admin&f=login&a=sendCode",
            data:{phoneNum},
            type:"post",
            success:function (e) {
                if (e){
                    let t = setInterval(function () {
                        time--;
                        $(that).html("请等待("+time+")").attr({disabled:"disabled"});
                        if (time == 0){
                            time = 60;
                            $(that).html("发送验证码").removeAttr("disabled");
                            clearInterval(t);
                        }
                    },1000)
                }
            }
        })
    })
    $(".showPhoto").blur(function () {
        let uname = $(this).val();
        $.ajax({
            url:"index.php?m=index&f=login&a=showPhoto",
            data:{uname},
            type:"post",
            success:function (e) {
                if (e != "no"){
                    $(".avtar").children("img").attr("src",e);
                }
            }
        })
    })
});