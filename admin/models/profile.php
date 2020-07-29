<?php
require_once("../dbconn/openconn.php");
$sql = "SELECT * \n";
$sql .= "FROM t_admin \n";
$sql .= "WHERE admin_id = '".$_SESSION['admin_id']."' \n";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$row = mysql_fetch_assoc($result);
require_once("../dbconn/closeconn.php");
?>