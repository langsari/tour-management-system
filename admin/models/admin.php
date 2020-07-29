<?php
require_once("../dbconn/openconn.php");
$sql = "SELECT * \n";
$sql .= "FROM t_admin \n";
$sql .= "ORDER BY user_name \n";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
require_once("../dbconn/closeconn.php");
?>