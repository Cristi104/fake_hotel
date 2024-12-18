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
    <select id="room_number" name="room_number">
        <?php foreach($rooms as $room) : ?>
            <option <?php echo ($room["room_number"] == $booking['room_number'])? "selected" : ""; ?>><?= $room['room_number'] ?></option>
        <?php endforeach; ?>
    </select>
    <label>user_id</label><br>
    <select id="user_id" name="user_id">
        <?php foreach($users as $user) : ?>
            <option <?php echo ($user["user_id"] == $booking['user_id'])? "selected" : ""; ?>><?= $user['user_id'] ?></option>
        <?php endforeach; ?>
    </select>
    <label>start_date</label><br>
    <input type="text" id="start_date" name="start_date" value="<?= $booking["start_date"] ?>"><br>
    <label>end_date</label><br>
    <input type="text" id="end_date" name="end_date" value="<?= $booking["end_date"] ?>"><br>
    <input type="submit" id="Update" name="Update" value="Update"><br>
</form>
</body>
</html>