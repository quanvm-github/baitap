<?php
  $path = "/CakeShop/app/webroot/img";
  $this->start('index');
?>
<div id="frame">
<?= $this->element('shop_header', array('path' => $path));// header cua index ?>
<?php
    // tuy vao noi dung user yeu cau (news, google map, catalogy ...)
    echo $this->element($element, array('path' => $path)); 
?>
<?php $this->end(); ?>
</div>