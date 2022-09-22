<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Drawer</title>
    </head>
    <body>
        <?php
        include 'decoder.php';
        $num = $_GET['num'];
        $drawer = new Decoder($num);
        $drawer->draw();
        ?>


    </body>

</html>
