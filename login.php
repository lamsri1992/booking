<?php
error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>BOOKING | กรุณาเข้าสู่ระบบ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="login/css/util.css">
    <link rel="stylesheet" type="text/css" href="login/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form name="frmLogin" action="config/check_login.php" class="login100-form validate-form" method="post">
                <span class="login100-form-title p-b-34 p-t-27"><i class="fa fa-calendar"></i> ระบบจองห้องประชุม</span>

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="txtuser" placeholder="ชื่อผู้ใช้งาน" pattern="[0-9a-zA-Z_.-@]*">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="txtpass" placeholder="รหัสผ่าน" pattern="[0-9a-zA-Z_.-@]*">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="text-center">
                    <span id="mySpan"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        เข้าสู่ระบบ
                    </button>
                </div>

            </form>
            <br>
            <div class="text-center">
                <span style="font-size: 12px">
                    ระบบสามารถใช้งานได้บนโปรแกรม <i class="fa fa-chrome"></i> Google Chrome เท่านั้น
                </span>
            </div>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="login/vendor/animsition/js/animsition.min.js"></script>
<script src="login/vendor/bootstrap/js/popper.js"></script>
<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="login/vendor/select2/select2.min.js"></script>
<script src="login/vendor/daterangepicker/moment.min.js"></script>
<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<script src="login/vendor/countdowntime/countdowntime.js"></script>
<script src="login/js/main.js"></script>
</body>
</html>