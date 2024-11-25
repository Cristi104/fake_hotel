<?php
require_once "app/models/User.php";
    if(array_key_exists("login", $_GET)){
        $user = User::getUserLogin($_GET["email"], $_GET["password"]);
        if(!empty($user)){
            $_SESSION["user"] = $user;
            header("Location: .");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<form method="get">
    <label>Email</label><br>
    <input type="text" id="email" name="email"><br>
    <label>Passwprd</label><br>
    <input type="text" id="password" name="password"><br>
    <input type="submit" id="login" name="login" value="login"><br>
</form>
</body>
</html>