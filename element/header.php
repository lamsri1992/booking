<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" style="color: white;">Meetingroom Booking</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$getEmp['user_name']?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php"><i class="fa fa-home"></i> หน้าหลัก</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#Booking"><i class="fa fa-calendar-check-o"></i> จองห้องประชุม</a></li>
                        <li><a href="#" class="ajaxModal" data-toggle="modal" data-target="#History" data-id="<?=$getEmp['user_id']?>"><i class="fa fa-history"></i> ประวัติการใช้งานห้องประชุม</a>
                        <li><a href="page/query.php?option=logoff" onclick="return confirm('ยืนยันการออกจากระบบ ?')"><i class="fa fa-power-off"></i> ออกจากระบบ</a></li>
                    </ul>
                </li>
                <?php
                    if ($getEmp['user_permission']=='admin'){
                        echo "
                        <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><i class='fa fa-gear'></i> เมนูผู้ดูแลระบบ <span class='caret'></span></a>
                                <ul class='dropdown-menu'>
                                <li><a href='index.php?page=RoomManager'><i class='fa fa-building-o'></i> จัดการห้องประชุม</a></li>
                                <li><a href='index.php?page=UserManager'><i class='fa fa-users'></i> จัดการผู้ใช้งาน</a></li>
                                <li><a href='index.php?page=ReportList'><i class='fa fa-file-text-o'></i> รายงานการใช้ห้องประชุม</a></li>
                            </ul>
                        </li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal Insert -->
<div class="modal fade" id="Booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar-check-o"></i> เพิ่มรายการจองห้องประชุม</h4>
            </div>
            <div class="modal-body">
                <form name="booking" class="form-horizontal" method="post" action="page/query.php?option=insert">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput">หัวข้อ</label>
                        <div class="col-md-8">
                            <input name="title" type="text" class="form-control" required pattern="[a-zA-Z0-9ก-๙_.- ]+">
                            <input name="maker" type="hidden" class="form-control" value="<?=$_SESSION['user_id']?>" required pattern="[0-9a-zA-Z_.-@]*">
                        </div>
                    </div>
                    <div id="basicExample">
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="textinput">วันที่</label>
                            <div class="col-md-8">
                                <input id="d_start" name="d_start" type="text" class="form-control date start" placeholder="เลือกวันที่" required>
                                <input id="d_end" name="d_end" type="hidden" class="form-control date end">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="textinput">ตั้งแต่</label>
                            <div class="col-md-8">
                                <input id="t_start" name="t_start" type="text" class="form-control time start" placeholder="เลือกช่วงเวลา" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="textinput">ถึง</label>
                            <div class="col-md-8">
                                <input name="t_end" id="timeEnd" type="text" class="form-control time end" placeholder="เลือกช่วงเวลา" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="textinput">ห้องประชุม</label>
                            <div class="col-md-8">
                                <select id="room" name="room" class="form-control" required>
                                    <option value="">กรุณาเลือก วันที่/ช่วงเวลาที่จะใช้ห้องประชุม</option>
                                </select>
                                <small style="color: red;">** ระบบจะทำการตรวจสอบห้องประชุมที่ว่าง ในช่วงเวลาที่ท่านเลือก **</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="textinput"></label>
                            <div class="col-md-8">
                                <select name="color" class="form-control" required>
                                    <option value="">เลือกสี</option>
                                    <option style="color:#0071c5;" value="#0071c5">- &#9724; Dark blue</option>
                                    <option style="color:#40E0D0;" value="#40E0D0">- &#9724; Turquoise</option>
                                    <option style="color:#008000;" value="#008000">- &#9724; Green</option>
                                    <option style="color:#FFD700;" value="#FFD700">- &#9724; Yellow</option>
                                    <option style="color:#FF8C00;" value="#FF8C00">- &#9724; Orange</option>
                                    <option style="color:#FF0000;" value="#FF0000">- &#9724; Red</option>
                                    <option style="color:#000;" value="#000">- &#9724; Black</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="textinput"></label>
                            <div class="col-md-8">
                                <button class="btn btn-block btn-success" onclick="return confirm('ยืนยันการบันทึกรายการ ?')">บันทึกรายการ</button>
                                <button class="btn btn-block btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                            </div>
                        </div>
                    </div>
                </form>
                <small style="color: gray;">** พบปัญหาการใช้งาน กรุณาแจ้งทีมไอที **</small>
            </div>
        </div>
    </div>
</div>

<!-- Modal History -->
<div class="modal fade" id="History" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div id="ajaxhistory" class="modal-content">
            <!-- เรียกใช้งานผ่าน ajax -->
        </div>
    </div>
</div>

<script>
    $('.ajaxModal').click(function(){
        var id = $(this).attr('data-id');
            $.ajax({url:"page/list_history.php?id="+id,cache:false,success:function(result){
                $('#ajaxhistory').html(result);
            }});
        });
</script>
