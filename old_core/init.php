<?php

require_once('config/config.php');


// including the classes
require_once 'Database/connection.php';
require_once 'classes/Object.php';
require_once 'classes/User.php';
require_once 'classes/Student.php';
require_once 'classes/Subject.php';
require_once 'classes/Room.php';
require_once 'classes/Data_plan.php';


//include the function
require_once 'function.php';



// makeing global objects
global $pdo;
session_start();
$obj = new Objects($pdo);
$userO = new User($pdo);
$roomsO = new Rooms($pdo);
$studentO = new Students($pdo);
$subjectO = new Subjects($pdo);
$dataO = new Data_plan($pdo);



?>
