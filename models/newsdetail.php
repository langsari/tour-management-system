<?php
if(empty($news_id)){
	exit;
}
require_once("dbconn/openconn.php");
require_once("models/homeleft.php");

$sql = "SELECT * \n";
$sql .= "FROM t_news \n";
$sql .= "WHERE news_id = '$news_id' \n";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$news = mysql_fetch_assoc($result);

require_once("dbconn/closeconn.php");
?>