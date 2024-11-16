<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Room Types</title>
</head>
<body>
<h1>All Room Types</h1>
<table>
    <tr>
        <th>type_id</th>
        <th>max_guests</th>
        <th>price</th>
    </tr>
    <?php foreach ($roomTypes as $type) : ?>
        <tr>
            <td><?= $type["type_id"] ?></td>
            <td><?= $type["max_guests"] ?></td>
            <td><?= $type["price"] ?></td>
        </tr>
    <?php endforeach; ?>
    
</body>
</html>