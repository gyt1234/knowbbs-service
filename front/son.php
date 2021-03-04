<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

// 根据子板块id获取子版块和父板块信息

$sonId = $_GET['sonId'];

// $query="select * from know_son_module where id='$sonId'";

$query="select sfm.module_name father_name, ssm.module_name,ssm.info from know_father_module sfm, know_son_module ssm where ssm.id='$sonId' and ssm.father_module_id=sfm.id";

$results = execute($link,$query);

if(mysqli_num_rows($results)>0){
	$row=mysqli_fetch_assoc($results);
	$row['module_name'] = urlencode($row['module_name']);
	$row['father_name'] = urlencode($row['father_name']);
}

echo urldecode(json_encode($row));
?>