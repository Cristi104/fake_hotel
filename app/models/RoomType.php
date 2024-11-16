<?php

class RoomType {
    public static function getAllTypes() {
        global $pdo;

        $sql = "SELECT * FROM room_types";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>