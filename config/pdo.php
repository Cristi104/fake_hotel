<?php

require_once "config.php";

$pdo = new PDO(
   'mysql:host='.$config['db_host'].';port=3306;dbname='.$config['db_name'],
   $config['db_user'],
   $config['db_pass']
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>