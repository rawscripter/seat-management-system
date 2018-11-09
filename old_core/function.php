<?php

function redirect($path){
	header("location: " . SITE_ROOT . $path);
}

// converting date to  year - month - date format
function dateForDb($date){
	return date("Y-m-d", strtotime($date));
}


// converting date to day - month - year format
function dateForUser($date){
	return date("d-m-Y", strtotime($date));
}

// get meter no by meter ID
function meter_no($meter_id){
    global $obj;
    $meter = $obj->find_by_id("meter","meter_id",$meter_id);
    return $meter->meter_no;
}

function meter_id($meter_no){
    global $obj;
    $meter = $obj->find_by_id("meter","meter_no",$meter_no);
    return $meter->meter_id;
}


// get client id by meter id
function client_id($meter_id){
    global $obj;
    $client = $obj->find_by_id("clients","meter_id",$meter_id);
    if (!empty($client)) {
        return $client->client_id;
    }
}






?>
