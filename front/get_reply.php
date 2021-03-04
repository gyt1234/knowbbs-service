<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

// 根据帖子id获取回帖信息

$contentId = $_GET['contentId'];

$query="select srm.id, srm.create_time, srm.content, sum.name uname, sum.id uid from know_content scm, know_user sum, know_reply srm where scm.id='$contentId' and scm.id=srm.content_id and scm.user_id=sum.id ";

$results = execute($link,$query);
$data = array();
if(mysqli_num_rows($results)>0){
	while($row=mysqli_fetch_assoc($results)){
		$row['content'] = htmlspecialchars(urlencode($row['content']));
		$row['uname'] = urlencode($row['uname']);
		array_push($data,$row);
	}
	
}
echo urldecode(json_encode($data));

?>