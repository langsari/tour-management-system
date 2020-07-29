<div id="wrapper">
  <div id="row_space_1"></div>
  <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="?m=updateprofile" onSubmit="return validateProfile();">
      <h1>Your Profile</h1>
      <p>You can update you profile here.</p>
      <label>Name <span class="small">Type your name</span> </label>
      <input type="text" name="fullname" id="fullname" value="<?=$row[fullname]?>" />
      <label>Address<span class="small">Type your address</span></label>
      <input type="text" name="address" id="address" value="<?=$row[address]?>" />
      <label>Tel <span class="small">Type your telephone</span> </label>
      <input type="text" name="tel" id="tel" value="<?=$row[tel]?>" />
      <label>Email<span class="small">Type your email</span></label>
      <input type="text" name="email" id="email" value="<?=$row[email]?>" />
      <button type="submit">Save</button>
      <div class="spacer"></div>
    </form>
  </div>
</div>