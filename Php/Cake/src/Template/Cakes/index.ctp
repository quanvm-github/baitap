<?php 
  $this->start('index'); 
  $path = "/test/Cake/webroot/img";
?>

<div id="frame">
  <div id="container1">
    <div id="header1"></div>
    <div id="header2"><a href="#"><img src="<?= $path ?>/favarite.gif" alt="" width="198" height="36"></a></div>
    <div id="header3a">
      <div class="nav"><a href="#" class="nav">Home</a> | <a href="#" class="nav">Search</a> | <a href="#">Contacts</a></div>
    </div>
    <div id="header3b">
      <h2 id="header3b1">Choose on Occassion</h2>
      <div id="header3b2"></div>
    </div>
  </div>
  <div id="container2">
    <div id="container2a">&nbsp;</div>
    <div id="container2b">
      <div id="container2b1">Lorem ipsum dolor sit amet, orci mauris, neque lacinia nibh ullamcorper vestibulum, imperdiet duis at inceptos, neque cras arcu, tincidunt ante odio. </div>
      <div class="container2b2" style="margin-top:13px;">
        <img src="<?= $path ?>/icon_arrow.gif" alt="" width="8" height="7">
        <img src="<?= $path ?>/blank.gif" alt="" width="25" height="1">
        <a href="#" class="links">Wedding</a></div>
      <div class="container2b2">
        <img src="<?= $path ?>/icon_arrow.gif" alt="" width="8" height="7">
        <img src="<?= $path ?>/blank.gif" alt="" width="25" height="1">
        <a href="#" class="links">Birthday</a></div>
      <div class="container2b2">
        <img src="<?= $path ?>/icon_arrow.gif" alt="" width="8" height="7">
        <img src="<?= $path ?>/blank.gif" alt="" width="25" height="1">
        <a href="#" class="links">Babies</a></div>
      <div class="container2b2">
        <img src="<?= $path ?>/icon_arrow.gif" alt="" width="8" height="7">
        <img src="<?= $path ?>/blank.gif" alt="" width="25" height="8">
        <a href="#" class="links">Special Events</a></div>
    </div>
  </div>
  <div id="container3">
    <div id="container3a">
      <div class="container3a1" style="margin-top:16px;"><a href="#"><img src="<?= $path ?>/about_us.gif" alt="" width="48" height="11" border="0"></a> </div>
      <div class="container3a1"><a href="#"><img src="<?= $path ?>/services.gif" alt="" width="46" height="12" border="0"></a> </div>
      <div class="container3a1"><a href="#"><img src="<?= $path ?>/food_gallery.gif" alt="" width="66" height="13" border="0"></a> </div>
      <div class="container3a1"><a href="#"><img src="<?= $path ?>/pricing_ordering.gif" alt="" width="98" height="14" border="0"></a> </div>
      <div class="container3a1"><a href="#"><img src="<?= $path ?>/delivery.gif" alt="" width="105" height="14" border="0"></a> </div>
      <div class="container3a1">&nbsp;</div>
    </div>
    <div id="container3b">
      <div id="container3b1" style="line-height:14px;">
        <h2>Welcome to our Website</h2>
        <br>
        This is Website, a free, fully standards-compliant CSS template designed by Free CSS Templates. <br />
        This free template is released under a Creative Commons Attributions 2.5 license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you keep the links in the footer intact. Aside from that, have fun with it :) </div>
      <div class="container3b2"><a href="#" class="container3b2">Read more</a></div>
      <h2 id="container3b3">Latest Masterpiece</h2>
      <div id="container3b4">
        <div id="container3b4a"><strong>Lorem ipsum</strong> dolor sit amet, orci mauris, neque lacinia nibh ullamcorper vestibulum, imperdiet duis at inceptos, neque cras arcu, tincid-<br>
          unt ante odio. <br>
          <br>
          <a href="#" class="brown">Click here...</a> </div>
      </div>
    </div>
    <div id="container3c">
      <div class="container3c1">
        <h2>Hot Offer</h2>
      </div>
      <div id="container3c2">
        <div id="container3c2a" style="margin-top:10px;"><img src="<?= $path ?>/best_recipes.gif" alt="" width="104" height="23"><br>
          <br>
          <div id="container3c2a1"><strong>Lorem ipsum</strong> dolor sit amet,<br>
            orci mauris,<br>
            neque lacinia nibh ullamcor<br>
            <div align="right"><a href="#">...more</a></div>
          </div>
        </div>
      </div>
      <div class="container3c1 special">
        <h2>Some Special</h2>
      </div>
      <div class="container3c2a2">
        <div class="blank">
          <div class="img"><img src="<?= $path ?>/cake1.jpg" alt="" width="84" height="75"></div>
          <div class="text"><strong>Lorem ipsum</strong> dolor sit amet, orci mauris, neque lacinia nibh ullamcor<br>
            <div align="right"><a href="#">...more</a></div>
          </div>
        </div>
        <div class="blank">
          <div class="img"><img src="<?= $path ?>/cake2.jpg" alt="" width="84" height="75"> </div>
          <div class="text"><strong>Lorem ipsum</strong> dolor sit amet, orci mauris, neque lacinia nibh ullamcor<br>
            <div align="right"><a href="#">...more</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="container4">
    <div id="container4a">&nbsp;</div>
    <div id="container4b">Copyright © 2006. All rights reserved.</div>
    <br class="spacer">
    <br class="spacer">
    <p>Designed by <a href="http://www.free-css-templates.com/">Free CSS Templates</a>, Thanks to <a href="http://www.dubaiapartments.biz/">Dubai Apartments</a></p>
  </div>
</div>

<?php $this->end(); ?>