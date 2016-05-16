<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mail</title>
    <script src="checkmail.js"></script>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="checkmail.php" method="post" id="form_email">
        To: <br>
        <input type="text" name="to" id="email" onchange="checkEmail()"><label id="error_email" class="error"></label>
        <br/>
        Subject: <br>
        <input type="text" name="subject" id="subject" onchange="checkSubject()"><label id="error_subject" class="error"></label>
        <br>
        Content: <br>
        <textarea rows="4" cols="50" name="content" id="content" onchange="checkContent()"></textarea><label id="error_content" class="error"></label>
        <br>
        <br/>
        <input type="button" value="Send mail" id="form_submit" onclick="checkSubmit()"/>
        <input type="reset" value="Reset"/>
    </form>

</body>

</html>