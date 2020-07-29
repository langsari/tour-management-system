<?php
if($_SESSION['LOGEDIN'] != "TRUE"){
	$vfile = "views/login.php";
	if($m){
		$mfile = "models/".$m.".php";
		if(file_exists($mfile)){
			require_once($mfile);
		}
	}
}else{
	if($m){
		$mfile = "models/".$m.".php";
		if(file_exists($mfile)){
			require_once($mfile);
		}
	}
	if($v){
		$vfile = "views/".$v.".php";
		if(!file_exists($vfile)){
			$vfile = "views/welcome.php";
		}
	}else{
		$vfile = "views/welcome.php";
	}
}
?>