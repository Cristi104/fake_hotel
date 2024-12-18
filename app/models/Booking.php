<?php

class Booking {
    public static function getAllBookings() {
        global $pdo;

        $sql = "SELECT * FROM bookings";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getBooking($id) {
        global $pdo;

        $sql = "SELECT * FROM bookings WHERE booking_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":id" => $id,));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertBooking($booking) {
        global $pdo;

        $sql = "INSERT INTO bookings (booking_id, room_number, user_id, start_date, end_date)
                VALUES (NULL, :room_number, :user_id, :start_date, :end_date)";
        $pdo->prepare($sql)->execute(array(
            ":room_number" => $booking["room_number"],
            ":user_id" => $booking["user_id"],
            ":start_date" => $booking["start_date"],
            ":end_date" => $booking["end_date"],
        ));
    }

    public static function updateBooking($booking) {
        global $pdo;

        $sql = "UPDATE bookings SET room_number = :room_number, user_id = :user_id, start_date =  :start_date, end_date = :end_date WHERE booking_id = :booking_id";
        $pdo->prepare($sql)->execute(array(
            ":booking_id" => $booking["booking_id"],
            ":room_number" => $booking["room_number"],
            ":user_id" => $booking["user_id"],
            ":start_date" => $booking["start_date"],
            ":end_date" => $booking["end_date"],
        ));
    }

    public static function deleteBooking($booking) {
        global $pdo;

        $sql = "DELETE FROM bookings WHERE booking_id = :booking_id";
        $pdo->prepare($sql)->execute(array(
            ":booking_id" => $booking["booking_id"],
        ));
    }

}

?>