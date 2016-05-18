<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajax_ReadFile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="ajax.js"></script>
</head>

<body>
    <form action="#" method="post" enctype="multipart/form-data">
        Click this button to see ajax !<br>
        <input type="button" id="ajax" value="Ajax">
        <br>
        <br/>
        <input type="button" id="ajaxjson" value="AjaxJson">
        <br>
        <br/>
        <input type="file" id="fileToUpload" name="fileToUpload">
        <br/>
        <br/>
        <div id="progress" style="width: 300px;">
            <div id="bar" style="background-color: red; width: 0%; height: 10px;"></div >
            <div id="percent">0%</div >
        </div>
        <div id="status"></div>
        <br>
        <input type="button" id="upload" value="Up load this text file">
        <input type="button" class="readfile" value="Read text file" id="fopen">
        <input type="button" class="readfile" value="Read text file by spl" id="spl">
        <input type="button" id="csv" value="Download a csv file">
        <input type="reset" value="Reset">
    </form>

</body>

</html>