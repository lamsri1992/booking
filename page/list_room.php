<?php
include ('../config/database.php');
include ('../class/system.class.php');

$mysqli = connect();
$recall = new System();

// Convert Date&Time
    $meet_start = $_POST['d_start']." ".$_POST['t_start'];
    $meet_end = $_POST['d_end']." ".$_POST['t_end'];

    $x = $recall->listRoom($meet_start,$meet_end);
if ($x>0){
    echo "<option value=''>กรุณาเลือกห้องประชุม</option>";
    foreach ($x AS $y){
            echo "<option value='".$y['room_id']."'>".$y['room_name']."</option>";
        }
    }else{
        echo "<option value=''>ไม่มีห้องว่างประชุมในช่วงเวลานี้</option>";
    }
?>