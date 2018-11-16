<?php
include ('../config/database.php');
include ('../class/system.class.php');
include ('../class/date.class.php');
$mysqli = connect();
$id = $_GET['id'];

$detailFnc = new System();
$result = $detailFnc->editUser($id);
?>
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> แก้ไขข้อมูลผู้ใช้งาน</h4>
</div>
<div class="modal-body">
    <div class="col-md-12">
        <div class="form-group">
            <form name="room" class="form-horizontal" method="post" action="page/query.php?option=editUser">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">ชื่อ-สกุล</label>
                    <div class="col-md-8">
                        <input name="user_name" type="text" class="form-control" value="<?=$result['user_name']?>" required pattern="[0-9a-zA-Z_.-@]*">
                        <input name="user_id" type="hidden" class="form-control" value="<?=$result['user_id']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Email</label>
                    <div class="col-md-8">
                        <input name="user_email" type="text" class="form-control" value="<?=$result['user_email']?>" required pattern="[0-9a-zA-Z_.-@]*">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Password</label>
                    <div class="col-md-8">
                        <input name="user_pass" type="text" class="form-control" value="<?=$result['user_pass']?>" required pattern="[0-9a-zA-Z_.-@]*">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">สิทธิ์ผู้ใช้งาน</label>
                    <div class="col-md-8">
                        <select name="user_permission" class="form-control">
                            <option value="admin" <?php if($result['user_permission']=='admin'){echo 'SELECTED';}?> >- ผู้ดูแลระบบ</option>
                            <option value="user" <?php if($result['user_permission']=='user'){echo 'SELECTED';}?> >- ผู้ใช้งานทั่วไป</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput"></label>
                    <div class="col-md-8">
                        <button class="btn btn-block btn-success" onclick="return confirm('ยืนยันการบันทึกรายการ ?')">บันทึกรายการ</button>
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