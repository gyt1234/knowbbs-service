<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
include_once '../inc/upload_inc.php';
$link=connect();

// 根据用户id修改用户头像

$id=$_POST['id'];
$photo = $_FILES["uImg"]; 

$extName = explode(".",$photo["name"]);//??????
// $fileExtName = $extName[count($extName)-1]; //获取扩展名
$fileName = "../assets/".$photo["name"]; //重命名  15756987.jpg  //图片存储位置
move_uploaded_file($photo["tmp_name"], $fileName);

// $save_path='uploads'.date('/Y/m/d/');//写上服务器上文件系统的路径，而不是url地址
// $upload=upload($save_path,'10M','photo');
// if($upload['return']){
	$query="update know_user set photo='$fileName' where id='$id'";
	execute($link, $query);
	if(mysqli_affected_rows($link)==1){
   		$arr = array("msg"=>urlencode("更新头像成功"),"code"=>200);
    	echo urldecode(json_encode($arr));
	}else{
    	$arr = array("msg"=>urlencode("更新头像失败"),"code"=>500);
    	echo urldecode(json_encode($arr));
	}
// }

?>