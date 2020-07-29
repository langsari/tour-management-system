<?php
if(empty($booking_code)){
	exit;
}
require_once("dbconn/openconn.php");
require_once("models/homeleft.php");

$sql = "SELECT * \n";
$sql .= "FROM t_booking \n";
$sql .= "WHERE booking_code = '$booking_code' \n";
$rsbooking = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$booking = mysql_fetch_assoc($rsbooking);

$sql = "SELECT * \n";
$sql .= "FROM t_customer \n";
$sql .= "WHERE cus_id = '$booking[cus_id]' \n";
$rscustomer = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$customer = mysql_fetch_assoc($rscustomer);

$sql = "SELECT * \n";
$sql .= "FROM t_trips \n";
$sql .= "WHERE trip_id = '$booking[trip_id]' \n";
$rstrips = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$trips = mysql_fetch_assoc($rstrips);

$sql = "SELECT title, detail, banner, doc \n";
$sql .= "FROM t_tours \n";
$sql .= "WHERE tour_id = '".$trips[tour_id]."' \n";
$rstour = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$tours = mysql_fetch_assoc($rstour);

require_once("dbconn/closeconn.php");
?>