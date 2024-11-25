<?php
require_once "config/routes.php";
require_once "config/pdo.php"; 

// Start the session (optional, if using sessions)
session_start();
// session_unset();

// Initialize the router and route the request
$router = new Router();
$router->direct();
?>