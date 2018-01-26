$(function(){
	
     var g_table=$("table.data");//获取前端表格，以便处理
	 var init_data_url="data.php?action=init_data_list";
	 
	       /**表格的行列数**/
     $.get(init_data_url,function(data){
	 var row_items = $.parseJSON(data);//通过php获取到数据库中的数据
	 for(var i=0,j=row_items.length;i<j;i++){
		 var data_dom = create_row(row_items[i]);//创建一个行，以及把数据库中的数据放进去
		 g_table.append(data_dom);
	 }
	
	});
	
	    /**把数据库里的数据放到前端中**/
		
	function create_row(data_item){
		var row_obj=$("<tr></tr>");
		for(var k in data_item){
			if("id"!=k){//表中的字段id
				var col_td=$("<td></td>");
				col_td.html(data_item[k]);
				row_obj.append(col_td);
			}
	}
	    /**添加操作按钮**/
		 
		//删除按钮
	    var delButton=$("<button style='background-Color:#c4e1ff;' >删除</button>");
		delButton.attr("dataid",data_item["id"]);
		delButton.click(delHandler);
		
		//编辑按钮
		var editButton=$("<button style='background-Color:#c4e1ff;' >修改</button>");
		editButton.attr("dataid",data_item["id"]);
	    editButton.click(editHandler);
		
	    var opt_td=$("<td></td>");
	   
		opt_td.append(delButton);
		opt_td.append(editButton);
		
	    row_obj.append(opt_td);
		return row_obj;
	}
	   /**删除行**/
	function delHandler(){
		
		var data_id=$(this).attr("dataid");//取一个数据的id.........这里的this就是我们的delButton
		var meButton=$(this);//取当前的按钮
		$.post("data.php?action=del_row",{dataid:data_id},function(res){
			
			if("ok"==res){
				$(meButton).parent().parent().remove();
				alert("删除成功");
			}else{
				alert("删除失败");
			}
		});
	}
	    /**编辑表格**/
		
	function editHandler(){
		var data_id=$(this).attr("dataid");//取一个数据的id（这里的this就是我们的delButton,所以获取到的是delButton的属性dataid,36行有设置)
		var meButton=$(this);//取当前的按钮
		//没有事件的
		var meRow=$(this).parent().parent();//获取当前编辑行 
		var editRow=$("<tr></tr>");//编辑行
		
		for(var i=0;i<8;i++){
			var editTd=$("<td><input type='text'style='width:100%;'/></td>");
			var v=meRow.find('td:eq('+i+')').html();
			editTd.find("input").val(v);
			editRow.append(editTd);
		}
		
		/**操作列**/
		var opt_td=$("<td width='150px'></td>");
		 /**保存按钮**/
		var saveBtn=$("<button style='background-Color:#c4e1ff;' >保存</button>");
		
		/**异步修改数据到数据库**/
		saveBtn.click(function(){
			var currentRow=$(this).parent().parent();
			var input_fields=currentRow.find("input");
			var post_fields={};
			for(var i=0,j=input_fields.length;i<j;i++){
				post_fields['col_'+i]=input_fields[i].value;//input_fields[i]是html的一个普通对象，
			}
			 post_fields["id"]=data_id;
			 $.post("data.php?action=edit_row",post_fields,function(res){
				if(res=="ok"){
					var newUpdateRow=create_row(post_fields);
					currentRow.replaceWith(newUpdateRow);
				}else{
					
				}
			
			});
		});
		
	    /**取消按钮**/
		var cancelBtn=$("<button style='background-Color:#c4e1ff;' >取消</button>");
		cancelBtn.click(function(){
			var currentRow=$(this).parent().parent();
			//重新绑定meRow事件
			meRow.find('a:eq(0)').click(delHandler);
			meRow.find('a:eq(1)').click(editHandler);
			
			currentRow.replaceWith(meRow);
		});
		opt_td.append(saveBtn);
		opt_td.append(cancelBtn);
		editRow.append(opt_td);
		meRow.replaceWith(editRow);//将meRow替换为editRow
		
		
	}
	
	

	
	     /**添加表格**/
	$("#addBtn").click(function(){
		var addRow=$("<tr></tr>");
		for(var i=0;i<8;i++){
			var col_td=$("<td ><input type='text'style='width:100%'/></td>");
			addRow.append(col_td);
		}
		var col_opt=$("<td></td>");
		
		/**确认添加按钮**/
		var confirmBtn=$("<button style='background-Color:#c4e1ff;' >确认</button></a>");
		
		confirmBtn.click(function(){
			
			var currentRow=$(this).parent().parent();//取得当前的tr标签
			var input_fields=currentRow.find("input");
			var post_fields={};//将输入的数据保存到post_fields数组里
			for(var i=0,j=input_fields.length;i<j;i++){
				post_fields['col_'+i]=input_fields[i].value;
		  }
		    
		    $.post("data.php?action=add_row",post_fields,function(res){
		/**将添加的数据显示到前台**/
				if(0<res){
					post_fields["id"]=res;
					var addRow=create_row(post_fields);
					currentRow.replaceWith(addRow);
				}else{
					alert("插入失败");
				}
			});
		});
		
		/**取消添加按钮**/
		var cancelBtn=$("<button style='background-Color:#c4e1ff;' >取消</button>");
		cancelBtn.click(function(){
			$(this).parent().parent().remove();//获取tr标签
		});
		col_opt.append(confirmBtn);
		col_opt.append(cancelBtn);
		
		addRow.append(col_opt);
		g_table.append(addRow);
		
		
	});
});