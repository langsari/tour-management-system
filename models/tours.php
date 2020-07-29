<?php
require_once("dbconn/openconn.php");
require_once("models/homeleft.php");

/*start page control*/
$sql = "SELECT COUNT(tour_id) AS numpro \n";
$sql .= "FROM t_tours \n";
$sql .= "WHERE active_status = 'yes' \n";
if($des_id){
	$sql .= "AND des_id = '$des_id' \n";
}
if($title){
	$sql .= "AND (title LIKE '%$title%' \n";
	$sql .= "OR detail LIKE '%$title%') \n";
}
$sql .= "ORDER BY title \n";
$tours_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
if(mysql_num_rows($tours_rs)>0){
	$fc = mysql_fetch_assoc($tours_rs);
	$numpro = $fc[numpro];
}else{
	$numpro = 0;
}
$pl = 10; //page limit
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
$sql .= "WHERE active_status = 'yes' \n";
if($des_id){
	$sql .= "AND des_id = '$des_id' \n";
}
if($title){
	$sql .= "AND ( title LIKE '%$title%' \n";
	$sql .= "OR detail LIKE '%$title%') \n";
}
$sql .= "ORDER BY title \n";
$sql .= "LIMIT $start, $pl \n";
//echo "<pre>$sql</pre>";
$tours_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("models/homeright.php");
require_once("dbconn/closeconn.php");
?>