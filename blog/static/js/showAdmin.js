BUI.use(['bui/grid','bui/data'],function(Grid,Data){
    var Grid = Grid,
        Store = Data.Store,
        columns = [
            {title : 'id',dataIndex :'aid'}, //editor中的定义等用于 BUI.Form.Field.Text的定义
            {title : '帐户名称', dataIndex :'aname'},
            {title : '账户密码', dataIndex :'apass'},
            {title : '角色', dataIndex :'level'},
            {title : '操作',renderer : function(){
                return '<span class="grid-command btn-edit">编辑</span>'
            }}
        ]
    var isAddRemote = false,
        editing = new Grid.Plugins.DialogEditing({
            contentId : 'content', //设置隐藏的Dialog内容
            triggerCls : 'btn-edit', //触发显示Dialog的样式
            editor : {
                title : '编辑角色',
                width : 600,
                success:function () {
                    var edtor = this;
                    form = edtor.get("form");
                    form.valid();

                    var type = editing.get("editType");
                    if (form.isValid()){
                        form.ajaxSubmit({
                            url : "index.php?m=admin&f=member&a=addAdmin&type="+type,
                            data:form.serializeToObject(),
                            dataType:"text",
                            type:"post",
                            success:function (data) {
                                if (data){
                                    console.log(data)
                                    form.setFieldValue("rid",data);
                                    edtor.accept();
                                }
                            }
                        })
                    }

                }
            }
        }),
        store = new Store({
            url : 'index.php?m=admin&f=member&a=showRoles',
            autoLoad:true, //自动加载数据
        }),
        grid = new Grid.Grid({
            render:'#grid',
            columns : columns,
            width : 700,
            forceFit : true,
            tbar:{ //添加、删除
                items : [{
                    btnCls : 'button button-small',
                    text : '<i class="icon-plus"></i>添加',
                    listeners : {
                        'click' : addFunction
                    }
                },
                    {
                        btnCls : 'button button-small',
                        text : '<i class="icon-remove"></i>删除',
                        listeners : {
                            'click' : delFunction
                        }
                    }]
            },
            plugins : [editing,Grid.Plugins.CheckSelection],
            store : store
        });
    grid.render();

    //添加记录
    function addFunction(){
        var newData = {b : 0};
        editing.add(newData,'a'); //添加记录后，直接编辑
    }
    //删除选中的记录
    function delFunction(){
        var selections = grid.getSelection();
        var data = "";
        selections.map(function (a) {
            data += a.rid + ",";
        })
        data = "(" + data.slice(0,-1) + ")";
        $.ajax({
            url : 'index.php?m=admin&f=member&a=deleteRole',
            type:"post",
            data:{rids:data},
            success:function (e) {
                if (e == "del"){
                    store.remove(selections);
                }
            }
        })

    }
});