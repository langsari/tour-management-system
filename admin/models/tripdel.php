<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($tour_id)){
	exit;
}
if(empty($trip_id) || trim($trip_id)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Not found trip ID.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=trip&v=trip&tour_id=$tour_id\">";
	exit;
}
require_once("../dbconn/openconn.php");

$sql = "DELETE FROM t_trips \n";
$sql .= "WHERE trip_id = '$trip_id' \n";
mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Delete data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=trip&v=trip&tour_id=$tour_id\">";
exit;
?>