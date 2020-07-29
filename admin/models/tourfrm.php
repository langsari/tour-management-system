<?php
require_once("../dbconn/openconn.php");
if($tour_id){
	$sql = "SELECT * \n";
	$sql .= "FROM t_tours \n";
	$sql .= "WHERE tour_id = '$tour_id' \n";
	$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
	$row = mysql_fetch_assoc($result);
}
$sql = "SELECT des_id, des_name \n";
$sql .= "FROM t_tour_destination \n";
$sql .= "ORDER BY des_name \n";
$rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
require_once("../dbconn/closeconn.php");
?>