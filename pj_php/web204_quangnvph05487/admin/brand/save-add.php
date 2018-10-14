<?php 
	session_start();
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	if($_SESSION['login']['role']!=1) {
      header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
      die;
    }
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: '. $adminUrl . 'brand');
		die;
	}
	$name = test_input($_POST['name']);
	$imgName = unique_file_check($_FILES['image']['name']);
	$imgType = $_FILES['image']['type'];
	$imgSize= $_FILES['image']['size'];
	$maxsize=2097152;
	$valid_img_type = array('image/jpeg','image/png','image/gif','image/jpg');
	$imgTmp = $_FILES['image']['tmp_name'];
	$imgUrl = 'assets/images/' . $imgName;
	$imgSRC = $path.$path.'assets/images/' . $imgName;
	$url = test_input($_POST['url']);
	if ($name=="") {
		header('location: '. $adminUrl .'brand/add.php?errName=Vui lòng không để trống tên thương hiệu');
		die;
	}
	$sql = "select * from brands where name = '$name'";
	$rs = getSimpleQuery($sql);
	if ($rs != false) {
		header('location: '. $adminUrl .'brand/add.php?errName=Tên thương hiệu đã tồn tại, vui lòng chọn tên khác');
		die;
	}
	if ($imgSize == 0) {
		header('location: '. $adminUrl .'brand/add.php?errImage=Bạn chưa thêm file');
		die;
	}
	else if (!in_array($imgType,$valid_img_type)) {
		header('location: '. $adminUrl .'brand/add.php?errImage=Sai định dạng file');
		die;
	}
	else if ($imgSize > $maxsize) {
		header('location: '. $adminUrl .'brand/add.php?errImage=Dung lượng quá lớn. Chỉ upload ảnh tối đa 2MB');
		die;
	}
	else {
		move_uploaded_file($imgTmp, $imgSRC);
	}	
	$sql = "insert into brands values (null,'$name','$imgUrl','$url')";
	getSimpleQuery($sql);
	header('location: '. $adminUrl . 'brand?success=true');
	die;
?>