<?php
if(empty($fullname) || empty($email) || empty($message) ){
	exit;
}
echo "<img src=\"images/loading.gif\"/>";
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
    <td style="font-family:Tahoma,Verdana;font-size:13px;">ชื่อ-สกุล: '.$fullname.'</td>
  </tr>
  <tr>
    <td style="font-family:Tahoma,Verdana;font-size:13px;">โทรศัพท์: '.$tel.'</td>
  </tr>
  <tr>
    <td style="font-family:Tahoma,Verdana;font-size:13px;">คำร้องขอ: '.$message.'</td>
  </tr>
</table>
<br />
</body>
</html>';

$from = "$fullname <$email>";
$subject = "Request from Teerati Tour contact us.";
$to = "Teerati Tour <suraiya_955@hotmail.com>";
if(!UTF8_mail($from, $to, $subject, $message, $cc="", $bcc="")){
	//echo "<span style='color:red;'>Failed</span> <BR>";
}
else{
	//echo "<span style='color:blue;'>Done</span> <BR>";
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

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Send request successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=contact&v=contact\">";
exit;
?>