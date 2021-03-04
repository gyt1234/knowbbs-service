<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';

// 热门文章

$link=connect();

$query="select ssm.id,sfm.id sonId, ssm.title, ssm.comments, ssm.times, ssm.create_time, sfm.module_name from know_content ssm, know_son_module sfm where ssm.module_id=sfm.id order by ssm.times desc limit 4";
$results = execute($link,$query);
$data = array();
if(mysqli_num_rows($results)>0){
	while($row=mysqli_fetch_assoc($results)){
		$row['module_name'] = urlencode($row['module_name']);
		array_push($data,$row);
	}
}
echo urldecode(json_encode($data));
?>