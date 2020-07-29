<?php
require_once("../dbconn/openconn.php");
$sql = "SELECT * \n";
$sql .= "FROM t_tour_destination \n";
$sql .= "ORDER BY des_name \n";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
require_once("../dbconn/closeconn.php");
?>