<?php
include ('../config/database.php');
include ('../class/system.class.php');
include ('../class/date.class.php');
$mysqli = connect();
$id = $_GET['id'];

$detailFnc = new System();
$result = $detailFnc->editRoom($id);
?>
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> แก้ไขห้องประชุม | ROOM_ID : <?=$result['room_id']?></h4>
</div>
<div class="modal-body">
    <div class="col-md-12">
        <div class="form-group">
            <form name="room" class="form-horizontal" method="post" action="page/query.php?option=editRoom">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput">ชื่อห้องประชุม</label>
                        <div class="col-md-8">
                            <input name="room_name" type="text" class="form-control" value="<?=$result['room_name']?>" required>
                            <input name="room_id" type="hidden" class="form-control" value="<?=$result['room_id']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput">สถานะห้องประชุม</label>
                        <div class="col-md-8">
                            <select name="room_status" class="form-control" required>
                            <?php if($result['room_status']=='n/a'){$sta="SELECTED";}else{$sta="";} ?>
                                <option value="active" <?=$sta?>>- พร้อมใช้งาน</option>
                                <option value="n/a" <?=$sta?>>- ไม่พร้อมใช้งาน</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput"></label>
                        <div class="col-md-8">
                            <button class="btn btn-block btn-success" onclick="return confirm('ยืนยันการบันทึกการเปลี่ยนแปลง ?')">บันทึกการแก้ไข</button>
                        </div>
                    </div>
            </form>
        </div>
        <div class="pull-right">
            <a class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>
        </div>
    </div>
    <small style="color: gray;">** พบปัญหาการใช้งาน กรุณาแจ้งทีมไอที **</small>
</div>