<?php
$usedFnc = new System();
$rooms = $usedFnc->getRoom();
?>

<div class="container">
    <div class="row">
            <!-- Alert -->
            <?php
            $option = $_SESSION['option'];
            if ($option=='insertRoom'){
                echo "
                    <div class='alert alert-success' role='alert'>
                        <strong>เพิ่มห้องประชุมสำเร็จ !</strong>
                    </div>";
            }
            if ($option=='editRoom'){
                echo "
                    <div class='alert alert-info' role='alert'>
                        <strong>แก้ไขห้องประชุมสำเร็จ !</strong>
                    </div>";
            }
            unset($_SESSION['option']);
            ?>
            <!-- /Alert -->
        </div>

        <div class="col-lg-12">
            <h3><i class="fa fa-building-o"></i> จัดการห้องประชุม</h3>
            <div class="pull-right">
                <button data-toggle="modal" data-target="#InsertRoom" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> เพิ่มห้องประชุม</button>
            </div>
            <table id="resTable" class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>ห้องประชุม</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-center" colspan="2"><i class="fa fa-gear"></i></th>
                    </tr>
                </thead>
                <?php
                $i=0;
                    foreach ($rooms as $room){
                        $i++;
                ?>
                <tr>
                    <td class="text-center"><?=$i;?></td>
                    <td><?=$room['room_name'];?></td>
                    <td class="text-center">
                        <?php if($room['room_status']=='active'){echo "<span style='color:green;'>พร้อมใช้งาน</span>";}else{echo "<span style='color:red;'>ไม่พร้อมใช้งาน</span>";} ?>
                    </td>
                    <td class="text-center" colspan="2">
                        <a href="#" data-toggle="modal" data-target="#editRoom" data-id="<?=$room['room_id']?>" class="ajaxModal btn btn-xs btn-primary">แก้ไข</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<!-- Modal Insert -->
<div class="modal fade" id="InsertRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar-check-o"></i> เพิ่มห้องประชุม</h4>
            </div>
            <div class="modal-body">
                <form name="room" class="form-horizontal" method="post" action="page/query.php?option=insertRoom">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput">ชื่อห้องประชุม</label>
                        <div class="col-md-8">
                            <input name="room_name" type="text" class="form-control" required pattern="[0-9a-zA-Z_.-@]*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput">สถานะห้องประชุม</label>
                        <div class="col-md-8">
                            <select name="room_status" class="form-control" required>
                                <option value="">เลือกสถานะห้องประชุม</option>
                                <option value="active">- พร้อมใช้งาน</option>
                                <option value="n/a">- ไม่พร้อมใช้งาน</option>
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

<!-- Modal Edit Room -->
<div class="modal fade" id="editRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div id="ajaxedit" class="modal-content">
        <!-- เรียกใช้งานผ่าน ajax -->
        </div>
    </div>
</div>

<script>
    $('.ajaxModal').click(function(){
        var id = $(this).attr('data-id');
            $.ajax({url:"page/room.php?id="+id,cache:false,success:function(result){
                $('#ajaxedit').html(result);
            }});
        });

    window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 3000);
</script>