<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Update Booking</title>
</head>
<body>
<h1>Booking</h1>
<form method="post">
    <label></label>room_number<br>
    <input type="text" id="room_number" name="room_number" value="<?= $booking["room_number"] ?>"><br>
    <label>user_id</label><br>
    <input type="text" id="user_id" name="user_id" value="<?= $booking["user_id"] ?>"><br>
    <label>start_date</label><br>
    <input type="text" id="start_date" name="start_date" value="<?= $booking["start_date"] ?>"><br>
    <label>end_date</label><br>
    <input type="text" id="end_date" name="end_date" value="<?= $booking["end_date"] ?>"><br>
    <input type="submit" id="Update" name="Update" value="Update"><br>
</form>
</body>
</html>