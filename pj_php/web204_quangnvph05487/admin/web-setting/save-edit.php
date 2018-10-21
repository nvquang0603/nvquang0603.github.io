<?php 
	session_start();
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: '. $adminUrl . 'slideshow');
		die;
	}
	if($_SESSION['login']['role']!=1) {
      header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
      die;
    }
	$origin_image = $_POST['origin-image'];
	$hotline = test_input($_POST['hotline']);
	$regExPhone = '/(09|01[2|6|8|9])+([0-9]{8})\b/';
	$email = test_input($_POST['email']);
	$map = $_POST['map'];
	$fb = $_POST['fb'];
	$imgName = unique_file_check(test_input($_FILES['logo']['name']));
	$imgType = $_FILES['logo']['type'];
	$imgSize= $_FILES['logo']['size'];
	$imgTmp = $_FILES['logo']['tmp_name'];
	$maxsize=2097152;
	$valid_img_type = array('image/jpeg','image/png','image/gif','image/jpg');
	$imgUrl = 'assets/images/' . $imgName;
	$imgSRC = $path.$path.'assets/images/' . $imgName;
	if (hotline=="") {
		header('location: '. $adminUrl .'web-setting/edit.php?errHotline=Bạn chưa điền hotline');
		die;
	}
	else if (preg_match($regExPhone, $hotline)==false) {
		header('location: '.$adminUrl.'web-setting/edit.php?id='.$id.'&errHotline=SĐT không hợp lệ');
		die;	
	}
	if (email=="") {
		header('location: '. $adminUrl .'web-setting/edit.php?id='.$id.'&errEmail=Bạn chưa điền email');
		die;
	}
	if (map=="") {
		header('location: '. $adminUrl .'web-setting/edit.php?id='.$id.'&errMap=Bạn chưa điền mã nhúng bản đồ');
		die;
	}
	if (fb=="") {
		header('location: '. $adminUrl .'web-setting/edit.php?id='.$id.'&errFacebook=Bạn chưa điền mã nhúng fanpage');
		die;
	}
	if ($imgSize == 0) {
		$imgUrl = $origin_image;
	}
	else if (!in_array($imgType,$valid_img_type)) {
		header('location: '. $adminUrl .'web-setting/edit.php?id='.$id.'&errImage=Sai định dạng file');
		die;
	}
	else if ($imgSize > $maxsize) {
		header('location: '. $adminUrl .'web-setting/edit.php?id='.$id.'&errImage=Dung lượng quá lớn. Chỉ upload ảnh tối đa 2MB');
		die;
	}
	else {
		move_uploaded_file($imgTmp, $imgSRC);
	}	
	$sql = "update web_settings 
			set 
				logo = :logo,
				hotline = :hotline,
				email = :email,
				map = :map,
				fb = :fb";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':logo', $imgUrl);
	$stmt->bindParam(':hotline', $hotline);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':map', $map);
	$stmt->bindParam(':fb', $fb);
	$stmt->execute();
	header('location: '. $adminUrl . 'web-setting?edit-success=true');
	die;
?>