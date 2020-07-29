<div id="wrapper">
<?php
require_once("views/homeleft.php");
?>
	<div id="big">
          <h2><?=$news[title]?></h2>
	  <div class="big_photo"> <img src="newspic/<?=$news[banner]?>" alt="" width="260" height="217" /><br />
		  </div>
		  <div class="text">
            <p><?=$news[detail]?></p>
	      </div>
  </div>
</div>