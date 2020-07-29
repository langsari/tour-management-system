<?php
require_once("../dbconn/openconn.php");


/*start page control*/
$sql = "SELECT COUNT(cus_id) AS numpro \n";
$sql .= "FROM t_customer \n";
$sql .= "WHERE cus_id != 0 \n";
if($cus_type && $cus_type != "all"){
	$sql .= "AND cus_type = '$cus_type' \n";
}
if($keyword){
	$sql .= "AND (user_name LIKE '%$keyword%' \n";
	$sql .= "OR fullname LIKE '%$keyword%' \n";
	$sql .= "OR comp_name LIKE '%$keyword%' \n";
	$sql .= "OR tel LIKE '%$keyword%' \n";
	$sql .= "OR email LIKE '%$keyword%') \n";
}
$sql .= "ORDER BY user_name \n";
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
$sql .= "FROM t_customer \n";
$sql .= "WHERE cus_id != 0 \n";
if($cus_type && $cus_type != "all"){
	$sql .= "AND cus_type = '$cus_type' \n";
}
if($keyword){
	$sql .= "AND (user_name LIKE '%$keyword%' \n";
	$sql .= "OR fullname LIKE '%$keyword%' \n";
	$sql .= "OR comp_name LIKE '%$keyword%' \n";
	$sql .= "OR tel LIKE '%$keyword%' \n";
	$sql .= "OR email LIKE '%$keyword%') \n";
}
$sql .= "ORDER BY user_name \n";
$sql .= "LIMIT $start, $pl \n";
//echo "<pre>$sql</pre>";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("../dbconn/closeconn.php");
?>