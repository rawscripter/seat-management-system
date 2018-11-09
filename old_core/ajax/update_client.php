<?php


require_once('../init.php');

if (isset($_POST['meter_no'])) {
	$client_id 			= $obj->escape($_POST['client_id']);
	$meter_no 				= $obj->escape($_POST['meter_no']);
	$client_name 			= $obj->escape($_POST['client_name']);
	$phone 				= $obj->escape($_POST['phone']);
	$address 				= $obj->escape($_POST['address']);
	$start_meter_reading 	= $obj->escape($_POST['start_meter_reading']);
	$demand_charge 		= $obj->escape($_POST['demand_charge']);
	$service_charge 		= $obj->escape($_POST['service_charge']);
	$start_date			= dateForDb($obj->escape($_POST['start_date']));
	$pf 					= $obj->escape($_POST['pf']);
	$unit_price 		 	= $obj->escape($_POST['unit_price']);
	$vat 		 			= $obj->escape($_POST['vat']);
	$status 		 			= $obj->escape($_POST['status']);

	$added_by 				= $_SESSION['user_id'];
	$created_at			= date("Y-m-d H:i:s");

	$sql = array("meter_id"=>$meter_no,"client_name"=>$client_name,"phone"=>$phone,"address"=>$address,"start_meter_reading"=>$start_meter_reading,"demand_charge"=>$demand_charge,"service_charge"=>$service_charge,"start_date"=>$start_date,"pf"=>$pf,"unit_price"=>$unit_price,"vat"=>$vat,"client_status"=>$status,"added_by"=>$added_by,"updated_at"=>$created_at);
	$client = $clientO->update("clients","id",(int)$client_id,$sql);
	if ($client > 0) {
		$log = "updated Client information";
		$sql = array("user_id"=>$added_by,"log"=>$log,"created_at"=>$created_at);
		$clientO->create("logs",$sql);
		$output = "1";
	}else{
		$output = "0";
	}

	echo $output;
}


?>

