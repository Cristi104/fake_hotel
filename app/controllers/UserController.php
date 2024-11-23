<?php
require_once "app/models/User.php";

class UserController{
    public static function index(){
        $users = User::getAllUsers();
        require_once "app/views/User/index.php";
    }
    public static function insert(){
        if(array_key_exists('Add', $_POST)){
            $user = array("user_id"=>-1);
            $user["user_type"] = $_POST["user_type"];
            $user["first_name"] = $_POST["first_name"];
            $user["last_name"] = $_POST["last_name"];
            $user["phone"] = $_POST["phone"];
            $user["email"] = $_POST["email"];
            $user["password"] = $_POST["password"];
            User::insertUser($user);
            header("Location: index");
            exit();
            return;
        }
        require_once "app/views/User/insert.php";
    }
    public static function update(){
        $id = $_GET['id'];
        $user = User::getUser($id);
        if(array_key_exists('Update', $_POST)){
            $user["user_type"] = $_POST["user_type"];
            $user["first_name"] = $_POST["first_name"];
            $user["last_name"] = $_POST["last_name"];
            $user["phone"] = $_POST["phone"];
            $user["email"] = $_POST["email"];
            $user["password"] = $_POST["password"];
            User::updateUser($user);
            header("Location: index");
            exit();
            return;
        }
        require_once "app/views/User/update.php";
    }
    public static function delete(){
        $id = $_GET['id'];
        $user = User::getUser($id);
        User::deleteUser($user);
        header("Location: index");
        exit();
    }
}
?>