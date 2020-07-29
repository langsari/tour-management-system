<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($admin_id) || trim($admin_id)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Not found admin ID.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=admin&v=admin\">";
	exit;
}
require_once("../dbconn/openconn.php");

$sql = "DELETE FROM t_admin \n";
$sql .= "WHERE admin_id = '$admin_id' \n";
mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Delete data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=admin&v=admin\">";
exit;
?>