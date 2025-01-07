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
        $user = User::getUserLogin(htmlentities($_GET["email"]));
        if(empty($user)){
            $_SESSION["login_error"] = "Incorect email or password";
            require_once "app/views/auth/login.php";
            return;
        }else{
            if(password_verify(htmlentities($_GET["password"]), $user['password'])){
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

    public static function register(){
        global $homePath;
        global $domainName;
        if(array_key_exists('Add', $_POST)){
            $user = array("user_type" => 2);
            $user["first_name"] = htmlentities($_POST["first_name"]);
            $user["last_name"] = htmlentities($_POST["last_name"]);
            $user["phone"] = htmlentities($_POST["phone"]);
            $user["email"] = htmlentities($_POST["email"]);
            $user["password"] = password_hash(htmlentities($_POST["password"]), PASSWORD_DEFAULT);
            mail($user["email"], "account created", "Thank you for creating an account. 
                                To finalize account creation please click on this link: 
                                $domainName/$homePath/confirmRegistration?id=" . $user["password"]);
            User::insertTempUser($user);
            header("Location: /". $homePath);
            return;
        }
        require_once "app/views/auth/register.php";
    }

    public static function confirmRegistration(){
        $password = htmlentities($_GET["id"]);
        $user = User::getTempUser($password);
        User::insertUser($user);
        User::deleteTempUser($user);
        $user = User::getUserLogin($user["email"]);
        $_SESSION["user"] = $user;
        header("Location: /". $homePath);
        return;
    }

    public static function homePage(){
        require_once "app/views/auth/index.php";
    }
}

?>