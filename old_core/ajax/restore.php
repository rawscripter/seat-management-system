<?php
require_once('../init.php');

// restore deleted client data
if (isset($_POST['action']) && $_POST['action'] == 'restore') {
    if (isset($_POST['type']) && $_POST['type'] == 'client') {
        $id             =  trim($_POST['client_id']);
        $clientO->restoreClient($id);
    }
}

?>
