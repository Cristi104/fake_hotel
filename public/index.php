
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Home</title>
</head>
<body>
<h1>Welcome</h1>
<?php
    if(array_key_exists("user", $_SESSION)){
        echo "<a href=\"users/index\" class=\"button\">Users</a>";
        echo "<a href=\"rooms/index\" class=\"button\">Rooms</a>";
        echo "<a href=\"roomTypes/index\" class=\"button\">Room Types</a>";
        echo "<a href=\"bookings/index\" class=\"button\">Bookings</a>";
    } else {
        echo "<a href=\"login\" class=\"button\">Login</a>";
        echo "<p>Please login.(email: test@example.com password: parola)</p>";
    };
?>  
</body>
</html>