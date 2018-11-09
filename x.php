<?php
include('app/init.php');

if ($_POST) {
    $room                   = $_POST['room_no'];
    $selectedDeprtment_1    = $_POST['selectedDeprtment_1'];
    $rollFrom_1             = $_POST['rollFrom_1'];
    $rollTo_1               = $_POST['rollTo_1'];
    $selectedDeprtment_2    = $_POST['selectedDeprtment_2'];
    $rollFrom_2             = $_POST['rollFrom_2'];
    $rollTo_2               = $_POST['rollTo_2'];

// getting
    $cmt = $studentO->totalSeletedStudent($selectedDeprtment_1,$rollFrom_1,$rollTo_1);
    $tct = $studentO->totalSeletedStudent($selectedDeprtment_2,$rollFrom_2,$rollTo_2);

// total room capacity
    $room = $roomsO->find('room','id',$room);

    $colum_per_room = 5;
    $total_seat_in_room = $room->total_seat;;

    $total_row_in_room = $total_seat_in_room / $colum_per_room;

    $i = 0;
    $k = 0;



    for ($j=0; $j < $total_row_in_room; $j++) {

        if ($j % 2 == 0) {


            $student_1 = $cmt[$j]->dept    .'/'. $cmt[$i]->roll .'/'. $cmt[$i]->shift;
            $student_2 = $tct[$k]->dept    .'/'. $tct[$k]->roll .'/'. $tct[$k]->shift;
            $student_3 = $cmt[$i+1]->dept  .'/'. $cmt[$i+1]->roll .'/'. $cmt[$i+1]->shift;
            $student_4 = $tct[$k+1]->dept  .'/'. $tct[$k+1]->roll .'/'. $tct[$k+1]->shift;
            $student_5 = $cmt[$i+2]->dept  .'/'. $cmt[$i+2]->roll .'/'. $cmt[$i+2]->shift;

            $seat = $studentO->create('rmn_cmt130',array('first_row'=>$student_1,'second_row'=>$student_2,'third_row'=>$student_3,'fourth_row'=>$student_4,'five_row'=>$student_5,));

            $i = $i+2;
            $k = $k+1;


        }else{

            $student_1 =  $tct[$j]->dept  .'/'.  $tct[$k+1]->roll .'/'.  $tct[$k+1]->shift;
            $student_2 =  $cmt[$j]->dept  .'/'.  $cmt[$i+1]->roll .'/'.  $cmt[$i+1]->shift;
            $student_3 =  $tct[$j]->dept  .'/'.  $tct[$k+2]->roll .'/'.  $tct[$k+2]->shift;
            $student_4 =  $cmt[$j]->dept  .'/'.  $cmt[$i+2]->roll  .'/'.  $cmt[$i+2]->shift;
            $student_5 =  $tct[$j]->dept  .'/'.  $tct[$k+3]->roll .'/'.  $tct[$k+3]->shift;

            $seat = $studentO->create('rmn_cmt130',array('first_row'=>$student_1,'second_row'=>$student_2,'third_row'=>$student_3,'fourth_row'=>$student_4,'five_row'=>$student_5,));


            $i = $i+3;
            $k = $k+4;
        }

    }


    header("location: index.php?page=room&room_no=rmn_cmt130");



}


?>
