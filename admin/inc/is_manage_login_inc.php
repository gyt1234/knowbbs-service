<?php
include_once '../../inc/config_inc.php';
include_once '../../inc/mysql_inc.php';
include_once '../../inc/tool_inc.php';

$link=connect();

if(!is_manage_login($link)){
	$mes = array('message'=>urlencode('您还没有登录'),'code'=>500);
	echo urldecode(json_encode($mes));
	exit();
}else{
	$mes = array('message'=>urlencode('管理员已经登录'),'code'=>200);
	echo urldecode(json_encode($mes));
	exit();
}
// if(basename($_SERVER['SCRIPT_NAME'])=='manage_delete.php' || basename($_SERVER['SCRIPT_NAME'])=='manage_add.php'){
// 	if($_SESSION['manage']['level']!='0'){
// 		if(!isset($_SERVER['HTTP_REFERER'])){
// 			$_SERVER['HTTP_REFERER']='index.php';
// 		}
// 		skip($_SERVER['HTTP_REFERER'], 'error', '对不起，您权限不足!');exit();
// 	}
// }


?>