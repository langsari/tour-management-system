<?php
require_once("../dbconn/openconn.php");

$sql = "SELECT des_id, des_name \n";
$sql .= "FROM t_tour_destination \n";
$sql .= "ORDER BY des_name \n";
$des_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

$sql = "SELECT tour_id, title \n";
$sql .= "FROM t_tours \n";
if($des_id && $des_id != "all"){
	$sql .= "WHERE des_id = '$des_id' \n";
}
$sql .= "ORDER BY title \n";
$tours_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$have_tour_id = "FALSE";
if(mysql_num_rows($tours_rs)>0){
	while($tours = mysql_fetch_assoc($tours_rs)){
		if($tours[tour_id] == $tour_id){
			$have_tour_id = "TRUE";
			break;
		}
	}
	mysql_data_seek($tours_rs,0);
}
if($have_tour_id=="FALSE"){
	$tour_id = "all";
}

/*start page control*/
$sql = "SELECT COUNT(booking_id) AS numpro \n";
$sql .= "FROM t_booking, t_customer, t_trips, t_tours  \n";
$sql .= "WHERE t_customer.cus_id = t_booking.cus_id \n";
$sql .= "AND t_trips.trip_id = t_booking.trip_id \n";
$sql .= "AND t_tours.tour_id = t_trips.tour_id \n";
if($des_id && $des_id != "all"){
	$sql .= "AND t_tours.des_id = '$des_id' \n";
}
if($tour_id && $tour_id != "all"){
	$sql .= "AND t_tours.tour_id = '$tour_id' \n";
}
if($departurefrom && $departureto){
	$sql .= "AND departure_date BETWEEN '".trim($departurefrom)."' AND '".trim($departureto)."' \n";
}else{
	$sql .= "AND departure_date >= '".date("Y-m-d")."' \n";
}
if($keyword){
	$sql .= "AND (booking_code LIKE '%$keyword%' \n";
	$sql .= "OR fullname LIKE '%$keyword%' \n";
	$sql .= "OR comp_name LIKE '%$keyword%' \n";
	$sql .= "OR tel LIKE '%$keyword%' \n";
	$sql .= "OR email LIKE '%$keyword%' \n";
	$sql .= "OR title LIKE '%$keyword%') \n";
}
$sql .= "ORDER BY departure_date, booking_code \n";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
if(mysql_num_rows($result)>0){
	$fc = mysql_fetch_assoc($result);
	$numpro = $fc[numpro];
}else{
	$numpro = 0;
}
$pl = 30; //page limit
if(empty($pn)){
	$pn = 1; //page number
}
if($numpro < $pl){
	$pn = 1;
}
$start = ($pn*$pl)-$pl;
/*end page control*/

$sql = "SELECT *, t_booking.num_person AS num_person \n";
$sql .= "FROM t_booking, t_customer, t_trips, t_tours  \n";
$sql .= "WHERE t_customer.cus_id = t_booking.cus_id \n";
$sql .= "AND t_trips.trip_id = t_booking.trip_id \n";
$sql .= "AND t_tours.tour_id = t_trips.tour_id \n";
if($des_id && $des_id != "all"){
	$sql .= "AND t_tours.des_id = '$des_id' \n";
}
if($tour_id && $tour_id != "all"){
	$sql .= "AND t_tours.tour_id = '$tour_id' \n";
}
if($departurefrom && $departureto){
	$sql .= "AND departure_date BETWEEN '".trim($departurefrom)."' AND '".trim($departureto)."' \n";
}else{
	$sql .= "AND departure_date >= '".date("Y-m-d")."' \n";
}
if($keyword){
	$sql .= "AND (booking_code LIKE '%$keyword%' \n";
	$sql .= "OR fullname LIKE '%$keyword%' \n";
	$sql .= "OR comp_name LIKE '%$keyword%' \n";
	$sql .= "OR tel LIKE '%$keyword%' \n";
	$sql .= "OR email LIKE '%$keyword%' \n";
	$sql .= "OR title LIKE '%$keyword%') \n";
}
$sql .= "ORDER BY departure_date, booking_code \n";
$sql .= "LIMIT $start, $pl \n";
//echo "<pre>$sql</pre>";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("../dbconn/closeconn.php");
?>