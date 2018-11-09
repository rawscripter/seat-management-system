<?php


require_once('../init.php');

if (isset($_POST['username'])) {
	$username 				= strtolower($obj->escape($_POST['username']));
	$email 					= $obj->escape($_POST['email']);
	$password 				= $obj->escape($_POST['password']);
	$role 					= $obj->escape($_POST['role']);
	$added_by 				= $_SESSION['user_id'];
	$created_at				= date("Y-m-d H:i:s");

	if($userO->checkUser($username)){
		echo "0";
	}elseif ($userO->checkEmail($email)) {
		echo "0";
	}else{
		$user = $userO->create("users",array("username"=>$username,"email"=>$email,"password"=>md5($password),"role"=>$role));
		if ($user > 0) {
			$log = "added new User";
			$userO->create("logs",array("user_id"=>$added_by,"log"=>$log,"created_at"=>$created_at));
			echo "1";
		}else{
			echo "0";
		}
	}
}


?>

