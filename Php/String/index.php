<?php
    $stringA = "Double quote string";
    $stringB = "Single quote string";
    $varA = 10;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>String</title>
</head>

<body>
    <table border="solid 1px black">
        <tr>
            <td>Double / single quote string</td>
             <td>
                <?= "Double quote with variable $varA" ?>
            </td>
            <td>
                <?= 'Single quote with variable $varA' ?>
            </td>
        </tr>
        <tr>
            <td>Concat and substr string</td>
            <td>
                <?= $stringA . " " . $stringB ?>
            </td>
            <td>
                <?= substr($stringA, 5, 5) ?>
            </td>
        </tr>
        <tr>
            <td>String pos / replace</td>
            <td>
                <?= strpos($stringA, "string") ?>
            </td>
            <td>
                 <?= str_replace("string", "php", $stringA) ?>
            </td>
        </tr>
        <tr>
            <td>Sprintf / md5 string</td>
            <td>
                <?= sprintf("varA has value is %u", $varA) ?>
            </td>
            <td>
                <?= md5($stringA) ?>
            </td>
        </tr>
        <tr>
            <td>Ltrim / Rtrim string</td>
            <td>
                <?= ltrim("   string with many spaces   ") ?>
            </td>
            <td>
                <?= rtrim("   string with many spaces   ") ?>
            </td>
        </tr>
        <tr>
            <td>Multi bytes string</td>
            <td>
                <?php
                    $string = "更多學習";
                    echo "string is '更多學習'<br/>";
                    if (mb_strlen($string, "UTF-8") != strlen($string)) {
                        echo "length is " . mb_strlen($string, "UTF-8") . "<br/>";
                        echo "true length is " . strlen($string);
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>String to ascii</td>
            <td>
                <?php
                    function string_to_ascii($string)
                    {
                        $ascii = NULL;
                        for ($i = 0; $i < strlen($string); $i++) 
                        { 
                            $ascii .= " " . ord($string[$i]); 
                        }
                        return($ascii);
                    }
                    echo $result = string_to_ascii($stringA);
                ?>
            </td>
        </tr>
    </table>

</body>

</html>