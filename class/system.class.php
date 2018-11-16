<?php
Class System{
    function getEmp($id){
        $sql = "SELECT * FROM tbl_user
                WHERE `user_id` = '{$id}'";
    global $mysqli;
    $res = $mysqli->query($sql);
    $data = $res->fetch_assoc();
    return $data;
    }
    function getCalendar(){
        $sql = "SELECT * FROM tbl_meet
                LEFT JOIN tbl_user ON tbl_user.user_id = tbl_meet.meet_maker
                LEFT JOIN tbl_meetroom ON tbl_meetroom.room_id = tbl_meet.meet_room
                WHERE tbl_meet.meet_status = 'active'";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
        return $obj;
    }
    function getRoom(){
        $sql = "SELECT * FROM tbl_meetroom";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
        return $obj;
    }
    function editRoom($id){
        $sql = "SELECT * FROM tbl_meetroom WHERE room_id = {$id}";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
        return $data;
    }
    function listRoom($sDate,$eDate){
        $sql = "SELECT * FROM tbl_meetroom 
                WHERE room_status = 'active' AND room_id NOT IN 
                (SELECT meet_room FROM tbl_meet WHERE
                (meet_start >= '{$sDate}' AND meet_end <= '{$eDate}' OR
                (meet_end >= '{$sDate}' AND meet_start <= '{$eDate}') AND
                (meet_status = 'active')))";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
        return $obj;
    }
    function listDetail($id){
        $sql = "SELECT * FROM tbl_meet
                LEFT JOIN tbl_meetroom ON tbl_meetroom.room_id = tbl_meet.meet_room
                LEFT JOIN tbl_user ON tbl_user.user_id = tbl_meet.meet_maker       
                WHERE tbl_meet.meet_id = {$id}";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
        return $data;
    }
    function getReport(){
        $sql = "SELECT * FROM tbl_meet
                LEFT JOIN tbl_meetroom ON tbl_meet.meet_room = tbl_meetroom.room_id
                LEFT JOIN tbl_user ON tbl_meet.meet_maker = tbl_user.user_id
                ORDER BY tbl_meet.meet_id DESC";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
        return $obj;
    }
    function listHistory($id){
        $sql = "SELECT * FROM tbl_meet
                LEFT JOIN tbl_meetroom ON tbl_meet.meet_room = tbl_meetroom.room_id
                LEFT JOIN tbl_user ON tbl_meet.meet_maker = tbl_user.user_id
                WHERE tbl_user.user_id = '$id'
                ORDER BY tbl_meet.meet_id DESC";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
        return $obj;
    }
    function getUser(){
        $sql = "SELECT * FROM tbl_user";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
        return $obj;
    }
    function editUser($id){
        $sql = "SELECT * FROM tbl_user WHERE user_id = {$id}";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
        return $data;
    }
}
?>