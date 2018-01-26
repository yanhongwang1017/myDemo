$(document).ready(function () {
    //把数据库中的数据加载到页面当中
    $.ajax({
        url:"data.php",
        type:"get",
        dataType:"json",
        async:true,
        success:function (data) {
            for(let i = 0; i < data.length; i++){
                let tr = $("<tr>");
                let td = "";
                /*td += '<td name='+'id'+' attr='+data[i].id+'>'+data[i].id+'</td>';
                td += '<td name='+'name'+' attr='+data[i].id+'>'+data[i].name+'</td>';
                td += '<td name='+'sex'+' attr='+data[i].id+'>'+data[i].sex+'</td>';
                td += '<td name='+'age'+' attr='+data[i].id+'>'+data[i].age+'</td>';
                td += '<td name='+'course'+' attr='+data[i].id+'>'+data[i].course+'</td>';
                td += '<td><button attr='+data[i].id+' class="btn btn-danger" style="outline: none">删除</button></td>';*/
                td += `<td name = "id" attr = "${data[i].id}">${data[i].id}</td>>`;
                td += `<td name = "name" attr = "${data[i].id}">${data[i].name}</td>>`;
                td += `<td name = "sex" attr = "${data[i].id}">${data[i].sex}</td>>`;
                td += `<td name = "age" attr = "${data[i].id}">${data[i].age}</td>>`;
                td += `<td name = "course" attr = "${data[i].id}">${data[i].course}</td>>`;
                td += `<td><button attr="${data[i].id}" class="btn btn-danger" style="outline: none;">删除</button></td>>`;
                tr.html(td);
                tr.appendTo("tbody");
            }
        }
    });
    //添加数据
    $('.icon-plus').click(function () {
        $(".wait").show();
        $.ajax({
            url:"add.php",
            type:"get",
            async:'true',
            success:function (id) {
                console.log(id);
                $('<tr><td>'+id+'</td><td></td><td></td><td></td><td></td><td><button class="btn btn-danger">删除</button></td></tr>').appendTo("tbody");
                $(".wait").hide();
            }
        });
    });
    //删除数据
    $('tbody').on('click','button',function () {
        $(".wait").show();
        let that = this;
        let ids = $(this).attr("attr");
        $.ajax({
            url:"delete.php",
            type:'get',
            async:true,
            data:{id:ids},
            success:function () {
                let trs = $(that).parents('tr');
                trs.remove();
                $(".wait").hide();
            }
        })
    })
    //表格编辑
    $("tbody").on('dblclick','td',function (e) {
        let ele = e.target;
        let ids = $(this).attr('attr');
        let names = $(this).attr('name');
        let inputs = document.createElement('input');
        inputs.value = ele.innerText;
        ele.innerText = '';
        ele.appendChild(inputs);
        inputs.onblur = function () {
            let newvalue = inputs.value;
            ele.removeChild(inputs);
            inputs = '';
            ele.innerText = newvalue.trim();
            $.ajax({
                url:"update.php",
                async:true,
                type:"get",
                data:{id:ids, name:names, value:newvalue}
            })
        }
    })
})