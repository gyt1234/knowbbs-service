<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

// 今日帖子详情页，使得浏览量+1

$contentId = $_GET['contentId'];

$query="update know_content set times=times+1 where id='$contentId'";
execute($link,$query);

?>