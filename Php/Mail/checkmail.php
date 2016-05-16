<?php
    if (isset($_POST["to"])) {
        $to = $_POST["to"];
        $subject = $_POST["subject"];
        $content = $_POST["content"];
        $header = "From: webmaster@example.com";
        echo $to . "<br>";
        echo $subject . "<br>";
        echo $content . "<br>";
        if (mb_send_mail($to, $subject, $content, $header)) {
            echo "Your email has been sent !";
        }
        else echo "false";
    }