<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';

// 子板块下面今日发帖数

$link=connect();

$sonId = $_GET['sonId'];
$query="select count(*) from know_content where module_id='$sonId' and create_time > CURDATE()";
$count_today=num($link,$query);

$mes = array('count_today'=>$count_today);
echo urldecode(json_encode($mes));
?>