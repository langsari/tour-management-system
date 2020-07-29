<?
$arrmonth = array ("", "ม.ก.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค." );
?>
<div id="wrapper">
<div id="row_space_1"></div>
  	<h2><?=$tours[title]?> </h2>
  	<div class="text2">
  	  <p><?=$tours[detail]?></p>
    </div>
	<div align="center">
    <div class="div-table-trip-adm">
      <div class="div-table-row">
      	<div class="div-table-title-60">รหัสจอง</div>
      	<div class="div-table-admin-title-username">เริ่มเดินทาง</div>
        <div class="div-table-admin-title-username">กลับจากเดินทาง</div>
        <div class="div-table-title-60">จำนวนที่รับ</div>
        <div class="div-table-title-60">ยังว่าง</div>
        <div class="div-table-title-60">พักคู่</div>
        <div class="div-table-title-60">พักเดียว</div>
        <div class="div-table-title-60">เด็กมีเตียง</div>
        <div class="div-table-title-60">เด็กไม่มีเตียง</div>
      </div>
      <div class="div-table-row">
      	<div class="div-table-data-60"><?=$booking[booking_code]?></div>
        <div class="div-table-admin-data-username">
          <?php
          list($y,$m,$d) = explode("-",$trips[departure_date]);
		  echo intval($d)." ".$arrmonth[intval($m)]." ".($y+543); 
		  ?>
        </div>
        <div class="div-table-admin-data-username">
          <?php
          list($y,$m,$d) = explode("-",$trips[arrival_date]);
		  echo intval($d)." ".$arrmonth[intval($m)]." ".($y+543); 
		  ?>
        </div>
        <div class="div-table-data-60">
          <?=number_format($trips[num_person])?>
        </div>
        <div class="div-table-data-60"><?=$trips[num_person]-$num_person?></div>
        <div class="div-table-data-60">
          <?=number_format($booking[price_double_bed])?>
        </div>
        <div class="div-table-data-60">
          <?=number_format($booking[price_single_bed])?>
        </div>
        <div class="div-table-data-60">
          <?=number_format($booking[price_extra_bed])?>
        </div>
        <div class="div-table-data-60">
          <?=number_format($booking[price_bed_sharing])?>
        </div>
      </div>
    </div>
	</div>
    <div id="text2_row_space_1"></div>
    <div id="stylized" class="myform">
      <form id="form" name="form" method="post" action="?m=bookingsave" onsubmit="return validateBookingFrm();">
        <input type="hidden" name="booking_id" id="booking_id" value="<?=$booking[booking_id]?>" />
		<input type="hidden" name="booking_code" id="booking_code" value="<?=$booking[booking_code]?>" />
        <input type="hidden" name="trip_id" id="trip_id" value="<?=$booking[trip_id]?>" />
		<input type="hidden" name="cus_id" id="cus_id" value="<?=$booking[cus_id]?>" />
		<input type="hidden" name="remain_person" id="remain_person" value="<?=$trips[num_person]-$num_person?>" />
		<input type="hidden" id="price_double_bed" name="price_double_bed" value="<?=$booking[price_double_bed]?>">
		<input type="hidden" id="price_single_bed" name="price_single_bed" value="<?=$booking[price_single_bed]?>">
		<input type="hidden" id="price_extra_bed" name="price_extra_bed" value="<?=$booking[price_extra_bed]?>">
		<input type="hidden" id="price_bed_sharing" name="price_bed_sharing" value="<?=$booking[price_bed_sharing]?>">
        <h1>แก้ไขการจอง <?=$booking[booking_code]?></h1>
        <p>กรุณากรอกข้อมูลจองที่ต้องการแก้ไข</p>
        <div class="spacer"></div>
        <label>พักคู่<span class="small">จำนวนคนพักคู่</span></label>
        <select name="num_double_bed" id="num_double_bed" onChange="calTotalPrice();">
        <?php
        for($i=0;$i<=20;$i=$i+2){
			if($i==$booking[num_double_bed]){
				$select = "selected";
			}else{
				$select = "";
			}
			echo "<option value=\"$i\" $select>$i</option>";
		}
		?>
        </select>
        <div class="spacer"></div>
        <label>พักเดี่ยว<span class="small">จำนวนคนพักเดี่ยว</span></label>
        <select name="num_single_bed" id="num_single_bed" onChange="calTotalPrice();">
        <?php
        for($i=0;$i<=20;$i++){
			if($i==$booking[num_single_bed]){
				$select = "selected";
			}else{
				$select = "";
			}
			echo "<option value=\"$i\" $select>$i</option>";
		}
		?>
        </select>
        <div class="spacer"></div>
        <label>เด็กมีเตียง<span class="small">จำนวนเด็กที่ต้องเสริมเตียง</span></label>
        <select name="num_extra_bed" id="num_extra_bed" onChange="calTotalPrice();">
        <?php
        for($i=0;$i<=20;$i++){
			if($i==$booking[num_extra_bed]){
				$select = "selected";
			}else{
				$select = "";
			}
			echo "<option value=\"$i\" $select>$i</option>";
		}
		?>
        </select>
        <div class="spacer"></div>
        <label>เด็กไม่มีเตียง<span class="small">จำนวนเด็กที่ใช้เตียงพ่อแม่</span></label>
        <select name="num_bed_sharing" id="num_bed_sharing" onChange="calTotalPrice();">
        <?php
        for($i=0;$i<=20;$i++){
			if($i==$booking[num_bed_sharing]){
				$select = "selected";
			}else{
				$select = "";
			}
			echo "<option value=\"$i\" $select>$i</option>";
		}
		?>
        </select>
		<div class="spacer"></div>
		<label>ยอดชำระ<span class="small">ยอดเงินรวมค่าจองทัวร์ที่ต้องชำระ</span></label>
      	<input type="text" name="total_price" id="total_price" value="<?=$booking[total_price]?>" readonly="readonly" style="background-color:#ebf4fb;" />
        <div class="spacer"></div>
		<label>การชำระเงิน<span class="small">ปรับสถานะรายการจอง</span></label>
		  <select name="payment" id="payment">
		  <option value="no" <?php if($booking[payment]=='no'){ echo "selected"; } ?>>no</option>
		  <option value="yes" <?php if($booking[payment]=='yes'){ echo "selected"; } ?>>yes</option>
		  <option value="cancel" <?php if($booking[payment]=='cancel'){ echo "selected"; } ?>>cancel</option>
		  </select>
		<div class="spacer"></div>
        <label>ชื่อ-สกุล<span class="small">กรุณากรอกชื่อ-สกุลของท่าน</span></label>
        <input type="text" name="fullname" id="fullname" value="<?=$customer[fullname]?>" />
        <label>เลขบัตรประชาชน<span class="small">กรุณากรอกเลขบัตรประชาชน</span></label>
        <input name="id_card" type="text" id="id_card" value="<?=$customer[id_card]?>" maxlength="13" />
        <label>บริษัท <span class="small">กรุณากรอกชื่อบริษัท(หากมี)</span></label>
        <input type="text" name="comp_name" id="comp_name" value="<?=$customer[comp_name]?>" />
        <label>ที่อยู่<span class="small">กรุณากรอกที่อยู่ของท่าน</span></label>
        <input type="text" name="address" id="address" value="<?=$customer[address]?>" />
        <label>โทรศัพท์ <span class="small">กรุณากรอกหมายเลขโทรศัพท์</span></label>
        <input type="text" name="tel" id="tel" value="<?=$customer[tel]?>" />
        <label>อีเมล์<span class="small">กรุณากรอกอีเมล์ของท่าน</span></label>
        <input type="text" name="email" id="email" value="<?=$customer[email]?>" />
        <div class="spacer"></div>
        <button type="submit">ยืนยันแก้ไข</button>
        <div class="spacer"></div>
      </form>
    </div>
</div>