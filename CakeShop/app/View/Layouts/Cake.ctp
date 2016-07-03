<!DOCTYPE html>
<html>
<head>
<title>Favarite Cakes</title>
<meta charset="UTF-8">
<?php
echo $this->Html->meta(
    'cake.ico',
    '/img/cake.ico',
    array('type' => 'icon')
);
echo $this->Html->css("cake") 
?>
</head>
<body>
<?= $this->fetch('index') ?>
</body>
</html>
