<?php
if(empty($trip_id)){
	exit;
}
if($num_double_bed+$num_single_bed==0){
	exit;
}
require_once("dbconn/openconn.php");
require_once("models/homeleft.php");

$sql = "SELECT * \n";
$sql .= "FROM t_trips \n";
$sql .= "WHERE trip_id = '$trip_id' \n";
$rstrips = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$trips = mysql_fetch_assoc($rstrips);

$sql = "SELECT title, detail, banner, doc \n";
$sql .= "FROM t_tours \n";
$sql .= "WHERE tour_id = '".$trips[tour_id]."' \n";
$rstour = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$tours = mysql_fetch_assoc($rstour);

require_once("dbconn/closeconn.php");
?>