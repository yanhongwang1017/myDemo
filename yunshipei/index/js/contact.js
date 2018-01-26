$(document).ready(function () {
    $(".form-inline").validate({
        rules:{
            name:{
                required:true
            },
            email:{
                required:true,
                end:true
            },
            tel:{
                required:true
            },
            text:{
                required:true
            }
        },
        messages:{
            name:{
                required:"*请输入姓名"
            },
            email:{
                required:"*请输入正确的邮箱"
            },
            tel:{
                required:"*请输入您的电话"
            },
            text:{
                required:"*请填写您的意见以便我们改进"
            }
        }
    })


})