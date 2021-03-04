<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

// 根据帖子id获取帖子信息

$contentId = $_GET['contentId'];

$query="select scm.id,ssm.id sonId,sum.id uid,ssm.module_name son_name,sfm.module_name father_name, scm.create_time, sum.name username, scm.times, scm.comments,scm.title, scm.content from know_son_module ssm,know_father_module sfm, know_content scm, know_user sum where scm.id='$contentId' and scm.module_id=ssm.id and scm.user_id=sum.id and ssm.father_module_id=sfm.id";

$results = execute($link,$query);

if(mysqli_num_rows($results)>0){
	$row=mysqli_fetch_assoc($results);
	$row['son_name'] = urlencode($row['son_name']);
	$row['father_name'] = urlencode($row['father_name']);
	$row['title'] = htmlspecialchars(urlencode($row['title']));
	$row['content'] = htmlspecialchars(urlencode($row['content']));
	$row['username'] = urlencode($row['username']);
}

echo urldecode(json_encode($row));

?>