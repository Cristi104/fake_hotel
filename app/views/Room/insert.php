<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Add Room</title>
</head>
<body>
<h1>Room</h1>
<form method="post">
    <label>Number</label><br>
    <input type="text" id="room_number" name="room_number"><br>
    <label></label>Type<br>
    <select id="room_type" name="room_type">
        <?php foreach ($roomTypes as $type) : ?>
            <option><?= $type['type_id']?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" id="Add" name="Add" value="Add"><br>
</form>
</body>
</html>