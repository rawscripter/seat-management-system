<?php


require_once('../init.php');

if (isset($_POST['email'])) {
	$email 				= $obj->escape($_POST['email']);
	$password 			= $obj->escape($_POST['password']);
	$id 				= $_SESSION['user_id'];
	$created_at			= date("Y-m-d H:i:s");

	$user = $userO->find_by_id("users","id",$id);

	if ($user->password == md5($password)) {
		$user = $userO->update("users","id",$id,array("email"=>$email,"updated_at"=>$created_at));
		if ($user > 0) {
			$log = "change his email.";
			$userO->create("logs",array("user_id"=>$id,"log"=>$log,"created_at"=>$created_at));
			$output = "1";
		}else{
			$output = "0";
		}
	}else{
		$output = "0";
	}
	echo $output;

}


?>

