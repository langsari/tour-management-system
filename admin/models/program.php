<?php
if(empty($tour_id)){
	exit;
}
require_once("../dbconn/openconn.php");
$sql = "SELECT title, detail \n";
$sql .= "FROM t_tours \n";
$sql .= "WHERE tour_id = '$tour_id' \n";
$rstour = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$tours = mysql_fetch_assoc($rstour);
$sql = "SELECT title_id, day_title \n";
$sql .= "FROM t_tour_day_title \n";
$sql .= "WHERE tour_id = '$tour_id' \n";
$sql .= "ORDER BY title_id \n";
$rstitle = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$num_rstitle = mysql_num_rows($rstitle);
if($num_rstitle > 0){
	while($title = mysql_fetch_assoc($rstitle)){
		$str_title_id .= "'".$title[title_id]."',";
	}
	$str_title_id = substr($str_title_id,0,strlen($str_title_id)-1);
	$sql = "SELECT prog_id, title_id, period, detail \n";
	$sql .= "FROM t_tour_day_program \n";
	$sql .= "WHERE title_id IN ($str_title_id) \n";
	$sql .= "ORDER BY title_id, prog_id \n";
	$rsprogram = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
	if(mysql_num_rows($rsprogram) > 0){
		$index=1;
		while($program=mysql_fetch_assoc($rsprogram)){
			if($program[title_id]!=$pre_title_id){
				$start_index_rsprogram[$program[title_id]] = $index;
			}
			$pre_title_id = $program[title_id];
			$index++;
		}
	}
}
require_once("../dbconn/closeconn.php");
?>