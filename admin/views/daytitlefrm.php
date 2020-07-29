<div id="wrapper">
  <div id="row_space_1"></div>
  <div id="stylized2" class="myform2">
    <form action="?m=daytitlesave" method="post" name="form" id="form" onSubmit="return validateDayTitleFrm();">
      <input type="hidden" name="tour_id" id="tour_id" value="<?=$tour_id?>" />
      <input type="hidden" name="title_id" id="title_id" value="<?=$title_id?>" />
      <h1>Day title</h1>
      <p>You can add or update day title here.</p>
      <label>Day title <span class="small">Type title of the day</span> </label>
      <input name="day_title" type="text" id="day_title" value="<?=$row[day_title]?>" />
	  <button type="submit">Save</button>
      <div class="spacer"></div>
    </form>
  </div>
</div>