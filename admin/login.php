<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$c = file_get_contents("php://input");
$loginForm = json_decode($c,true);
$name=$loginForm['username'];
$pw=$loginForm['password'];
$query="select * from know_manage where name='$name' and pw='$pw'";
$result=execute($link,$query);
if(mysqli_num_rows($result)==1){
	$data=mysqli_fetch_assoc($result);
	$_SESSION['manage']['name']=$data['name'];
	$_SESSION['manage']['pw']=$data['pw'];
	$_SESSION['manage']['id']=$data['id'];
	$_SESSION['manage']['level']=$data['level'];
	$mes = array('message'=>urlencode('登录成功'),'username'=>$data['name'],'create_time'=>$data['create_time'], 'level'=>$data['level'],'code'=>200);
	echo urldecode(json_encode($mes));
	exit();
}else{
  	$mes = array('message'=>urlencode('登录失败'),'code'=>500);
	echo json_encode($mes);
	exit();
}
?>