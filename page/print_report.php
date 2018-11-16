<?php
include ('../config/database.php');
include ('../class/date.class.php');
$mysqli = connect();

$arr_where = array();
    foreach($_POST['check_room'] as $check){ 
        $arr_where[] = " tbl_meetroom.room_id='$check'";
    }
    $condition = implode(" OR", $arr_where);

    $sql = "SELECT * FROM tbl_meetroom 
            LEFT JOIN tbl_meet ON tbl_meet.meet_room = tbl_meetroom.room_id
            LEFT JOIN tbl_user ON tbl_user.user_id = tbl_meet.meet_maker
            WHERE (tbl_meet.meet_start >= '{$_POST['d_start']}' AND tbl_meet.meet_start <= '{$_POST['d_end']}')
            AND (".$condition.")";
    global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()){
            $obj[] = $data;
        }

$strExcelFileName = "Meeting_Report_".$_POST['d_start']."_".$_POST['d_start'].".xls";
header("Content-Type: application/x-msexcel; name='$strExcelFileName'");
header("Content-Disposition: inline; filename='$strExcelFileName'");
header("Pragma:no-cache");
?>
<!DOCTYPE html>
<html xmlns:x="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Meeting Report</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
</head>
<body>
<div align="center">
    <strong style="font-size: 20px;">รายงานการใช้บริการห้องประชุม <?=DBThaiShortDate($_POST['d_start'])." - ".DBThaiShortDate($_POST['d_end'])?></strong><br>
</div>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
    <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
        <tr>
            <td height="30" align="center" valign="middle" ><strong>#</strong></td>
            <td height="30" align="" valign="middle" ><strong>วันที่ใช้งาน</strong></td>
            <td height="30" align="" valign="middle" ><strong>ห้องประชุม</strong></td>
            <td height="30" align="" valign="middle" ><strong>พนักงาน</strong></td>
            <td height="30" align="" valign="middle" ><strong>วันที่ทำรายการ</strong></td>
        </tr>
        <?php
            $i=0;
            foreach ($obj as $res){
            $i++;
        ?>
        <tr>
            <td height="30" align="center" valign="middle" ><?=$i;?></td>
            <td height="30" align="" valign="middle" ><?=DBThaiShortDate($res['meet_start'])." เวลา ".TimeThai($res['meet_start'])." - ".TimeThai($res['meet_end']);?></td>
            <td height="30" align="" valign="middle" ><?=$res['room_name'];?></td>
            <td height="30" align="" valign="middle" ><?=$res['user_name']?></td>
            <td height="30" align="" valign="middle" ><?=DateTimeThai($res['meet_create'])?></td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
