<div id="wrapper" align="center">
  <div id="row_space_1"></div>
  <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="?m=customer&v=customer">
      <h1>Search customers</h1>
      <p>You can type any keyword or select type of customer and click search button.</p>
      <label>Keyword <span class="small">Type your keyword</span> </label>
      <input type="text" name="keyword" id="keyword" value="<?=$keyword?>" />
      <label>Type<span class="small">Select customer type</span></label>
      <select name="cus_type" id="cus_type">
      <option value="all">all type</option>
      <option value="personal" <?php if($cus_type=='personal'){ echo "selected"; } ?>>personal</option>
      <option value="agency" <?php if($cus_type=='agency'){ echo "selected"; } ?>>agency</option>
      </select>
      <div class="spacer"></div>
	  <button type="submit">Search</button>
      <div class="spacer"></div>
    </form>
  </div>
  <div id="row_space_2"></div>
  <div class="div-table-customer">
  	<div class="div-table-caption">Customer Managagement</div>
    <div class="div-table-operation"><a href="?m=customerfrm&v=customerfrm"><img src="../images/add.png" border="0" align="absmiddle" /> Add New</a></div>
    <div class="div-table-row">
      <div class="div-table-admin-title-username">Username</div>
      <div class="div-table-admin-title-name">Fullname</div>
      <div class="div-table-customer-title-company">Company</div>
      <div class="div-table-admin-title-tel">Tel</div>
      <div class="div-table-admin-title-email">Email</div>
      <div class="div-table-customer-title-type">Type</div>
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
      <div class="div-table-customer-data-company"><?php if($row[comp_name]){ echo $row[comp_name]; }else{ echo "&nbsp;"; } ?></div>
      <div class="div-table-admin-data-tel"><?=$row[tel]?></div>
      <div class="div-table-admin-data-email"><?=$row[email]?></div>
      <div class="div-table-customer-data-type"><?=$row[cus_type]?></div>
      <div class="div-table-data-status"><?php
      if($row[active_status] == "yes"){
	  	echo '<img src="../images/tick.png" border="0" align="absmiddle" />';
	  }else{
	  	echo '<img src="../images/cross.png" border="0" align="absmiddle" />';
	  }
      ?></div>
      <div class="div-table-data-edit"><a href="?m=customerfrm&v=customerfrm&cus_id=<?=$row[cus_id]?>"><img src="../images/pencil.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-del"><a href="?m=customerdel&cus_id=<?=$row[cus_id]?>" onclick="return confirm('Do you want to delete <?=$row[user_name]?>?');"><img src="../images/delete.png" border="0" align="absmiddle" /></a></div>
    </div>
<?php
	}
}
?>
  </div>
  <div class="div-page-customer">
  <div id="page">Page <?php
  		$numpage = ceil($numpro/$pl);
		for($i=1;$i<=$numpage;$i++){
			if($pn==$i){
				echo $i." ";
			}else{
				echo "<a href=\"?m=customer&v=customer&cus_type=$cus_type&pn=$i&keyword=$keyword\">".$i."</a> ";
			}
		}
		?></div>
  </div>
</div>