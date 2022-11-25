<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Каталог</title>
    <style>
        span {
            margin: 10px;
        }
        .list {
            display: flex;
            flex-direction: column;
        }
        .item {
            display: flex;
            flex-direction: row;
            cursor: pointer;
            text-decoration: underline;
            color: blue;
        }

        .item:hover { background-color: cadetblue; color: blueviolet }
        </style>
</head>
<body>
<h1>Каталог</h1>
<?php
require_once 'helper.php';

$mysqli = openMysqli();
$result = $mysqli->query("select * from " . goods);
?>
<div class="list"><?php if ($result->num_rows > 0) foreach ($result as $good) echo <<<A
            <div
                onclick="window.location.replace('view.php?id={$good[id]}')" 
                class="item">
                <span>{$good[title]}</span>
            </div>
        A; else echo 'Empty'; ?></div>
</body>
</html>