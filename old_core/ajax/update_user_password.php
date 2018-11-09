<?php


require_once('../init.php');

if (isset($_POST['old_password'])) {
	$old_password 		= $obj->escape($_POST['old_password']);
	$new_password 		= $obj->escape($_POST['new_password']);
	$id 				= $_SESSION['user_id'];
	$created_at			= date("Y-m-d H:i:s");

	$user = $userO->find_by_id("users","id",$id);

	if ($user->password == md5($old_password)) {
		$rslt = $userO->update("users","id",$id,array("password"=>md5($new_password),"updated_at"=>$created_at));
		if ($rslt > 0) {
			$log = "change his password.";
			$userO->create("logs",array("user_id"=>$id,"log"=>$log,"created_at"=>$created_at));
			$output = "1";
		}else{
			$output = "0";
		}
	}else{
		$output = "0";
	}

	echo $output ;
}


?>

