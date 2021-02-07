<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';

$link=connect();

$c = file_get_contents("php://input");
$editForm = json_decode($c,true);
$id=$editForm['id'];
$module_name=$editForm['module_name'];
$info = $editForm['info'];
$sort = $editForm['sort'];

$query="update know_father_module set module_name='$module_name', info='$info', sort=$sort, create_time=now() where id='$id'";
execute($link,$query);
if(mysqli_affected_rows($link)==1){
	$mes = array('message'=>urlencode('编辑成功'),'code'=>200);
	echo urldecode(json_encode($mes));
	exit();
}else{
	$mes = array('message'=>urlencode('编辑失败'),'code'=>500);
	echo urldecode(json_encode($mes));
	exit();
}
?>