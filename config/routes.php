<?php
$routes = [
    "fake_hotel/users/index" => ["UserController", "index"],
    "fake_hotel/rooms/index" => ["RoomController", "index"],
    "fake_hotel/bookings/index" => ["BookingController", "index"],
    "fake_hotel/roomTypes/index" => ["RoomTypeController", "index"],
];

class Router {
    private $uri;

    public function __construct() {
        $this->uri = trim($_SERVER["REQUEST_URI"], "/");
    }

    public function direct() {
        global $routes;

        if(array_key_exists($this->uri, $routes)){
            [$controller, $method] = $routes[$this->uri];

            require_once "app/controllers/{$controller}.php";

            return $controller::$method();
        }
        require_once "app/views/404.php";
    }
}

?>