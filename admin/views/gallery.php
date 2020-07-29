<div id="wrapper" align="center">
  <div id="row_space_1"></div>
  <div class="div-table-thumb-gallery">
  	<div class="div-table-caption">Gallery Managagement</div>
    <div class="div-table-operation"><a href="?v=galleryfrm"><img src="../images/add.png" border="0" align="absmiddle" /> Add Image</a></div>
<?php
$pics = mysql_num_rows($result);
$rows = ceil($pics/10);
$n=1;
for($i=1;$i<=$rows;$i++){
?>
    <div class="div-table-row">
<?php
	for($j=1;$j<=11;$j++){
		if($n<=$pics){
			$fg = mysql_fetch_assoc($result);
?>
      <div class="div-table-thumb-gallery-cell"><a href="?m=gallerydel&gall_id=<?=$fg[gall_id]?>" onclick="return confirm('Do you want to delete image that you clicked?');"><img src="../images/galleriffic-gallery/thumb/<?=$fg[thumb]?>" width="75" height="75" /></a></div>
<?php
		}else{
?>
      <div class="div-table-thumb-gallery-cell">&nbsp;</div>
<?php
		}
		$n++;
	}
?>
    </div>
<?php
}
?>
  </div>
  <div id="row_space_1"></div>
  <div class="div-page-gallery">*Click image to delete it out from gallery.</div>
</div>