<?php

//验证前台用户是否登录
// function is_login($link){
// 	if(isset($_COOKIE['sfk']['name']) && isset($_COOKIE['sfk']['pw'])){
// 		$query="select * from sfk_member where name='{$_COOKIE['sfk']['name']}' and sha1(pw)='{$_COOKIE['sfk']['pw']}'";
// 		$result=execute($link,$query);
// 		if(mysqli_num_rows($result)==1){
// 			$data=mysqli_fetch_assoc($result);
// 			return $data['id'];
// 		}else{
// 			return false;
// 		}
// 	}else{
// 		return false;
// 	}
// }
//判断当前登录的用户是否是发帖人，或者当前登录是否是后台管理员，是则可以对前台的帖子进行删除和修改
// function check_user($member_id,$content_member_id,$is_manage_login){
// 	if($member_id==$content_member_id || $is_manage_login){
// 		return true;
// 	}else{
// 		return false;
// 	}
// }
//验证后台管理员是否登录
function is_manage_login($link){
	if(isset($_SESSION['manage']['name']) && isset($_SESSION['manage']['pw'])){
		$query="select * from know_manage where name='{$_SESSION['manage']['name']}' and pw='{$_SESSION['manage']['pw']}'";
		$result=execute($link,$query);
		if(mysqli_num_rows($result)==1){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

?>