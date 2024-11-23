<?php
$routes = [
    // users
    "fake_hotel/users/index" => ["UserController", "index"],
    "fake_hotel/users/insert" => ["UserController", "insert"],
    "fake_hotel/users/update" => ["UserController", "update"],
    "fake_hotel/users/delete" => ["UserController", "delete"],
    // rooms
    "fake_hotel/rooms/index" => ["RoomController", "index"],
    "fake_hotel/rooms/insert" => ["RoomController", "insert"],
    "fake_hotel/rooms/update" => ["RoomController", "update"],
    "fake_hotel/rooms/delete" => ["RoomController", "delete"],
    // bookings
    "fake_hotel/bookings/index" => ["BookingController", "index"],
    "fake_hotel/bookings/insert" => ["BookingController", "insert"],
    "fake_hotel/bookings/update" => ["BookingController", "update"],
    "fake_hotel/bookings/delete" => ["BookingController", "delete"],
    // room types
    "fake_hotel/roomTypes/index" => ["RoomTypeController", "index"],
    "fake_hotel/roomTypes/insert" => ["RoomTypeController", "insert"],
    "fake_hotel/roomTypes/update" => ["RoomTypeController", "update"],
    "fake_hotel/roomTypes/delete" => ["RoomTypeController", "delete"],
    //other
];

class Router {
    private $uri;

    public function __construct() {
        $this->uri = trim($_SERVER["REQUEST_URI"], "/");
    }

    public function direct() {
        global $routes;
        $cutURL = explode('?',$this->uri)[0];
        if($cutURL == "fake_hotel/test"){
            require_once "app/test.php";
            return;
        }
        if($cutURL == "fake_hotel"){
            require_once "public/index.php";
            return;
        }
        if(array_key_exists($cutURL, $routes)){
            [$controller, $method] = $routes[$cutURL];

            require_once "app/controllers/{$controller}.php";

            return $controller::$method();
        }
        require_once "app/views/404.php";
    }
}

?>