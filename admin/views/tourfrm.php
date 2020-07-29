<div id="wrapper">
  <div id="row_space_1"></div>
  <div id="stylized2" class="myform2">
    <form action="?m=toursave" method="post" enctype="multipart/form-data" name="form" id="form" onSubmit="return validateTourFrm();">
      <input type="hidden" name="tour_id" id="tour_id" value="<?=$tour_id?>" />
      <h1>Tour program</h1>
      <p>You can add or update tour detail here. *note: for update tour detail if you don't need to change new document or banner, please leave the box empty.</p>
      <label>Place <span class="small">Select place</span> </label>
      <select name="des_id" id="des_id">
      <?php
      while($rec=mysql_fetch_assoc($rs)){
		  if($rec[des_id]==$des_id){
			  $select= "selected";
		  }else{
			  $select = "";
		  }
		  echo "<option value=\"$rec[des_id]\" $select>$rec[des_name]</option>";
	  }
	  ?>
      </select>
      <div class="spacer"></div>
      <label>Tour title <span class="small">Type tour title</span> </label>
      <input name="title" type="text" id="title" value="<?=$row[title]?>" />
      <label>Description <span class="small">Type tour description</span> </label>
      <textarea name="detail" rows="10" id="detail"><?=$row[detail]?></textarea>
      <div class="spacer"></div>
      <label>Travel date<span class="small">Type number of date</span> </label>
      <input type="text" name="num_date" id="num_date" value="<?=$row[num_date]?>" style="width:50px;" />
      <div class="spacer"></div>
      <label>Banner<span class="small">Image size 260 x 217 pixel</span></label>
      <input type="file" name="banner" id="banner" />
      <label>Document <span class="small">PDF file with name in English</span> </label>
      <input type="file" name="doc" id="doc" />
      <div class="spacer"></div>
	  <label>Status<span class="small">Set active status</span></label>
      <select name="active_status" id="active_status">
      <option value="yes" <?php if($row[active_status]=='yes'){ echo "selected"; } ?>>yes</option>
      <option value="no" <?php if($row[active_status]=='no'){ echo "selected"; } ?>>no</option>
      </select>
      <div class="spacer"></div>
	  <button type="submit">Save</button>
      <div class="spacer"></div>
    </form>
  </div>
</div>