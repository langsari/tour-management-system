<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($curpwd) || trim($curpwd)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert your current password.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=changepwd\">";
	exit;
}
if(empty($newpwd) || trim($newpwd)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert your new password.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=changepwd\">";
	exit;
}
if(empty($confpwd) || trim($confpwd)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert your confirm password.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=changepwd\">";
	exit;
}
if($newpwd != $confpwd){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Your new password is not match with confirm new password.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=changepwd\">";
	exit;
}

require_once("../dbconn/openconn.php");

$sql = "SELECT * \n";
$sql .= "FROM t_admin \n";
$sql .= "WHERE admin_id = '".$_SESSION['admin_id']."' \n";
$sql .= "AND pass_word = PASSWORD('$curpwd') \n";
$result = mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
if(mysql_num_rows($result)>0){
	$sql = "UPDATE t_admin SET \n";
	$sql .= "pass_word = PASSWORD('$newpwd') \n";
	$sql .= "WHERE admin_id = '".$_SESSION['admin_id']."' \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}else{
	require_once("../dbconn/closeconn.php");
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Invalid your current password.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=changepwd\">";
	exit;
}
require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Your password has been changed !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=changepwd\">";
exit;
?>