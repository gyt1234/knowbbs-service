<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';

$link=connect();

// 根据用户id修改密码

$c = file_get_contents("php://input");
$form = json_decode($c,true);
$id=$form['user_id'];
$newPass=$form['newPass'];

$query="update know_user set pw='$newPass' where id='$id'";
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