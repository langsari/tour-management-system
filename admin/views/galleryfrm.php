<div id="wrapper">
  <div id="row_space_1"></div>
  <div id="stylized2" class="myform2">
    <form action="?m=gallerysave" method="post" enctype="multipart/form-data" name="form" id="form" onSubmit="return validateGalleryFrm();">
      <h1>Add gallery image</h1>
      <p>You can add image to your gallery here.</p>
      <label>Thumb<span class="small">Thumb Size : w'75 x h'75 pixel</span></label>
      <input type="file" name="thumb" id="thumb" />
      <div class="spacer"></div>
      <label>Picture <span class="small">Picture Size : w'500  x h'500 pixel</span> </label>
      <input type="file" name="photo" id="photo" />
      <div class="spacer"></div>
      <label>Title <span class="small">Type image title</span> </label>
      <input name="alt" type="text" id="alt" value="" />
	  <button type="submit">Save</button>
      <div class="spacer"></div>
    </form>
  </div>
</div>