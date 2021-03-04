<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();


// 回帖之后，使得帖子回复量+1

$contentId = $_GET['contentId'];

$query="update know_content set comments=comments+1 where id='$contentId'";
execute($link,$query);

?>