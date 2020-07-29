<?php
if(empty($booking_code)){
	exit;
}
echo "<img src=\"images/loading.gif\"/>";

require_once("dbconn/openconn.php");

//do cancel booking
$sql = "UPDATE t_booking SET \n";
$sql .= "payment = 'cancel', \n";
$sql .= "booking_dtm = booking_dtm \n";
$sql .= "WHERE booking_code = '$booking_code' \n";
mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Cancel booking successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=bookinginfo&v=bookinginfo&booking_code=$booking_code\">";
exit;

?>