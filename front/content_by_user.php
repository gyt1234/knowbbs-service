<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

// 根据用户id获取该用户发布的所有帖子

$user_id = $_GET['user_id'];

$query="select scm.id,scm.title,scm.create_time,sum.name username,scm.times,scm.comments from know_content scm, know_user sum where sum.id='$user_id' and scm.user_id=sum.id";
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