<?php
require_once("../dbconn/openconn.php");
$sql = "SELECT * \n";
$sql .= "FROM t_gallery \n";
$sql .= "ORDER BY enter_dtm DESC \n";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
require_once("../dbconn/closeconn.php");
?>