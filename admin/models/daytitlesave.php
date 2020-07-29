<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($tour_id)){
	exit;
}
if(empty($day_title) || trim($day_title)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert title of the day.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=daytitlefrm&v=daytitlefrm&tour_id=$tour_id&title_id=$title_id\">";
	exit;
}

require_once("../dbconn/openconn.php");

if($title_id){
	$sql = "UPDATE t_tour_day_title SET \n";
	$sql .= "day_title = '$day_title', \n";;
	$sql .= "admin_id = '".$_SESSION['admin_id']."' \n";
	$sql .= "WHERE title_id = '$title_id' \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}else{
	$sql = "INSERT INTO t_tour_day_title ( \n";
	$sql .= "tour_id, day_title, admin_id, enter_dtm \n";
	$sql .= ") VALUES ( \n";
	$sql .= "'$tour_id', '$day_title', '".$_SESSION['admin_id']."', now() \n";
	$sql .= ") \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Save data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=program&v=program&tour_id=$tour_id\">";
exit;
?>