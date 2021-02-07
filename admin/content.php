<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$query="select ssm.id, ssm.title, ssm.comments, ssm.times, ssm.create_time, sfm.module_name, user.name user_name from know_content ssm, know_son_module sfm, know_user user where ssm.module_id=sfm.id and ssm.user_id=user.id order by ssm.id";

$results = execute($link,$query);
$data = array();
if(mysqli_num_rows($results)>0){
	while($row=mysqli_fetch_assoc($results)){
		$row['module_name'] = urlencode($row['module_name']);
		$row['title'] = urlencode($row['title']);
		$row['user_name'] = urlencode($row['user_name']);
		array_push($data,$row);
	}
}
echo urldecode(json_encode($data));
?>