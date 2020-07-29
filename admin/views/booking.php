<SCRIPT language="javascript" src="../js/ts_picker.js" type="text/javascript"></SCRIPT>
<div id="wrapper" align="center">
  <div id="row_space_1"></div>
  <div class="spacer"></div>
  <div id="stylized2" class="myform2">
    <form id="form" name="form" method="post" action="?m=booking&v=booking">
      <h1>Search booking</h1>
      <p>You can type any keyword or select type of tours and trips date then click search button.</p>
      <label>Place<span class="small">Select tour place </span></label>
      <select name="des_id" id="des_id" onchange="form.submit();">
      <option value="all">all places</option>
<?php
while($des = mysql_fetch_assoc($des_rs)){
	if($des_id == $des[des_id]){
		$select = "selected";
	}else{
		$select = "";
	}
	echo "<option value=\"$des[des_id]\" $select>$des[des_name]</option>";
}
?>
      </select>
      <div class="spacer"></div>
      <label>Tour<span class="small">Select tour </span></label>
      <select name="tour_id" id="tour_id" style="width:350px;" onchange="form.submit();">
      <option value="all">all tours</option>
<?php
while($tours =  mysql_fetch_assoc($tours_rs)){
	if($tours[tour_id] == $tour_id){
		$select = "selected";
	}else{
		$select = "";
	}
	echo "<option value=\"$tours[tour_id]\" $select>$tours[title]</option>";
}
?>
      </select>
      <div class="spacer"></div>
      <label>Date form <span class="small">Select departure date from</span> </label>
      <input type="text" name="departurefrom" id="departurefrom" value="<?=$departurefrom?>" style="width:100px;" /> <img onClick="show_calendar('form.departurefrom');" style="cursor:pointer;padding:5px;" src="../images/cal.gif" border="0">
      <div class="spacer"></div>
      <label>Date to <span class="small">Select departure date to</span></label>
      <input type="text" name="departureto" id="departureto" value="<?=$departureto?>" style="width:100px;" /> <img onClick="show_calendar('form.departureto');" style="cursor:pointer;padding:5px;" src="../images/cal.gif" border="0">
      <div class="spacer"></div>
      <label>Keyword <span class="small">Type your keyword</span> </label>
      <input type="text" name="keyword" id="keyword" value="<?=$keyword?>" />
      <div class="spacer"></div>
	  <button type="submit">Search</button>
      <div class="spacer"></div>
    </form>
  </div>
  <div id="row_space_2"></div>
  <div class="div-table-customer">
  	<div class="div-table-caption">Booking Managagement</div>
  	<div class="div-table-row">
      <div class="div-table-booking-title-date">Depart</div>
      <div class="div-table-booking-title-tour">Tour</div>      
      <div class="div-table-booking-title-date">B.Code</div>
      <div class="div-table-booking-title-name">Customer</div>
      <div class="div-table-title-edit">person</div>
      <div class="div-table-title-status">Total</div>
      <div class="div-table-title-status">Payment</div>
      <div class="div-table-title-edit">Edit</div>
      <div class="div-table-title-del">Del</div>
    </div>
<?php
while($row = mysql_fetch_assoc($result)){
	if($row[payment]=="yes"){
		$color = "#339900";
	}elseif($row[payment]=="cancel"){
		$color = "#CC0000";
	}else{
		$color = "#666666";
	}
?>
    <div class="div-table-row">
      <div class="div-table-booking-data-date"><?=$row[departure_date]?></div>
      <div class="div-table-booking-data-tour"><?=$row[title]?></div>
      <div class="div-table-booking-data-date"><?=$row[booking_code]?></div>
      <div class="div-table-booking-data-name"><?=$row[fullname]?></div>
      <div class="div-table-data-edit"><?=$row[num_person]?></div>
      <div class="div-table-data-status"><?=number_format($row[total_price])?></div>
      <div class="div-table-data-status"><font color="<?=$color?>"><?=$row[payment]?></font></div>
      <div class="div-table-data-edit"><a href="?m=bookingfrm&v=bookingfrm&booking_id=<?=$row[booking_id]?>&des_id=<?=$des_id?>&pn=<?=$i?>&keyword=<?=$keyword?>&tour_id=<?=$tour_id?>&departurefrom=<?=$departurefrom?>&departureto=<?=$departureto?>"><img src="../images/pencil.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-del"><a href="?m=bookingdel&booking_id=<?=$row[booking_id]?>&des_id=<?=$des_id?>&pn=<?=$i?>&keyword=<?=$keyword?>&tour_id=<?=$tour_id?>&departurefrom=<?=$departurefrom?>&departureto=<?=$departureto?>" onclick="return confirm('Do you want to delete <?=$row[booking_code]?>?');"><img src="../images/delete.png" border="0" align="absmiddle" /></a></div>
    </div>
<?php
}
?>
  </div>
  <div class="div-page-customer">
  <div id="page">Page <?php
  		$numpage = ceil($numpro/$pl);
		for($i=1;$i<=$numpage;$i++){
			if($pn==$i){
				echo $i." ";
			}else{
				echo "<a href=\"?m=booking&v=booking&des_id=$des_id&pn=$i&keyword=$keyword&tour_id=$tour_id&departurefrom=$departurefrom&departureto=$departureto\">".$i."</a> ";
			}
		}
		?></div>
  </div>
</div>