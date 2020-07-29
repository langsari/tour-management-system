<?php
if(empty($tour_id)){
	exit;
}
require_once("../dbconn/openconn.php");
$sql = "SELECT title, detail \n";
$sql .= "FROM t_tours \n";
$sql .= "WHERE tour_id = '$tour_id' \n";
$rstour = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$tours = mysql_fetch_assoc($rstour);
$sql = "SELECT * \n";
$sql .= "FROM t_trips \n";
$sql .= "WHERE tour_id = '$tour_id' \n";
if($departurefrom && $departureto){
	$sql .= "AND departure_date BETWEEN '".trim($departurefrom)."' AND '".trim($departureto)."' \n";
}else{
	$sql .= "AND departure_date >= '".date("Y-m-d")."' \n";
}
$sql .= "ORDER BY departure_date \n";
//echo "<pre>$sql</pre>";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
require_once("../dbconn/closeconn.php");
?>