<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($fullname) || trim($fullname)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert your name.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=profile&v=profile\">";
	exit;
}
if(empty($address) || trim($address)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert your address.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=profile&v=profile\">";
	exit;
}
if(empty($tel) || trim($tel)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert your telephone.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=profile&v=profile\">";
	exit;
}
if(empty($email) || trim($email)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert your email.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=profile&v=profile\">";
	exit;
}

require_once("../dbconn/openconn.php");

$sql = "UPDATE t_admin SET \n";
$sql .= "fullname = '$fullname', \n";
$sql .= "address = '$address', \n";
$sql .= "tel = '$tel', \n";
$sql .= "email = '$email' \n";
$sql .= "WHERE admin_id = '".$_SESSION['admin_id']."' \n";
mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Save data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=profile&v=profile\">";
exit;
?>