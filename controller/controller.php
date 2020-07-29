<?php
if($m){
	$mfile = "models/".$m.".php";
	if(file_exists($mfile)){
		require_once($mfile);
	}else{
		$mfile = "models/home.php";
		require_once($mfile);
	}
}else{
	$mfile = "models/home.php";
	require_once($mfile);
}
if($v){
	$vfile = "views/".$v.".php";
	if(!file_exists($vfile)){
		$vfile = "views/home.php";
	}
}else{
	$vfile = "views/home.php";
}
?>