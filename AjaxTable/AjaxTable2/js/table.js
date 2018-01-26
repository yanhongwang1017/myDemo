$(document).ready(function () {
    $.ajax({
        url:"php/data.php",
        dataType:"json",
        success:function (data) {
            data.forEach(function (obj,indx) {
                let tr = $(`<tr><td attr="id">${obj.id}</td><td attr="name">${obj.name}</td>
<td attr="sex">${obj.sex}</td><td attr="age">${obj.age}</td><td attr="course">${obj.course}</td>
<td class="remove"><button attr="${obj.id}" class=" btn btn-danger" style="outline: none;">删除</button></td></tr>`).appendTo("tbody");
            })
        }
    });
    //新添加一行
    $(".btn_add").click(function () {
        $.ajax({
            url:"php/add.php",
            success:function (id) {
                let tr = $(`<tr><td>${id}</td><td></td><td></td><td></td><td></td><td>
<button attr="${id}" class=" btn btn-danger" style="outline: none;">删除</button></td></tr>`).appendTo("tbody");
            }
        })
    });
    //删除一行
    $("tbody").on("click",".remove",function () {
        let id = $(this).children("button").attr("attr");
        let that = this;
        $.ajax({
            url:"php/delete.php",
            data:{id},
            success:function (data) {
                let trs = $(that).parents("tr");
                trs.remove();
                if (data == "ok"){
                    alert("数据库删除成功");
                }
            }
        });
    });
    //表格编辑
    let oldval;
    $("tbody").on("dblclick","td:not('.remove')",function () {
        oldval = $(this).html();
        $(this).attr("contenteditable","true");
    })
    $("tbody").on("blur","td:not('.remove')",function () {
        editd.call(this);
    })
    $("tbody").on("keydown","td:not('.remove')",function (e) {
        if (e.keyCode == 13){
            editd.call(this);
            return false;
        }

    })
    function editd() {
        $(this).removeAttr("contenteditable","true");
        let attr = $(this).attr("attr");
        let id = $(this).nextAll(".remove").children('button').attr("attr");
        let newval = $(this).html();
        if (oldval !== newval){
            $.ajax({
                url:"php/edit.php",
                data:{id, attr, newval},
                success:function (data) {
                    if (data == "ok"){
                        alert("数据库修改成功");
                    }
                }
            });
        }
    }
})