<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';

$link=connect();

// 根据帖子id修改帖子

$c = file_get_contents("php://input");
$publishForm = json_decode($c,true);
$contentId=$publishForm['contentId'];
$module_id=$publishForm['module_id'];
$title=$publishForm['title'];
$content=$publishForm['content'];

$query="update know_content set module_id='$module_id', title='$title', content='$content', create_time=now() where id='$contentId'";
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