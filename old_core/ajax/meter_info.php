<?php

require_once('../init.php');

if (isset($_POST['meter'])) {
	$meter = $obj->escape($_POST['meter']);
  $client_id =  client_id($meter);
  $result = array();

  if (!empty($client_id)) {
    $is_client_has_bill_record =  $clientO->has_client_bill_record($client_id);

    if ($is_client_has_bill_record) {
          // if he has THAN get the peak and date form bill table
      $max_bill_id  = $clientO->get_max_bill_id($client_id);
      $client_info       = $clientO->get_bill_info($max_bill_id);
      $result['previous_peak']      = $client_info->peak;
      $result['previous_peak_date'] = $client_info->peak_date;

    }else{
        //if he don't have

      $client = $obj->find_by_id("clients","client_id",$client_id);
      $result['previous_peak'] = $client->start_meter_reading;
      $result['previous_peak_date'] = $client->start_date;

    }

  }else{
    $result['err'] = "0";
  }
echo json_encode($result);
}



?>
