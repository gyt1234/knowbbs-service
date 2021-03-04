<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$c = file_get_contents("php://input");
$registerForm = json_decode($c,true);
$name=$registerForm['username'];
$pw=$registerForm['password'];
$query="select * from know_user where name='$name' and pw='$pw'";
$result=execute($link,$query);
if(mysqli_num_rows($result)==1){
	$mes = array('message'=>urlencode('注册失败，可直接登录'),'code'=>500);
	echo urldecode(json_encode($mes));
	exit();
}else{
	if(!$name || !$pw){
		exit();
	}else{
		$query1="insert into know_user(name,pw,create_time) values('$name','$pw',now())";
		execute($link,$query1);
		if(mysqli_affected_rows($link)==1){
			setcookie('know[name]',$name);
			setcookie('know[pw]',$pw);
			$mes = array('message'=>urlencode('注册成功'),'username'=>$name,'code'=>200);
			echo urldecode(json_encode($mes));
			exit();
		}
	}	
}
?>