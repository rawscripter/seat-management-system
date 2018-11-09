<?php require_once('../init.php');


if (isset($_POST['dept_name'])) {
    $dept_name = $_POST['dept_name'];

    $students = $roomsO->findWhere('student','dept',$dept_name);


    if ($students) {
            $result = ' <option value="">Select</option>';
        foreach ($students as $student) {
             $result .=  ' <option value="'.$student->id.'">'.$student->roll.'</option>';
        }

        echo $result ;
    }

}





?>
