<?php
require_once("dbconn/openconn.php");
require_once("models/homeleft.php");

/*start page control*/
$sql = "SELECT COUNT(news_id) AS numpro \n";
$sql .= "FROM t_news \n";
$sql .= "ORDER BY enter_dtm DESC \n";
$news_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
if(mysql_num_rows($news_rs)>0){
	$fc = mysql_fetch_assoc($news_rs);
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
$sql .= "FROM t_news \n";
$sql .= "ORDER BY enter_dtm DESC \n";
$sql .= "LIMIT $start, $pl \n";
//echo "<pre>$sql</pre>";
$news_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("dbconn/closeconn.php");
?>