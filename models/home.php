<?php
require_once("dbconn/openconn.php");
require_once("models/homeleft.php");
$sql = "SELECT * FROM t_tours \n";
$sql .= "WHERE tour_id >= (SELECT FLOOR( MAX(tour_id) * RAND()) FROM t_tours ) \n";
$sql .= "AND active_status = 'yes' \n";
$sql .= "ORDER BY tour_id LIMIT 0,4 \n";
$tours_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
require_once("models/homeright.php");
require_once("dbconn/closeconn.php");
?>