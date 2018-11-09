<?php
require_once('../init.php');

if (isset($_POST['paid_date']) && !empty($_POST['paid_date'])) {
    if (isset($_POST['bill_id']) && !empty($_POST['bill_id'])) {
         $date = dateForDb($_POST['paid_date']);
         $bill_id   = $_POST['bill_id'];

        $output = $billO->update_bill_status($bill_id,$date);
        echo $output;
    }
}



?>
