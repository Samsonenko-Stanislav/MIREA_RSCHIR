<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Загрузчик PDF</title>
</head>
<ol>
<body>
<form enctype="multipart/form-data" action="loader.php" method="POST">
    <div>
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
    <br>
    <label for="file_field">Отправить этот файл:</label>
    <br>
    <input id="file_field" name="userfile" type="file"/>
    </div>
    <br>
    <input type="submit" value="Отправить файл"/>
</form>


<?php
$files = scandir('./files');
if (count($files) == 0) {
    echo "<h2>Нет загруженных файлов</h2>";
} else {
    echo "<h2>Загруженные файлы</h2>";
    foreach ($files as $file) {
        if ($file != "." and $file != "..") {
            echo "<a href='http://localhost:8081/pdf/files/" . $file. "' download>" . $file . " </a>";
        }
    }
}
?>
</body>
</ol>
</html>
