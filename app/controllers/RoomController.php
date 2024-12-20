<?php
require_once "app/models/Room.php";
require_once "app/models/User.php";
require_once "app/models/RoomType.php";

class RoomController{
    public static function index(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "read_room");
        if($permission != "ALL"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $rooms = Room::getAllRooms();
        require_once "app/views/Room/index.php";
    }

    public static function insert(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "create_room");
        if($permission != "ALL"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
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
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "update_room");
        if($permission != "ALL"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
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
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "delete_room");
        if($permission != "ALL"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $number = $_GET['number'];
        $room = Room::getRoom($number);
        Room::deleteRoom($room);
        header("Location: index");
        exit();
    }
}
?>