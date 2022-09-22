<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insert sort</title>
</head>
<body>
<?php
include 'insertSort.php';
$array = explode(",", $_GET["arr"]);
echo "<p>Исходный массив</p>";
insertSort::output($array);
$array = insertSort::sort($array);
echo "<p>Отсортированный массив</p>";
insertSort::output($array);
?>
</body>

</html>
