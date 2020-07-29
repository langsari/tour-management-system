<?php
require_once("../dbconn/openconn.php");


/*start page control*/
$sql = "SELECT COUNT(news_id) AS numpro \n";
$sql .= "FROM t_news  \n";
$sql .= "WHERE news_id != 0 \n";
if($keyword){
	$sql .= "AND (title LIKE '%$keyword%' \n";
	$sql .= "OR desc LIKE '%$keyword%') \n";
}
$sql .= "ORDER BY enter_dtm DESC \n";
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
$sql .= "FROM t_news  \n";
$sql .= "WHERE news_id != 0 \n";
if($keyword){
	$sql .= "AND (title LIKE '%$keyword%' \n";
	$sql .= "OR desc LIKE '%$keyword%') \n";
}
$sql .= "ORDER BY enter_dtm DESC \n";
$sql .= "LIMIT $start, $pl \n";
//echo "<pre>$sql</pre>";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("../dbconn/closeconn.php");
?>