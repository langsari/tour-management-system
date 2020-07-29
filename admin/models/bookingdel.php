<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($booking_id) || trim($booking_id)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Not found Booking ID.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=booking&v=booking&des_id=$des_id&pn=$pn&keyword=$keyword&tour_id=$tour_id&departurefrom=$departurefrom&departureto=$departureto\">";
	exit;
}
require_once("../dbconn/openconn.php");

$sql = "SELECT cus_id \n";
$sql .= "FROM t_booking \n";
$sql .= "WHERE booking_id = '$booking_id' \n";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
if(mysql_num_rows($result)==0){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Not found Booking ID.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=booking&v=booking&des_id=$des_id&pn=$pn&keyword=$keyword&tour_id=$tour_id&departurefrom=$departurefrom&departureto=$departureto\">";
	exit;
}
$booking = mysql_fetch_assoc($result);

//Delete customer
$sql = "DELETE FROM t_customer \n";
$sql .= "WHERE cus_id = '$booking[cus_id]' \n";
mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

//Delete booking
$sql = "DELETE FROM t_booking \n";
$sql .= "WHERE booking_id = '$booking_id' \n";
mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Delete data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=booking&v=booking&des_id=$des_id&pn=$pn&keyword=$keyword&tour_id=$tour_id&departurefrom=$departurefrom&departureto=$departureto\">";
exit;
?>