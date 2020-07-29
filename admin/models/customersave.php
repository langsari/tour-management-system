<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($user_name) || trim($user_name)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert username.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=customerfrm&v=customerfrm&cus_id=$cus_id\">";
	exit;
}
if(empty($cus_id)){
	if(empty($pass_word) || trim($pass_word)==""){
		echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert password.</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=customerfrm&v=customerfrm&cus_id=$cus_id\">";
		exit;
	}
}
if(empty($fullname) || trim($fullname)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert fullname.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=customerfrm&v=customerfrm&cus_id=$cus_id\">";
	exit;
}
if(empty($address) || trim($address)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert address.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=customerfrm&v=customerfrm&cus_id=$cus_id\">";
	exit;
}
if(empty($tel) || trim($tel)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert telephone.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=customerfrm&v=customerfrm&cus_id=$cus_id\">";
	exit;
}
if(empty($email) || trim($email)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert email.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=customerfrm&v=customerfrm&cus_id=$cus_id\">";
	exit;
}

require_once("../dbconn/openconn.php");

if($cus_id){
	$sql = "UPDATE t_customer SET \n";
	if($pass_word){
		$sql .= "pass_word = PASSWORD('$pass_word'), \n";
	}
	$sql .= "comp_name = '$comp_name', \n";
	$sql .= "fullname = '$fullname', \n";
	$sql .= "address = '$address', \n";
	$sql .= "cus_type = '$cus_type', \n";
	$sql .= "tel = '$tel', \n";
	$sql .= "email = '$email', \n";
	$sql .= "active_status = '$active_status' \n";
	$sql .= "WHERE cus_id = '$cus_id' \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}else{
	$sql = "SELECT user_name \n";
	$sql .= "FROM t_customer \n";
	$sql .= "WHERE user_name = '$user_name' \n";
	$result = mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
	if(mysql_num_rows($result) > 0){
		require_once("../dbconn/closeconn.php");
		echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Username is not available, please change username.</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=customerfrm&v=customerfrm&cus_id=$cus_id\">";
		exit;
	}
		
	$sql = "INSERT INTO t_customer ( \n";
	$sql .= "user_name, pass_word, comp_name, fullname, address, cus_type, tel, email, active_status, enter_dtm \n";
	$sql .= ") VALUES ( \n";
	$sql .= "'$user_name', PASSWORD('$pass_word'), '$comp_name', '$fullname', '$address', '$cus_type', '$tel', '$email', '$active_status', now() \n";
	$sql .= ") \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Save data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=customer&v=customer\">";
exit;
?>