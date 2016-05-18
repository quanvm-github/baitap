<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cookie_Session</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script src="cookie_session.js"></script>
    <style type="text/css">
        table tr td {
            padding: 20px;
            border: solid 1px black;
        }
    </style>
</head>

<body>
    <form action="#" method="post">
        <table>
            <tr>
                <td><input type="button" value="Click this to get cookie" id="getcookie" class="button"/></td>
                <td><input type="button" value="Click this to get session" id="getsession" class="button"/></td>
            </tr>
            <tr>
                <td><input type="button" value="Click this to check cookie" id="checkcookie" class="button"/></td>
                <td><input type="button" value="Click this to check session" id="checksession" class="button"/></td>
            </tr>
            <tr>
                <td><input type="button" value="Click this to delete cookie" id="deletecookie" class="button"/></td>
                <td><input type="button" value="Click this to delete session" id="deletesession" class="button"/></td>
            </tr>
            <tr>
                <td><input type="button" value="Click this to get cookie js" id="getcookiejs"/></td>
                <td><input type="button" value="Click this to delete cookie js" id="deletecookiejs"/></td>
            </tr>
        </table>
    </form>
    <div id="status"></div>
</body>

</html>