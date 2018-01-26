<?php

$action = $_GET['action'];
switch($action){

 case 'init_data_list':
      init_data_list();
      break;
 case 'add_row':
      add_row();
      break;
 case 'del_row':
      del_row();
      break;
 case 'edit_row':
      edit_row();
      break;
}
//初始化数据
function init_data_list(){
	$sql="SELECT * FROM ajax_data";
	$query=query_sql($sql);
	//var_dump($query);
	while($row = $query->fetch_assoc()){
		$data[]=$row;
	}
	//数据装入json
	echo json_encode($data);
}
//添加数据
function add_row(){
	$sql="insert into ajax_data (c_a,c_b,c_c,c_d,c_e,c_f,c_g,c_h) values (";
	for($i=0;$i<8;$i++){
		$sql.='\''.$_POST['col_'.$i].'\',';
	}
	$sql=trim($sql,',');
	$sql.=')';
	if($res=query_sql($sql,"SELECT LAST_INSERT_ID() AS LD")){
		$d=$res->fetch_assoc();
		echo $d['LD'];
	}else{
		echo "添加失败";
	}
    //echo $sql;
	
}
//编辑数据
function edit_row(){
	$sql="UPDATE ajax_data SET ";
	$id=$_POST["id"];
	unset($_POST["id"]);//销毁变量，释放内存（因为会影响遍历）
	for($i=0;$i<8;$i++){
		//$sql.='c_'.chr(97+$i)."=".$_POST['col_'.$i].",";  
		//UPDATE ajax_data SET col_a=啊,col_b=不,col_c=从 ,col_d=的,col_e=额,col_f=分,col_g=个,col_h=出 WHERE id=2
		$sql.='c_'.chr(97+$i).'=\''.$_POST['col_'.$i].'\','; 
		//UPDATE ajax_data SET col_a='啊',col_b='不',col_c='从 ',col_d='的',col_e='额',col_f='分',col_g='个',col_h='他' WHERE id=2
		
	}
	$sql=trim($sql,',');
	$sql.=' WHERE id='.$id;
	
	if(query_sql($sql)){
		echo "ok";
	}else{
		echo "error";
	}
	
	//echo $sql;
}
//删除数据
function del_row(){
	//接收数据，并作相应处理
	$dataid=$_POST["dataid"];
	$sql="DELETE FROM ajax_data WHERE id=".$dataid;
	if(query_sql($sql)){
		echo "ok";
	}else{
		echo "error";
	}
	//echo $sql;
}

//封装连接数据库的代码
function query_sql(){
	//$mysqli=new mysqli("localhost","root","websoft9","blog");
	$mysqli=new mysqli("localhost","root","root","db");
	/*if(mysqli_connect_errno()){
    echo "连接数据库失败：".mysqli_connect_error();
    $mysqli=null;
    exit;
    }
    echo "连接数据库成功！<br/>";*/
	$sqls=func_get_args();//返回一个包含函数参数列表的数组
    foreach($sqls as $value){
		$query=$mysqli->query($value);
		
	}
	$mysqli->close();
	return $query;
}
?>