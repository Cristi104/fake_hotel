<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Update Room Type</title>
</head>
<body>
<h1>Type</h1>
<form method="post">
    <label></label>Max guests<br>
    <input type="text" id="max_guests" name="max_guests" value="<?= $type["max_guests"] ?>"><br>
    <label>Price</label><br>
    <input type="text" id="price" name="price" value="<?= $type["price"] ?>"><br>
    <input type="submit" id="Update" name="Update" value="Update"><br>
</form>
</body>
</html>