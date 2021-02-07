<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$query="select ssm.id,ssm.sort,ssm.module_name,ssm.create_time, ssm.info,sfm.module_name father_module_name from know_son_module ssm,know_father_module sfm where ssm.father_module_id=sfm.id order by sfm.id";
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