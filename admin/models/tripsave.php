<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($tour_id)){
	exit;
}
if(empty($departure_date) || trim($departure_date)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please select departure date.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tripfrm&v=tripfrm&tour_id=$tour_id&trip_id=$trip_id\">";
	exit;
}
if(empty($arrival_date) || trim($arrival_date)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please select arrival date.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tripfrm&v=tripfrm&tour_id=$tour_id&trip_id=$trip_id\">";
	exit;
}
if($num_person == 0){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert number of traveler.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tripfrm&v=tripfrm&tour_id=$tour_id&trip_id=$trip_id\">";
	exit;
}
if($price_double_bed == 0){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert adult double bed price.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tripfrm&v=tripfrm&tour_id=$tour_id&trip_id=$trip_id\">";
	exit;
}
if($price_single_bed == 0){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert adult single bed price.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tripfrm&v=tripfrm&tour_id=$tour_id&trip_id=$trip_id\">";
	exit;
}
if($price_extra_bed == 0){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert child with extra bed price.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tripfrm&v=tripfrm&tour_id=$tour_id&trip_id=$trip_id\">";
	exit;
}
if($price_bed_sharing == 0){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert child bed sharing price.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tripfrm&v=tripfrm&tour_id=$tour_id&trip_id=$trip_id\">";
	exit;
}
require_once("../dbconn/openconn.php");

if($trip_id){
	$sql = "UPDATE t_trips SET \n";
	$sql .= "departure_date = '$departure_date', \n";;
	$sql .= "arrival_date = '$arrival_date', \n";
	$sql .= "num_person = '$num_person', \n";
	$sql .= "price_double_bed = '$price_double_bed', \n";
	$sql .= "price_single_bed = '$price_single_bed', \n";
	$sql .= "price_extra_bed = '$price_extra_bed', \n";
	$sql .= "price_bed_sharing = '$price_bed_sharing', \n";
	$sql .= "active_status = '$active_status', \n";
	$sql .= "admin_id = '".$_SESSION['admin_id']."' \n";
	$sql .= "WHERE trip_id = '$trip_id' \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}else{
	$sql = "INSERT INTO t_trips ( \n";
	$sql .= "tour_id, departure_date, arrival_date, num_person, price_double_bed, price_single_bed, \n";
	$sql .= "price_extra_bed, price_bed_sharing, active_status, admin_id, enter_dtm \n";
	$sql .= ") VALUES ( \n";
	$sql .= "'$tour_id', '$departure_date', '$arrival_date', '$num_person', '$price_double_bed', '$price_single_bed', \n";
	$sql .= "'$price_extra_bed', '$price_bed_sharing', '$active_status', '".$_SESSION['admin_id']."', now() \n";
	$sql .= ") \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Save data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=trip&v=trip&tour_id=$tour_id\">";
exit;
?>