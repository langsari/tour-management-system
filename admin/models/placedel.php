<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($des_id) || trim($des_id)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Not found Place ID.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=place&v=place\">";
	exit;
}
require_once("../dbconn/openconn.php");

$sql = "DELETE FROM t_tour_destination \n";
$sql .= "WHERE des_id = '$des_id' \n";
mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Delete data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=place&v=place\">";
exit;
?>