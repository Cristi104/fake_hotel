<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Bookings</title>
</head>
<body>
<h1>All Bookings</h1>
<a href="insert">Add</a>
<table>
    <tr>
        <th>booking_id</th>
        <th>room_number</th>
        <th>user_id</th>
        <th>start_date</th>
        <th>end_date</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($bookings as $booking) : ?>
        <tr>
            <td><?= $booking["booking_id"] ?></td>
            <td><?= $booking["room_number"] ?></td>
            <td><?= $booking["user_id"] ?></td>
            <td><?= $booking["start_date"] ?></td>
            <td><?= $booking["end_date"] ?></td>
            <td>
                <a href="update?id=<?= $booking["booking_id"] ?>">Update</a>
                <a href="delete?id=<?= $booking["booking_id"] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    
</body>
</html>