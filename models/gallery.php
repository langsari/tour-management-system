<?php
require_once("dbconn/openconn.php");
require_once("models/homeleft.php");
$sql = "SELECT * FROM t_gallery ORDER BY enter_dtm DESC";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
require_once("dbconn/closeconn.php");
?>