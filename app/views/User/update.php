<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Update User</title>
</head>
<body>
<h1>User</h1>
<form method="post">
    <label></label>User type<br>
    <select id="user_type" name="user_type" ><br>
        <option value="1">Admin</option>
        <option value="2">User</option>
    </select>
    <label>First name</label><br>
    <input type="text" id="first_name" name="first_name" value="<?= $user["first_name"] ?>"><br>
    <label>Last name</label><br>
    <input type="text" id="last_name" name="last_name" value="<?= $user["last_name"] ?>"><br>
    <label>phone</label><br>
    <input type="text" id="phone" name="phone" value="<?= $user["phone"] ?>"><br>
    <label>email</label><br>
    <input type="text" id="email" name="email" value="<?= $user["email"] ?>"><br>
    <label>password</label><br>
    <input type="text" id="password" name="password" value="<?= $user["password"] ?>"><br>
    <input type="submit" id="Update" name="Update" value="Update"><br>
</form>
</body>
</html>