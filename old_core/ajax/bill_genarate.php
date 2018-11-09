<?php


require_once('../init.php');

if (isset($_POST['meter_no'])) {
	$meter_no             = $obj->escape($_POST['meter_no']);
    $month                = $obj->escape($_POST['month']);
    $year                 = $obj->escape($_POST['year']);
    $current_peak         = $obj->escape($_POST['current_peak']);
    $prev_peak            = $obj->escape($_POST['last_month_peak']);
    $peak_date            = dateForDb($obj->escape($_POST['present_peak_date']));
    $prev_date            = dateForDb($obj->escape($_POST['previous_peak_date']));
    $last_payment_date    = dateForDb($obj->escape($_POST['last_payment_date']));



if (!empty($meter_no) && !empty($month) && !empty($year) && !empty($current_peak) && !empty($peak_date) && !empty($prev_date) && !empty($last_payment_date) ) {

    $row = $clientO->bill_genarate($meter_no,$month,$year,$current_peak,$prev_peak,$peak_date,$prev_date,$last_payment_date);
        $output = $row;
}else{
    $output = 0;
}

echo $output;


}




?>
