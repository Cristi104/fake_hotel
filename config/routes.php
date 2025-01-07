<?php
require_once "config.php";

$routes = [
    // users
    $homePath . "/users/index" => ["UserController", "index"],
    $homePath . "/users/insert" => ["UserController", "insert"],
    $homePath . "/users/update" => ["UserController", "update"],
    $homePath . "/users/delete" => ["UserController", "delete"],
    $homePath . "/users/export" => ["UserController", "export"],
    // rooms
    $homePath . "/rooms/index" => ["RoomController", "index"],
    $homePath . "/rooms/insert" => ["RoomController", "insert"],
    $homePath . "/rooms/update" => ["RoomController", "update"],
    $homePath . "/rooms/delete" => ["RoomController", "delete"],
    // bookings
    $homePath . "/bookings/index" => ["BookingController", "index"],
    $homePath . "/bookings/insert" => ["BookingController", "insert"],
    $homePath . "/bookings/update" => ["BookingController", "update"],
    $homePath . "/bookings/delete" => ["BookingController", "delete"],
    // room types
    $homePath . "/roomTypes/index" => ["RoomTypeController", "index"],
    $homePath . "/roomTypes/insert" => ["RoomTypeController", "insert"],
    $homePath . "/roomTypes/update" => ["RoomTypeController", "update"],
    $homePath . "/roomTypes/delete" => ["RoomTypeController", "delete"],
    //other
    $homePath . "" => ["AuthController", "homePage"],
    $homePath . "/login" => ["AuthController", "login"],
    $homePath . "/logout" => ["AuthController", "logout"],
    $homePath . "/register" => ["AuthController", "register"],
    $homePath . "/confirmRegistration" => ["AuthController", "confirmRegistration"],
];

class Router {
    private $uri;

    public function __construct() {
        $this->uri = trim($_SERVER["REQUEST_URI"], "/");
    }

    public function direct() {
        global $routes;
        $cutURL = explode('?',$this->uri)[0];
        if(array_key_exists($cutURL, $routes)){
            [$controller, $method] = $routes[$cutURL];

            require_once "app/controllers/{$controller}.php";

            return $controller::$method();
        }
        require_once "app/views/404.php";
    }
}

?>