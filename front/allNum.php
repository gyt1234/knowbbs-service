<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';

// 查找父板块下面的所有帖子数

$link=connect();

$sonId = $_GET['sonId'];

$query="select count(*) from know_content where module_id='$sonId'";
$count_all=num($link,$query);

$mes = array('count_all'=>$count_all);
echo urldecode(json_encode($mes));
?>