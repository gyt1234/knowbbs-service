<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$query="select * from know_father_module";
$results = execute($link,$query);
$data = array();
if(mysqli_num_rows($results)>0){
	while($row=mysqli_fetch_assoc($results)){
		$row['module_name'] = urlencode($row['module_name']);
		$row['info'] = urlencode($row['info']);
		array_push($data,$row);
	}
}
echo urldecode(json_encode($data));
?>