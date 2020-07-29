function assignTripToBookingFrm(trip_id,remain_person){
	document.getElementById('trip_id').value = trip_id;
	document.getElementById('remain_person').value = remain_person;
}
function validateBookingFrm(){
	if(document.getElementById('trip_id').value == ""){
		alert("กรุณาเลือกทริปที่ท่านต้องการเดินทาง");
		return false;
	}
	var num_double_bed = document.getElementById('num_double_bed').value;
	var num_single_bed = document.getElementById('num_single_bed').value;
	var num_extra_bed = document.getElementById('num_extra_bed').value;
	var num_bed_sharing = document.getElementById('num_bed_sharing').value;
	var remain_person = document.getElementById('remain_person').value;
	if((num_double_bed*1)+(num_single_bed*1) == 0){
		alert("ท่านกรอกจำนวนคนไม่ถูกต้อง");
		return false;
	}
	if((num_double_bed*1)+(num_single_bed*1)+(num_extra_bed*1)+(num_bed_sharing*1) > remain_person){
		alert("จำนวนที่ว่างเหลือไม่เพียงพอ");
		return false;
	}
	if(document.getElementById('fullname').value == ""){
		alert("กรุณากรอกชื่อของท่าน");
		return false;
	}
	if(document.getElementById('id_card').value == ""){
		alert("กรุณากรอกเลขบัตรประชาชน");
		return false;
	}
	if(document.getElementById('address').value == ""){
		alert("กรุณากรอกที่อยู่ของท่าน");
		return false;
	}
	if(document.getElementById('tel').value == ""){
		alert("กรุณากรอกหมายเลขโทรศัพท์ของท่าน");
		return false;
	}
	var email = document.getElementById('email').value;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!filter.test(email)) {
		alert("Invalid email pattern!");
		return false;
	}
	return true;
}
function validateContactFrm(){
	if(document.getElementById('fullname').value == ""){
		alert("กรุณากรอกชื่อ-สกุล");
		return false;
	}
	if(document.getElementById('tel').value == ""){
		alert("กรุณากรอกหมายเลขโทรศัพท์");
		return false;
	}
	var email = document.getElementById('email').value;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!filter.test(email)) {
		alert("Invalid email pattern!");
		return false;
	}
	if(document.getElementById('message').value == ""){
		alert("กรุณากรอกคำร้องขอ");
		return false;
	}
}