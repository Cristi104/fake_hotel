<?php
require_once "app/models/RoomType.php";

class RoomTypeController{
    public static function index(){
        $roomTypes = RoomType::getAllTypes();
        require_once "app/views/RoomType/index.php";
    }
}
?>