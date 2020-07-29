<?
$arrmonth = array ("", "ม.ก.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค." );
?>
<div id="wrapper">
<?php
require_once("views/homeleft.php");
?>
  <div id="big">
  	<h2>ยืนยันการจองทัวร์</h2>
  	<div class="div-table-booking-confirm">
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col2">ชื่อ: <?=$fullname?></div>
  	    <div class="div-table-booking-confirm-col2">เลขบัตรประชาชน: <?=$id_card?></div>
      </div>
  	  <div class="div-table-booking-confirm-row">
        <div class="div-table-booking-confirm-col2">บริษัท: <?=$comp_name?></div>
  	    <div class="div-table-booking-confirm-col2">ที่อยู่: <?=$address?></div>
      </div>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col2">โทรศัพท์: <?=$tel?></div>
  	    <div class="div-table-booking-confirm-col2">อีเมล์: <?=$email?></div>
      </div>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col1">&nbsp;</div>
      </div>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col1">ทัวร์แพ็คเก็จ: <?=$tours[title]?></div>
      </div>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col2">เริ่มเดินทาง: <?php
          list($y,$m,$d) = explode("-",$trips[departure_date]);
		  echo intval($d)." ".$arrmonth[intval($m)]." ".($y+543); 
		  ?></div>
  	    <div class="div-table-booking-confirm-col2">กลับจากเดินทาง: <?php
          list($y,$m,$d) = explode("-",$trips[arrival_date]);
		  echo intval($d)." ".$arrmonth[intval($m)]." ".($y+543); 
		  ?></div>
      </div>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col4-tilte">ประเภท</div>
  	    <div class="div-table-booking-confirm-col4-tilte">ราคา/คน(บาท)</div>
  	    <div class="div-table-booking-confirm-col4-tilte">จำนวน(คน)</div>
  	    <div class="div-table-booking-confirm-col4-tilte">รวม(บาท)</div>
      </div>
<?php
if($num_double_bed>0){
	$num_person += $num_double_bed;
?>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col4">พักคู่</div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($trips[price_double_bed])?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=$num_double_bed?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($num_double_bed*$trips[price_double_bed])?></div>
      </div>
<?php
}
if($num_single_bed>0){
	$num_person += $num_single_bed;
?>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col4">พักเดี่ยว</div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($trips[price_single_bed])?></div>
  	    <div class="div-table-booking-confirm-col4-right"> <?=$num_single_bed?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($num_single_bed*$trips[price_single_bed])?></div>
      </div>
<?php
}
if($num_extra_bed>0){
	$num_person += $num_extra_bed;
?>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col4">เด็กมีเตียง</div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($trips[price_extra_bed])?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=$num_extra_bed?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($num_extra_bed*$trips[price_extra_bed])?></div>
<?php
}
if($num_bed_sharing>0){
	$num_person += $num_bed_sharing;
?>
      </div>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col4">เด็กไม่มีเตียง</div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($trips[price_bed_sharing])?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=$num_bed_sharing?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($num_bed_sharing*$trips[price_bed_sharing])?></div>
      </div>
<?php
}
$total_price = ($num_double_bed*$trips[price_double_bed]) + ($num_single_bed*$trips[price_single_bed]) + ($num_extra_bed*$trips[price_extra_bed]) + ($num_bed_sharing*$trips[price_bed_sharing]);
?>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col4-right">&nbsp;</div>
  	    <div class="div-table-booking-confirm-col4-right">&nbsp;</div>
  	    <div class="div-table-booking-confirm-col4-right">รวม</div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($total_price)?></div>
      </div>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col1-center">
  	      <div id="dobooking-frm" class="dobookingform">
  	        <form id="form" name="form" method="post" action="?m=dobooking">
  	          <button type="submit">ยืนยันการจอง</button>
              <button type="button" class="button-cancel" onclick="document.location.href='?m=booking&v=booking&tour_id=<?=$trips[tour_id]?>';">ยกเลิกการจอง</button>
              <input type="hidden" name="comp_name" value="<?=$comp_name?>" />
              <input type="hidden" name="fullname" value="<?=$fullname?>" />
              <input type="hidden" name="id_card" value="<?=$id_card?>" />
              <input type="hidden" name="address" value="<?=$address?>" />
              <input type="hidden" name="email" value="<?=$email?>" />
              <input type="hidden" name="tel" value="<?=$tel?>" />
              <input type="hidden" name="trip_id" value="<?=$trip_id?>" />
              <input type="hidden" name="num_person" value="<?=$num_person?>" />
              <input type="hidden" name="num_double_bed" value="<?=$num_double_bed?>" />
              <input type="hidden" name="num_single_bed" value="<?=$num_single_bed?>" />
              <input type="hidden" name="num_extra_bed" value="<?=$num_extra_bed?>" />
              <input type="hidden" name="num_bed_sharing" value="<?=$num_bed_sharing?>" />
              <input type="hidden" name="price_double_bed" value="<?=$trips[price_double_bed]?>" />
              <input type="hidden" name="price_single_bed" value="<?=$trips[price_single_bed]?>" />
              <input type="hidden" name="price_extra_bed" value="<?=$trips[price_extra_bed]?>" />
              <input type="hidden" name="price_bed_sharing" value="<?=$trips[price_bed_sharing]?>" />
              <input type="hidden" name="total_price" value="<?=$total_price?>" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>