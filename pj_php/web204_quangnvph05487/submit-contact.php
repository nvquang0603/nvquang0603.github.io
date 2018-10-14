<?php 
	require_once './assets/commons/utils.php';
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		header('location: '.$siteUrl);
		die;
	}
	$regExName = '/^[a-zA-ZđàáảãạăằắẳặâầấẩẫậậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ ]+$/u';
	$regExPhone = '/(09|01[2|6|8|9])+([0-9]{8})\b/';
	$fullname = test_input($_POST['fullname']);
	$phone = test_input($_POST['phone']);
	$email = test_input($_POST['email']);
	$content = test_input($_POST['content']);
	$user = getSimpleQuery($sql);
	if ($fullname=="") {
		header('location: '. $siteUrl. 'contact.php?errName=Vui lòng điền cả họ và tên');
		die;
	}
	if (preg_match($regExName, $fullname) == false) {
		header('location: '. $siteUrl. 'contact.php?errName=Họ tên không hợp lệ');
		die;
	}
	if ($email == "") {
		header('location: '. $siteUrl. 'contact.php?errEmail=Không bỏ trống email');
		die;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header('location: '. $siteUrl. 'contact.php?errEmail=Email không hợp lệ');
		die;
	}
	if($user){
		header('location: '. $siteUrl. 'contact.php?errEmail=Email đã tồn tại');
		die;
	}
	if ($phone == "") {
		
	}
	else if (preg_match($regExPhone, $phone)==false) {
		header('location: '. $siteUrl. 'contact.php?errPhone=SĐT không hợp lệ');
		die;	
	}
	$sql = "insert into contacts values (null,'$fullname','$email','$phone','$content')";
	getSimpleQuery($sql);
	header('location: '. $siteUrl . 'contact.php?success=true');
	die;
 ?>
