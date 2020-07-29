<div id="wrapper">
<?php
require_once("views/homeleft.php");
?>
	<div id="central2">
      <div id="central_row_space_2"></div>
<?php
while($row = mysql_fetch_assoc($news_rs)){
?>
      <div class="block2"> <a href="?m=newsdetail&v=newsdetail&news_id=<?=$row[news_id]?>"><img src="newspic/<?=$row[banner]?>" alt="" width="180" height="126" /></a>
          <div>
            <h4><?=$row[title]?></h4>
            <p><?php
            if(iconv_strlen($row[detail],"UTF-8") > 360){
				echo iconv_substr($row[detail],0,360,"UTF-8")."...";
			}else{
				echo $row[detail];
			}
			?></p>
            <a href="?m=newsdetail&v=newsdetail&news_id=<?=$row[news_id]?>" class="more2">more details</a> </div>
      </div>
<?php
}
?>
	<div class="block2">Page 
<?php
$numpage = ceil($numpro/$pl);
for($i=1;$i<=$numpage;$i++){
	if($pn==$i){
		echo $i." ";
	}else{
		echo "<a href=\"?m=news&v=news&pn=$i\">".$i."</a> ";
	}
}
?>
  </div>
    </div>
</div>