<?php
if(empty($tour_id)){
	exit;
}
require_once("../dbconn/openconn.php");
if($prog_id){
	$sql = "SELECT title_id, period, detail \n";
	$sql .= "FROM t_tour_day_program \n";
	$sql .= "WHERE prog_id = '$prog_id' \n";
	$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
	$row = mysql_fetch_assoc($result);
}
$sql = "SELECT title_id, day_title \n";
$sql .= "FROM t_tour_day_title \n";
$sql .= "WHERE tour_id = '$tour_id' \n";
$sql .= "ORDER BY title_id \n";
$rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
require_once("../dbconn/closeconn.php");
?>