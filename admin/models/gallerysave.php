<?php
echo "<img src=\"../images/loading.gif\"/>";

if(empty($thumb)){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please browse your thumb.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=galleryfrm\">";
	exit;
}

if(empty($photo)){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Please browse your photo.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=galleryfrm\">";
	exit;
}

//upload file
define ("THUMB_SIZE","256");
define ("PHOTO_SIZE","768");
$thumb=$_FILES['thumb']['name'];
$photo=$_FILES['photo']['name'];
if($thumb){
	$filename = stripslashes($_FILES['thumb']['name']);
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")){
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry , current format of thumb is <b>$extension</b> ,only jpeg, jpg, png, gif are allowed.</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=galleryfrm\">";
		exit;
	}
	$size=filesize($_FILES['thumb']['tmp_name']);
	if ($size > THUMB_SIZE*1024){
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry, thumb is a very big file .. max file size is 256 KB</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=galleryfrm\">";
		exit;
	}
	$newname="../images/galleriffic-gallery/thumb/".$filename;
	$copied = copy($_FILES['thumb']['tmp_name'], $newname);
	if ($copied) {
		echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Upload thumb successful !</div>";
	}else {
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry the server was unable to upload the files...</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=galleryfrm\">";
		exit;
	}
}

if($photo){
	$filename2 = stripslashes($_FILES['photo']['name']);
	$extension2 = getExtension($filename2);
	$extension2 = strtolower($extension2);
	if (($extension2 != "jpg") && ($extension2 != "jpeg") && ($extension2 != "png") && ($extension2 != "gif")){
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry , current format of picture is <b>$extension</b> ,only jpeg, jpg, png, gif are allowed.</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=galleryfrm\">";
		exit;
	}
	$size2=filesize($_FILES['photo']['tmp_name']);
	if ($size2 > PHOTO_SIZE*1024){
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry, picture is a very big file .. max file size is 768 KB</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=galleryfrm\">";
		exit;
	}
	$newname2="../images/galleriffic-gallery/".$filename2;
	$copied2 = copy($_FILES['photo']['tmp_name'], $newname2);
	if ($copied && $copied2) {
		echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Upload picture successful !</div>";
	}else {
		echo "<div style=\"font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#FF3535;\">Sorry the server was unable to upload the files...</div>";
		echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?v=galleryfrm\">";
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

$sql = "INSERT INTO t_gallery (\n";
$sql .= "admin_id, thumb, photo, alt, enter_dtm \n";
$sql .= ") VALUES (\n";
$sql .= "'".$_SESSION['admin_id']."', '$filename', '$filename2', '$alt', now() \n";
$sql .= ")";
mysql_query($sql,$conn) or die("<pre>$sql</pre>".mysql_error());

require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Save data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=gallery&v=gallery\">";
exit;
?>