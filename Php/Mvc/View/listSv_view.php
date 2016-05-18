<a href="logout.php">Log out !</a>
<br>
<br>
<form action=<?= $_SESSION["baseUrl"] . "/infoSv" ?> method="post">
    <select name="select">
    <?php
        foreach ($listSv as $key => $value) {
            echo "<option value=" . $key . ">" . $value . "</option>";
        }
    ?>
    </select>
    <br>
    <br>
    <input type="submit" name="info" value="Chose and click this button to see infomation">
    <input type="reset" value="Reset">
</form>