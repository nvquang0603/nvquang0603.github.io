<?php 
	session_start();
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	if($_SESSION['login']['role']!=1) {
      header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
      die;
    }
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header('location: '. $adminUrl. 'tai-khoan/add.php');
		die;
	}
	$regExPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,25}$/';
	$regExName = '/^[a-zA-ZđàáảãạăằắẳặâầấẩẫậậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ ]+$/u';
	$fullname = test_input($_POST['fullname']);
	$email = test_input($_POST['email']);
	$password = test_input($_POST['password']);
	$repassword = test_input($_POST['re-password']);
	$role = test_input($_POST['role']);
	$default_avatar = 'assets/images/sample_image/default-avatar.jpg';
	$password_hash = password_hash($password, PASSWORD_DEFAULT);
	$sql = "select * 
			from users 
			where email = '$email'";
	$user = getSimpleQuery($sql);
	if ($fullname=="") {
		header('location: '. $adminUrl. 'tai-khoan/add.php?errName=Vui lòng điền cả họ và tên');
		die;
	}
	if (preg_match($regExName, $fullname) == false) {
		header('location: '. $adminUrl. 'tai-khoan/add.php?errName=Họ tên không hợp lệ');
		die;
	}
	if ($email == "") {
		header('location: '. $adminUrl. 'tai-khoan/add.php?errEmail=Không bỏ trống email');
		die;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header('location: '. $adminUrl. 'tai-khoan/add.php?errEmail=Email không hợp lệ');
		die;
	}
	if($user){
		header('location: '. $adminUrl. 'tai-khoan/add.php?errEmail=Email đã tồn tại');
		die;
	}	
	if (preg_match($regExPassword, $password) == false) {
		header('location: '. $adminUrl. 'tai-khoan/add.php?errPassword=Mật khẩu từ 8-25 ký tự bao gồm chữ thường, chữ hoa và số');
		die;	
	}
	if ($repassword != $password) {
		header('location: '. $adminUrl. 'tai-khoan/add.php?errRePassword=Mật khẩu nhập lại không khớp');
		die;
	}
	if ($role<2) {
		header('location: '. $adminUrl. 'tai-khoan/add.php?errRole=Không thể thêm admin');
		die;
	}
	$sql = "insert into users (email, fullname, password, role, avatar) values ('$email','$fullname','$password_hash','$role','$default_avatar')";
	getSimpleQuery($sql);
	header('location: '. $adminUrl . 'tai-khoan?success=true');
	die;
?>