<?php
require_once "app/models/Booking.php";
require_once "app/models/User.php";
require_once "app/models/Room.php";

class BookingController{
    public static function index(){
        $bookings = Booking::getAllBookings();
        require_once "app/views/Booking/index.php";
    }

    public static function insert(){
        $users = User::getAllUsers();
        $rooms = Room::getAllRooms();
        if(array_key_exists('Add', $_POST)){
            $booking = array("booking_id"=>-1);
            $booking["room_number"] = $_POST["room_number"];
            $booking["user_id"] = $_POST["user_id"];
            $booking["start_date"] = $_POST["start_date"];
            $booking["end_date"] = $_POST["end_date"];
            Booking::insertBooking($booking);
            header("Location: index");
            exit();
            return;
        }
        require_once "app/views/Booking/insert.php";
    }

    public static function update(){
        $id = $_GET['id'];
        $booking = Booking::getBooking($id);
        $users = User::getAllUsers();
        $rooms = Room::getAllRooms();
        if(array_key_exists('Update', $_POST)){
            $booking["room_number"] = $_POST["room_number"];
            $booking["user_id"] = $_POST["user_id"];
            $booking["start_date"] = $_POST["start_date"];
            $booking["end_date"] = $_POST["end_date"];
            Booking::updateBooking($booking);
            header("Location: index");
            exit();
            return;
        }
        require_once "app/views/Booking/update.php";
    }
    
    public static function delete(){
        $id = $_GET['id'];
        $booking = Booking::getBooking($id);
        Booking::deleteBooking($booking);
        header("Location: index");
        exit();
    }
}
?>