<?php

class User {
    public static function getAllUsers() {
        global $pdo;

        $sql = "SELECT * FROM users";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUser($id) {
        global $pdo;

        $sql = "SELECT * FROM users WHERE user_id = $id";
        $stmt = $pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertUser($user) {
        global $pdo;

        $sql = "INSERT INTO users (user_id, user_type, first_name, last_name, phone, email, password) 
                VALUES (NULL, '" . $user["user_type"] . "', '" . $user["first_name"] . "', '" . $user["last_name"] . "', '" . $user["phone"] . "', '" . $user["email"] . "', '" . $user["password"] . "')";
        $pdo->prepare($sql)->execute();
    }

    public static function updateUser($user) {
        global $pdo;

        $sql = "UPDATE users SET user_type = '" . $user["user_type"] . "', first_name = '" . $user["first_name"] . "', last_name =  '". $user["last_name"] . "', phone = '" . $user["phone"] . "', email = '" . $user["email"] . "', password = '" . $user["password"] . "' WHERE user_id =" . $user["user_id"];
        $pdo->prepare($sql)->execute();
    }

    public static function deleteUser($user) {
        global $pdo;

        $sql = "DELETE FROM users WHERE user_id =" . $user["user_id"];
        $pdo->prepare($sql)->execute();
    }
}

?>