<?php
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

include ('../config/database.php');
$mysqli = connect();
session_start();

$user = $_POST['txtuser'];
$pass = $_POST['txtpass'];

// Check Login
    $sql = "SELECT * FROM tbl_user
            WHERE user_email = '{$user}' AND user_pass = '{$pass}'";
    global $mysqli;
    $res = $mysqli->query($sql);
    $data = $res->fetch_assoc();
        if (isset($data['user_id'])){
            $_SESSION['user_id'] = $data['user_id'];
            header("Location: ../index.php");
        }else{
            echo "
           <script type='text/javascript'>
               alert('เข้าสู่ระบบล้มเหลว');
               window.location='../login.php';
           </script>";
        }
    ?>