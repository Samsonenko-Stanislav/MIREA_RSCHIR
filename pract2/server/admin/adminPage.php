<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>
<body>
<h1>Серверная панель</h1>

<div class="container">
<form method="GET">
    <button type="submit" name="button1"  class="btn btn-primary mb-3">ls</button>
    <button type="submit" name="button2"  class="btn btn-primary mb-3">ps</button>
    <button type="submit" name="button3"  class="btn btn-primary mb-3">whoami</button>
    <button type="submit" name="button4"  class="btn btn-primary mb-3"> id</button>
    <button type="submit" name="button5"  class="btn btn-primary mb-3">pwd</button>
</form>
</div>
<?php
    include_once 'command.php';
    $result = array();
    if (array_key_exists('button1', $_GET )):
        $result=(command::print('ls'));
    elseif (array_key_exists('button2', $_GET)):
        $result=(command::print('ps'));
    elseif (array_key_exists('button3', $_GET)):
        $result=(command::print('whoami'));
    elseif (array_key_exists('button4', $_GET)):
        $result=(command::print('id'));
    elseif (array_key_exists('button5', $_GET)):
        $result=(command::print('pwd'));
    endif;
?>
</table>
</body>
</html>