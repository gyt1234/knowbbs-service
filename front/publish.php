<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$c = file_get_contents("php://input");
$publishForm = json_decode($c,true);
$module_id=$publishForm['module_id'];
$title=$publishForm['title'];
$content=$publishForm['content'];
$user_id=$publishForm['user_id'];

$query="insert into know_content(title,content,create_time,module_id,user_id) values('$title','$content',now(),'$module_id',$user_id)";
execute($link,$query);
if(mysqli_affected_rows($link)==1){
	$mes = array('message'=>urlencode('发布成功'),'code'=>200);
	echo urldecode(json_encode($mes));
	exit();
}else{
	$mes = array('message'=>urlencode('发布失败'),'code'=>500);
	echo urldecode(json_encode($mes));
	exit();
}
?>