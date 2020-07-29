<?php
require_once("../dbconn/openconn.php");
if($news_id){
	$sql = "SELECT * \n";
	$sql .= "FROM t_news \n";
	$sql .= "WHERE news_id = '$news_id' \n";
	$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
	$row = mysql_fetch_assoc($result);
}
require_once("../dbconn/closeconn.php");
?>