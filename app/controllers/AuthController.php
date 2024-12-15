<?php
require_once "app/models/User.php";

class AuthController{
    public static function login(){
        if(isset($_SESSION["user"])){
            header("Location: /fake_hotel");
            return;
        }
        if(!isset($_GET["login"])){
            require_once "app/views/auth/login.php";
            return;
        }
        $user = User::getUserLogin($_GET["email"], $_GET["password"]);
        if(empty($user)){
            $_SESSION["login_error"] = "Incorect email or password";
            require_once "app/views/auth/login.php";
            return;
        }else{
            $_SESSION["user"] = $user;
            header("Location: /fake_hotel");
            return;
        }
    }

    public static function logout(){
        session_start();
        session_destroy();
        header("Location: /fake_hotel");
    }

    public static function homePage(){
        require_once "app/views/auth/index.php";
    }
}

?>