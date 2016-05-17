<?php
    session_start();
    include_once("Controller.php");
    $controller = new Controller();
    $url = explode("/", $_SERVER['REQUEST_URI']);
    $action = $url[4];

    $_SESSION["baseUrl"] = "/Php/Mvc/index.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Oop</title>
</head>

<body>
    <?php
        if ($action == null) {
            $controller->index();
        }
        else $controller->$action();
    ?>
</body>

</html>