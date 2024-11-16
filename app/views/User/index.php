<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Users</title>
</head>
<body>
<h1>All Users</h1>
<table>
    <tr>
        <th>ID</th>
        <th>role</th>
        <th>first name</th>
        <th>last name</th>
        <th>phone</th>
        <th>email</th>
        <th>password</th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $user["user_id"] ?></td>
            <td><?= $user["user_type"] ?></td>
            <td><?= $user["first_name"] ?></td>
            <td><?= $user["last_name"] ?></td>
            <td><?= $user["phone"] ?></td>
            <td><?= $user["email"] ?></td>
            <td><?= $user["password"] ?></td>
        </tr>
    <?php endforeach; ?>
    
</body>
</html>