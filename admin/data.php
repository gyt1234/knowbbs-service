<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
$link=connect();

$query="select count(*) from know_father_module";
$count_father=num($link,$query);

$query="select count(*) from know_son_module";
$count_son=num($link,$query);

$query="select count(*) from know_content";
$count_content=num($link,$query);

$query="select count(*) from know_user";
$count_user=num($link,$query);

$query="select count(*) from know_manage";
$count_manage=num($link,$query);

// 服务器操作系统
$a = PHP_OS;
// 服务器软件
$b = $_SERVER['SERVER_SOFTWARE'];
// Mysql版本
$c = mysqli_get_server_info($link);
// 最大上传文件
$d = ini_get('upload_max_filesize');
// 内存限制
$e = ini_get('memory_limit');
// 程序安装位置(绝对路径)
$f = SA_PATH;
// 程序在Web根目录下的位置(首页的url地址)
$g = SUB_URL;

$mes = array('count_father'=>$count_father, 'count_son'=>$count_son, 'count_content'=>$count_content, 'count_user'=>$count_user, 'count_manage'=>$count_manage, 'os'=>$a, 'server'=>$b, 'mysql'=>$c, 'file'=>$d, 'memory'=>$e, 'path'=>$f, 'url'=>$g);
echo json_encode($mes);
exit();
?>