<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

// 根据用户id获取用户信息

$user_id = $_GET['user_id'];

$query="select * from know_user where id='$user_id'";

$results = execute($link,$query);

if(mysqli_num_rows($results)>0){
	$row=mysqli_fetch_assoc($results);
	$row['name'] = urlencode($row['name']);
}

echo urldecode(json_encode($row));

?>