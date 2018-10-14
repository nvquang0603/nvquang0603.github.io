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
	$desc = test_input($_POST['desc']);
	$url = test_input($_POST['url']);
	$status = $_POST['status'];
	$order_number = test_input($_POST['ordernumber']);
	$imgName = unique_file_check(test_input($_FILES['image']['name']));
	$imgType = $_FILES['image']['type'];
	$imgSize= $_FILES['image']['size'];
	$maxsize=2097152;
	$valid_img_type = array('image/jpeg','image/png','image/gif','image/jpg');
	$imgTmp = $_FILES['image']['tmp_name'];
	$imgUrl = 'assets/images/' . $imgName;
	$imgSRC = $path.$path.'assets/images/' . $imgName;
	if (!is_numeric("$order_number")) {
		header('location: '. $adminUrl .'slideshow/add.php?errOrderNumber=Vui lòng nhập số');
		die;
	}
	if ((int)$order_number != $order_number) {
		header('location: '. $adminUrl .'slideshow/add.php?errOrderNumber=Vui lòng nhập số nguyên');
		die;
	}
	if ($imgSize == 0) {
		header('location: '. $adminUrl .'slideshow/add.php?errImage=Bạn chưa thêm file');
		die;
	}
	else if (!in_array($imgType,$valid_img_type)) {
		header('location: '. $adminUrl .'slideshow/add.php?errImage=Sai định dạng file');
		die;
	}
	else if ($imgSize > $maxsize) {
		header('location: '. $adminUrl .'slideshow/add.php?errImage=Dung lượng quá lớn. Chỉ upload ảnh tối đa 2MB');
		die;
	}
	else {
		move_uploaded_file($imgTmp, $imgSRC);
	}	
	$sql = "insert into slideshows values (null,'$imgUrl','$desc','$url','$status','$order_number')";
	getSimpleQuery($sql);
	header('location: '. $adminUrl . 'slideshow?success=true');
	die;
?>