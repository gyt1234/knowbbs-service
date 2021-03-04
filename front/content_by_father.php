<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

// 根据父板块ID获取父板块下面所有帖子

$fatherId = $_GET['fatherId'];

$query="select scm.id,ssm.id sonId,scm.title,scm.create_time,sum.name username,sum.id uid,scm.times,scm.comments,ssm.module_name from know_son_module ssm,know_father_module sfm, know_content scm, know_user sum where scm.user_id=sum.id and ssm.father_module_id=sfm.id and scm.module_id=ssm.id and sfm.id='$fatherId'";
$results = execute($link,$query);
$data = array();
if(mysqli_num_rows($results)>0){
	while($row=mysqli_fetch_assoc($results)){
		$row['module_name'] = urlencode($row['module_name']);
		$row['title'] = urlencode($row['title']);
		$row['username'] = urlencode($row['username']);
		array_push($data,$row);
	}
}

echo urldecode(json_encode($data));
?>