<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if (!isset($_SESSION['user_id'])){
    header( "location: login.php" );
    exit(0);
}
include ('config/database.php');
$mysqli = connect();
$page = $_GET['page'];

// Include Class
include ('class/system.class.php');
include ('class/date.class.php');

// Get Data Employee
$getClass = new System();
$getEmp = $getClass->getEmp($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบจองห้องประชุม</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/fullcalendar.css" rel="stylesheet">
    <link href="asset/css/custom.css" rel="stylesheet">
    <link href="asset/css/jquery.timepicker.css" rel="stylesheet">
    <link href="asset/css/bootstrap-datepicker.standalone.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/jquery.timepicker.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/moment.min.js"></script>
    <script src="asset/js/fullcalendar.min.js"></script>
    <script src="asset/js/bootstrap-datepicker.js"></script>
    <script src="asset/js/datepair.js"></script>
    <!--  Responsive DataTable CSS  -->
    <link rel="stylesheet" href="asset/dataTable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="asset/dataTable/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="asset/dataTable/css/rowReorder.dataTables.min.css">
    <!--  Responsive DataTable  JS -->
    <script src="asset/dataTable/js/jquery.dataTables.min.js"></script>
    <script src="asset/dataTable/js/dataTables.rowReorder.min.js"></script>
    <script src="asset/dataTable/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function(){
            var table = $('#resTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            } );
            $('#example').DataTable();
        } );
    </script>
</head>
<body>
    <?php
    include ('element/header.php');
    if (!isset($page)){
        include ('page/calendar.php');
    }
    if ($page=='UserManager'){ include ('page/edit_user.php');}
    if ($page=='RoomManager'){ include ('page/edit_room.php');}
    if ($page=='ReportList') { include ('page/report.php');}
    include ('element/footer.php');
    ?>
</body>
</html>
