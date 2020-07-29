<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($cus_id) || trim($cus_id)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Not found customer ID.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=customer&v=customer\">";
	exit;
}
require_once("../dbconn/openconn.php");

$sql = "DELETE FROM t_customer \n";
$sql .= "WHERE cus_id = '$cus_id' \n";
mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Delete data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=customer&v=customer\">";
exit;
?>