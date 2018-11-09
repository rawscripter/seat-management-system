<?php
require_once('../init.php');

// temprary delete client data
if (isset($_POST['action']) && $_POST['action'] == 'temp') {
    if (isset($_POST['type']) && $_POST['type'] == 'client') {
        $id             =  trim($_POST['client_id']);
        $clientO->deleteClient($id);
        $log = "delete a Client";
        $sql = array("user_id"=>$_SESSION['user_id'],"log"=>$log,"created_at"=>$created_at);
        $clientO->create("logs",$sql);
    }
}


//permanetly delete client data
if (isset($_POST['action']) && $_POST['action'] == 'permanent') {
    if (isset($_POST['type']) && $_POST['type'] == 'client') {
        $id             =  trim($_POST['client_id']);
        $clientO->delete("clients",array("id" => $id));

        $log = "delete a Client";
        $sql = array("user_id"=>$_SESSION['user_id'],"log"=>$log,"created_at"=>$created_at);
        $clientO->create("logs",$sql);


    }
}



?>
