<div id="footer">
  <div>
<?php
if($_SESSION['LOGEDIN'] == "TRUE"){
?>
 <a href="?m=admin&v=admin">Account</a> | <a href="?m=place&v=place">Place</a> | <a href="?m=tours&v=tours">Tours</a> | <a href="?m=booking&v=booking">Booking</a> | <a href="?m=news&v=news">News</a> | <a href="?m=gallery&v=gallery">Gallery</a> | <a href="?m=profile&v=profile">Update Profile</a> | <a href="?v=changepwd">Change Password</a> | <a href="?m=logout">Logout</a>
<?php
}else{
?>
&nbsp;
<?php
}
?>
  </div>
  <p id="copy">Copyright &copy; Teerati Tour. All rights reserved.</p>
</div>
</body>
</html>