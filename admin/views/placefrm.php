<div id="wrapper">
  <div id="row_space_1"></div>
  <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="?m=placesave" onSubmit="return validatePlaceFrm();">
      <input type="hidden" name="des_id" value="<?=$row[des_id]?>" />
      <h1>Place Detail</h1>
      <p>You can add new or update old place here.</p>
      <label>Place <span class="small">Type place name</span> </label>
      <input type="text" name="des_name" id="des_name" value="<?=$row[des_name]?>" />
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