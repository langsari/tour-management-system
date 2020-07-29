<div id="wrapper" align="center">
  <div id="row_space_1"></div>
  <div class="div-table-place">
  	<div class="div-table-caption">Place Managagement</div>
    <div class="div-table-operation"><a href="?m=placefrm&v=placefrm"><img src="../images/add.png" border="0" align="absmiddle" /> Add New</a></div>
    <div class="div-table-row">
      <div class="div-table-title-edit">No</div>
      <div class="div-table-admin-title-name">Place</div>
      <div class="div-table-title-status">Status</div>
      <div class="div-table-title-edit">Edit</div>
      <div class="div-table-title-del">Del</div>
    </div>
<?php
if(mysql_num_rows($result) > 0){
	$n=1;
	while($row = mysql_fetch_assoc($result)){
?>
    <div class="div-table-row">
      <div class="div-table-data-edit"><?=$n?>.</div>
      <div class="div-table-admin-data-name"><?=$row[des_name]?></div>
      <div class="div-table-data-status"><?php
      if($row[active_status] == "yes"){
	  	echo '<img src="../images/tick.png" border="0" align="absmiddle" />';
	  }else{
	  	echo '<img src="../images/cross.png" border="0" align="absmiddle" />';
	  }
      ?></div>
      <div class="div-table-data-edit"><a href="?m=placefrm&v=placefrm&des_id=<?=$row[des_id]?>"><img src="../images/pencil.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-del"><a href="?m=placedel&des_id=<?=$row[des_id]?>" onclick="return confirm('Do you want to delete <?=$row[des_name]?>?');"><img src="../images/delete.png" border="0" align="absmiddle" /></a></div>
    </div>
<?php
		$n++;
	}
}
?>
  </div>
</div>