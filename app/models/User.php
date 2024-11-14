<?php

class User {
    public static function getAllUsers() {
        global $pdo;

        $sql = "SELECT * FROM user_types";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>