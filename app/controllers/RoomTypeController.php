<?php
require_once "app/models/RoomType.php";

class RoomTypeController{
    public static function index(){
        $roomTypes = RoomType::getAllTypes();
        require_once "app/views/RoomType/index.php";
    }
    public static function insert(){
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
        $id = $_GET['id'];
        $type = RoomType::getType($id);
        RoomType::deleteType($type);
        header("Location: index");
        exit();
    }
}
?>