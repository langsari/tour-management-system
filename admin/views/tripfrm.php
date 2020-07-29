<SCRIPT language="javascript" src="../js/ts_picker.js" type="text/javascript"></SCRIPT>
<div id="wrapper">
  <div id="row_space_1"></div>
  <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="?m=tripsave" onSubmit="return validateTripFrm();">
      <input type="hidden" name="tour_id" id="tour_id" value="<?=$tour_id?>" />
      <input type="hidden" name="trip_id" id="trip_id" value="<?=$trip_id?>" />
      <h1>Trip</h1>
      <p><?=$tours[title]?> | You can add or update trip detail here.</p>
      <label>Departure <span class="small">Select departure date</span> </label>
      <input name="departure_date" type="text" id="departure_date" value="<?=$row[departure_date]?>" style="width:100px;" /> <img onClick="show_calendar('form.departure_date');" style="cursor:pointer;padding:5px;" src="../images/cal.gif" border="0">
      <div class="spacer"></div>
      <label>Arrival <span class="small">Select arrival date</span> </label>
      <input type="text" name="arrival_date" id="arrival_date" value="<?=$row[arrival_date]?>" style="width:100px;" /> <img onClick="show_calendar('form.arrival_date');" style="cursor:pointer;padding:5px;" src="../images/cal.gif" border="0">
      <div class="spacer"></div>
      <label>Person <span class="small">Type number of traveler</span> </label>
      <input type="text" name="num_person" id="num_person" value="<?=$row[num_person]?>" style="width:50px;" />
      <div class="spacer"></div>
      <label>Double bed <span class="small">Adult double bed price</span> </label>
      <input type="text" name="price_double_bed" id="price_double_bed" value="<?=$row[price_double_bed]?>" style="width:100px;" />
      <div class="spacer"></div>
      <label>Single bed<span class="small">Adult single bed price</span></label>
      <input type="text" name="price_single_bed" id="price_single_bed" value="<?=$row[price_single_bed]?>" style="width:100px;" />
      <div class="spacer"></div>
      <label>Extra bed <span class="small">Child with extra bed price</span> </label>
      <input type="text" name="price_extra_bed" id="price_extra_bed" value="<?=$row[price_extra_bed]?>" style="width:100px;" />
      <div class="spacer"></div>
      <label>Bed sharing<span class="small">Child bed sharing price</span></label>
      <input type="text" name="price_bed_sharing" id="price_bed_sharing" value="<?=$row[price_bed_sharing]?>" style="width:100px;" />
      <div class="spacer"></div>
      <label>Status<span class="small">Set active status</span></label>
      <select name="active_status" id="active_status">
      <option value="yes" <?php if($row[active_status]=='yes'){ echo "selected"; } ?>>yes</option>
      <option value="no" <?php if($row[active_status]=='no'){ echo "selected"; } ?>>no</option>
      </select>
	  <button type="submit">Save</button>
      <div class="spacer"></div>
    </form>
  </div>
</div>