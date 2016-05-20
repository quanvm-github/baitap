<?php
  $path = "/CakeShop/app/webroot/img";
  $this->start('index');
?>
<div id="frame">
<?= $this->element('shop_header', array('path' => $path)); ?>
<?= $this->element($element, array('path' => $path)); ?>
<?php $this->end(); ?>
</div>