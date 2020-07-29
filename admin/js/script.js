function validateProfile(){
	if(document.getElementById('fullname').value==""){
		alert("Please insert name.");
		return false;
	}
	if(document.getElementById('address').value==""){
		alert("Please insert address.");
		return false;
	}
	if(document.getElementById('tel').value==""){
		alert("Please insert telephone.");
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
function validateChangePWD(){
	if(document.getElementById('curpwd').value==""){
		alert("Please insert current password.");
		return false;
	}
	if(document.getElementById('newpwd').value==""){
		alert("Please insert new password.");
		return false;
	}
	if(document.getElementById('confpwd').value==""){
		alert("Please insert confirm new password.");
		return false;
	}
	if(document.getElementById('newpwd').value != document.getElementById('confpwd').value){
		alert("Your new password is not match with confirm new password.");
		return false;
	}
	return true;
}
function validateAdminFrm(){
	if(document.getElementById('user_name').value==""){
		alert("Please insert username.");
		return false;
	}
	if(document.getElementById('admin_id').value==""){
		if(document.getElementById('pass_word').value==""){
			alert("Please insert password.");
			return false;
		}
	}
	if(document.getElementById('fullname').value==""){
		alert("Please insert name.");
		return false;
	}
	if(document.getElementById('address').value==""){
		alert("Please insert address.");
		return false;
	}
	if(document.getElementById('tel').value==""){
		alert("Please insert telephone.");
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
function validateCustomerFrm(){
	if(document.getElementById('user_name').value==""){
		alert("Please insert username.");
		return false;
	}
	if(document.getElementById('cus_id').value==""){
		if(document.getElementById('pass_word').value==""){
			alert("Please insert password.");
			return false;
		}
	}
	if(document.getElementById('fullname').value==""){
		alert("Please insert name.");
		return false;
	}
	if(document.getElementById('address').value==""){
		alert("Please insert address.");
		return false;
	}
	if(document.getElementById('tel').value==""){
		alert("Please insert telephone.");
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
function validateTourFrm(){
	if(document.getElementById('title').value==""){
		alert("Please insert tour title.");
		return false;
	}
	if(document.getElementById('detail').value==""){
		alert("Please insert tour description.");
		return false;
	}
	if(document.getElementById('num_date').value==""){
		alert("Please insert tour date.");
		return false;
	}
	return true;
}
function validatePlaceFrm(){
	if(document.getElementById('des_name').value==""){
		alert("Please insert name of place.");
		return false;
	}
	return true;
}
function validateDayTitleFrm(){
	if(document.getElementById('day_title').value==""){
		alert("Please insert title of the day.");
		return false;
	}
	return true;
}
function validateDayProgramFrm(){
	if(document.getElementById('title_id').value==""){
		alert("Please select day title.");
		return false;
	}
	if(document.getElementById('period').value==""){
		alert("Please insert period.");
		return false;
	}
	if(document.getElementById('detail').value==""){
		alert("Please insert program description.");
		return false;
	}
	return true;
}
function validateTripFrm(){
	if(document.getElementById('departure_date').value==""){
		alert("Please select departure date.");
		return false;
	}
	if(document.getElementById('arrival_date').value==""){
		alert("Please select arrival date.");
		return false;
	}
	if(document.getElementById('num_person').value==""){
		alert("Please insert number of traveler.");
		return false;
	}
	
	if(document.getElementById('price_double_bed').value==""){
		alert("Please insert adult double bed price.");
		return false;
	}
	
	if(document.getElementById('price_single_bed').value==""){
		alert("Please insert adult single bed price.");
		return false;
	}
	
	if(document.getElementById('price_extra_bed').value==""){
		alert("Please insert child with extra bed price.");
		return false;
	}
	
	if(document.getElementById('price_bed_sharing').value==""){
		alert("Please insert child bed sharing price.");
		return false;
	}
	return true;
}
function validateBookingFrm(){
	if(document.getElementById('booking_id').value == ""){
		alert("ระบบผิดพลาด กรุณาติดต่อผู้พัฒนาระบบ");
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
function calTotalPrice(){
	var price_double_bed = document.getElementById('price_double_bed').value;
	var price_single_bed = document.getElementById('price_single_bed').value;
	var price_extra_bed = document.getElementById('price_extra_bed').value;
	var price_bed_sharing = document.getElementById('price_bed_sharing').value;
	
	var num_double_bed = document.getElementById('num_double_bed').value;
	var num_single_bed = document.getElementById('num_single_bed').value;
	var num_extra_bed = document.getElementById('num_extra_bed').value;
	var num_bed_sharing = document.getElementById('num_bed_sharing').value;

	document.getElementById('total_price').value = (price_double_bed*num_double_bed)+(price_single_bed*num_single_bed)+(price_extra_bed*num_extra_bed)+(price_bed_sharing*num_bed_sharing);
}
function validateNewsFrm(){
	if(document.getElementById('title').value==""){
		alert("Please insert news title.");
		return false;
	}
	if(document.getElementById('detail').value==""){
		alert("Please insert news description.");
		return false;
	}
	return true;
}
function validateGalleryFrm(){
	if(document.getElementById('thumb').value==""){
		alert("Please browse your thumb.");
		return false;
	}
	if(document.getElementById('photo').value==""){
		alert("Please browse your photo.");
		return false;
	}
	return true;
}