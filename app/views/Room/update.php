<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Update Room</title>
</head>
<body>
<h1>Room</h1>
<form method="post">
    <label></label>Type<br>
    <select id="room_type" name="room_type">
        <?php foreach ($roomTypes as $type) : ?>
            <option <?php echo ($room["room_type"] == $type['type_id'])? "selected" : ""; ?>><?= $type['type_id']?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" id="Update" name="Update" value="Update"><br>
</form>
</body>
</html>