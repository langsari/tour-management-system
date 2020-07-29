<?php
if(empty($booking_id) || empty($trip_id) || empty($cus_id)){
	exit;
}

$num_person = $num_double_bed+$num_single_bed+$num_extra_bed+$num_bed_sharing;

if($num_person==0){
	exit;
}

echo "<img src=\"../images/loading.gif\"/>";
require_once("../dbconn/openconn.php");

$sql = "SELECT tour_id, num_person \n";
$sql .= "FROM t_trips \n";
$sql .= "WHERE trip_id = '$trip_id' \n";
$trips_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$trips = mysql_fetch_assoc($trips_rs);

$sql = "SELECT num_person \n";
$sql .= "FROM t_booking \n";
$sql .= "WHERE trip_id = '$trip_id' \n";
$sql .= "AND booking_id != '$booking_id' \n";
$sql .= "AND payment != 'cancel' \n";
$sql .= "ORDER BY trip_id \n";
$booking_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
while($row = mysql_fetch_assoc($booking_rs)){
	$book_num_person += $row[num_person];
}

if($trips[num_person] - $book_num_person - $num_person >= 0){
	//do nothing
}else{
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Number of seats available is not enough.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=bookingfrm&v=bookingfrm&booking_id=$booking_id\">";
	exit;
}

//Update customer
$sql = "UPDATE t_customer SET \n";
$sql .= "comp_name = '$comp_name', fullname = '$fullname', id_card='$id_card', address = '$address', email = '$email', tel = '$tel' \n";
$sql .= "WHERE cus_id = '$cus_id' \n";
mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

//update booking
$sql = "UPDATE t_booking SET \n";
$sql .= "num_person = '$num_person', num_double_bed = '$num_double_bed', num_single_bed = '$num_single_bed', \n";
$sql .= "num_extra_bed = '$num_extra_bed', num_bed_sharing = '$num_bed_sharing', \n";
$sql .= "total_price = '$total_price', payment = '$payment', booking_dtm = booking_dtm \n";
$sql .= "WHERE booking_id = '$booking_id' \n";
mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());

require_once("../dbconn/closeconn.php");

if($payment == "cancel"){
	//send mail
	//send UTF-8 email
	$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	<style type="text/css">
	<!--
	body {
		background-color: #FFFFFF;
	}
	-->
	</style></head>
	
	<body><br />
	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
	  
	  <tr>
		<td style="font-family:Tahoma,Verdana;font-size:13px;">เรียนคุณ '.$fullname.'</td>
	  </tr>
	  
	  <tr>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td style="font-family:Tahoma,Verdana;font-size:13px;"><div align="justify">
		  <p>ธีรติทัวร์ ยินดีแจ้งให้ท่านทราบว่า รายการจองของท่านได้ถูกยกเลิกแล้ว <br />
		  <br />รหัสการจอง (booking code) ที่ถูกยกเลิกคือ <strong>'.$booking_code.'</strong></p>
			<p>ถ้าท่านต้องการดูข้อมูลรายละเอียดการยกเลิกการจอง กรุณาคลิ๊กลิงค์ด้านล่างนี้<br />
			Booking URL: <a href="http://www.teeratitour.com/?m=bookinginfo&v=bookinginfo&booking_code='.$booking_code.'" target="_blank">http://www.teeratitour.com/?m=bookinginfo&v=bookinginfo&booking_code='.$booking_code.'</a><br />
			<br />
		  หากท่านต้องการข้อมูลเพิ่มเติมกรุณาติดต่อ ธีรติทัวร์ ผ่านทางหมายเลข Hotline: 08-4633-0800 ตลอด 24 ชม. หรือ กรอกข้อมูลผ่านหน้าเว็บไซต์ของเรา</p>
		  </div></td>
	  </tr>
		<tr>
		  <td>&nbsp;</td>
		</tr>
	  <tr>
		<td style="font-family:Tahoma,Verdana;font-size:13px;">ขอขอบคุณลูกค้าที่มีอุการะคุณ หวังว่าจะมีโอกาสได้รับใช้ท่านอีก <br />
		<a href="http://www.teeratitour.com/" target="_blank">บริษัท ธีรติทัวร์ จำกัด</a>
	</td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
	  </tr>
	  <tr><td><div align="right" style="font-family:Tahoma;font-size:11px;">copyright © 2011 Teeratitour.com. All Rights Reserved.
	</div></td>
	  </tr>
	</table>
	<br />
	</body>
	</html>';
	
	$from = "Teerati Tour <suraiya_955@hotmail.com>";
	$subject = "Booking canceled from Teerati Tour";
	$to = $fullname . " <" . $email . ">";
	if(!UTF8_mail($from, $to, $subject, $message, $cc="", $bcc="")){
		//echo "<span style='color:red;'>Failed</span> <BR>";
	}
	else{
		//echo "<span style='color:blue;'>Done</span> <BR>";
	}
}

// define sendmail UTF8 Function
function UTF8_mail($from, $to, $subject, $message, $cc="", $bcc=""){
	$from = explode("<",$from );
	
	$headers = "From: =?UTF-8?B?" .base64_encode($from[0])."?= <". $from[1] . "\n";
	
	$to = explode("<",$to );
	$to = "=?UTF-8?B?".base64_encode($to[0])."?= <". $to[1] ;
	
	$subject="=?UTF-8?B?".base64_encode($subject)."?=\n";
	
	if($cc!="")
	{
	$cc = explode("<",$cc );
	$headers .= "Cc: =?UTF-8?B?".base64_encode($cc[0])."?= <". $cc[1] . "\n";
	}
	
	if($bcc!="")
	{
	$bcc = explode("<",$bcc );
	$headers .= "Bcc: =?UTF-8?B?".base64_encode($bcc[0])."?= <". $bcc[1] . "\n";
	}
	
	$headers .=
	"Content-Type: text/html; "
	. "charset=UTF-8; format=flowed\n"
	. "MIME-Version: 1.0\n"
	. "Content-Transfer-Encoding: 8bit\n"
	. "X-Mailer: PHP\n";
	
	return mail($to, $subject, $message, $headers);
}

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Edit booking successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=booking&v=booking\">";
exit;
?>