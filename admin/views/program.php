<div id="wrapper">
  <div id="row_space_1"></div>
  <div id="tour-title"><?=$tours[title]?></div>
  <div id="tour-detail"><?=$tours[detail]?></div>
  <div class="spacer"></div>  
  <div class="div-table-program">
  	<div class="div-table-caption-green">Tour Program Management</div>
    <div class="div-table-operation"><a href="?m=daytitlefrm&v=daytitlefrm&tour_id=<?=$tour_id?>"><img src="../images/add.png" border="0" align="absmiddle" /> Add Day Title</a> | <a href="?m=dayprogramfrm&v=dayprogramfrm&tour_id=<?=$tour_id?>"><img src="../images/add.png" border="0" align="absmiddle" /> Add Day Program</a></div>
<?php
if($num_rstitle > 0){
	mysql_data_seek($rstitle,0);
	while($title = mysql_fetch_assoc($rstitle)){
?>
    <div class="div-table-day-title"><?=$title[day_title]?></div>
    <div class="div-table-data-edit"><a href="?m=daytitlefrm&v=daytitlefrm&tour_id=<?=$tour_id?>&title_id=<?=$title[title_id]?>"><img src="../images/pencil.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-edit"><a href="?m=daytitledel&tour_id=<?=$tour_id?>&title_id=<?=$title[title_id]?>" onclick="return confirm('Do you want to delete <?=$title[day_title]?>?');"><img src="../images/delete.png" border="0" align="absmiddle" /></a></div>
<?php
		if($start_index_rsprogram[$title[title_id]]>0){
			mysql_data_seek($rsprogram,$start_index_rsprogram[$title[title_id]]-1);
			while($program=mysql_fetch_assoc($rsprogram)){
				if($program[title_id]!=$title[title_id]){
					break;
				}
?>
    <div class="div-table-row">
      <div class="div-table-program-period"><?=$program[period]?></div>
      <div class="div-table-program-detail"><?=nl2br($program[detail])?></div>
      <div class="div-table-data-edit"><a href="?m=dayprogramfrm&v=dayprogramfrm&tour_id=<?=$tour_id?>&prog_id=<?=$program[prog_id]?>"><img src="../images/pencil.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-edit"><a href="?m=dayprogramdel&tour_id=<?=$tour_id?>&prog_id=<?=$program[prog_id]?>" onclick="return confirm('Do you want to delete <?=$program[period]?>?');"><img src="../images/delete.png" border="0" align="absmiddle" /></a></div>
    </div>
<?php
			}
		}
	}
}
?>
  </div>
</div>