<?php 
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
include_once '../inc/tool_inc.php';
$link=connect();

$c = file_get_contents("php://input");
$addForm = json_decode($c,true);
$name=$addForm['username'];
$pw=$addForm['password'];
$level=$addForm['level'];

$query="insert into know_manage(name, pw, create_time, level) values('$name', '$pw',now(), $level)";
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