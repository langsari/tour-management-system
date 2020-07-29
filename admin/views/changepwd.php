<div id="wrapper">
  <div id="row_space_1"></div>
  <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="?m=changepwd" onSubmit="return validateChangePWD();">
      <h1>Change Your Password</h1>
      <p>You can change your password here.</p>
      <label>Current Password <span class="small">Type your current password</span> </label>
      <input type="password" name="curpwd" id="curpwd" />
      <label>New Password<span class="small">Type your new password</span></label>
      <input type="password" name="newpwd" id="newpwd" />
      <label>Confirm Password <span class="small">Confirm your new password</span> </label>
      <input type="password" name="confpwd" id="confpwd" />
      <button type="submit">Change</button>
      <div class="spacer"></div>
    </form>
  </div>
</div>