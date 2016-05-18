<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Mail Content</title>
</head>

<body>
    <?php
    if (isset($_POST["to"])) {
        $to = $_POST["to"];
        $subject = $_POST["subject"];
        $content = $_POST["content"];
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        echo $to . "<br>";
        echo $subject . "<br>";
        echo $content . "<br>";
        if (mail($to, $subject, $content, $headers)) {
            echo "Your email has been sent !";
        }
        else echo "false";
    }
?>
<br>
<a href="index.php">Back !</a>
</body>

</html>