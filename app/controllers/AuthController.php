<?php
require_once "app/models/User.php";
require_once "config/config.php";

class AuthController{
    public static function login(){
        global $homePath;
        if(isset($_SESSION["user"])){
            header("Location: /". $homePath);
            return;
        }
        if(!isset($_GET["login"])){
            require_once "app/views/auth/login.php";
            return;
        }
        $user = User::getUserLogin($_GET["email"]);
        if(empty($user)){
            $_SESSION["login_error"] = "Incorect email or password";
            require_once "app/views/auth/login.php";
            return;
        }else{
            if(password_verify($_GET["password"], $user['password'])){
                $_SESSION["user"] = $user;
                header("Location: /". $homePath);
                return;
            }
            $_SESSION["login_error"] = "Incorect email or password";
            require_once "app/views/auth/login.php";
            return;
        }
    }

    public static function logout(){
        global $homePath;
        session_start();
        session_destroy();
        header("Location: /". $homePath);
    }

    public static function homePage(){
        require_once "app/views/auth/index.php";
    }
}

?>