<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teerati Tour</title>
<link href="../css/style-admin.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/script.js"></script>
</head>

<body>
<div id="admin_header">
<?php
if($_SESSION['LOGEDIN'] == "TRUE"){
?>
  <ul id="menu">
    <li><a href="?m=admin&v=admin">Account</a></li>
    <li><a href="?m=place&v=place">Place</a></li>
    <li><a href="?m=tours&v=tours">Tours</a></li>
    <li><a href="?m=booking&v=booking">Booking</a></li>
    <li><a href="?m=news&v=news">News</a></li>
    <li><a href="?m=gallery&v=gallery">Gallery</a></li>
    <li><a href="?m=profile&v=profile">Update Profile</a></li>
    <li><a href="?v=changepwd">Change Password</a></li>
    <li><a href="?m=logout">Logout</a></li>
  </ul>
<?php
}
?>
</div>