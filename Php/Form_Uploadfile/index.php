<?php
    if (isset($_POST["submit"])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];

        $target_dir = "uploads/";
        $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
        $check = is_uploaded_file($_FILES["fileToUpload"]["tmp_name"]);
        if ($check) {
            echo "File type is: " . $_FILES["fileToUpload"]["type"];
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        // more restrict here !
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". $_FILES["fileToUpload"]["name"] . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        echo "<br/>Your firstname is: " . $firstname;
        echo "<br/>Your lastname is: " . $lastname;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form_Upload file</title>
</head>

<body>
    <form action="#" method="post" enctype="multipart/form-data">
        First name:<br>
        <input type="text" name="firstname">
        <br>
        Last name:<br>
        <input type="text" name="lastname">
        <br>
        <br/>
        <input type="file" name="fileToUpload">
        <br/>
        <br/>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>

</body>

</html>