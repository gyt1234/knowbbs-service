<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';

$link=connect();

$c = file_get_contents("php://input");
$editForm = json_decode($c,true);
$id=$editForm['id'];
$name=$editForm['name'];
$pw=$editForm['pw'];
$level=$editForm['level'];

$query="update know_manage set name='$name', level=$level, pw='$pw', create_time=now() where id='$id'";
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