<?php

require_once('app/init.php');

if (isset($_GET['query']) && $_GET['query'] == 'delete') {

    if (isset($_GET['action']) && $_GET['action'] == 'meter') {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $userO->confirm_delete("meter","meter_id",$_GET['id']);
             $log = "delete a Meter";
            $sql = array("user_id"=>$_SESSION['user_id'],"log"=>$log,"created_at"=>$created_at);
            $clientO->create("logs",$sql);
            redirect('report.php?report=all_meters_info');
        }
    }
}

if (isset($_GET['query']) && $_GET['query'] == 'delete') {

    if (isset($_GET['action']) && $_GET['action'] == 'user') {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $userO->confirm_delete("meter","meter_id",$_GET['id']);
             $log = "delete a User";
            $sql = array("user_id"=>$_SESSION['user_id'],"log"=>$log,"created_at"=>$created_at);
            $clientO->create("logs",$sql);
            redirect('report.php?report=all_user_info');
        }
    }
}


 ?>
