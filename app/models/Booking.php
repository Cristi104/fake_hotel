<?php

class Booking {
    public static function getAllBookings() {
        global $pdo;

        $sql = "SELECT * FROM bookings";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>