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

        $sql = "SELECT * FROM room_types WHERE type_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":id" => $id,));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertType($type) {
        global $pdo;

        $sql = "INSERT INTO room_types (type_id, max_guests, price)
                VALUES (NULL, :max_guests, :price)";
        $pdo->prepare($sql)->execute(array(
            ":max_guests" => $type["max_guests"],
            ":price" => $type["price"],
        ));
    }

    public static function updateType($type) {
        global $pdo;

        $sql = "UPDATE room_types SET max_guests = :max_guests, price = :price WHERE type_id = :type_id";
        $pdo->prepare($sql)->execute(array(
            ":max_guests" => $type["max_guests"],
            ":price" => $type["price"],
            ":type_id" => $type["type_id"],
        ));
    }

    public static function deleteType($type) {
        global $pdo;

        $sql = "DELETE FROM room_types WHERE type_id = :type_id";
        $pdo->prepare($sql)->execute(array(
            ":type_id" => $type["type_id"],
        ));
    }

}

?>