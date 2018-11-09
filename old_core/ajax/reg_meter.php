<?php


require_once('../init.php');

if (isset($_POST['meter_no'])) {

	$meter_no 				= $obj->escape($_POST['meter_no']);
	$added_by 				= $_SESSION['user_id'];
	$created_at				= date("Y-m-d H:i:s");

	$user = $userO->create("meter",array("meter_no"=>$meter_no,"created_at"=>$created_at));
	if ($user > 0) {
		$log = "added new Meter";
		$userO->create("logs",array("user_id"=>$added_by,"log"=>$log,"created_at"=>$created_at));
		echo "1";
	}else{
		echo "0";
	}
}


?>

