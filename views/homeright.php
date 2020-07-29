<div id="right">
  <div class="right_block">
    <p class="title2">Latest News</p>
    <div class="item"> <span><?php
		$arrmonth = array ("", "ม.ก.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค." );
          list($y,$m,$d) = explode("-",substr($news[enter_dtm],0,10));
		  echo intval($d)." ".$arrmonth[intval($m)]." ".substr(($y+543),2,2); 
		  ?></span>
        <p><?php
            if(iconv_strlen($news[detail],"UTF-8") > 360){
				echo iconv_substr($news[detail],0,360,"UTF-8")."...";
			}else{
				echo $news[detail];
			}
			?></p>
      <a href="?m=news&v=news">read more</a> </div>
    <img src="images/right_bot.gif" alt="" width="261" height="21" /><br />
  </div>
  <div class="right_block">
    <p class="title3">Photo Gallery </p>
    <div class="item">
      <div class="photo"><img src="images/galleriffic-gallery/<?=$gall[photo]?>" width="197" height="148" /></div>
      <p class="name"><?=$gall[alt]?></p>
      <a href="?m=gallery&v=gallery" class="details">more photo</a> </div>
    <img src="images/right_bot.gif" alt="" width="261" height="21" /><br />
  </div>
</div>