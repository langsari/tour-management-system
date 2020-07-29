<?php 
if(empty($cus_id)){
	$xajax->printJavascript( "../xajax/" );
}
?>
<div id="wrapper">
  <div id="row_space_1"></div>
  <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="?m=customersave" onSubmit="return validateCustomerFrm();">
      <input type="hidden" name="cus_id" id="cus_id" value="<?=$cus_id?>" />
      <h1>Customer profile</h1>
      <p>You can add or update customer profile here. *note: for update customer profile if you don't need to change new password, please leave password box empty.</p>
      <label>Username <span class="small">Type customer username</span> </label>
      <input name="user_name" type="text" id="user_name" value="<?=$row[user_name]?>" <?php if($cus_id){ echo "readonly=\"readonly\""; } ?> />
<?php
if(empty($cus_id)){
?>
      <label style="cursor:pointer;" onclick="xajax_usernameavailable(document.getElementById('user_name').value);">Check Available<img src="../images/spellcheck.png" width="16" height="16" /><span class="small">Click to available username?</span> </label>
      <input type="text" name="available" id="available" value="" readonly="readonly" style="background-color:#ebf4fb;text-align:center;color:green;" />
<?
}
?>
      <label>Password <span class="small">Type customer password</span> </label>
      <input type="password" name="pass_word" id="pass_word" />
      <label>Name <span class="small">Type customer name</span> </label>
      <input type="text" name="fullname" id="fullname" value="<?=$row[fullname]?>" />
      <label>Company <span class="small">Type company name</span> </label>
      <input type="text" name="comp_name" id="comp_name" value="<?=$row[comp_name]?>" />
      <label>Address<span class="small">Type customer address</span></label>
      <input type="text" name="address" id="address" value="<?=$row[address]?>" />
      <label>Tel <span class="small">Type customer telephone</span> </label>
      <input type="text" name="tel" id="tel" value="<?=$row[tel]?>" />
      <label>Email<span class="small">Type customer email</span></label>
      <input type="text" name="email" id="email" value="<?=$row[email]?>" />
      <label>Type<span class="small">Set customer type</span></label>
      <select name="cus_type" id="cus_type">
      <option value="personal" <?php if($row[cus_type]=='personal'){ echo "selected"; } ?>>personal</option>
      <option value="agency" <?php if($row[cus_type]=='agency'){ echo "selected"; } ?>>agency</option>
      </select>
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