<?php
if(empty($tour_id)){
	exit;
}
if($title_id){
	require_once("../dbconn/openconn.php");
	$sql = "SELECT * \n";
	$sql .= "FROM t_tour_day_title \n";
	$sql .= "WHERE title_id = '$title_id' \n";
	$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
	$row = mysql_fetch_assoc($result);
	require_once("../dbconn/closeconn.php");
}
?>