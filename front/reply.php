<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

// 帖子回复功能

$c = file_get_contents("php://input");
$replyForm = json_decode($c,true);
$content_id=$replyForm['content_id'];
$user_id=$replyForm['user_id'];
$content=$replyForm['content'];

$query="insert into know_reply(content_id, content,create_time,user_id) values('$content_id','$content',now(),$user_id)";
execute($link,$query);
if(mysqli_affected_rows($link)==1){
	$mes = array('message'=>urlencode('回复成功'),'code'=>200);
	echo urldecode(json_encode($mes));
	exit();
}else{
	$mes = array('message'=>urlencode('回复失败'),'code'=>500);
	echo urldecode(json_encode($mes));
	exit();
}
?>