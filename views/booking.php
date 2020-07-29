<?
$arrmonth = array ("", "ม.ก.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค." );
?>
<div id="wrapper">
<?php
require_once("views/homeleft.php");
?>
  <div id="big">
  	<h2><?=$tours[title]?> </h2>
  	<div class="text2">
  	  <p><?=$tours[detail]?></p>
	  <div class="div-table-trip-customer">
      <div class="div-table-row">
      	<div class="div-table-title-edit">&nbsp;</div>
      	<div class="div-table-admin-title-username">เริ่มเดินทาง</div>
        <div class="div-table-admin-title-username">กลับจากเดินทาง</div>
        <div class="div-table-title-60">จำนวนที่รับ</div>
        <div class="div-table-title-60">ยังว่าง</div>
        <div class="div-table-title-60">พักคู่</div>
        <div class="div-table-title-60">พักเดียว</div>
        <div class="div-table-title-60">เด็กมีเตียง</div>
        <div class="div-table-title-60">เด็กไม่มีเตียง</div>
      </div>
      <?php
if(mysql_num_rows($result) > 0){
	while($row = mysql_fetch_assoc($result)){
?>
      <div class="div-table-row">
      	<div class="div-table-data-del">
        <?php
		if($row[num_person]-$num_person[$row[trip_id]]>0){
		?>
        <input name="select_trip_id" type="radio" value="<?=$row[trip_id]?>" onclick="assignTripToBookingFrm(<?=$row[trip_id]?>,<?=$row[num_person]-$num_person[$row[trip_id]]?>);" />
        <?php
		}else{
			echo "&nbsp;";
		}
		?>
        </div>
        <div class="div-table-admin-data-username">
          <?php
          list($y,$m,$d) = explode("-",$row[departure_date]);
		  echo intval($d)." ".$arrmonth[intval($m)]." ".($y+543); 
		  ?>
        </div>
        <div class="div-table-admin-data-username">
          <?php
          list($y,$m,$d) = explode("-",$row[arrival_date]);
		  echo intval($d)." ".$arrmonth[intval($m)]." ".($y+543); 
		  ?>
        </div>
        <div class="div-table-data-60">
          <?=number_format($row[num_person])?>
        </div>
        <div class="div-table-data-60">
          <?=number_format($row[num_person]-$num_person[$row[trip_id]])?>
        </div>
        <div class="div-table-data-60">
          <?=number_format($row[price_double_bed])?>
        </div>
        <div class="div-table-data-60">
          <?=number_format($row[price_single_bed])?>
        </div>
        <div class="div-table-data-60">
          <?=number_format($row[price_extra_bed])?>
        </div>
        <div class="div-table-data-60">
          <?=number_format($row[price_bed_sharing])?>
        </div>
      </div>
      <?php
	}
}
?>
    </div>
	<div id="text2_row_space_1"></div>
	<div id="stylized" class="myform">
      <form id="form" name="form" method="post" action="?m=bookingconfirm&v=bookingconfirm" onsubmit="return validateBookingFrm();">
        <input type="hidden" name="trip_id" id="trip_id" value="" />
        <input type="hidden" name="remain_person" id="remain_person" value="" />
        <h1>ฟอร์มการจอง</h1>
        <p>กรุณากรอกข้อมูลจองของท่าน</p>
        <div class="spacer"></div>
        <label>พักคู่<span class="small">จำนวนคนพักคู่</span></label>
        <select name="num_double_bed" id="num_double_bed">
        <?php
        for($i=0;$i<=20;$i=$i+2){
			echo "<option value=\"$i\">$i</option>";
		}
		?>
        </select>
        <div class="spacer"></div>
        <label>พักเดี่ยว<span class="small">จำนวนคนพักเดี่ยว</span></label>
        <select name="num_single_bed" id="num_single_bed">
        <?php
        for($i=0;$i<=20;$i++){
			echo "<option value=\"$i\">$i</option>";
		}
		?>
        </select>
        <div class="spacer"></div>
        <label>เด็กมีเตียง<span class="small">จำนวนเด็กที่ต้องเสริมเตียง</span></label>
        <select name="num_extra_bed" id="num_extra_bed">
        <?php
        for($i=0;$i<=20;$i++){
			echo "<option value=\"$i\">$i</option>";
		}
		?>
        </select>
        <div class="spacer"></div>
        <label>เด็กไม่มีเตียง<span class="small">จำนวนเด็กที่ใช้เตียงพ่อแม่</span></label>
        <select name="num_bed_sharing" id="num_bed_sharing">
        <?php
        for($i=0;$i<=20;$i++){
			echo "<option value=\"$i\">$i</option>";
		}
		?>
        </select>
        <div class="spacer"></div>
        <label>ชื่อ-นามสกุล<span class="small">กรุณากรอกชื่อ-สกุลของท่าน</span></label>
        <input type="text" name="fullname" id="fullname" value="" />
        <label>เลขบัตรประชาชน<span class="small">กรุณากรอกเลขบัตรประชาชน</span></label>
        <input name="id_card" type="text" id="id_card" value="" maxlength="13" />
        <label>บริษัท <span class="small">กรุณากรอกชื่อบริษัท(หากมี)</span></label>
        <input type="text" name="comp_name" id="comp_name" value="" />
        <label>ที่อยู่<span class="small">กรุณากรอกที่อยู่ของท่าน</span></label>
        <input type="text" name="address" id="address" value="" />
        <label>โทรศัพท์ <span class="small">กรุณากรอกหมายเลขโทรศัพท์</span></label>
        <input type="text" name="tel" id="tel" value="" />
        <label>อีเมล์<span class="small">กรุณากรอกอีเมล์ของท่าน</span></label>
        <input type="text" name="email" id="email" value="" />
        <div class="spacer"></div>
        <button type="submit">จองทัวร์</button>
        <div class="spacer"></div>
      </form>
    </div>
    </div>
  </div>
</div>