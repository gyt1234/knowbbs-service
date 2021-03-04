<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

// 计算含有关键词的帖子数

$keywords = $_GET['keywords'];

$query="select count(*) from know_content where title like '%$keywords%'";
$count_all=num($link,$query);


$mes = array('count_all'=>$count_all);
echo urldecode(json_encode($mes));

?>