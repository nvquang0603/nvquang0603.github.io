<?php 
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	$id = $_POST['id'];
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: '. $adminUrl . 'slideshow');
		die;
	}
	$origin_image = $_POST['origin-image'];
	$hotline = test_input($_POST['hotline']);
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
	if ($imgSize == 0) {
		$imgUrl = $origin_image;
	}
	else if (!in_array($imgType,$valid_img_type)) {
		header('location: '. $adminUrl .'web-setting/edit.php?errImage=Sai định dạng file');
		die;
	}
	else if ($imgSize > $maxsize) {
		header('location: '. $adminUrl .'web-setting/edit.php?errImage=Dung lượng quá lớn. Chỉ upload ảnh tối đa 2MB');
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