<?php
require_once "app/models/Room.php";
require_once "app/models/RoomType.php";

class RoomController{
    public static function index(){
        $rooms = Room::getAllRooms();
        require_once "app/views/Room/index.php";
    }

    public static function insert(){
        $roomTypes = RoomType::getAllTypes();
        if(array_key_exists('Add', $_POST)){
            $room = array("room_number"=>$_POST["room_number"]);
            $room["room_type"] = $_POST["room_type"];
            print_r($room);
            Room::insertRoom($room);
            header("Location: index");
            exit();
            return;
        }
        require_once "app/views/Room/insert.php";
    }

    public static function update(){
        $number = $_GET['number'];
        $room = Room::getRoom($number);
        $roomTypes = RoomType::getAllTypes();
        if(array_key_exists('Update', $_POST)){
            $room["room_type"] = $_POST["room_type"];
            Room::updateRoom($room);
            header("Location: index");
            exit();
            return;
        }
        require_once "app/views/Room/update.php";
    }
    
    public static function delete(){
        $number = $_GET['number'];
        $room = Room::getRoom($number);
        Room::deleteRoom($room);
        header("Location: index");
        exit();
    }
}
?>