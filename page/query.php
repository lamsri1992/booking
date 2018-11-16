<?php
session_start();
include ('../config/database.php');
$mysqli = connect();
$option = $_GET['option'];
$_SESSION['option'] = $option;

if ($option=='insert'){
    $meet_start =  $_POST['d_start']." ". $_POST['t_start'];
    $meet_end =  $_POST['d_end']." ". $_POST['t_end'];

// Insert Booking
    $sql = "INSERT INTO tbl_meet SET
            meet_title = '{$_POST['title']}',
            meet_room  = '{$_POST['room']}',
            meet_start = '{$meet_start}',
            meet_end   = '{$meet_end}',
            meet_maker = '{$_POST['maker']}',
            meet_color = '{$_POST['color']}'";
    global $mysqli;
    $mysqli->query($sql);
}

if ($option=='cancel'){
// Cancel Booking
    $sql = "UPDATE tbl_meet SET
            meet_status = 'cancel'
            WHERE meet_id = '{$_GET['id']}'";
    global $mysqli;
    $mysqli->query($sql);
}

if ($option=='insertRoom'){
    $sql = "INSERT INTO tbl_meetroom SET
            room_name   = '{$_POST['room_name']}',
            room_status = '{$_POST['room_status']}'";
    global $mysqli;
    $mysqli->query($sql);
    header("Location: ../index.php?page=RoomManager");
exit();
}

if ($option=='editRoom'){
    $sql = "UPDATE tbl_meetroom SET
            room_name = '{$_POST['room_name']}',
            room_status = '{$_POST['room_status']}'
            WHERE room_id = '{$_POST['room_id']}'";
    global $mysqli;
    $mysqli->query($sql);
    header("Location: ../index.php?page=RoomManager");
exit();
}

if ($option=='insertUser'){
// Insert User
    $sql = "INSERT INTO tbl_user SET
            user_email = '{$_POST['user_email']}',
            user_name = '{$_POST['user_name']}',
            user_pass = '{$_POST['user_pass']}',
            user_permission   = '{$_POST['user_permission']}'";
    global $mysqli;
    $mysqli->query($sql);
    header("Location: ../index.php?page=UserManager");
exit();
}

if ($option=='editUser'){
    $sql = "UPDATE tbl_user SET
            user_email = '{$_POST['user_email']}',
            user_name = '{$_POST['user_name']}',
            user_pass = '{$_POST['user_pass']}',
            user_permission   = '{$_POST['user_permission']}'
            WHERE user_id = '{$_POST['user_id']}'";
    global $mysqli;
    $mysqli->query($sql);
    header("Location: ../index.php?page=UserManager");
exit();
}

if ($option=='logoff'){
    unset($_SESSION['user_id']);
    header("Location: ../index.php");
exit();
}

header("Location: ../index.php");
exit();

?>