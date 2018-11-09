<?php


require_once('../init.php');


// check duplicate username
if (isset($_POST['username'])) {
	$username = $obj->escape($_POST['username']);
  $is_there = $userO->checkUser($username);
  if ($is_there) {
     echo "1";
 }
}

// check duplicate mail
if (isset($_POST['email'])) {
    $email = $obj->escape($_POST['email']);
    $is_there = $userO->checkEmail($email);
    if ($is_there) {
        echo "1";
    }
}

// check user is admin or not for download database
if (isset($_POST['password'])) {
    $password           = $obj->escape($_POST['password']);
    $id                 = $_SESSION['user_id'];
    $created_at         = date("Y-m-d H:i:s");

    $user = $userO->find_by_id("users","id",$id);

    if ($user->password == md5($password)) {
        $log = "download Database.";
        $userO->create("logs",array("user_id"=>$id,"log"=>$log,"created_at"=>$created_at));
        $output = "1";
    }else{
        $output = "0";
    }
    echo $output ;

}

?>
