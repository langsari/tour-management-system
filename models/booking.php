<?php
if(empty($tour_id)){
	exit;
}
require_once("dbconn/openconn.php");
require_once("models/homeleft.php");

$sql = "SELECT title, detail, banner, doc \n";
$sql .= "FROM t_tours \n";
$sql .= "WHERE tour_id = '$tour_id' \n";
$rstour = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$tours = mysql_fetch_assoc($rstour);
$sql = "SELECT * \n";
$sql .= "FROM t_trips \n";
$sql .= "WHERE tour_id = '$tour_id' \n";
$sql .= "AND departure_date >= '".date("Y-m-d")."' \n";
$sql .= "ORDER BY departure_date \n";
//echo "<pre>$sql</pre>";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

if(mysql_num_rows($result)>0){
	while($row = mysql_fetch_assoc($result)){
		$str_trip_id .= "'".$row[trip_id]."',";
	}
	$str_trip_id = substr($str_trip_id,0,strlen($str_trip_id)-1);
	
	$sql = "SELECT * \n";
	$sql .= "FROM t_booking \n";
	$sql .= "WHERE trip_id IN ($str_trip_id) \n";
	$sql .= "AND payment != 'cancel' \n";
	$sql .= "ORDER BY trip_id \n";
	$booking_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
	while($row = mysql_fetch_assoc($booking_rs)){
		$num_person[$row[trip_id]] += $row[num_person];
	}
	mysql_data_seek($result,0);
}

require_once("dbconn/closeconn.php");
?>