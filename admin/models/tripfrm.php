<?php
if(empty($tour_id)){
	exit;
}
require_once("../dbconn/openconn.php");
$sql = "SELECT * \n";
$sql .= "FROM t_tours \n";
$sql .= "WHERE tour_id = '$tour_id' \n";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$tours = mysql_fetch_assoc($result);
if($trip_id){
	$sql = "SELECT * \n";
	$sql .= "FROM t_trips \n";
	$sql .= "WHERE trip_id = '$trip_id' \n";
	$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
	$row = mysql_fetch_assoc($result);
}
require_once("../dbconn/closeconn.php");
?>