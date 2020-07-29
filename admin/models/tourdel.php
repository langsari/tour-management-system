<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($tour_id) || trim($tour_id)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Not found tour ID.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tours&v=tours\">";
	exit;
}
require_once("../dbconn/openconn.php");

$sql = "SELECT banner, doc \n";
$sql .= "FROM t_tours \n";
$sql .= "WHERE tour_id = '$tour_id' \n";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
if(mysql_num_rows($result)>0){
	$row = mysql_fetch_assoc($result);
	if($row[banner]){
		$bfile = "../banners/".$row[banner];
		if(file_exists($bfile)){
			unlink($bfile);
		}
	}
	if($row[doc]){
		$dfile = "../docs/".$row[doc];
		if(file_exists($dfile)){
			unlink($dfile);
		}
	}
	$sql = "DELETE FROM t_tours \n";
	$sql .= "WHERE tour_id = '$tour_id' \n";
	mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());	
}
require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Delete data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=tours&v=tours\">";
exit;
?>