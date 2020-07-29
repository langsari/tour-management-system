<div id="wrapper">
<?php
require_once("views/homeleft.php");
?>
<div id="central">
  <div id="central_row_space_1"></div>
  <div id="stylized" class="myform">
      <form id="form" name="form" method="post" action="?m=docontact" onsubmit="return validateContactFrm();">
        <h1>ส่งคำร้องขอถึงธีรติทัวร์</h1>
        <p>ท่านสามารถส่งคำถาม หรือ ร้องขอให้ทางบริษัทจัดโปรแกรมทัวร์ในแบบที่ท่านชื่นชอบได้ผ่านฟอร์มกรอกข้อมูลด้านล่างนี้</p>
        <div class="spacer"></div>
        <label>ชื่อ-สกุล<span class="small">กรุณากรอกชื่อ-สกุลของท่าน</span></label>
        <input type="text" name="fullname" id="fullname" value="" />
        <label>โทรศัพท์ <span class="small">กรุณากรอกหมายเลขโทรศัพท์</span></label>
        <input type="text" name="tel" id="tel" value="" />
        <label>อีเมล์<span class="small">กรุณากรอกอีเมล์ของท่าน</span></label>
        <input type="text" name="email" id="email" value="" />
        <label>ข้อความ <span class="small">กรุณากรอกคำถามหรือคำร้องขอ</span></label>
        <textarea name="message" rows="10" id="message"></textarea>
        <div class="spacer"></div>
        <button type="submit">ส่งคำร้องขอ</button>
        <div class="spacer"></div>
      </form>
    </div>
</div>
<?php
require_once("views/homeright.php");
?>
</div>