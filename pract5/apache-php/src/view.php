<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Информация о товарах</title>
</head>
<body>
<?php require_once 'helper.php'; $id = $_GET[strtolower(id)];
if (!isset($id) || !is_numeric($id)) throw new Exception();

$mysqli = openMysqli();
$statement = $mysqli->prepare(sprintf('select * from %s where %s = ?', goods, id));
$_id = intval($id);
$statement->bind_param('i', $_id);
$statement->execute();
$good = $statement->get_result()->fetch_assoc();
echo <<<A
                <h1>$good[title]</h1><br>
                <span>$good[description]</span><br>
                <span>Цена: </span><span>$good[cost]</span>
A;
$mysqli->close();
?>
</body>
</html>