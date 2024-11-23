<?php
$routes = [
    "fake_hotel/users/index" => ["UserController", "index"],
    "fake_hotel/rooms/index" => ["RoomController", "index"],
    "fake_hotel/bookings/index" => ["BookingController", "index"],
    "fake_hotel/roomTypes/index" => ["RoomTypeController", "index"],
    "fake_hotel/users/insert" => ["UserController", "insert"],
    "fake_hotel/rooms/insert" => ["RoomController", "index"],
    "fake_hotel/bookings/insert" => ["BookingController", "index"],
    "fake_hotel/roomTypes/insert" => ["RoomTypeController", "insert"],
    "fake_hotel/users/update" => ["UserController", "update"],
    "fake_hotel/rooms/update" => ["RoomController", "index"],
    "fake_hotel/bookings/update" => ["BookingController", "index"],
    "fake_hotel/roomTypes/update" => ["RoomTypeController", "update"],
    "fake_hotel/users/delete" => ["UserController", "delete"],
    "fake_hotel/rooms/delete" => ["RoomController", "delete"],
    "fake_hotel/bookings/delete" => ["BookingController", "delete"],
    "fake_hotel/roomTypes/delete" => ["RoomTypeController", "delete"],
    "fake_hotel/test" => ["RoomTypeController", "index"],
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
            return 0;
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