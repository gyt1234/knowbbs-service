<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$c = $_GET['name'];
$d = $_GET['id'];
if($c){
	// 根据名称查找管理员
	$query="select * from know_manage where name like '%$c%'";
	$results = execute($link,$query);
	$data = array();
	if(mysqli_num_rows($results)>0){
		while($row=mysqli_fetch_assoc($results)){
			$row['name'] = urlencode($row['name']);
			array_push($data,$row);
		}
	}
	echo urldecode(json_encode($data));
}

if($d){
	// 根据id查找管理员
	$query1="select * from know_manage where id='$d'";
	$results1 = execute($link,$query1);
	if(mysqli_num_rows($results1)>0){
		$row1=mysqli_fetch_assoc($results1);
		$row1['name'] = urlencode($row1['name']);
	}
	echo urldecode(json_encode($row1));
}

?>