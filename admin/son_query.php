<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$c = $_GET['module_name'];
$d = $_GET['id'];
if($c){
	// 根据名称查找子板块
	$query="select ssm.id,ssm.sort,ssm.module_name,ssm.create_time, ssm.info,sfm.module_name father_module_name from know_son_module ssm,know_father_module sfm where ssm.father_module_id=sfm.id and ssm.module_name like '%$c%' order by sfm.id";
	$results = execute($link,$query);
	$data = array();
	if(mysqli_num_rows($results)>0){
		while($row=mysqli_fetch_assoc($results)){
			$row['module_name'] = urlencode($row['module_name']);
			$row['father_module_name'] = urlencode($row['father_module_name']);
			array_push($data,$row);
		}
	}
	echo urldecode(json_encode($data));
}

if($d){
	// 根据id查找子板块
	$query1="select ssm.id,ssm.sort,ssm.module_name,ssm.create_time,ssm.father_module_id, ssm.info,sfm.module_name father_module_name from know_son_module ssm,know_father_module sfm where ssm.father_module_id=sfm.id and ssm.id=$d order by sfm.id";
	$results1 = execute($link,$query1);
	if(mysqli_num_rows($results1)>0){
		$row1=mysqli_fetch_assoc($results1);
		$row1['module_name'] = urlencode($row1['module_name']);
		$row1['father_module_name'] = urlencode($row1['father_module_name']);
	}
	echo urldecode(json_encode($row1));
}

?>