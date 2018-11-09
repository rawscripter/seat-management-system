<?php require_once('../init.php');


if (isset($_POST['room_id'])) {
    $room_id = $_POST['room_id'];

    $room = $roomsO->find('room','id',$room_id);
    echo $room->total_seat;

}





?>
