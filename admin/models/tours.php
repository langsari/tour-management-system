<?php
require_once("../dbconn/openconn.php");

/*start page control*/
$sql = "SELECT COUNT(tour_id) AS numpro \n";
$sql .= "FROM t_tours \n";
$sql .= "WHERE tour_id != 0 \n";
if($keyword){
	$sql .= "AND (title LIKE '%$keyword%' \n";
	$sql .= "OR detail LIKE '%$keyword%') \n";
}
$sql .= "ORDER BY title \n";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
if(mysql_num_rows($result)>0){
	$fc = mysql_fetch_assoc($result);
	$numpro = $fc[numpro];
}else{
	$numpro = 0;
}
$pl = 30; //page limit
if(empty($pn)){
	$pn = 1; //page number
}
if($numpro < $pl){
	$pn = 1;
}
$start = ($pn*$pl)-$pl;
/*end page control*/

$sql = "SELECT * \n";
$sql .= "FROM t_tours \n";
$sql .= "WHERE tour_id != 0 \n";
if($keyword){
	$sql .= "AND (title LIKE '%$keyword%' \n";
	$sql .= "OR detail LIKE '%$keyword%') \n";
}
$sql .= "ORDER BY create_dtm DESC \n";
//echo "<pre>$sql</pre>";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("../dbconn/closeconn.php");
?>