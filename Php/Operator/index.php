<?php
    $varA = 1;
    $varB = 1;
    $varC = "1";

    $varD = "";
    $varE = 0;
    $varF = 0.0;
    $varG = "0";
    $varH = null;
    $varJ = false;
    $varK = array();
    $varL;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Operator</title>
</head>

<body>
    <table border="solid 1px black">
        <tr>
            <td>Operator 1 == 1</td>
            <td><?= $varA == $varB ? "true" : "false" ?></td>
        </tr>
        <tr>
            <td>Operator 1 == "1"</td>
            <td><?= $varA == $varC ? "true" : "false" ?></td>
        </tr>
        <tr>
            <td>Operator 1 === 1</td>
            <td><?= $varA === $varB ? "true" : "false" ?></td>
        </tr>
        <tr>
            <td>Operator 1 === "1"</td>
            <td><?= $varA === $varC ? "true" : "false" ?></td>
        </tr>
        <tr>
            <td>Empty and isset ($var = "")</td>
            <td><?= empty($varD) ? "true" : "false" ?></td>
            <td><?= isset($varD) ? "true" : "false" ?></td>
        </tr>
       <tr>
            <td>Empty and isset ($var = 0)</td>
            <td><?= empty($varE) ? "true" : "false" ?></td>
            <td><?= isset($varE) ? "true" : "false" ?></td>
        </tr>
        <tr>
            <td>Empty and isset ($var = 0.0)</td>
            <td><?= empty($varF) ? "true" : "false" ?></td>
            <td><?= isset($varF) ? "true" : "false" ?></td>
        </tr>
        <tr>
            <td>Empty and isset ($var = "0")</td>
            <td><?= empty($varG) ? "true" : "false" ?></td>
            <td><?= isset($varG) ? "true" : "false" ?></td>
        </tr>
        <tr>
            <td>Empty and isset ($var = null)</td>
            <td><?= empty($varH) ? "true" : "false" ?></td>
            <td><?= isset($varH) ? "true" : "false" ?></td>
        </tr>
        <tr>
            <td>Empty and isset ($var = false)</td>
            <td><?= empty($varJ) ? "true" : "false" ?></td>
            <td><?= isset($varJ) ? "true" : "false" ?></td>
        </tr>
        <tr>
            <td>Empty and isset ($var = array())</td>
            <td><?= empty($varK) ? "true" : "false" ?></td>
            <td><?= isset($varK) ? "true" : "false" ?></td>
        </tr>
        <tr>
            <td>Empty and isset (undefined variable)</td>
            <td><?= empty($varL) ? "true" : "false" ?></td>
            <td><?= isset($varL) ? "true" : "false" ?></td>
        </tr>
    </table>

</body>

</html>