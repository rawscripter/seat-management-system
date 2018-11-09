<?php


require_once('../init.php');

if (isset($_POST['username'])) {
	$id 					= $obj->escape($_POST['id']);
	$username 				= strtolower($obj->escape($_POST['username']));
	$email 					= $obj->escape($_POST['email']);
	$newPassword 			= $obj->escape($_POST['newPassword']);
	$role 					= $obj->escape($_POST['role']);
	$added_by 				= $_SESSION['user_id'];
	$created_at				= date("Y-m-d H:i:s");


	$user = $userO->update("users","id",$id,array("username"=>$username,"email"=>$email,"role"=>$role,"updated_at"=>$created_at));

	if (!empty($newPassword)) {
		$userO->update("users","id",$id,array("password"=>md5($newPassword),"updated_at"=>$created_at));
	}

	if ($user > 0) {
		$log = "update User information.";
		$userO->create("logs",array("user_id"=>$added_by,"log"=>$log,"created_at"=>$created_at));
		echo "1";
	}else{
		echo "0";
	}

}


?>

