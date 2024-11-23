<?php

class RoomType {
    public static function getAllTypes() {
        global $pdo;

        $sql = "SELECT * FROM room_types";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getType($id) {
        global $pdo;

        $sql = "SELECT * FROM room_types WHERE type_id = $id";
        $stmt = $pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertType($type) {
        global $pdo;

        $sql = "INSERT INTO room_types (type_id, max_guests, price)
                VALUES (NULL, '" . $type["max_guests"] . "', '" . $type["price"] . "')";
        $pdo->prepare($sql)->execute();
    }

    public static function updateType($type) {
        global $pdo;

        $sql = "UPDATE room_types SET max_guests = " . $type["max_guests"] . ", price = " . $type["price"] ." WHERE type_id =" . $type["type_id"];
        $pdo->prepare($sql)->execute();
    }

    public static function deleteType($type) {
        global $pdo;

        $sql = "DELETE FROM room_types WHERE type_id =" . $type["type_id"];
        $pdo->prepare($sql)->execute();
    }

}

?>