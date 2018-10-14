<?php 
	session_start();
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header('location: '. $adminUrl. 'lien-he/add.php');
		die;
	}
    $id = $_POST['id'];
	$regExName = '/^[a-zA-ZđàáảãạăằắẳặâầấẩẫậậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ ]+$/u';
	$fullname = test_input($_POST['fullname']);
	$email = test_input($_POST['email']);
	$phone_number = test_input($_POST['phone']);
	$regExPhone = '/(09|01[2|6|8|9])+([0-9]{8})\b/';
	if ($fullname=="") {
		header('location: '. $adminUrl. 'lien-he/add.php?errName=Vui lòng điền cả họ và tên');
		die;
	}
	if (preg_match($regExName, $fullname) == false) {
		header('location: '. $adminUrl. 'lien-he/add.php?errName=Họ tên không hợp lệ');
		die;
	}
	if ($email == "") {
		header('location: '. $adminUrl. 'lien-he/add.php?errEmail=Không bỏ trống email');
		die;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header('location: '. $adminUrl. 'lien-he/add.php?errEmail=Email không hợp lệ');
		die;
	}
	if ($phone == "") {
		
	}
	else if (preg_match($regExPhone, $phone)==false) {
		header('location: '.$adminUrl.'lien-he/edit.php?id='.$id.'&errPhone=SĐT không hợp lệ');
		die;	
	}
	$sql = "update contacts
			set 
				fullname = :fullname,
				email = :email,
				phone_number = :phone_number			
			where id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':fullname', $fullname);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':phone_number', $phone_number);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	header('location: '. $adminUrl . 'lien-he?edit-success=true');
	die;
?>