<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($des_id) || trim($des_id)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please select tour place.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tourfrm&v=tourfrm&tour_id=$tour_id\">";
	exit;
}
if(empty($title) || trim($title)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert tour title.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tourfrm&v=tourfrm&tour_id=$tour_id\">";
	exit;
}
if(empty($detail) || trim($detail)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert tour description.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tourfrm&v=tourfrm&tour_id=$tour_id\">";
	exit;
}
if(empty($num_date) || trim($num_date)==0){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please insert number of date.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tourfrm&v=tourfrm&tour_id=$tour_id\">";
	exit;
}

//upload file
define ("BANNER_SIZE","512");
define ("DOC_SIZE","2048");
$banner=$_FILES['banner']['name'];
$doc=$_FILES['doc']['name'];
if($banner){
	$filename = stripslashes($_FILES['banner']['name']);
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")){
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry , current format of Picture is <b>$extension</b> ,only jpeg, jpg, png, gif are allowed.</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tourfrm&v=tourfrm&tour_id=$tour_id\">";
		exit;
	}
	$size=filesize($_FILES['banner']['tmp_name']);
	if ($size > BANNER_SIZE*1024){
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry, banner is a very big file .. max file size is 512 KB</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tourfrm&v=tourfrm&tour_id=$tour_id\">";
		exit;
	}
	$newname="../banners/".$filename;
	$copied = copy($_FILES['banner']['tmp_name'], $newname);
	if ($copied) {
		echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Upload banner successful !</div>";
	}else {
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry the server was unable to upload the files...</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tourfrm&v=tourfrm&tour_id=$tour_id\">";
		exit;
	}
}

if($doc){
	$filename2 = stripslashes($_FILES['doc']['name']);
	$extension2 = getExtension($filename2);
	$extension2 = strtolower($extension2);
	if (($extension2 != "doc") && ($extension2 != "pdf")){
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry , current format of document is <b>$extension</b> ,only pdf,doc are allowed.</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tourfrm&v=tourfrm&tour_id=$tour_id\">";
		exit;
	}
	$size2=filesize($_FILES['doc']['tmp_name']);
	if ($size2 > DOC_SIZE*1024){
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry, Document is a very big file .. max file size is 2 MB</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tourfrm&v=tourfrm&tour_id=$tour_id\">";
		exit;
	}
	$newname2="../docs/".$filename2;
	$copied2 = copy($_FILES['doc']['tmp_name'], $newname2);
	if ($copied && $copied2) {
		echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Upload document file successful !</div>";
	}else {
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry the server was unable to upload the files...</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tourfrm&v=tourfrm&tour_id=$tour_id\">";
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

if($tour_id){
	$sql = "UPDATE t_tours SET \n";
	$sql .= "des_id = '$des_id', \n";
	$sql .= "admin_id = '".$_SESSION['admin_id']."', \n";
	$sql .= "title = '$title', \n";
	$sql .= "detail = '$detail', \n";
	if($banner){
		$sql .= "banner = '$filename', \n";
	}
	if($doc){
		$sql .= "doc = '$filename2', \n";
	}
	$sql .= "num_date = '$num_date', \n";
	$sql .= "active_status = '$active_status', \n";
	$sql .= "create_dtm = create_dtm \n";
	$sql .= "WHERE tour_id = '$tour_id' \n";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}else{	
	$sql = "INSERT INTO t_tours (\n";
	$sql .= "des_id, admin_id, title, detail, banner, doc, num_date, active_status, create_dtm \n";
	$sql .= ") VALUES (\n";
	$sql .= "'$des_id', '".$_SESSION['admin_id']."', '".addslashes($title)."', '".addslashes($detail)."', '$filename', '$filename2', '$num_date', '$active_status', now() \n";
	$sql .= ")";
	mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());
}

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Save data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tours&v=tours\">";
exit;
?>