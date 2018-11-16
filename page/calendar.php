<?php
session_start();
$usedFnc = new System();
$events = $usedFnc->getCalendar();
$rooms = $usedFnc->getRoom();
?>

<div class="container">
    <div class="row">
        <!-- Alert -->
        <?php
        $option = $_SESSION['option'];
        if ($option=='insert'){
            echo "
                <div class='alert alert-success' role='alert'>
                    <strong>บันทึกรายการสำเร็จ !</strong>
                </div>";
        }
        if ($option=='cancel'){
            echo "
                <div class='alert alert-danger' role='alert'>
                    <strong>ยกเลิกรายการสำเร็จ !</strong>
                </div>";
        }
        unset($_SESSION['option']);
        ?>
        <!-- /Alert -->

        <!-- Calendar -->
        <div class="col-lg-12 text-center">
            <h2>ปฏิทินการใช้งานห้องประชุม</h2>
            <div id="calendar" class="col-centered"></div>
        </div>
        <!-- /Calendar -->

    </div>
    <hr>
    <div class="col-md-12 ">
        <div class="row pull-right">
            <button class="btn btn-danger" data-toggle="modal" data-target="#Booking"><i class="fa fa-plus"></i> จองห้องประชุม</button>
        </div>  
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="Detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div id="ajaxresult" class="modal-content">
        <!-- เรียกใช้งานผ่าน ajax -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            eventLimit: true,

            eventRender: function (event, element) {
                element.bind('click', function () {
                    var id = event.id;
                    $.ajax({url:"page/list_detail.php?id="+id,cache:false,success:function(result){
                            $('#ajaxresult').html(result);
                        }});
                    $('#Detail').modal('show');
                });
            },
            events: [
                <?php foreach($events as $event):

                $start = explode(" ", $event['meet_start']);
                $end = explode(" ", $event['meet_end']);
                if($start[1] == '00:00:00'){
                    $start = $start[0];
                }else{
                    $start = $event['meet_start'];
                }
                if($end[1] == '00:00:00'){
                    $end = $end[0];
                }else{
                    $end = $event['meet_end'];
                }
                ?>
                {
                    id:     '<?=$event['meet_id'];?>',
                    title:  '<?=$event['meet_title'];?>',
                    start:  '<?=$start;?>',
                    end:    '<?=$end;?>',
                    color:  '<?=$event['meet_color'];?>',
                },
                <?php endforeach; ?>
            ]
        });
    });

    // Get Room Ajax Return Record
    $("#timeEnd").change(function(){
        $.ajax({
            type: "POST",
            data: {
                d_start: $("input#d_start").val(),
                d_end:   $("input#d_end").val(),
                t_start: $("input#t_start").val(),
                t_end:   $("input#timeEnd").val(),
            },
            url: "page/list_room.php",
            success: function (data) {
                $("#room").html(data); }
        });
        return false;
    });

    // initialize input widgets first
    $('#basicExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'H:i'
    });

    $('#basicExample .date').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
    });

    // initialize datepair
    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 3000);
</script>