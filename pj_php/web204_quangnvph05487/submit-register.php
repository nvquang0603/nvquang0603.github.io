<?php 
	session_start();
	require_once './assets/commons/utils.php';
	if (isset($_SESSION['login'])) {
	  header('location: ' . $adminUrl);
	}
	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header('location: '. $siteUrl. 'register.php');
		die;
	}
	$regExPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,25}$/';
	$regExName = '/^[a-zA-ZđàáảãạăằắẳặâầấẩẫậậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ ]+$/u';
	$regExAddress = '/^[a-zA-Z0-9đàáảãạăằắẳặâầấẩẫậậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ ,.-]+$/u';
	$regExPhone = '/(09|01[2|6|8|9])+([0-9]{8})\b/';
	$firstname = test_input($_POST['firstname']);
	$lastname = test_input($_POST['lastname']);
	$email = test_input($_POST['email']);
	$password = test_input($_POST['password']);
	$repassword = test_input($_POST['re-password']);
	$gender = test_input($_POST['gender']);
	$address = test_input($_POST['address']);
	$phone = test_input($_POST['phone']);
	$fullname = $firstname . ' ' . $lastname;
	$default_avatar = 'assets/images/sample_image/default-avatar.jpg';
	$password_hash = password_hash($password, PASSWORD_DEFAULT);
	$sql = "select * 
			from users 
			where email = '$email'";
	$user = getSimpleQuery($sql);
	if ($firstname=="" || $lastname=="") {
		header('location: '. $siteUrl. 'register.php?errName=Vui lòng điền cả họ và tên');
		die;
	}
	if (preg_match($regExName, $firstname) == false || preg_match($regExName, $lastname) == false) {
		header('location: '. $siteUrl. 'register.php?errName=Họ tên không hợp lệ');
		die;
	}
	if ($email == "") {
		header('location: '. $siteUrl. 'register.php?errEmail=Không bỏ trống email');
		die;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header('location: '. $siteUrl. 'register.php?errEmail=Email không hợp lệ');
		die;
	}
	if($user){
		header('location: '. $siteUrl. 'register.php?errEmail=Email đã tồn tại');
		die;
	}	
	if (preg_match($regExPassword, $password) == false) {
		header('location: '. $siteUrl. 'register.php?errPassword=Mật khẩu từ 8-25 ký tự bao gồm chữ thường, chữ hoa và số');
		die;	
	}
	if ($repassword != $password) {
		header('location: '. $siteUrl. 'register.php?errRePassword=Mật khẩu nhập lại không khớp');
		die;
	}
	if ($address == "") {
		
	}
	else if (preg_match($regExAddress, $address)==false) {
		header('location: '. $siteUrl. 'register.php?errAddress=Địa chỉ không hợp lệ');
		die;	
	}
	if ($phone == "") {
		
	}
	else if (preg_match($regExPhone, $phone)==false) {
		header('location: '. $siteUrl. 'register.php?errPhone=SĐT không hợp lệ');
		die;	
	}
	$sql = "insert into users values (null,'$email','$fullname','$password_hash','2','$address','$default_avatar','$gender','$phone')";
	getSimpleQuery($sql);
	header('location: '. $siteUrl . 'login.php?success=true');
	die;
?>