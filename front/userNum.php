<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';

// 根据用户id获取该用户发布的帖子总数

$link=connect();

$id = $_GET['id'];

$query="select count(*) from know_content scm, know_user sum where sum.id='$id' and scm.user_id=sum.id";
$count_all=num($link,$query);

$mes = array('count_all'=>$count_all);
echo urldecode(json_encode($mes));
?>