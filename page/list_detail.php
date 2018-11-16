<?php
session_start();
include ('../config/database.php');
include ('../class/system.class.php');
include ('../class/date.class.php');
$mysqli = connect();
$id = $_GET['id'];

$detailFnc = new System();
$result = $detailFnc->listDetail($id);
?>
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-search"></i> รายละเอียดการใช้ห้องประชุม</h4>
</div>
<div class="modal-body">
    <div class="col-md-12">
        <h4>รหัสการจอง [ <?="STB:".$result['meet_id']?> ]</h4>
        <div class="form-group">
            <table class="table table-bordered">
                <tr>
                    <th class="text-center">เรื่อง / กิจกรรม</th>
                    <td><?=$result['meet_title']?></td>
                </tr>
                <tr>
                    <th class="text-center">ห้องประชุม</th>
                    <td><?=$result['room_name']?></td>
                </tr>
                <tr>
                    <th class="text-center">เวลาที่ใช้งาน</th>
                    <td><?=DBThaiShortDate($result['meet_start'])." เวลา ".TimeThai($result['meet_start'])." - ".TimeThai($result['meet_end']);?></td>
                </tr>
                <tr>
                    <th class="text-center">ผู้ทำรายการ</th>
                    <td><?=$result['user_name']?></td>
                </tr>
                <tr>
                    <th class="text-center">วันที่ทำรายการ</th>
                    <td><?=DateTimeThai($result['meet_create'])?></td>
                </tr>
            </table>
        </div>
        <div class="pull-right">
            <?php 
                if($result['user_id']==$_SESSION['user_id']){
                    echo "
                <a class=\"btn btn-danger\" onclick=\"return confirm('ยืนยันการยกเลิกรายการจองห้องประชุม STB:".$result['meet_id']." ?')\" href=\"page/query.php?option=cancel&id=".$result['meet_id']."\">ยกเลิกรายการ</a>";
                }
            ?>
            <a class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>
        </div>
    </div>
    <small style="color: gray;">** พบปัญหาการใช้งาน กรุณาแจ้งทีมอาคาร **</small>
</div>