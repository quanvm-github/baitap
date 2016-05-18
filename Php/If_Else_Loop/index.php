<?php
    $varA = 1;
    $varB = array("1", "2", "3");
    $varC = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>If_Else_Loop</title>
</head>

<body>
    <table border="solid 1px black">
        <tr>
            <td>If</td>
            <td>
                <?php
                    if ($varA < 1) {
                        echo "varA < 1";
                    } elseif ($varA == 1) {
                        echo "varA = 1";
                    }
                    else {
                        echo "varA > 1";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Switch</td>
            <td>
                <?php
                    switch ($varA) {
                        case 0:
                            echo "varA = 0";
                            break;
                        case 1:
                            echo "varA = 1";
                            // continue running
                        default:
                            echo " (default echo when end loop)";
                            break;
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Ternary operator</td>
            <td><?= $varA == 1 ? "varA = 1 (short hand of if statement)" : "false" ?></td>
        </tr>
        <tr>
            <td>Vi du ve foreach</td>
            <td>
                <?php
                    foreach ($varB as $value) {
                        echo "value is " . $value . "<br/>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>While do / do while</td>
            <td>
                <?php
                    while ($varA < 3) {
                        echo "value is " . $varA . "<br/>";
                        $varA ++;
                    }
                ?>
            </td>
            <td>
                <?php
                    do {
                        echo "value is " . $varC . "<br/>";
                        $varC ++;
                    } while ($varC < 3)
                ?>
            </td>
        </tr>
    </table>

</body>

</html>