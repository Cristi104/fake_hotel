<?php

class Room {
    public static function getAllRooms() {
        global $pdo;

        $sql = "SELECT * FROM rooms";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getRoom($number) {
        global $pdo;

        $sql = "SELECT * FROM rooms WHERE room_number = $number";
        $stmt = $pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertRoom($room) {
        global $pdo;

        $sql = "INSERT INTO rooms (room_number, room_type)
                VALUES (" . $room["room_number"] . ", " . $room["room_type"] . ")";
        $pdo->prepare($sql)->execute();
    }

    public static function updateRoom($room) {
        global $pdo;

        $sql = "UPDATE rooms SET room_type = " . $room["room_type"] . " WHERE room_number =" . $room["room_number"];
        $pdo->prepare($sql)->execute();
    }

    public static function deleteRoom($room) {
        global $pdo;

        $sql = "DELETE FROM rooms WHERE room_number =" . $room["room_number"];
        $pdo->prepare($sql)->execute();
    }
}

?>