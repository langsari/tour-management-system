<div id="wrapper">
<?php
require_once("views/homeleft.php");
?>
<div id="big">
          <h2><?=$tours[title]?> </h2>
    <div class="big_photo"> <img src="banners/<?=$tours[banner]?>" alt="" width="260" height="217" /><br /><br />
    <a href="docs/<?=$tours[doc]?>" class="other" target="_blank"><img src="images/download.png"/></a><br />
    <a href="?m=booking&v=booking&tour_id=<?=$tour_id?>" class="other"><img src="images/booking.png"/></a>
		  </div>
		  <div class="text">
            <div class="div-table-program-cusview">
            <div class="div-table-caption-normal"><?=$tours[detail]?></div>
            <?php
        if($num_rstitle > 0){
            mysql_data_seek($rstitle,0);
            while($title = mysql_fetch_assoc($rstitle)){
        ?>
            <div class="div-table-day-title-cusview"><?=$title[day_title]?></div>
            <?php
                if($start_index_rsprogram[$title[title_id]]>0){
                    mysql_data_seek($rsprogram,$start_index_rsprogram[$title[title_id]]-1);
                    while($program=mysql_fetch_assoc($rsprogram)){
                        if($program[title_id]!=$title[title_id]){
                            break;
                        }
        ?>
            <div class="div-table-row">
              <div class="div-table-program-period-cusview"><?=$program[period]?></div>
              <div class="div-table-program-detail-cusview"><?=nl2br($program[detail])?></div>
            </div>
        <?php
                    }
                }
            }
        }
        ?>
          </div>
	      </div>
  </div>
</div>