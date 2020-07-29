<?
$arrmonth = array ("", "ม.ก.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค." );
?>
<div id="wrapper">
<?php
require_once("views/homeleft.php");
?>
  <div id="big">
<?php
if($booking[payment] == "cancel"){
	echo "<h2>ธีรติทัวร์ - ข้อมูลการจองทัวร์ $booking_code (ถูกยกเลิกการจอง)</h2>";
}elseif($booking[payment] == "yes"){
	echo "<h2>ธีรติทัวร์ - ข้อมูลการจองทัวร์ $booking_code (ชำระเงินแล้ว)</h2>";
}else{
	echo "<h2>ธีรติทัวร์ - ข้อมูลการจองทัวร์ $booking_code (ค้างชำระเงิน)</h2>";
}
?>
  	<div class="div-table-booking-confirm">
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col2">ชื่อ: <?=$customer[fullname]?></div>
  	    <div class="div-table-booking-confirm-col2">เลขบัตรประชาชน: <?=$customer[id_card]?></div>
      </div>
  	  <div class="div-table-booking-confirm-row">
      <div class="div-table-booking-confirm-col2">บริษัท: <?=$customer[comp_name]?></div>
  	    <div class="div-table-booking-confirm-col2">ที่อยู่: <?=$customer[address]?></div>
      </div>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col2">โทรศัพท์: <?=$customer[tel]?></div>
  	    <div class="div-table-booking-confirm-col2">อีเมล์: <?=$customer[email]?></div>
      </div>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col1">วันที่จอง: <?php
          list($y,$m,$d) = explode("-",substr($booking[booking_dtm],0,10));
		  echo intval($d)." ".$arrmonth[intval($m)]." ".($y+543); 
		  ?></div>
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
if($booking[num_double_bed]>0){
?>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col4">พักคู่</div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($booking[price_double_bed])?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=$booking[num_double_bed]?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($booking[num_double_bed]*$booking[price_double_bed])?></div>
      </div>
<?php
}
if($booking[num_single_bed]>0){
?>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col4">พักเดี่ยว</div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($booking[price_single_bed])?></div>
  	    <div class="div-table-booking-confirm-col4-right"> <?=$booking[num_single_bed]?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($booking[num_single_bed]*$booking[price_single_bed])?></div>
      </div>
<?php
}
if($booking[num_extra_bed]>0){
?>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col4">เด็กมีเตียง</div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($booking[price_extra_bed])?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=$booking[num_extra_bed]?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($booking[num_extra_bed]*$booking[price_extra_bed])?></div>
<?php
}
if($booking[num_bed_sharing]>0){
?>
      </div>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col4">เด็กไม่มีเตียง</div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($booking[price_bed_sharing])?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=$booking[num_bed_sharing]?></div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($booking[num_bed_sharing]*$booking[price_bed_sharing])?></div>
      </div>
<?php
}
?>
  	  <div class="div-table-booking-confirm-row">
  	    <div class="div-table-booking-confirm-col4-right">&nbsp;</div>
  	    <div class="div-table-booking-confirm-col4-right">&nbsp;</div>
  	    <div class="div-table-booking-confirm-col4-right">รวม</div>
  	    <div class="div-table-booking-confirm-col4-right"><?=number_format($booking[total_price])?></div>
      </div>
  	  <div class="div-table-booking-confirm-row">
              <div class="div-table-booking-confirm-col1-center">&nbsp;</div>
      </div>
<?php
if($booking[payment] == "no"){
?>
      <div class="div-table-booking-confirm-row">
              <div class="div-table-booking-confirm-col1">
              <p>ธีรติทัวร์ ยินดีแจ้งให้ท่านทราบว่า กระบวนการจองทัวร์ของท่านได้สำเร็จแล้ว</p>
              <p>รหัสการจอง (booking code) ของท่านคือ <strong><?=$booking_code?></strong></p>
              <p><br />เพื่อรักษาวันเดินทางของท่าน ท่านต้องชำระเงินค่าทัวร์ทั้งหมดภายใน 3 วันหลังจากทำการจอง หรือ ล่วงหน้า 1 วันก่อนวันออกเดินทาง แล้วแต่เวลาใดจะมาถึงก่อน ท่านสามารถชำระเงินค่าทัวร์ของท่านโดยการโอนเงินผ่านบัญชีธนาคารของเรา ยอดเงิน  <?=number_format($booking[total_price])?> บาท</p>
              <p><br />ธนาคาร: ไทยพาณิชย์ สาขารัษฏา</p>
              <p>ชื่อบัญชี: บริษัท ธีรติทัวร์ จำกัด</p>
              <p>ประเภท: กระแสรายวัน</p>
              <p>เลขที่บัญชี: 8175015896</p>
               <p><br />
               หากท่านทำการโอนเงินชำระค่าจองทัวร์เรียบร้อย กรุณาแฟ็กซ์สลิปหลักฐานการชำระเงินมาที่หมายเลข 076-521559 หรือ สแกนสลิปโอนเงินแล้วส่งมาทางอีเมล์ info@teeratitour.com</p>
               <p><br />ขอขอบคุณลูกค้าที่มีอุการะคุณทุกท่าน ที่เชื่อมั่นใว้ใจในการให้บริการทัวร์ของเรา</p>
               <p>บริษัท ธีรติทัวร์ จำกัด</p>
              </div>
      </div>
<?php
}elseif($booking[payment] == "yes"){
?>
	  <div class="div-table-booking-confirm-row">
              <div class="div-table-booking-confirm-col1">
              <p>ธีรติทัวร์ ยินดีแจ้งให้ท่านทราบว่า รายการจองทัวร์ของท่านได้ยืนยันการชำระเงินแล้ว</p>
              <p>รหัสการจอง (booking code) ของท่านคือ <strong><?=$booking_code?></strong></p>
              <p><br />ขอขอบคุณลูกค้าที่มีอุการะคุณทุกท่าน ที่เชื่อมั่นใว้ใจในการให้บริการทัวร์ของเรา</p>
              <p>บริษัท ธีรติทัวร์ จำกัด</p>
              </div>
      </div>
<?php
}else{
?>
	  <div class="div-table-booking-confirm-row">
              <div class="div-table-booking-confirm-col1">
              <p>ธีรติทัวร์ ยินดีแจ้งให้ท่านทราบว่า รายการจองของท่านได้ถูกยกเลิกแล้ว</p>
              <p>รหัสการจอง (booking code) ที่ถูกยกเลิกคือ <strong><?=$booking_code?></strong></p>
              <p><br />ขอขอบคุณลูกค้าที่มีอุการะคุณ เราหวังว่าจะได้มีโอกาสรับใช้ท่านอีก</p>
              <p>บริษัท ธีรติทัวร์ จำกัด</p>
              </div>
      </div>
<?php
}
?>
      <div class="div-table-booking-confirm-row">
              <div class="div-table-booking-confirm-col1-center"><input type="button" value="พิมพ์หน้านี้"  class="print-button" onClick="window.open('views/printbookinginfo.php?booking_code=<?=$booking_code?>','_blank','height=500,width=800,location=no,menubar=no,resizable=no,scrollbars=no,status=no,titlebar=no,toolbar=no');"></div>
      </div>
    </div>
  </div>
</div>