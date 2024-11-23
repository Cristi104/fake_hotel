<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Rooms</title>
</head>
<body>
<h1>All Rooms</h1>
<a href="/fake_hotel" class="button">Home</a>
<a href="insert" class="button">Add</a>
<table>
    <tr>
        <th>room_number</th>
        <th>room_type</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($rooms as $room) : ?>
        <tr>
            <td><?= $room["room_number"] ?></td>
            <td><?= $room["room_type"] ?></td>
            <td>
                <a href="update?number=<?= $room["room_number"] ?>" class="button">Update</a>
                <a href="delete?number=<?= $room["room_number"] ?>" class="button">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    
</body>
</html>