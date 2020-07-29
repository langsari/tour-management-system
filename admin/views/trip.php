<SCRIPT language="javascript" src="../js/ts_picker.js" type="text/javascript"></SCRIPT>
<div id="wrapper" align="center">
  <div id="row_space_1"></div>
  <div id="tour-title"><?=$tours[title]?></div>
  <div id="tour-detail"><?=$tours[detail]?></div>
  <div class="spacer"></div>
  <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="?m=trip&v=trip&tour_id=<?=$tour_id?>">
      <h1>Search trip</h1>
      <p>Please select period of departure date then click search button.</p>
      <label>Date form <span class="small">Select departure date from</span> </label>
      <input type="text" name="departurefrom" id="departurefrom" value="<?=$departurefrom?>" style="width:100px;" /> <img onClick="show_calendar('form.departurefrom');" style="cursor:pointer;padding:5px;" src="../images/cal.gif" border="0">
      <div class="spacer"></div>
      <label>Date to <span class="small">Select departure date to</span></label>
      <input type="text" name="departureto" id="departureto" value="<?=$departureto?>" style="width:100px;" /> <img onClick="show_calendar('form.departureto');" style="cursor:pointer;padding:5px;" src="../images/cal.gif" border="0">
      <div class="spacer"></div>
	  <button type="submit">Search</button>
      <div class="spacer"></div>
    </form>
  </div>
  <div id="row_space_2"></div>
  <div class="div-table-trip">
  	<div class="div-table-caption">Trip Managagement</div>
    <div class="div-table-operation"><a href="?m=tripfrm&v=tripfrm&tour_id=<?=$tour_id?>"><img src="../images/add.png" border="0" align="absmiddle" /> Add New</a></div>
    <div class="div-table-row">
      <div class="div-table-admin-title-username">Departure</div>
      <div class="div-table-admin-title-username">Arrival</div>
      <div class="div-table-title-status">Person</div>
      <div class="div-table-title-price">Double bed</div>
      <div class="div-table-title-price">Single bed</div>
      <div class="div-table-title-price">Extra bed</div>
      <div class="div-table-title-price">Bed sharing</div>
      <div class="div-table-title-status">Booking</div>
      <div class="div-table-title-status">Status</div>
      <div class="div-table-title-edit">Edit</div>
      <div class="div-table-title-del">Del</div>
    </div>
<?php
if(mysql_num_rows($result) > 0){
	while($row = mysql_fetch_assoc($result)){
?>
    <div class="div-table-row">
      <div class="div-table-admin-data-username"><?=$row[departure_date]?></div>
      <div class="div-table-admin-data-username"><?=$row[arrival_date]?></div>
      <div class="div-table-data-status"><?=number_format($row[num_person])?></div>
      <div class="div-table-data-price"><?=number_format($row[price_double_bed])?></div>
      <div class="div-table-data-price"><?=number_format($row[price_single_bed])?></div>
      <div class="div-table-data-price"><?=number_format($row[price_extra_bed])?></div>
      <div class="div-table-data-price"><?=number_format($row[price_bed_sharing])?></div>
      <div class="div-table-data-status"><a href="?m=bookingfrm&v=bookingfrm&tour_id=<?=$tour_id?>&trip_id=<?=$row[trip_id]?>"><img src="../images/tag_blue_edit.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-status"><?php
      if($row[active_status] == "yes"){
	  	echo '<img src="../images/tick.png" border="0" align="absmiddle" />';
	  }else{
	  	echo '<img src="../images/cross.png" border="0" align="absmiddle" />';
	  }
      ?></div>
      <div class="div-table-data-edit"><a href="?m=tripfrm&v=tripfrm&tour_id=<?=$tour_id?>&trip_id=<?=$row[trip_id]?>"><img src="../images/pencil.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-del"><a href="?m=tripdel&tour_id=<?=$tour_id?>&trip_id=<?=$row[trip_id]?>" onclick="return confirm('Do you want to delete <?=$row[departure_date]?>?');"><img src="../images/delete.png" border="0" align="absmiddle" /></a></div>
    </div>
<?php
	}
}
?>
  </div>
</div>