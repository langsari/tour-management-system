<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($user_name) || trim($user_name)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\"> Invalid login, permission denied.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=index.php\">";
	exit;
}
if(empty($pass_word) || trim($pass_word)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Invalid login, permission denied.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=index.php\">";
	exit;
}

require_once("../dbconn/openconn.php");

$sql = "SELECT * \n";
$sql .= "FROM t_admin \n";
$sql .= "WHERE user_name = '$user_name' \n";
$sql .= "AND pass_word = PASSWORD('$pass_word') \n";
$sql .= "AND active_status = 'yes' \n";
//echo "<pre>$sql</pre>";
$result = mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
if(mysql_num_rows($result)==0){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Invalid login, permission denied.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=index.php\">";
	exit;
}

$admin = mysql_fetch_assoc($result);

$_SESSION['LOGEDIN'] = "TRUE";
$_SESSION['admin_id'] = $admin[admin_id];
$_SESSION['user_name'] = $admin[user_name];
$_SESSION['fullname'] = $admin[fullname];

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Login...</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"1;url=?v=welcome\">";
exit;
?>