<?php
$usedFnc = new System();
$report = $usedFnc->getReport();
$resRoom = $usedFnc->getRoom();
?>
<div class="container">
    <div class="col-lg-12">
        <h3><i class="fa fa-file-text-o"></i> รายงานการใช้ห้องประชุม</h3>
        <table id="resTable" class="table table-hover">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th>วันที่ใช้งาน</th>
                <th>ห้องประชุม</th>
                <th>ผู้ทำรายการ</th>
                <th>วันที่ทำรายการ</th>
                <th>สถานะ</th>
            </tr>
            </thead>
            <?php
            $i=0;
            foreach ($report as $reports){
                $i++;
                ?>
                <tr>
                    <td class="text-center"><?=$i;?></td>
                    <td><?=DBThaiShortDate($reports['meet_start'])." เวลา ".TimeThai($reports['meet_start'])." - ".TimeThai($reports['meet_end']);?></td>
                    <td><?=$reports['room_name']?></td>
                    <td><?=$reports['e_name']?></td>
                    <td><?=DateTimeThai($reports['meet_create'])?></td>
                    <td>
                        <?php
                        if ($reports['meet_status']=='active'){
                            echo "<span style='color: green'>ใช้งาน</span> | 
                            <a style='color:red;' onclick=\"return confirm('ยืนยันการยกเลิกรายการจองห้องประชุม STB:".$reports['meet_id']." ?')\" href=\"page/query.php?option=cancel&id=".$reports['meet_id']."\">ยกเลิกรายการ</a>";
                        }else{
                            echo "<span style='color: red'>ยกเลิก</span>";
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <hr>
        <div class="col-md-12">
            <div class="row pull-right">
                <button class="btn btn-danger" data-toggle="modal" data-target="#Report"><i class="fa fa-print"></i> พิมพ์รายงาน</button>
            </div>  
        </div>
    </div>
</div>

<!-- Modal Report -->
<div class="modal fade" id="Report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-print"></i> พิมพ์รายงาน</h4>
            </div>
            <div class="modal-body">
                <form name="room" class="form-horizontal" method="post" action="page/print_report.php" target="_blank">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput">ห้องประชุม</label>
                        <div class="col-md-8">
                            <?php $i=0; foreach ($resRoom as $room){ $i++; ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="check_room[]" id="check_room_<?=$i?>" value="<?=$room['room_id']?>"><span><?=$room['room_name']?></span>
                                    </label>
                                </div>
                            <?php } ?>
                            <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkAll"><span>เลือกทั้งหมด</span>
                                    </label>
                                </div>
                        </div>
                    </div>
                    <div id="basicExample" class="form-group">
                        <label class="col-md-2 control-label" for="textinput">วันที่</label>
                        <div class="col-md-4">
                            <input id="d_start" name="d_start" type="text" class="form-control date" placeholder="เลือกวันที่เริ่มต้น" pattern="[0-9a-zA-Z_.-@]*">
                        </div>
                        <div class="col-md-4">
                            <input id="d_end" name="d_end" type="text" class="form-control date" placeholder="เลือกวันที่สิ้นสุด" pattern="[0-9a-zA-Z_.-@]*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput"></label>
                        <div class="col-md-8">
                            <button class="btn btn-block btn-danger"><i class="fa fa-print"></i> พิมพ์รายงาน</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#basicExample .date').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
    });

    $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
