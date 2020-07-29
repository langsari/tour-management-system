<?
//connnect to atv database
$servername = "localhost";
$databasename="teeratitour";
$user ="root";
$password = "root";
$conn = mysql_connect($servername,$user,$password) or die ("can not connect server");
mysql_select_db($databasename,$conn) or die("can not select database");
mysql_query("SET NAMES 'utf8'",$conn);
?>
