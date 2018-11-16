<?php
include ('../config/database.php');
include ('../class/system.class.php');
include ('../class/date.class.php');
$mysqli = connect();
$id = $_GET['id'];

$detailFnc = new System();
$result = $detailFnc->listHistory($id);
?>
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-history"></i> ประวัติการใช้งานห้องประชุม</h4>
</div>
<div class="modal-body">
    <div class="col-md-12">
        <div class="form-group">
            <table class="table table-sm table-hover">
                <tr>
                    <th>#</th>
                    <th>วันที่</th>
                    <th>ห้องประชุม</th>
                    <th>รายละเอียด</th>
                    <th>สถานะ</th>
                </tr>
                <?php
                    $i=0;
                    foreach($result as $res){
                        $i++;
                ?>
                <tr>
                    <td class="text-center"><?=$i;?></td>
                    <td><?=DBThaiShortDate($res['meet_start'])." เวลา ".TimeThai($res['meet_start'])." - ".TimeThai($res['meet_end']);?></td>
                    <td><?=$res['room_name']?></td>
                    <td><?=$res['meet_title']?></td>
                    <td>
                        <?php
                        if ($res['meet_status']=='active'){
                            echo "<span style='color: green'>ใช้งาน</span>";
                        }else{
                            echo "<span style='color: red'>ยกเลิก</span>";
                        }
                        ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="pull-right">
            <a class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>
        </div>
    </div>
    <small style="color: gray;">** พบปัญหาการใช้งาน กรุณาแจ้งทีมไอที **</small>
</div>