<div id="left">
  <div id="left_navigation">
        <img src="images/gtop.gif" alt="" width="191" height="8" />
          <div class="title1">Tour Destination</div>
          <ul class="contries">
<?php
while($des=mysql_fetch_assoc($des_rs)){
?>
			<li><a href="?m=tours&v=tours&des_id=<?=$des[des_id]?>"><?=$des[des_name]?></a></li>
<?php
}
?>
          </ul>
        <img src="images/gbot.gif" alt="" width="191" height="8" />
  </div>
  <div class="spacer5px"></div>
  <img src="images/banner.jpg" alt="" width="191" height="346" />
</div>