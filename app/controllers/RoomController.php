<?php
require_once "app/models/Room.php";

class RoomController{
    public static function index(){
        $rooms = Room::getAllRooms();
        require_once "app/views/Room/index.php";
    }
}
?>