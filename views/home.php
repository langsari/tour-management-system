<div id="wrapper">
<?php
require_once("views/homeleft.php");
?>
<div id="central">
  <div class="welcome">
    <p>Teerati Tour ดำเนินธุรกิจเป็น Wholesale travel agency โดยบริษัทเป็นหนึ่งในด้านการท่องเที่ยวในภูมิภาคเอเชีย ซึ่งดำเนินธุรกิจจัดทัวร์นำเที่ยวทั่วโลก จำหน่ายตั๋วเครื่องบิน รวมถึงการจัดกรุ๊ปทัวร์ตามความต้องการ Teerati Tour เครื่องหมายการค้าซึ่งเป็นเครื่องหมายรับประกันคุณภาพให้กับลูกค้าและบริษัทคู่ค้า โดยมีเป้าหมายให้ Teerati Tour เป็นที่หนึ่งในใจลูกค้าในด้านการนำเสนอแพคเกจท่องเที่ยวรวมถึงการบริการที่คุ้มค่า ตรงกับความต้องการและสามารถสร้างความพึงพอใจให้กับลูกค้าสูงสุด โดยเน้นย้ำจุดเด่นของบริษัทคือเป็นผู้นำทางด้านการบริการ ด้วยทีมงานมืออาชีพซึ่งพร้อมให้บริการอย่างดีที่สุดเพื่อความสุขของลูกค้า </p>
  </div>
  <div class="search">
    <form name="tourssch" id="tourssch" action="?m=tours&v=tours" method="post">
      <span>Search</span>
      <input name="title" type="text" id="title" value="<?=$title?>" /><img id="ok" src="images/button.jpg" alt="" width="45" height="24" onClick="tourssch.submit();" />
    </form>
  </div>
<?php
while($row=mysql_fetch_assoc($tours_rs)){
?>
  <div class="block"> <a href="?m=program&v=program&tour_id=<?=$row[tour_id]?>"><img src="banners/<?=$row[banner]?>" alt="" width="180" height="126" /></a>
      <div>
        <h4><?=$row[title]?></h4>
        <p><?=nl2br($row[detail])?></p>
        <span class="price">&nbsp;</span><a href="docs/<?=$row[doc]?>" class="more" target="_blank"><img src="images/page_white_acrobat.png" /> Download</a> <a href="?m=program&v=program&tour_id=<?=$row[tour_id]?>" class="more">More details</a> </div>
  </div>
<?php
}
?>
  <div class="block"><a href="?m=tours&v=tours" class="more">See all tours</a></div>
</div>
<?php
require_once("views/homeright.php");
?>
</div>