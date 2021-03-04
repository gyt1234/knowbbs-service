<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$c = file_get_contents("php://input");
$loginForm = json_decode($c,true);
$name=$loginForm['username'];
$pw=$loginForm['password'];
$expire=$loginForm['expire'];
$query="select * from know_user where name='$name' and pw='$pw'";
$result=execute($link,$query);
$data=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==1){
	setcookie('know[name]',$name,time()+$expire);
	setcookie('know[pw]',$pw,time()+$expire);
	/*设置登录的会员对于last_time这个字段为now()*/
	$query="update know_user set last_time=now() where name='$name' ";
	execute($link,$query);
	$mes = array('message'=>urlencode('登录成功'),'username'=>$name, 'uid'=>$data['id'], 'pw'=>$data['pw'],'code'=>200);
	echo urldecode(json_encode($mes));
	exit();
}else{
	$mes = array('message'=>urlencode('登录失败，请先注册'),'code'=>500);
	echo urldecode(json_encode($mes));
	exit();
}
?>