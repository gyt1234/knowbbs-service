<?php 
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
include_once '../inc/tool_inc.php';
$link=connect();

$c = file_get_contents("php://input");
$addForm = json_decode($c,true);
$module_name=$addForm['module_name'];
$father_module_id = $addForm['father_module_id'];
$info=$addForm['info'];
$sort=$addForm['sort'];

$query="insert into know_son_module(module_name,father_module_id, info, create_time, sort) values('$module_name','$father_module_id', '$info',now(), $sort)";
execute($link,$query);
if(mysqli_affected_rows($link)==1){
	$mes = array('message'=>urlencode('新增成功'),'code'=>200);
	echo urldecode(json_encode($mes));
	exit();
}else{
	$mes = array('message'=>urlencode('新增失败'),'code'=>500);
	echo urldecode(json_encode($mes));
	exit();
}
?>