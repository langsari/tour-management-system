<?php
if($des_id){
	require_once("../dbconn/openconn.php");
	$sql = "SELECT * \n";
	$sql .= "FROM t_tour_destination \n";
	$sql .= "WHERE des_id = '$des_id' \n";
	$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
	$row = mysql_fetch_assoc($result);
	require_once("../dbconn/closeconn.php");
}
?>