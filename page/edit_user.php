<?php
$usedFnc = new System();
$users = $usedFnc->getUser();
?>

<div class="container">
    <div class="row">
            <!-- Alert -->
            <?php
            $option = $_SESSION['option'];
            if ($option=='insertUser'){
                echo "
                    <div class='alert alert-success' role='alert'>
                        <strong>เพิ่มข้อมูลผู้ใช้งานสำเร็จ !</strong>
                    </div>";
            }
            if ($option=='editUser'){
                echo "
                    <div class='alert alert-info' role='alert'>
                        <strong>แก้ไขข้อมูลผู้ใช้งานสำเร็จ !</strong>
                    </div>";
            }
            unset($_SESSION['option']);
            ?>
            <!-- /Alert -->
        </div>

        <div class="col-lg-12">
            <h3><i class="fa fa-users"></i> จัดการผู้ใช้งาน</h3>
            <div class="pull-right">
                <button data-toggle="modal" data-target="#InsertUser" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> เพิ่มข้อมูลผู้ใช้งาน</button>
            </div>
            <table id="resTable" class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>ผู้ใช้งาน</th>
                        <th>email</th>
                        <th class="text-center">สิทธิ์ผู้ใช้งาน</th>
                        <th class="text-center" colspan="2"><i class="fa fa-gear"></i></th>
                    </tr>
                </thead>
                <?php
                $i=0;
                    foreach ($users as $user){
                        $i++;
                ?>
                <tr>
                    <td class="text-center"><?=$i;?></td>
                    <td><?=$user['user_name'];?></td>
                    <td><?=$user['user_email'];?></td>
                    <td class="text-center">
                        <?php if($user['user_permission']=='admin'){echo "<span style='color:red;'>ผู้ดูแลระบบ</span>";}else{echo "<span>ผู้ใช้งานทั่วไป</span>";} ?>
                    </td>
                    <td class="text-center" colspan="2">
                        <a href="#" data-toggle="modal" data-target="#editUser" data-id="<?=$user['user_id']?>" class="ajaxModal btn btn-xs btn-primary">แก้ไข</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<!-- Modal Insert -->
<div class="modal fade" id="InsertUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> เพิ่มข้อมูลผู้ใช้งาน</h4>
            </div>
            <div class="modal-body">
                <form name="room" class="form-horizontal" method="post" action="page/query.php?option=insertUser">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput">ชื่อ-สกุล</label>
                        <div class="col-md-8">
                            <input name="user_name" type="text" class="form-control" required pattern="[a-zA-Z0-9ก-๙_.- ]+">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput">Email</label>
                        <div class="col-md-8">
                            <input name="user_email" type="text" class="form-control" required pattern="[0-9a-zA-Z_.-@]*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput">Password</label>
                        <div class="col-md-8">
                            <input name="user_pass" type="password" class="form-control" required pattern="[0-9a-zA-Z_.-@]*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput">สิทธิ์ผู้ใช้งาน</label>
                        <div class="col-md-8">
                            <select name="user_permission" class="form-control" required>
                                <option value="">เลือกสิทธิ์ผู้ใช้งาน</option>
                                <option value="admin">- ผู้ดูแลระบบ</option>
                                <option value="user">- ผู้ใช้งานทั่วไป</option>
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
        </div>
    </div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div id="ajaxedit" class="modal-content">
        <!-- เรียกใช้งานผ่าน ajax -->
        </div>
    </div>
</div>

<script>
    $('.ajaxModal').click(function(){
        var id = $(this).attr('data-id');
            $.ajax({url:"page/user.php?id="+id,cache:false,success:function(result){
                $('#ajaxedit').html(result);
            }});
        });

    window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 3000);
</script>