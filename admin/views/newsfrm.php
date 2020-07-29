<div id="wrapper">
  <div id="row_space_1"></div>
  <div id="stylized2" class="myform2">
    <form action="?m=newssave" method="post" enctype="multipart/form-data" name="form" id="form" onSubmit="return validateNewsFrm();">
      <input type="hidden" name="news_id" id="news_id" value="<?=$news_id?>" />
      <h1>News</h1>
      <p>You can add or update news detail here. *note: for update news detail if you don't need to change news image, please leave the box empty.</p>
      <label>News title <span class="small">Type tour title</span> </label>
      <input name="title" type="text" id="title" value="<?=$row[title]?>" />
      <label>Description <span class="small">Type tour description</span> </label>
      <textarea name="detail" rows="10" id="detail"><?=$row[detail]?></textarea>
      <div class="spacer"></div>
      <label>Image<span class="small">Image size 260 x 217 pixel</span></label>
      <input type="file" name="banner" id="banner" />
      <div class="spacer"></div>
	  <button type="submit">Save</button>
      <div class="spacer"></div>
    </form>
  </div>
</div>