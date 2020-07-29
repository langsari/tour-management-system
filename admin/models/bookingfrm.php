<?php
if(empty($booking_id)){
	exit;
}
require_once("../dbconn/openconn.php");

$sql = "SELECT * \n";
$sql .= "FROM t_booking \n";
$sql .= "WHERE booking_id = '$booking_id' \n";
$booking_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$booking = mysql_fetch_assoc($booking_rs);

$sql = "SELECT * \n";
$sql .= "FROM t_customer \n";
$sql .= "WHERE cus_id = '$booking[cus_id]' \n";
$customer_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$customer = mysql_fetch_assoc($customer_rs);

$sql = "SELECT * \n";
$sql .= "FROM t_trips \n";
$sql .= "WHERE trip_id = '$booking[trip_id]' \n";
$trips_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$trips = mysql_fetch_assoc($trips_rs);

$sql = "SELECT title, detail, banner, doc \n";
$sql .= "FROM t_tours \n";
$sql .= "WHERE tour_id = '$trips[tour_id]' \n";
$tours_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$tours = mysql_fetch_assoc($tours_rs);

$sql = "SELECT num_person \n";
$sql .= "FROM t_booking \n";
$sql .= "WHERE trip_id = '$booking[trip_id]' \n";
$sql .= "AND booking_id != '$booking_id' \n";
$sql .= "AND payment != 'cancel' \n";
$sql .= "ORDER BY trip_id \n";
//echo "<pre>$sql</pre>";
$booking_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
while($row = mysql_fetch_assoc($booking_rs)){
	$num_person += $row[num_person];
}
require_once("../dbconn/closeconn.php");
?>