<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

// 根据子板块ID获取子板块下面所有帖子

$sonId = $_GET['sonId'];

$query="select scm.id,scm.title,scm.create_time,sum.name username,sum.id uid,scm.times,scm.comments from know_son_module ssm, know_content scm, know_user sum where ssm.id='$sonId' and scm.module_id=ssm.id and scm.user_id=sum.id";

// $query="select ssm.id, ssm.title, ssm.comments, ssm.times, ssm.create_time, sfm.module_name from know_content ssm, know_son_module sfm where ssm.module_id=sfm.id order by ssm.times desc limit 4";

$results = execute($link,$query);
$data = array();
if(mysqli_num_rows($results)>0){
	while($row=mysqli_fetch_assoc($results)){
		$row['title'] = urlencode($row['title']);
		$row['username'] = urlencode($row['username']);
		array_push($data,$row);
	}
}

echo urldecode(json_encode($data));
?>