<div id="wrapper">
<?php
require_once("views/homeleft.php");
?>
<div id="central">
  <div id="central_row_space_1"></div>
  <div class="search">
    <form name="tourssch" id="tourssch" action="?m=tours&v=tours" method="post">
      <span>Search</span>
      <input name="title" type="text" id="title" value="<?=$title?>" /><img id="ok" src="images/button.jpg" alt="" width="45" height="24" onClick="tourssch.submit();" />
    </form>
  </div>
<?php
while($row=mysql_fetch_assoc($tours_rs)){
?>
  <div class="block"> <a href="?m=program&v=program&tour_id=<?=$row[tour_id]?>"><img src="banners/<?=$row[banner]?>" alt="" width="180" height="126" /></a>
      <div>
        <h4><?=$row[title]?></h4>
        <p><?=nl2br($row[detail])?></p>
        <span class="price">&nbsp;</span><a href="docs/<?=$row[doc]?>" class="more" target="_blank"><img src="images/page_white_acrobat.png" /> Download</a> <a href="?m=program&v=program&tour_id=<?=$row[tour_id]?>" class="more">More details</a> </div>
  </div>
<?php
}
?>
  <div class="block">Page 
<?php
$numpage = ceil($numpro/$pl);
for($i=1;$i<=$numpage;$i++){
	if($pn==$i){
		echo $i." ";
	}else{
		echo "<a href=\"?m=tours&v=tours&des_id=$des_id&title=$title&pn=$i\">".$i."</a> ";
	}
}
?>
  </div>
</div>
<?php
require_once("views/homeright.php");
?>
</div>