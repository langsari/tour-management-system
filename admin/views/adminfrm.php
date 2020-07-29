<?php 
if(empty($admin_id)){
	$xajax->printJavascript( "../xajax/" );
}
?>
<div id="wrapper">
  <div id="row_space_1"></div>
  <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="?m=adminsave" onSubmit="return validateAdminFrm();">
      <input type="hidden" name="admin_id" id="admin_id" value="<?=$admin_id?>" />
      <h1>Admin profile</h1>
      <p>You can add or update admin profile here. *note: for update admin profile if you don't need to change new password, please leave password box empty.</p>
      <label>Username <span class="small">Type admin username</span> </label>
      <input name="user_name" type="text" id="user_name" value="<?=$row[user_name]?>" <?php if($admin_id){ echo "readonly=\"readonly\""; } ?> />
<?php
if(empty($admin_id)){
?>
      <label style="cursor:pointer;" onclick="xajax_usernameavailable(document.getElementById('user_name').value);">Check Available<img src="../images/spellcheck.png" width="16" height="16" /><span class="small">Click to available username?</span> </label>
      <input type="text" name="available" id="available" value="" readonly="readonly" style="background-color:#ebf4fb;text-align:center;color:green;" />
<?
}
?>
      <label>Password <span class="small">Type admin password</span> </label>
      <input type="password" name="pass_word" id="pass_word" />
      <label>Name <span class="small">Type admin name</span> </label>
      <input type="text" name="fullname" id="fullname" value="<?=$row[fullname]?>" />
      <label>Address<span class="small">Type admin address</span></label>
      <input type="text" name="address" id="address" value="<?=$row[address]?>" />
      <label>Tel <span class="small">Type admin telephone</span> </label>
      <input type="text" name="tel" id="tel" value="<?=$row[tel]?>" />
      <label>Email<span class="small">Type admin email</span></label>
      <input type="text" name="email" id="email" value="<?=$row[email]?>" />
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