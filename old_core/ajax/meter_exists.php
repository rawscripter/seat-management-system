<?php 


require_once('../init.php');



if (isset($_POST['meter'])) {
	$meter = $obj->escape($_POST['meter']);
 	$is_there = $clientO->checkMeter($meter);

 	if ($is_there) {
 		echo "1";
 	}
}


 ?>