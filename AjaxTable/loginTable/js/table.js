$(document).ready(function () {
    $.ajax({
        url:"php/data.php",
        dataType:"json",
        success:function (data) {
            data.forEach(function (obj,index) {
                $(`<tr><td attr="id">${obj.id}</td><td attr="name">${obj.name}</td><td attr="sex">${obj.sex}</td>
<td attr="age">${obj.age}</td><td attr="course">${obj.course}</td>
<td class="remove"><button attr="${obj.id}" class="btn btn-danger" style="outline: none;">删除</button></td></tr>`).appendTo("tbody");
            })
        }
    });
    //添加一行空数据
    $(".btn-default").click(function () {
        $.ajax({
            url:"php/add.php",
            success:function (id) {
                $(`<tr><td attr="id">${id}</td><td attr="name"></td><td attr="sex"></td><td attr="age"></td>
<td attr="course"></td><td class="remove"><button attr="${id}" class="btn btn-danger" style="outline: none;">删除
</button></td></tr>`).appendTo("tbody");
            }
        })
    });
    //删除一行
    $("tbody").on("click",".remove",function () {
        let id = $(this).children("button").attr("attr");
        let trs = $(this).parents('tr');
        trs.remove();
        $.ajax({
           url:"php/delete.php",
            data:{id},
           success:function (data) {
               if (data == "ok"){
                   alert("数据库删除成功");
               }
           } 
        });
    })
    //编辑
    let oldval;
    $("tbody").on("dblclick","td:not('.remove')",function () {
        $(this).attr("contenteditable","true");
        oldval = $(this).html();
    }).on("blur","td:not('.remove')",function () {
        editt.call(this);
    }).on("keydown","td:not('.remove')",function (e) {
        if (e.keyCode == 13){
            editt.call(this);
            return false;
        }
    })
    function editt() {
        $(this).remove("contenteditable","true");
        let id = $(this).nextAll('.remove').children('button').attr('attr');
        let attr = $(this).attr("attr");
        let newval = $(this).html();
        if (oldval !== newval){
            $.ajax({
                url:"php/edit.php",
                data:{id, attr, newval},
                success:function (data) {
                    if(data == "ok"){
                        alert("数据库修改成功");
                    }
                }
            })
        }
    }
})