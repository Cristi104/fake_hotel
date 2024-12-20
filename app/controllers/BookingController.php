<?php
require_once "app/models/Booking.php";
require_once "app/models/User.php";
require_once "app/models/Room.php";

class BookingController{
    public static function index(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "read_booking");
        if($permission == "NONE"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        if($permission == "ALL"){
            $bookings = Booking::getAllBookings();
        }
        if($permission == "SELF"){
            $bookings = Booking::getAllBookings();
            foreach ($bookings as $key => $booking) :
                if($booking["user_id"] != $_SESSION["user"]["user_id"])
                    unset($bookings[$key]);
            endforeach;
        }
        require_once "app/views/Booking/index.php";
    }

    public static function insert(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "create_booking");
        if($permission == "NONE"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $users = User::getAllUsers();
        $rooms = Room::getAllRooms();
        if(array_key_exists('Add', $_POST)){
            $booking = array("booking_id"=>-1);
            $booking["room_number"] = htmlentities($_POST["room_number"]);
            if($permission == "SELF"){
                $booking["user_id"] = $_SESSION["user"]["user_id"];
            }
            if($permission == "ALL"){
                $booking["user_id"] = htmlentities($_POST["user_id"]);
            }
            $booking["start_date"] = htmlentities($_POST["start_date"]);
            $booking["end_date"] = htmlentities($_POST["end_date"]);
            Booking::insertBooking($booking);
            header("Location: index");
            exit();
            return;
        }
        require_once "app/views/Booking/insert.php";
    }

    public static function update(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "update_booking");
        if($permission == "NONE"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $id = htmlentities($_GET['id']);
        $booking = Booking::getBooking($id);
        if($permission == "SELF" && $_SESSION["user"]["user_id"] != $booking["user_id"]){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $users = User::getAllUsers();
        $rooms = Room::getAllRooms();
        if(array_key_exists('Update', $_POST)){
            $booking["room_number"] = htmlentities($_POST["room_number"]);
            if($permission == "ALL")
                $booking["user_id"] = htmlentities($_POST["user_id"]);
            $booking["start_date"] = htmlentities($_POST["start_date"]);
            $booking["end_date"] = htmlentities($_POST["end_date"]);
            Booking::updateBooking($booking);
            header("Location: index");
            exit();
            return;
        }
        require_once "app/views/Booking/update.php";
    }
    
    public static function delete(){
        if(!isset($_SESSION["user"])){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $permission = User::getPermission($_SESSION["user"]["user_id"], "delete_booking");
        if($permission == "NONE"){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        $id = htmlentities($_GET['id']);
        $booking = Booking::getBooking($id);
        if($permission == "SELF" && $_SESSION["user"]["user_id"] != $booking["user_id"]){
            $_SESSION["error"] = "permission denied";
            require_once "app/views/404.php";
            return;
        }
        Booking::deleteBooking($booking);
        header("Location: index");
        exit();
    }
}
?>