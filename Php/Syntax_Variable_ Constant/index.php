<?php
    $stringMultiLineA = 
    "line 1
    line 2
    line 3";
    $stringMultiLineB = "line 1\nline 2\nline 3";

    $array = array("1", "2", "3");
    list($varA, $varB, $varC) = $array;

    define(CON_PI, 3.14);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Syntax_Variable_ Constant</title>
</head>

<body>
    <table border="solid 1px black">
        <tr>
            <td>Multiline string A</td>
            <td><textarea cols="20" rows="5"><?= $stringMultiLineA ?></textarea></td>
        </tr>
        <tr>
            <td>Mltiline string B</td>
            <td><textarea cols="20" rows="5"><?= $stringMultiLineB ?></textarea></td>
        </tr>
        <tr>
            <td>List array</td>
            <td><?= $varA.$varB.$varC ?></td>
        </tr>
        <tr>
            <td>Const</td>
            <td><?= CON_PI ?></td>
        </tr>
    </table>

</body>

</html>