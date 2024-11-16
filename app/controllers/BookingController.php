<?php
require_once "app/models/Booking.php";

class BookingController{
    public static function index(){
        $bookings = Booking::getAllBookings();
        require_once "app/views/Booking/index.php";
    }
}
?>