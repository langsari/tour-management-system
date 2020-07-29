<?php
$sql = "SELECT des_id, des_name \n";
$sql .= "FROM t_tour_destination \n";
$sql .= "WHERE active_status = 'yes' \n";
$sql .= "ORDER BY des_name \n";
$des_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
?>