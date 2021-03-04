<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

// 根据关键词相关帖子

$keywords = $_GET['keywords'];

$query="select scm.title,scm.id,scm.times,scm.comments,scm.create_time,sum.name username,sum.id uid,sum.photo
		from know_content scm,know_user sum where scm.title like '%$keywords%' and scm.user_id=sum.id";

$results = execute($link,$query);

$data = array();
if(mysqli_num_rows($results)>0){
	while($row=mysqli_fetch_assoc($results)){
		$row['username'] = urlencode($row['username']);
		$row['title'] = urlencode($row['title']);
		array_push($data,$row);
	}
}

echo urldecode(json_encode($data));

?>