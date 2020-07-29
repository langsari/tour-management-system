<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($tour_id)){
	exit;
}
if(empty($title_id) || trim($title_id)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please select day title.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=dayprogramfrm&v=dayprogramfrm&tour_id=$tour_id&prog_id=$prog_id\">";
	exit;
}
if(empty($period) || trim($period)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert period.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=dayprogramfrm&v=dayprogramfrm&tour_id=$tour_id&prog_id=$prog_id\">";
	exit;
}
if(empty($detail) || trim($detail)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert program description.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=dayprogramfrm&v=dayprogramfrm&tour_id=$tour_id&prog_id=$prog_id\">";
	exit;
}
require_once("../dbconn/openconn.php");

if($prog_id){
	$sql = "UPDATE t_tour_day_program SET \n";
	$sql .= "title_id = '$title_id', \n";;
	$sql .= "period = '".addslashes($period)."', \n";
	$sql .= "detail = '".addslashes($detail)."', \n";
	$sql .= "admin_id = '".$_SESSION['admin_id']."' \n";
	$sql .= "WHERE prog_id = '$prog_id' \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}else{
	$sql = "INSERT INTO t_tour_day_program ( \n";
	$sql .= "title_id, period, detail, admin_id, enter_dtm \n";
	$sql .= ") VALUES ( \n";
	$sql .= "'$title_id', '".addslashes($period)."', '".addslashes($detail)."', '".$_SESSION['admin_id']."', now() \n";
	$sql .= ") \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Save data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=program&v=program&tour_id=$tour_id\">";
exit;
?>