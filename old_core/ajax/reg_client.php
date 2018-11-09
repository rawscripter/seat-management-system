<?php

require_once('../init.php');
if (isset($_POST['meter_no'])) {
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
	 $added_by 				= $_SESSION['user_id'];
	 $created_at			= date("Y-m-d H:i:s");

	 if ($clientO->checkMeter($meter_no)) {
	 	$output = "0";
	 }else{
		$sql = array("client_id"=>$clientO->newClientId(),"meter_id"=>$meter_no,"client_name"=>$client_name,"phone"=>$phone,"address"=>$address,"start_meter_reading"=>$start_meter_reading,"demand_charge"=>$demand_charge,"service_charge"=>$service_charge,"start_date"=>$start_date,"pf"=>$pf,"unit_price"=>$unit_price,"vat"=>$vat,"client_status"=>'active',"added_by"=>$added_by);

		$client = $clientO->create("clients",$sql);
		if ($client > 0) {
			$log = "added new Client";
			$sql = array("user_id"=>$added_by,"log"=>$log,"created_at"=>$created_at);
			$clientO->create("logs",$sql);
			$output = "1";
		}else{
			$output = "0";
		}
	}
	echo $output;
}
 ?>

