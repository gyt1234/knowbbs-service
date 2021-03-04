<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

// 根据父板块ID获取板块信息

$fatherId = $_GET['fatherId'];

$query="select ssm.id,ssm.module_name,sfm.module_name father_module_name from know_son_module ssm,know_father_module sfm where ssm.father_module_id=sfm.id and sfm.id='$fatherId'";
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
?>