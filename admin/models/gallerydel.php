<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($gall_id) || trim($gall_id)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Not found gallery ID.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=gallery&v=gallery\">";
	exit;
}
require_once("../dbconn/openconn.php");

$sql = "SELECT thumb, photo \n";
$sql .= "FROM t_gallery \n";
$sql .= "WHERE gall_id = '$gall_id' \n";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
if(mysql_num_rows($result)>0){
	$row = mysql_fetch_assoc($result);
	if($row[thumb]){
		$bfile = "../images/galleriffic-gallery/thumb/".$row[thumb];
		if(file_exists($bfile)){
			unlink($bfile);
		}
	}
	if($row[photo]){
		$dfile = "../images/galleriffic-gallery/".$row[photo];
		if(file_exists($dfile)){
			unlink($dfile);
		}
	}
	$sql = "DELETE FROM t_gallery \n";
	$sql .= "WHERE gall_id = '$gall_id' \n";
	mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
}
require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Delete data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=gallery&v=gallery\">";
exit;
?>