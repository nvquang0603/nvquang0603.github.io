<?php 
	session_start();
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	if($_SESSION['login']['role']!=1) {
      header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
      die;
    }
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header('location: '. $adminUrl. 'tai-khoan/edit.php');
		die;
	}
	$regExPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,25}$/';
	$regExName = '/^[a-zA-ZđàáảãạăằắẳặâầấẩẫậậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ ]+$/u';
	$id = $_POST['id'];
	$fullname = test_input($_POST['fullname']);
	$email = test_input($_POST['email']);
	$role = test_input($_POST['role']);
	$gender = test_input($_POST['gender']);
	$address = test_input($_POST['address']);
	$phone_number = test_input($_POST['phone']);
	$regExAddress = '/^[a-zA-Z0-9đàáảãạăằắẳặâầấẩẫậậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ ,.-]+$/u';
	$regExPhone = '/(09|01[2|6|8|9])+([0-9]{8})\b/';
	if ($fullname=="") {
		header('location: '. $adminUrl. 'tai-khoan/edit.php?id='.$id.'&errName=Vui lòng điền cả họ và tên');
		die;
	}
	if (preg_match($regExName, $fullname) == false) {
		header('location: '. $adminUrl. 'tai-khoan/edit.php?id='.$id.'&errName=Họ tên không hợp lệ');
		die;
	}
	if ($email == "") {
		header('location: '. $adminUrl. 'tai-khoan/edit.php?id='.$id.'&errEmail=Không bỏ trống email');
		die;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header('location: '. $adminUrl. 'tai-khoan/edit.php?id='.$id.'&errEmail=Email không hợp lệ');
		die;
	}
	$sql = "select * 
			from users 
			where id = '$id'";
	$user = getSimpleQuery($sql);
	if ($email != $user['email']) {
		header('location: '.$adminUrl.'tai-khoan/edit.php?id='.$id.'&errEmail=Không thể đổi email');
		die;
	}
	if ($address == "") {
		
	}
	else if (preg_match($regExAddress, $address)==false) {
		header('location: '.$adminUrl.'tai-khoan/edit.php?id='.$id.'&errAddress=Địa chỉ không hợp lệ');
		die;	
	}
	if ($phone == "") {
		
	}
	else if (preg_match($regExPhone, $phone)==false) {
		header('location: '.$adminUrl.'tai-khoan/edit.php?id='.$id.'&errPhone=SĐT không hợp lệ');
		die;	
	}
	$sql = "update users
			set 
				fullname = :fullname,
				role = :role,
				gender = :gender,
				address = :address,
				phone_number = :phone_number			
			where id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':fullname', $fullname);
	$stmt->bindParam(':role', $role);
	$stmt->bindParam(':gender', $gender);
	$stmt->bindParam(':address', $address);
	$stmt->bindParam(':phone_number', $phone_number);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	header('location: '. $adminUrl . 'tai-khoan?edit-success=true');
	die;
?>