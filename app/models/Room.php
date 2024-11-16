<?php

class Room {
    public static function getAllRooms() {
        global $pdo;

        $sql = "SELECT * FROM rooms";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>