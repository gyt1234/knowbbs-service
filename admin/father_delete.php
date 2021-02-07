<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$id = $_GET['id'];
$query="select * from know_son_module where father_module_id='$id'";
$results = execute($link,$query);
if(mysqli_num_rows($results)){
	$mes = array('message'=>urlencode('该父版块下面存在子版块，请先将对应的子版块先删掉！'),'code'=>501);
	echo urldecode(json_encode($mes));
	exit();
}
$query="delete from know_father_module where id='$id'";
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