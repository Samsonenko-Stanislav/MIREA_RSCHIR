<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Стриница админа</title>
    <style>span { margin: 10px; }</style>
</head>
<body>
<h1>Список пользователей</h1>
<?php
require_once '../helper.php';
$mysqli = openMysqli();
$users = $mysqli->query('select * from ' . users);
?>
<div style="display: flex; flex-direction: column;"><?php foreach ($users as $user) { echo <<<A
            <div style="display: flex; flex-direction: column;">
                <span>{$user[id]}</span><span>{$user[name]}</span><span>{$user[password]}</span>
            </div>
        A; } ?></div>
<?php $mysqli->close(); ?>
</body>
</html>