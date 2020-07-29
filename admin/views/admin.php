<div id="wrapper" align="center">
  <div id="row_space_1"></div>
  <div class="div-table-admin">
  	<div class="div-table-caption">Admin Managagement</div>
    <div class="div-table-operation"><a href="?m=adminfrm&v=adminfrm"><img src="../images/add.png" border="0" align="absmiddle" /> Add New</a></div>
    <div class="div-table-row">
      <div class="div-table-admin-title-username">Username</div>
      <div class="div-table-admin-title-name">Fullname</div>
      <div class="div-table-admin-title-tel">Tel</div>
      <div class="div-table-admin-title-email">Email</div>
      <div class="div-table-title-status">Status</div>
      <div class="div-table-title-edit">Edit</div>
      <div class="div-table-title-del">Del</div>
    </div>
<?php
if(mysql_num_rows($result) > 0){
	while($row = mysql_fetch_assoc($result)){
?>
    <div class="div-table-row">
      <div class="div-table-admin-data-username"><?=$row[user_name]?></div>
      <div class="div-table-admin-data-name"><?=$row[fullname]?></div>
      <div class="div-table-admin-data-tel"><?=$row[tel]?></div>
      <div class="div-table-admin-data-email"><?=$row[email]?></div>
      <div class="div-table-data-status"><?php
      if($row[active_status] == "yes"){
	  	echo '<img src="../images/tick.png" border="0" align="absmiddle" />';
	  }else{
	  	echo '<img src="../images/cross.png" border="0" align="absmiddle" />';
	  }
      ?></div>
      <div class="div-table-data-edit"><a href="?m=adminfrm&v=adminfrm&admin_id=<?=$row[admin_id]?>"><img src="../images/pencil.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-del"><a href="?m=admindel&admin_id=<?=$row[admin_id]?>" onclick="return confirm('Do you want to delete <?=$row[user_name]?>?');"><img src="../images/delete.png" border="0" align="absmiddle" /></a></div>
    </div>
<?php
	}
}
?>
  </div>
</div>