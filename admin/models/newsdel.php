<?php
echo "<img src=\"../images/loading.gif\"/>";
if(empty($news_id) || trim($news_id)==""){
	echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#F00;\">Not found News ID.</div>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=news&v=news\">";
	exit;
}
require_once("../dbconn/openconn.php");

$sql = "SELECT banner \n";
$sql .= "FROM t_news \n";
$sql .= "WHERE news_id = '$news_id' \n";
$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
if(mysql_num_rows($result)>0){
	$row = mysql_fetch_assoc($result);
	if($row[banner]){
		$bfile = "../newspic/".$row[banner];
		if(file_exists($bfile)){
			unlink($bfile);
		}
	}
	$sql = "DELETE FROM t_news \n";
	$sql .= "WHERE news_id = '$news_id' \n";
	mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());	
}
require_once("../dbconn/closeconn.php");

echo "<div style=\"font-family:Trebuchet MS, Georgia; font-size:12px; color:#008000;\">Delete data successful !</div>";
echo "<meta http-equiv=\"REFRESH\" content=\"2;url=?m=news&v=news\">";
exit;
?>