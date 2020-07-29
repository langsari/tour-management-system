<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($des_name) || trim($des_name)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert name of place.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=placefrm&v=placefrm&des_id=$des_id\">";
	exit;
}

require_once("../dbconn/openconn.php");

if($des_id){
	$sql = "UPDATE t_tour_destination SET \n";
	$sql .= "des_name = '$des_name', \n";;
	$sql .= "active_status = '$active_status', \n";
	$sql .= "admin_id = '".$_SESSION['admin_id']."' \n";
	$sql .= "WHERE des_id = '$des_id' \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}else{
	$sql = "INSERT INTO t_tour_destination ( \n";
	$sql .= "des_name, active_status, admin_id, enter_dtm \n";
	$sql .= ") VALUES ( \n";
	$sql .= "'$des_name', '$active_status', '".$_SESSION['admin_id']."', now() \n";
	$sql .= ") \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Save data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=place&v=place\">";
exit;
?>