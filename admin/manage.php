<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$query="select * from know_manage";
$results = execute($link,$query);
$data = array();
if(mysqli_num_rows($results)>0){
	while($row=mysqli_fetch_assoc($results)){
		$row['name'] = urlencode($row['name']);
		array_push($data,$row);
	}
}
echo urldecode(json_encode($data));
?>