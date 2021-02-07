<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$id = $_GET['id'];
$query="delete from know_content where id='$id'";
execute($link,$query);
if(mysqli_affected_rows($link)==1){
	$mes = array('message'=>urlencode('删除成功'),'code'=>200);
	echo urldecode(json_encode($mes));
	exit();
}else{
	$mes = array('message'=>urlencode('删除失败'),'code'=>500);
	echo urldecode(json_encode($mes));
	exit();
}
?>