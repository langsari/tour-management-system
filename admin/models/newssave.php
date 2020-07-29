<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($title) || trim($title)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert news title.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=newsfrm&v=newsfrm&news_id=$news_id\">";
	exit;
}
if(empty($detail) || trim($detail)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert news description.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=newsfrm&v=newsfrm&news_id=$news_id\">";
	exit;
}

//upload file
define ("BANNER_SIZE","512");

$banner=$_FILES['banner']['name'];
if($banner){
	$filename = stripslashes($_FILES['banner']['name']);
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")){
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry , current format of Picture is <b>$extension</b> ,only jpeg, jpg, png, gif are allowed.</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=newsfrm&v=newsfrm&news_id=$news_id\">";
		exit;
	}
	$size=filesize($_FILES['banner']['tmp_name']);
	if ($size > BANNER_SIZE*1024){
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry, picture is a very big file .. max file size is 512 KB</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=newsfrm&v=newsfrm&news_id=$news_id\">";
		exit;
	}
	$newname="../newspic/".$filename;
	$copied = copy($_FILES['banner']['tmp_name'], $newname);
	if ($copied) {
		echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Upload picture successful !</div>";
	}else {
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry the server was unable to upload the files...</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=newsfrm&v=newsfrm&news_id=$news_id\">";
		exit;
	}
}

function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext; 
}

require_once("../dbconn/openconn.php");

if($news_id){
	$sql = "UPDATE t_news SET \n";
	$sql .= "admin_id = '".$_SESSION['admin_id']."', \n";
	$sql .= "title = '$title', \n";
	$sql .= "detail = '$detail', \n";
	if($banner){
		$sql .= "banner = '$filename', \n";
	}
	$sql .= "enter_dtm = enter_dtm \n";
	$sql .= "WHERE news_id = '$news_id' \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}else{	
	$sql = "INSERT INTO t_news (\n";
	$sql .= "admin_id, title, detail, banner, enter_dtm \n";
	$sql .= ") VALUES (\n";
	$sql .= "'".$_SESSION['admin_id']."', '".addslashes($title)."', '".addslashes($detail)."', '$filename', now() \n";
	$sql .= ")";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Save data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=news&v=news\">";
exit;
?>