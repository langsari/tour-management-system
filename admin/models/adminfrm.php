<?php
if($admin_id){
	require_once("../dbconn/openconn.php");
	$sql = "SELECT * \n";
	$sql .= "FROM t_admin \n";
	$sql .= "WHERE admin_id = '$admin_id' \n";
	$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
	$row = mysql_fetch_assoc($result);
	require_once("../dbconn/closeconn.php");
}else{
	//xajax
	require_once( "../xajax/xajax_core/xajax.inc.php" );
	function usernameavailable($user_name)
	{
		require_once("../dbconn/openconn.php");
		$sql = "SELECT user_name \n";
		$sql .= "FROM t_admin \n";
		$sql .= "WHERE user_name = '$user_name' \n";
		$result = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
		if(mysql_num_rows($result)>0){
			$val = "NOT AVAILABLE";
			$color = "red";
		}else{
			$val = "AVAILABLE";
			$color = "green";
		}
		require_once("../dbconn/closeconn.php");
		
		$objResponse=new xajaxResponse();
		$objResponse->assign( "available", "style.color", $color );
		$objResponse->assign( "available", "value", $val );
		return $objResponse;
	}
	$xajax=new xajax();
	$xajax->registerFunction( "usernameavailable" );
	$xajax->processRequest();
	
}
?>