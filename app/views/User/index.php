<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Debts</title>
</head>
<body>
<h1>All Debts</h1>
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
    <?php foreach ($Users as $User) : ?>
        <tr>
            <td><?= $User["user_id"] ?></td>
            <td><?= $User["user_type"] ?></td>
            <td><?= $User["first_name"] ?></td>
            <td><?= $User["last_name"] ?></td>
            <td><?= $User["phone"] ?></td>
            <td><?= $User["email"] ?></td>
            <td><?= $User["password"] ?></td>
        </tr>
    <?php endforeach; ?>
    
</body>
</html>