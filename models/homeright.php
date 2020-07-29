<?php
$sql = "SELECT * FROM t_news ORDER BY enter_dtm DESC LIMIT 0,1";
$news_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$news = mysql_fetch_assoc($news_rs);

$sql = "SELECT * FROM t_gallery ORDER BY enter_dtm DESC LIMIT 0,1";
$gall_rs = mysql_query($sql) or die("<pre>$sql</pre>".mysql_error());
$gall = mysql_fetch_assoc($gall_rs);
?>