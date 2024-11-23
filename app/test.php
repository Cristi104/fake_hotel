<?php
require_once "config/pdo.php";
require_once "app/models/User.php";

$users = User::getAllUsers();
$usert = User::getUser(1);
// $usert["first_name"] = "test2";
// $usert["phone"] = "test";
// $usert["email"] = "test";
// User::insertUser($usert);
// User::updateUser($usert);
User::deleteUser($usert);
print_r($usert);

echo "<p>Users:</p>";
foreach ($users as $user) {
    echo "<pre>";
    print_r($user);
    echo "</pre>";
}
?>