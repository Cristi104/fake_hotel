<?php
require_once "app/models/RoomType.php";
require_once "app/models/User.php";

class RoomTypeController{
    public static function index(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "read_room_type");
        if($permission != "ALL"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $roomTypes = RoomType::getAllTypes();
        require_once "app/views/RoomType/index.php";
    }

    public static function insert(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "create_room_type");
        if($permission != "ALL"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        if(array_key_exists('Add', $_POST)){
            $type = array("type_id"=>-1);
            $type["max_guests"] = $_POST["max_guests"];
            $type["price"] = $_POST["price"];
            RoomType::insertType($type);
            header("Location: index");
            exit();
            return;
        }
        require_once "app/views/RoomType/insert.php";
    }

    public static function update(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "update_room_type");
        if($permission != "ALL"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $id = $_GET['id'];
        $type = RoomType::getType($id);
        if(array_key_exists('Update', $_POST)){
            $type["max_guests"] = $_POST["max_guests"];
            $type["price"] = $_POST["price"];
            RoomType::updateType($type);
            header("Location: index");
            exit();
            return;
        }
        require_once "app/views/RoomType/update.php";
    }

    public static function delete(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "delete_room_type");
        if($permission != "ALL"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $id = $_GET['id'];
        $type = RoomType::getType($id);
        RoomType::deleteType($type);
        header("Location: index");
        exit();
    }
}
?>