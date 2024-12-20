<?php
require_once "app/models/User.php";

class UserController{
    public static function index(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "read_user");
        if($permission == "ALL"){
            $users = User::getAllUsers();
        }
        if($permission == "SELF"){
            $users = User::getAllUsers();
            foreach ($users as $key => $user) :
                if($user["user_id"] != $_SESSION["user"]["user_id"])
                    unset($users[$key]);
            endforeach;
        }
        require_once "app/views/User/index.php";
    }

    public static function insert(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "create_user");
        if($permission != "ALL"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        if(array_key_exists('Add', $_POST)){
            $user = array("user_id"=>-1);
            $user["user_type"] = $_POST["user_type"];
            $user["first_name"] = $_POST["first_name"];
            $user["last_name"] = $_POST["last_name"];
            $user["phone"] = $_POST["phone"];
            $user["email"] = $_POST["email"];
            $user["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
            User::insertUser($user);
            header("Location: index");
            exit();
            return;
        }
        require_once "app/views/User/insert.php";
    }

    public static function update(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "update_user");
        if($permission == "NONE"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $id = $_GET['id'];
        if($permission == "SELF" && $_SESSION["user"]["user_id"] != $id){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $user = User::getUser($id);
        if(array_key_exists('Update', $_POST)){
            $user["user_type"] = $_POST["user_type"];
            $user["first_name"] = $_POST["first_name"];
            $user["last_name"] = $_POST["last_name"];
            $user["phone"] = $_POST["phone"];
            $user["email"] = $_POST["email"];
            if($_POST["password"] != $user["password"] && $_POST["password"] != "")
                $user["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
            User::updateUser($user);
            header("Location: index");
            exit();
            return;
        }
        require_once "app/views/User/update.php";
    }
    
    public static function delete(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "delete_user");
        if($permission == "NONE"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $id = $_GET['id'];
        $user = User::getUser($id);
        if($permission == "SELF" && $_SESSION["user"]["user_id"] != $user["user_id"]){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        User::deleteUser($user);
        header("Location: index");
        exit();
    }
}
?>