<div id="wrapper">
  <div id="row_space_1"></div>
  <div id="stylized2" class="myform2">
    <form action="?m=dayprogramsave" method="post" name="form" id="form" onSubmit="return validateDayProgramFrm();">
      <input type="hidden" name="tour_id" id="tour_id" value="<?=$tour_id?>" />
      <input type="hidden" name="prog_id" id="prog_id" value="<?=$prog_id?>" />
      <h1>Day program</h1>
      <p>You can add or update day program detail here.</p>
      <label>Day title <span class="small">Select day title</span> </label>
      <select name="title_id" id="title_id" style="width:350px;">
      <?php
      while($rec=mysql_fetch_assoc($rs)){
		  if($rec[title_id]==$row[title_id]){
			  $select= "selected";
		  }else{
			  $select = "";
		  }
		  echo "<option value=\"$rec[title_id]\" $select>$rec[day_title]</option>";
	  }
	  ?>
      </select>
      <div class="spacer"></div>
      <label>Period <span class="small">Type period</span> </label>
      <input name="period" type="text" id="title" value="<?=$row[period]?>" />
      <label>Description <span class="small">Type program description</span> </label>
      <textarea name="detail" rows="10" id="detail"><?=$row[detail]?></textarea>
      <div class="spacer"></div>
	  <button type="submit">Save</button>
      <div class="spacer"></div>
    </form>
  </div>
</div>